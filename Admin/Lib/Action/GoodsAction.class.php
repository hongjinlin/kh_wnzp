<?php
	class GoodsAction extends CommonAction{
		
		public function goodsInfo(){
			
			$GoodsConfig=M('Config');
			
            $data = $GoodsConfig->select();
			
            $ChanceCount = $GoodsConfig->sum('chance');

            $this->assign('ChanceCount',$ChanceCount);
			$this->assign('data',$data);
			$this->display(); // 输出模板
		}
		
		public function searchGoods(){
			
			$where=" where 1=1";
			
			if(!empty($_GET['goodstypename'])){
				$where.= " and t.goodstypename like '%".$_GET['goodstypename']."%'";
			
			}
			if(!empty($_GET['goodstitle'])){
				$where.= " and g.goodstitle like '%".$_GET['goodstitle']."%'";
			}
				
			$queryStr ="select g.id as id,g.goodstitle as goodstitle ,g.goodscontent as goodscontent,g.goodspic as goodspic,t.goodstypename as goodstypename from tp_goods g join tp_goodstype t on g.goodstypeid=t.id ".$where." order by g.id desc";
			
			$Model = new Model(); // 实例化一个model对象 没有对应任何数据表
			
			$queryResult = $Model->query($queryStr);
			
			if($queryResult!=null){
				$parameter = 'goodstypename='.urlencode($_GET['goodstypename']).'&goodstitle='.urlencode($_GET['goodstitle']);
					
				import('ORG.Util.Page');// 导入分页类
				$count      = count($queryResult);// 查询满足要求的总记录数
				$Page       = new Page($count,C('GOODSPOINT_PAGE_COUNT'),$parameter);// 实例化分页类 传入总记录数和每页显示的记录数
				$show       = $Page->show();// 分页显示输出
				// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			
				$queryStr1 ="select g.id as id,g.goodstitle as goodstitle ,g.goodscontent as goodscontent,g.goodspic as goodspic,t.goodstypename as goodstypename from tp_goods g join tp_goodstype t on g.goodstypeid=t.id ".$where." order by g.id desc";
				$queryStr1.=" limit ".$Page->firstRow.",".$Page->listRows;
			
				$list = $Model->query($queryStr1);
				$this->assign('data',$list);// 赋值数据集
				$this->assign('page',$show);// 赋值分页输出
			
			}
			
			$this->display('goodsInfo'); // 输出模板
		}
		
		public function addGoods(){
			$GoodsType = M('Goodstype');
			$goodsTypeList= $GoodsType->select();
			$this->assign('goodsTypeList',$goodsTypeList);
			$this->display();
		}
		
		public function doAdd(){
			
			$Goods=M('Goods');
			
			$Goods->create();
			
			$lastId=$Goods->add();
			if($lastId){
				$this->success('添加商品成功','goodsInfo');
			}else{
				$this->error('添加商品失败');
			}
		}
		
		public function doDel(){
			$Goods = M('Goods');

			$id = $_GET['id'];

			$count = $Goods->delete($id);
			if($count>0){
				$this->success('删除商品成功');
			}else {
				$this->error('删除商品失败');
			}
		}
		
		/*
		 *	显示修改页面
		* */
		public function modifyGoods(){
			$id=$_GET['id'];

			$m=M('Config');
			$arr=$m->find($id);
		
			$this->assign('data',$arr);			
			$this->display();
		}
		
		public function doUpdate(){
			$m=M('Goods');
			$data['id']=$_POST['id'];
			$data['goodstitle']=$_POST['goodstitle'];
			$data['goodspic']=$_POST['goodspic'];
			$data['goodscontent']=$_POST['goodscontent'];
			$data['goodslink']=$_POST['goodslink'];
			$data['goodstypeid']=$_POST['goodstypeid'];
			
			$count=$m->save($data);
			if($count>0){
				$this->success('修改商品成功','goodsInfo');
			}else{
				$this->error('修改商品失败');
			}
		}
		
		
	}
?>
