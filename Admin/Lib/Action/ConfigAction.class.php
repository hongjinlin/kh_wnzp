<?php

	class ConfigAction extends Action{
		
		public function configInfo(){

			$condition['grouptype']=$_GET['grouptype'];

			$ConfigModel = M('Config');
			$data = $ConfigModel->where($condition)->select();
			$this->assign('data',$data);
			
			$configTitle='';
			switch($_GET['grouptype']){
				case 'system':
					$configTitle='系统配置';
					break;  
				case 'game':
					$configTitle='活动配置';
					break;  
				case 'weixin':
					$configTitle='微信配置';
					break;  
				default:
					$configTitle='配置管理';
			}
			
			$this->assign('configTitle',$configTitle);
			
			$this->display();
		}
		
		//更新配置信息
		public function updateConfig(){
			
			$ConfigModel = M('Config');
			
			foreach($_POST['data'] as $data)
			{	
				$ConfigModel->save($data);

			}
			
			$this->success('修改系统配置成功');
		}
		
		
		
	}
?>
