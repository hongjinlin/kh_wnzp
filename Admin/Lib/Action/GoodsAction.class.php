<?php
	class GoodsAction extends CommonAction{
		/*
		 * 商品展示页面
		 * */
		public function goodsInfo(){
			$goodsInfo=D('config');

			$rzt=$goodsInfo->select();
			$this->assign(data,$rzt);

			$this->display();
		}
		
		/*
		 * 商品修改页面
		 * */		 
		public function modifyGoods(){
			$goodsInfo=D('config');

			$where['id']=$_GET['id'];
			$rzt=$goodsInfo->where($where)->find();
			$this->assign(data,$rzt);

			$this->display();
		}
		
		/*
		 * 商品修改方法
		 * */
		public function doUpdate(){
			$m=D('config');

			$data['id']=$_POST['id'];
			$data['praisefield']=$_POST['praisefield'];
			$data['praisename']=$_POST['praisename'];
			$data['praisecontent']=$_POST['praisecontent'];
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
