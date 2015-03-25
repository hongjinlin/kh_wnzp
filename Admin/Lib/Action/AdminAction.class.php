<?php
	class AdminAction extends CommonAction{
		
		public function adminInfo(){
			
			$admin=M('Admin');
			
			import('ORG.Util.Page');// 导入分页类
			$count      = $admin->count();// 查询满足要求的总记录数
			$Page       = new Page($count,C('ADMIN_PAGE_COUNT'));// 实例化分页类 传入总记录数和每页显示的记录数
			$show       = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$list = $admin->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('data',$list);// 赋值数据集
			$this->assign('page',$show);// 赋值分页输出
			$this->display(); // 输出模板
		}
		
		public function searchAdmin(){
			
			$map=array();
			if(!empty($_GET['username'])){
				$map['username'] = array('like','%'.$_GET['username'].'%');
			}

			
			$parameter = 'username='.urlencode($_GET['username']);
			
			$admin = M('Admin'); // 实例化admin对象
			import('ORG.Util.Page');// 导入分页类
			$count      = $admin->where($map)->count();// 查询满足要求的总记录数
			$Page       = new Page($count,C('ADMIN_PAGE_COUNT'),$parameter);// 实例化分页类 传入总记录数和每页显示的记录数
			$show       = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$list = $admin->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('data',$list);// 赋值数据集
			$this->assign('page',$show);// 赋值分页输出
			$this->display('adminInfo'); // 输出模板
		}
		
		public function addAdmin(){
			
			$this->display();
		}
		
		public function doAdd(){
			
			$admin=M('Admin');
				
			$admin->create();

			$lastId=$admin->add();
			if($lastId){
				$this->success('添加管理员成功','adminInfo');
			}else{
				$this->error('添加管理员失败');
			}
		}
		
		public function doDel(){
			$admin = M('Admin');
			
			$id = $_GET['id'];
			
			$count = $admin->delete($id);
			if($count>0){
				$this->success('删除管理员成功');
			}else {
				$this->error('删除管理员失败');
			}
		}
		
		/*
		 *	显示修改页面
		* */
// 		public function modifyAdmin(){
// 			$id=$_GET['id'];

// 			$m=M('Admin');
// 			$arr=$m->find($id);

// 			$this->assign('data',$arr);
// 			$this->display();
// 		}
		
// 		public function doUpdate(){
// 			$m=M('Admin');
// 			$data['id']=$_POST['id'];
			
// 			$data['username']=$_POST['username'];
			
			

// 			$count=$m->save($data);
// 			if($count>0){
// 				$this->success('修改管理员成功','adminInfo');
// 			}else{
// 				$this->error('修改管理员失败');
// 			}
// 		}
		
		
	}
?>
