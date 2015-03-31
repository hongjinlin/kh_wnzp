<?php
	class GoodsTypeAction extends CommonAction{
		
		public function goodsTypeInfo(){
			
			$GoodsType=M('Goodstype');
			
			import('ORG.Util.Page');// 导入分页类
			$count      = $GoodsType->count();// 查询满足要求的总记录数
			$Page       = new Page($count,C('GOODTYPE_PAGE_COUNT'));// 实例化分页类 传入总记录数和每页显示的记录数
			$show       = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$list = $GoodsType->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('data',$list);// 赋值数据集
			$this->assign('page',$show);// 赋值分页输出
			$this->display(); // 输出模板
		}
		
		public function searchGoodsType(){
			
			$map=array();
			if(!empty($_GET['goodstypename'])){
				$map['goodstypename'] = array('like','%'.$_GET['goodstypename'].'%');
			}
			
			if($_GET['isshow']!=''){
				$map['isshow'] = array('eq',$_GET['isshow']);
			}
			
			$parameter = 'goodstypename='.urlencode($_GET['goodstypename']).'&isshow='.urlencode($_GET['isshow']);
			
			$GoodsType = M('Goodstype'); // 实例化goodstype对象
			import('ORG.Util.Page');// 导入分页类
			$count      = $GoodsType->where($map)->count();// 查询满足要求的总记录数
			$Page       = new Page($count,C('GOODSTYPE_PAGE_COUNT'),$parameter);// 实例化分页类 传入总记录数和每页显示的记录数
			$show       = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$list = $GoodsType->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('data',$list);// 赋值数据集
			$this->assign('page',$show);// 赋值分页输出
			$this->display('goodsTypeInfo'); // 输出模板
		}
		
		public function addGoodsType(){
			
			$this->display();
		}
		
		public function doAdd(){
			
			if($_POST['isshow']==1 &&(!$this->checkIsShowAllow())){
				$this->error('当前已存在一个显示的商品类别');
			}
			
			$GoodsType=M('Goodstype');
			
			$GoodsType->create();

			$lastId=$GoodsType->add();
			if($lastId){
				$this->success('添加商品类别成功','goodsTypeInfo');
			}else{
				$this->error('添加商品类别失败');
			}
		}
		
		public function doDel(){
			//$GoodsType = M('GoodsType');

			$id = $_GET['id'];
			
			//开始事务处理，需要涉及两张表 score 和 user
			$model = new Model();
			$model->startTrans();
			$flag=false;
			
			//如果存在商品数据，则删除，否则直接删除商品类别
			$Goods = M('Goods');
			$countGoods=$Goods->where('goodstypeid='.$id)->count();
			if($countGoods>0){
				$goods_delete_result = $model->table(C('DB_PREFIX').'goods')->where('goodstypeid='.$id)->delete();
			 
				if($goods_delete_result){ //如果商品数据删除成功，就执行删除商品类别操作
				
					$goodstype_delete_result = $model->table(C('DB_PREFIX').'goodstype')->where('id='.$id)->delete();

					$model->commit();
					$flag=true;
						
				}
				
				if(!$flag){
					$model->rollback();
					$this->error('删除商品类别失败');
				}else{
					$this->success('删除商品类别成功');
				}
			}else{
				$GoodsType = M('Goodstype');
				$GoodsType->where('id='.$id)->delete();
				$this->success('删除商品类别成功');
			}
		}
		
		/*
		 *	显示修改页面
		* */
		public function modifyGoodsType(){
			$id=$_GET['id'];

			$m=M('Goodstype');
			$arr=$m->find($id);

			$this->assign('data',$arr);
			$this->display();
		}
		
		public function doUpdate(){
			$m=M('Goodstype');
			$data['id']=$_POST['id'];
			
			$data['goodstypepic']=$_POST['goodstypepic'];
			$data['goodstypename']=$_POST['goodstypename'];
			$data['isshow']=$_POST['isshow'];
			

			$map['isshow']=1; //查询允许显示的记录数
			$map['id'] = array('neq',$_POST['id']);
			$allow_show_count = $m->where($map)->count();// 查询满足要求的总记录数
			
			if($_POST['isshow']==1 && $allow_show_count>0){
				$this->error('当前已存在一个显示的商品类别');
			}
			
			$count=$m->save($data);
			if($count>0){
				$this->success('修改商品类别成功','goodsTypeInfo');
			}else{
				$this->error('修改商品类别失败');
			}
		}
		
		
	}
?>
