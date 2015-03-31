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
			
			if(!empty($_GET['praisename'])){
				$where.= " and praisename like '%".$_GET['praisename']."%'";
			
			}
			if(!empty($_GET['praisecontent'])){
				$where.= " and praisecontent like '%".$_GET['praisecontent']."%'";
			}
				
			$queryStr ="select * from magic_config".$where." order by id desc";
			
			$Model = new Model(); // 实例化一个model对象 没有对应任何数据表
			
			$queryResult = $Model->query($queryStr);
			
			if($queryResult!=null){
				$parameter = 'praisename='.urlencode($_GET['praisename']).'&praisecontent='.urlencode($_GET['praisecontent']);
					
				import('ORG.Util.Page');// 导入分页类
				$count      = count($queryResult);// 查询满足要求的总记录数
				$Page       = new Page($count,C('GOODSPOINT_PAGE_COUNT'),$parameter);// 实例化分页类 传入总记录数和每页显示的记录数
				$show       = $Page->show();// 分页显示输出
				// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			     
				$queryStr1 ="select * from magic_config".$where." order by id desc";
				$queryStr1.=" limit ".$Page->firstRow.",".$Page->listRows;
                $list = $Model->query($queryStr1);

			     $GoodsConfig=M('Config');
                $ChanceCount = $GoodsConfig->sum('chance');	

                $this->assign('ChanceCount',$ChanceCount);
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
			$m=M('Config');
			$data['id']=$_POST['id'];
			
			$data['praisenumber']=$_POST['praisenumber'];
			$data['chance']=$_POST['chance'];
			
			$count=$m->save($data);
			if($count>0){
				$this->success('修改商品成功','goodsInfo');
			}else{
				$this->error('修改商品失败');
			}
		}
		
		
	}
?>
