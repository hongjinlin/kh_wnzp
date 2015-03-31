<?php
	class RegisterAction extends Action{
		public function reg(){
			$this->display();
		}
		//检查用户是否注册过
		public function checkName(){
			$username=$_GET['username'];
			$user=M('Admin');
			$where['username']=$username;
			$count=$user->where($where)->count();
			if($count){
				echo '不允许';
			}else{
				echo '允许';
			}
		}
		//注册
		public function doReg(){
			
			//关闭注册功能
			$this->error('用户注册功能暂时关闭',U('Login/login'),3);
			
			$user=D('Admin');
			if(!$user->create()){
				$this->error($user->getError());
			}
		
			$lastId=$user->add();
			if($lastId){
				$this->redirect('Index/index');
			}else{
				$this->error('用户注册失败');
			}

		}
		
		public function pswModify(){
			$m=M('Admin');
			
			$data['id']=$_SESSION['id'];
			$userData= $m->where($data)->find();
			$this->assign('userData',$userData);
			$this->display();
		}
		
		public function doPswModify(){
			
			$m=M('Admin');
			
			$data['id']=$_SESSION['id'];
			$data['username']=$_POST['username'];
			$data['password']=$_POST['password'];
			$count=$m->save($data);
			if($count>0){
				$this->success('修改个人信息成功',U('Login/login'),3);
			}else{
				$this->error('修改个人信息失败');
			}
		}
	}
?>
