<?php
	ini_set("memory_limit","256M");
	class UserAction extends CommonAction{
		
		public function userInfo(){
			
			$queryStr = "select u.id as uid,u.userphone,u.prizetimes,u.is_exchange,c.praisename,a.joindate,c.praisecontent from magic_user as u,magic_useraddorder as a,magic_config as c where u.id=a.aid and a.prizeid=c.id";
                
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
		
		public function searchUser(){

            $where="";

            if(!empty($_GET['userphone'])){
                $where .= " and u.userphone like '%".$_GET['userphone']."%'"; 
            }

            $queryStr = "select u.id as uid,u.userphone,u.prizetimes,u.is_exchange,c.praisename,a.joindate,c.praisecontent from magic_user as u,magic_useraddorder as a,magic_config as c where u.id=a.aid and a.prizeid=c.id".$where;

            $model=D();
            $queryResult=$model->query($queryStr);

            if($queryResult!=null){
                import('ORG.Util.Page');// 导入分页类
                $count = count($queryResult);// 查询满足要求的总记录数
                $parameter = 'userphone='.urlencode($_GET['userphone']);
                $Page = new Page($count,C('SCORE_PAGE_COUNT'),$parameter);// 实例化分页类 传入总记录数和每页显示的记录数
                $show = $Page->show();// 分页显示输出
                // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
                $queryStr1 = $queryStr. " limit ".$Page->firstRow.",".$Page->listRows;
                
                $list = $model->query($queryStr1);
                
                $this->assign('data',$list);// 赋值数据集
                $this->assign('page',$show);// 赋值分页输出
                        
            }
            unset($queryResult);
            $this->display('userInfo');		
		}
		
		/**
		 *
		 * 导出 USER Excel
		 */
		function exportUserData(){//导出Excel

			$xlsName  = "用户数据表";
			$xlsCell  = array(
					array('index','序号'),
					array('username','用户名称'),
					array('userphone','用户手机'),
					array('regtime','注册时间')
		
			);
			$xlsModel = M('User');
			
			$map=array();
			if($_GET['username']!='blank'){
				$map['username'] = array('like','%'.$_GET['username'].'%');
			}
			if($_GET['userphone']!='blank'){
				$map['userphone'] = array('like','%'.$_GET['userphone'].'%');
			}
			
			$xlsData  =$xlsModel->where($map)->Field('username,userphone,regtime')->order('id desc')->select();
			
			$i=1;
			foreach ($xlsData as $k => $v)
			{	
				$xlsData[$k]['index']=$i;
				$i++;
			}
			
			$this->exportExcel($xlsName,$xlsCell,$xlsData);
		
		}
		
		public function scoreInfo(){
			
			$queryStr ="select u.id as uid,u.username as username,u.userphone as userphone,u.is_exchange as is_exchange,s.score as score,s.id as id,s.joindate as joindate from tp_user u join tp_score s on u.id=s.uid";
			
			$Model = new Model(); // 实例化一个model对象 没有对应任何数据表
			$queryResult = $Model->query($queryStr);
			
			if($queryResult!=null){
				import('ORG.Util.Page');// 导入分页类
				$count      = count($queryResult);// 查询满足要求的总记录数
				$Page       = new Page($count,C('SCORE_PAGE_COUNT'));// 实例化分页类 传入总记录数和每页显示的记录数
				$show       = $Page->show();// 分页显示输出
				// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
				$queryStr1 ="select u.id as uid,u.username as username,u.userphone as userphone,u.is_exchange as is_exchange,s.score as score,s.id as id,s.joindate as joindate from tp_user u join tp_score s on u.id=s.uid order by s.joindate desc limit ".$Page->firstRow.",".$Page->listRows;
				
				$list = $Model->query($queryStr1);
				$this->assign('data',$list);// 赋值数据集
				$this->assign('page',$show);// 赋值分页输出
						
			}
			
			unset($queryResult);
			$this->display();
			
		}
		
		public function searchScore(){
			
			$where=" where 1=1";

			if(!empty($_GET['startdate'])){
			
				$where.=" and DATE_FORMAT( s.joindate,  '%Y-%m-%d' ) >='".date("Y-m-d",strtotime($_GET['startdate']))."'";
			}
				
			if(!empty($_GET['enddate'])){
				$where.=" and DATE_FORMAT( s.joindate,  '%Y-%m-%d' ) <='".date("Y-m-d",strtotime($_GET['enddate']))."'";
			}
			
			if(!empty($_GET['username'])){
				$where.=" and u.username like '%".$_GET['username']."%'";
			}
			
			if(!empty($_GET['userphone'])){
				$where.=" and u.userphone like '%".$_GET['userphone']."%'";
			}
			
			$queryStr ="select u.id as uid,u.username as username,u.userphone as userphone,u.is_exchange as is_exchange,s.id as id,s.score as score,s.joindate as joindate from tp_user u join tp_score s on u.id=s.uid".$where;
			
			
			$Model = new Model(); // 实例化一个model对象 没有对应任何数据表
			
			$queryResult = $Model->query($queryStr);
			
			
			if($queryResult!=null){
				
				//带入搜索参数
				$parameter = 'userphone='.urlencode($_GET['userphone']).'&startdate='.urlencode($_GET['startdate']).'&enddate='.urlencode($_GET['enddate']).'&username='.urlencode($_GET['username']).'&userphone='.urlencode($_GET['userphone']);
				
				import('ORG.Util.Page');// 导入分页类
				$count      = count($queryResult);// 查询满足要求的总记录数
				$Page       = new Page($count,C('SCORE_PAGE_COUNT'),$parameter);// 实例化分页类 传入总记录数和每页显示的记录数
				$show       = $Page->show();// 分页显示输出
				// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
				$where.=" order by s.joindate desc limit ".$Page->firstRow.",".$Page->listRows;
				$queryStr1 ="select u.id as uid,u.username as username,u.userphone as userphone,u.is_exchange as is_exchange,s.id as id,s.score as score,s.joindate as joindate from tp_user u join tp_score s on u.id=s.uid".$where;
				
				$list = $Model->query($queryStr1);
				$this->assign('data',$list);// 赋值数据集
				$this->assign('page',$show);// 赋值分页输出
				
			}
			
			unset($queryResult);
			$this->display('scoreInfo'); // 输出模板
		}
		
		/**
		 *
		 * 导出 SCORE Excel
		 */
		function exportScoreData(){//导出Excel

			$xlsName  = "用户游戏成绩表";
			$xlsCell  = array(
					array('joindate','游戏时间'),
					array('username','用户名称'),
					array('userphone','用户手机'),
					array('score','用户成绩(秒)')
		
			);
			$xlsModel = new Model();
				
			$where=" where 1=1";

			if($_GET['startdate']!='blank'){
			
				$where.=" and DATE_FORMAT( s.joindate,  '%Y-%m-%d' ) >='".date("Y-m-d",strtotime($_GET['startdate']))."'";
			}
				
			if($_GET['enddate']!='blank'){
				$where.=" and DATE_FORMAT( s.joindate,  '%Y-%m-%d' ) <='".date("Y-m-d",strtotime($_GET['enddate']))."'";
			}
			
			if($_GET['username']!='blank'){
				$where.=" and u.username like '%".$_GET['username']."%'";
			}
			
			if($_GET['userphone']!='blank'){
				$where.=" and u.userphone like '%".$_GET['userphone']."%'";
			}
				
			$where.=" order by s.joindate desc";
			$queryStr1 ="select u.username as username,u.userphone as userphone,u.is_exchange as is_exchange,s.score as score,s.joindate as joindate from tp_user u join tp_score s on u.id=s.uid".$where;

			$xlsData = $xlsModel->query($queryStr1);

			$this->exportExcel($xlsName,$xlsCell,$xlsData);
		
		}
		
		public function modifyScore(){
			$id = $_GET['id'];//分数ID
			$score = $_GET['score'];
			$username = $_GET['username'];

			$this->assign('username',$username);
			$this->assign('score',$score);
			$this->assign('id',$id);
			$this->display();
		}
		
		public function doScoreModify(){
			$id= $_POST['id'];
			$score = $_POST['score'];
			
			$data['id']=$_POST['id'];
			$data['score']=$_POST['score'];
			
			$m=M('Score');
			
			$count=$m->save($data);
			
			if($count>0){
				$this->success('修改分数成功','scoreInfo');
			}else{
				$this->error('修改分数失败');
			}
			
		}
		
		
		public function exchangeGift(){
			$uid = $_GET['uid'];
			$User = M('User');
			$userphone = $User->where('id='.$uid)->getField('userphone');

			$this->assign('exchange_user_phone',$userphone);
			$this->assign('exchange_user_id',$uid);
			$this->display();
		}
		
		public function doExchange(){
			$Exchange=M('Exchange');
			
			$Exchange->create();
			
			$Exchange->operationadmin=$_SESSION['username'];
			$Exchange->exchangedatetime=date("Y-m-d H:i:s");
			$lastId=$Exchange->add();
			
			if($lastId){
				//更新
				$User = M("User"); // 实例化User对象
				// 更改用户的兑换状态值
				$User-> where('id='.$_POST['uid'])->setField('is_exchange',1);
				
				$this->success('兑换操作成功','exchangeInfo');
			}else{
				$this->error('兑换操作失败');
			}
		}
		
		
		public function exchangeInfo(){
				
			$queryStr ="select u.userphone as userphone,e.exchangedatetime as exchangedatetime,e.exchangenote as exchangenote,e.operationadmin as operationadmin ,s.score as score from magic_user u join magic_exchange e on u.id=e.uid ";
			
			$Model = new Model(); // 实例化一个model对象 没有对应任何数据表
			$queryResult = $Model->query($queryStr);
			
			if($queryResult!=null){
				import('ORG.Util.Page');// 导入分页类
				$count      = count($queryResult);// 查询满足要求的总记录数
				$Page       = new Page($count,C('EXCHANGE_PAGE_COUNT'));// 实例化分页类 传入总记录数和每页显示的记录数
				$show       = $Page->show();// 分页显示输出
				// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
				$queryStr1 ="select u.username as username,u.userphone as userphone,e.exchangedatetime as exchangedatetime ,e.exchangenote as exchangenote,e.operationadmin as operationadmin,s.score as score from tp_user u join tp_exchange e on u.id=e.uid join tp_score s on u.id=s.uid order by e.exchangedatetime desc limit ".$Page->firstRow.",".$Page->listRows;
				
				$list = $Model->query($queryStr1);
				$this->assign('data',$list);// 赋值数据集
				$this->assign('page',$show);// 赋值分页输出
						
			}
			
			unset($queryResult);
			$this->display();
			
		}
		
		public function searchExchange(){
			$where=" where 1=1";
			
			if(!empty($_GET['startdate'])){
					
				$where.=" and DATE_FORMAT( e.exchangedatetime,  '%Y-%m-%d' ) >='".date("Y-m-d",strtotime($_GET['startdate']))."'";
			}
			
			if(!empty($_GET['enddate'])){
				$where.=" and DATE_FORMAT( e.exchangedatetime,  '%Y-%m-%d' ) <='".date("Y-m-d",strtotime($_GET['enddate']))."'";
			}
				
			if(!empty($_GET['username'])){
				$where.=" and u.username like '%".$_GET['username']."%'";
			}
				
			if(!empty($_GET['userphone'])){
				$where.=" and u.userphone like '%".$_GET['userphone']."%'";
			}
				
			$queryStr ="select u.username as username,u.userphone as userphone,e.exchangedatetime as exchangedatetime ,e.exchangenote as exchangenote,e.operationadmin as operationadmin, s.score as score from tp_user u join tp_exchange e on u.id=e.uid join tp_score s on u.id=s.uid join tp_score s on u.id=s.uid".$where;
				
				
			$Model = new Model(); // 实例化一个model对象 没有对应任何数据表
				
			$queryResult = $Model->query($queryStr);
				
				
			if($queryResult!=null){
			
				//带入搜索参数
				$parameter = 'userphone='.urlencode($_GET['userphone']).'&startdate='.urlencode($_GET['startdate']).'&enddate='.urlencode($_GET['enddate']).'&username='.urlencode($_GET['username']).'&userphone='.urlencode($_GET['userphone']);
			
				import('ORG.Util.Page');// 导入分页类
				$count      = count($queryResult);// 查询满足要求的总记录数
				$Page       = new Page($count,C('EXCHANGE_PAGE_COUNT'),$parameter);// 实例化分页类 传入总记录数和每页显示的记录数
				$show       = $Page->show();// 分页显示输出
				// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
				$where.=" order by e.exchangedatetime desc limit ".$Page->firstRow.",".$Page->listRows;
				$queryStr1 ="select u.username as username,u.userphone as userphone,e.exchangedatetime as exchangedatetime ,e.exchangenote as exchangenote,e.operationadmin as operationadmin, s.score as score from tp_user u join tp_exchange e on u.id=e.uid join tp_score s on u.id=s.uid".$where;
				
				$list = $Model->query($queryStr1);
				$this->assign('data',$list);// 赋值数据集
				$this->assign('page',$show);// 赋值分页输出
			
			}
				
			unset($queryResult);
			$this->display('exchangeInfo'); // 输出模板
				
		}
		
		/**
		 *
		 * 导出 Exchange Excel
		 */
		function exportExchangeData(){//导出Excel
		
			$xlsName  = "兑换数据表";
			$xlsCell  = array(
					array('index','序号')	,
					array('username','用户名称'),
					array('userphone','用户手机'),
					array('score','用户成绩'),
					array('exchangenote','兑换备注'),
					array('exchangedatetime','兑换时间'),
					array('operationadmin','操作管理者'),
		
			);
			
			$xlsModel = new Model();
			
			$where=" where 1=1";
			
			if($_GET['startdate']!='blank'){
					
				$where.=" and DATE_FORMAT( e.exchangedatetime,  '%Y-%m-%d' ) >='".date("Y-m-d",strtotime($_GET['startdate']))."'";
			}
			
			if($_GET['enddate']!='blank'){
				$where.=" and DATE_FORMAT( e.exchangedatetime,  '%Y-%m-%d' ) <='".date("Y-m-d",strtotime($_GET['enddate']))."'";
			}
				
			if($_GET['username']!='blank'){
				$where.=" and u.username like '%".$_GET['username']."%'";
			}
				
			if($_GET['userphone']!='blank'){
				$where.=" and u.userphone like '%".$_GET['userphone']."%'";
			}
			
			$where.=" order by e.exchangedatetime desc";
			$queryStr1 ="select u.username as username,u.userphone as userphone,e.exchangedatetime as exchangedatetime,e.exchangenote as exchangenote,e.operationadmin as operationadmin,s.score as score from tp_user u join tp_exchange e on u.id=e.uid join tp_score s on u.id=s.uid".$where;
			
			$xlsData = $xlsModel->query($queryStr1);
			
			
			$i=1;
			foreach ($xlsData as $k => $v)
			{
				$xlsData[$k]['index']=$i;
				$i++;
			}
				
			$this->exportExcel($xlsName,$xlsCell,$xlsData);
		
		}
	}
?>
