<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
    public function index(){
			
			$this->display("home");
	}
	
	public function top(){
		//$this->assign('name',$_SESSION['username']);
		$this->display();
	}
	public function left(){
		//获取message表中的所有数据
		/* $message=D('Message');
		import('ORG.Util.Page');// 导入分页类
		$count=$message->count();//获取数据的总数
		$page  = new Page($count,2);//

		$page->setConfig('header','条信息');
		$show=$page->show();//返回分页信息

		
		
		$arr=$message->relation(true)->limit($page->firstRow.','.$page->listRows)->select();
		//dump($arr);
		$this->assign('list',$arr);
		$this->assign('show',$show); */
		$this->display();
		}
	public function right(){
		$this->display();
	}
	
	public function gift(){
		$this->display();
	}
	
	//上传图片
	public function pcupload(){
		
		if ($this->isPost()){
		
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/Uploads/';// 设置附件上传目录
		//$upload->thumb=true;//使用缩率图
		//$upload->thumbMaxWidth='300px';
		//$upload->thumbMaxHeight='300px';
		if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
		}
		$midpic=$info[0]['savename'];//读取图片
		
		//$midpic=str_replace('.','',$info[0]['savepath']).$info[0]['savename'];

		$postname='postpic';
		$this->assign('postname',$postname);
		//$this->assign('midpic',__ROOT__.$midpic);  
		$this->assign('midpic',$midpic);  
		$this->display('imgshow');
		$this->success('上传成功');
		}else{
			$this->display('pcupload');
		}
	}
}
