<?php
	class UserAction extends CommonAction{

		/*
		 * 用户及游戏记录查询模块
		 * */
		public function userInfo(){
			
			$queryStr = "select u.id as uid,u.userphone,u.prizetimes,c.praisename,a.joindate,c.praisecontent from magic_user as u,magic_useraddorder as a,magic_config as c where u.id=a.aid and a.prizeid=c.id";
				
			$model=D();
			$queryResult=$model->query($queryStr);
			
			if($queryResult!=null){
				import('ORG.Util.Page');// 导入分页类
				$count = count($queryResult);// 查询满足要求的总记录数
				$Page = new Page($count,C('SCORE_PAGE_COUNT'));// 实例化分页类 传入总记录数和每页显示的记录数
				$show = $Page->show();// 分页显示输出
				// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
				$queryStr1 = $queryStr. " limit ".$Page->firstRow.",".$Page->listRows;
				
				$list = $model->query($queryStr1);
				$this->assign('data',$list);// 赋值数据集
				$this->assign('page',$show);// 赋值分页输出
						
			}
			unset($queryResult);
			$this->display();
		}

		/*
		 * 搜索模块
		 * */
		public function searchUser(){
			
			$where="";

			if(!empty($_GET['userphone'])){
				$where .= " and u.userphone like '%".$_GET['userphone']."%'"; 
			}

			$queryStr = "select u.id as uid,u.userphone,u.prizetimes,c.praisename,a.joindate,c.praisecontent from magic_user as u,magic_useraddorder as a,magic_config as c where u.id=a.aid and a.prizeid=c.id".$where;

			$model=D();
			$queryResult=$model->query($queryStr);

			if($queryResult!=null){
				import('ORG.Util.Page');// 导入分页类
				$count = count($queryResult);// 查询满足要求的总记录数
				$Page = new Page($count,C('SCORE_PAGE_COUNT'));// 实例化分页类 传入总记录数和每页显示的记录数
				$show = $Page->show();// 分页显示输出
				// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
				$queryStr1 = $queryStr. " limit ".$Page->firstRow.",".$Page->listRows;
				
				$list = $model->query($queryStr1);
				//var_dump($list);exit;
				$this->assign('data',$list);// 赋值数据集
				$this->assign('page',$show);// 赋值分页输出
						
			}
			unset($queryResult);
			$this->display('userInfo');
		}

		
		
	}
