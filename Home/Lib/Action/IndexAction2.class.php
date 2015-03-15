<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
    	
    	if(!isset($_SESSION['USERPHONE'])||
    	$_SESSION['USERPHONE']==''||
    	!isset($_GET['gamecode'])|| $_GET['gamecode']!='wxdc92da84d1ee8a73derr4kKDL743dKLDSFRKD'||
    	!isset($_GET['gametype']) || $_GET['gametype']!='login'){
    		$this->error('您还没有抽奖权限，请登录',__URL__.'/login');
    	}
    	
		$this->refreshIp();
		
		// 获取分享的签名 开始
		$cfg_appid='wxc9176a0cf7edc7fe';
		$cfg_screct='117e66440cd6e4c523076a5cd3b7352c';
		vendor("WeixinShare.jssdk");
		$jssdk = new JSSDK($cfg_appid, $cfg_screct);
		$signPackage = $jssdk->GetSignPackage();
		$this->assign('signPackage',$signPackage);
		// 获取分享的签名 结束
		
    	$this->display();

    }
   
    public function login(){
		echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
echo "<script charset='utf-8' type='text/javascript'>alert('抱歉，本次活动已结束！');</script>"; 
exit;
		// 获取分享的签名 开始
		$cfg_appid='wxc9176a0cf7edc7fe';
		$cfg_screct='117e66440cd6e4c523076a5cd3b7352c';
		vendor("WeixinShare.jssdk");
		$jssdk = new JSSDK($cfg_appid, $cfg_screct);
		$signPackage = $jssdk->GetSignPackage();
		$this->assign('signPackage',$signPackage);
		// 获取分享的签名 结束
		
    	$this->display();
    }
    
	public function refreshIp(){
		//获取用户IP，并且注册IP
		$ip = get_client_ip();
		$IP = M("Ip");
		$ipdata = $IP->where("ip_address='".$ip."'")->find();
		if($ipdata){
			$ip_arr['opration_time'] = date("Y-m-d H:i:s");
			$IP->where("ip_address='".$ip."'")->save($ip_arr);
		}else{
			$ip_arr['ip_address'] = $ip;
			$ip_arr['opration_time'] = date("Y-m-d H:i:s");
			$IP->add($ip_arr);
		}
	}
	
    public function doReg(){
		if(!defined('IN_SYS')){
			$this->error('您还没有抽奖权限，请登录',__URL__.'/login');
		}
		
		$this->refreshIp();
		
    	$userphone=trim($_POST['userphone']);
    	$m=new Model('User');
    	
    	//判读之前是否注册过
    	$user_data = $m->where("userphone='".$userphone."'")->find();
    	if($user_data){
    		session('USERPHONE',$user_data['userphone']);
    		echo json_encode(array('status'=>'ok'));
    		exit;
    	}else{
    		//添加用户
    		$adduser['userphone']=$userphone;
    		$adduser['prizetimes']=3;//默认三次中奖机会
    		$lastid = $m->add($adduser);
    		if($lastid>0){
    			session('USERPHONE',$userphone);
    			echo json_encode(array('status'=>'ok'));
    			exit;
    		}else{
    		
    			echo json_encode(array('status'=>'ng','message'=>'注册用户失败!'));
    			exit;
    		}
    	}
		
    }
   
    public function result(){
		if(!defined('IN_SYS')){
			$this->error('您还没有抽奖权限，请登录',__URL__.'/login');
		}
    	if(!isset($_SESSION['USERPHONE'])||
    	$_SESSION['USERPHONE']==''||
    	!isset($_GET['gamecode'])|| $_GET['gamecode']!='ofAFbuH3lDSXVL8BnaT7M45A2hf8'||
    	!isset($_GET['gametype']) || $_GET['gametype']!='home'){
    		$this->error('您还没有抽奖权限，请登录',__URL__.'/login');
    	}
    	$praise_info = $_SESSION['praise_info'];
    	
    	
    	$praise_words=$praise_info['praisecontent']."。</br>兑换券编码为：</br>".$_SESSION['sn_code']."。";
    	$this->assign('praise_words',$praise_words);
    	$this->assign('sn_code',$_SESSION['sn_code']);
    	$this->assign('wx_share_desc',"我在松江万达有奖大转盘中了".$praise_info['praisecontent']."，你也来玩吧！");
		
		
		// 获取分享的签名 开始
		$cfg_appid='wxc9176a0cf7edc7fe';
		$cfg_screct='117e66440cd6e4c523076a5cd3b7352c';
		vendor("WeixinShare.jssdk");
		$jssdk = new JSSDK($cfg_appid, $cfg_screct);
		$signPackage = $jssdk->GetSignPackage();
		$this->assign('signPackage',$signPackage);
		// 获取分享的签名 结束
		
		//调用短信接口
		/* $mobile = $_SESSION['USERPHONE'];
		$content = "啦啦啦啦啦~恭喜您在幸运大转盘游戏中赢得".$praise_info['praisecontent']."，券号：".$_SESSION['sn_code']."，有效期至2014年12月29日，晚来就没啦！";
		$couponCode = $_SESSION['sn_code'];

		$token = strtoupper(md5($_SESSION['sn_code']."20141222_"));
		
		$this->sendmsg($mobile,$content,$couponCode,$token); */
    	$this->display();
    }
    
	/* public function sendmsg($mobile,$content,$couponCode,$token){
	
		$url="http://www.114mall.com/sendMessage/drawSendMessage.htm?";
		$curlPost = 'mobile='.$mobile.'&content='.$content.'&couponCode='.$couponCode.'&token='.$token.'';

		$ch = curl_init();//初始化curl
		curl_setopt($ch,CURLOPT_URL,$url);//抓取指定网页
		curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  //允许curl提交后,网页重定向  
		curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
		$data = curl_exec($ch);//运行curl
	} */
    public function run(){
		
				
		if(!defined('IN_SYS')){
			$this->error('您还没有抽奖权限，请登录',__URL__.'/login');
		}
    	if(!isset($_SESSION['USERPHONE'])||
    	$_SESSION['USERPHONE']==''){
    		$this->error('您还没有抽奖权限，请登录',__URL__.'/login');
    	}else{
    		
    		$prize_arr=array();
    		$m=new Model('Config');
    		$arr=$m->select();
    		
    		foreach($arr as $key=>$val){
				$prize_arr[$key]=$val;
			}
			
			echo $this->getResult($prize_arr);
    	}
    }
	
	public function checkIP(){
		$ip = get_client_ip();
		$dt_now = date("Y-m-d H:i:s");
		
		
		$IP = M("Ip");
		$ipdata = $IP->where("ip_address='".$ip."'")->find();
		if($ipdata){
			$dt_before = $ipdata['opration_time'];
			$time_now = strtotime($dt_now); 
			$time_before = strtotime($dt_before); 
			//更新操作时间
			$ip_arr['opration_time'] = $dt_now;
			$IP->where("ip_address='".$ip."'")->save($ip_arr);
			
			if((float)($time_now - $time_before)<=2){
				return true;//作弊嫌疑
			}else{
				return false;
			}
		}else{
			return true; //找不到IP，也认为是作弊
		}
		
	}
    private function getResult($priearr){
    	if(!defined('IN_SYS')){
			$this->error('您还没有抽奖权限，请登录',__URL__.'/login');
		}
		$arr=array();
		$count=array();
		foreach ($priearr as $key => $val) {
    		$arr[$val['id']] = $val['chance'];
    		$count[$val['id']] = $val['praisenumber'];
		}
		$rid = $this->getRand($arr,$count); //根据概率获取奖项id
		
		$res = $priearr[$rid-1]; //中奖项

		$userphone=$_SESSION["USERPHONE"];
		
		
		$m=M('User');
		$user_row=$m->field('id,prizetimes')->where(array('userphone'=>$userphone))->find();
		
		$userId = $user_row['id'];
		
		if($user_row){
			if($user_row['prizetimes']==0){
				
				
				$res['praisecontent'] ='无中奖';
				$res['id']=8;
				$result['praisecontent'] ='无中奖';
				$result['id'] = 8;
			}elseif($this->checkIP()){//作弊就不让中奖了
			
				$res['praisecontent'] ='无中奖';
				$res['id']=8;
				$result['praisecontent'] ='无中奖';
				$result['id'] = 8;
			}else{
				
				$result['praisecontent'] = $res['praisecontent'];
				$result['id'] = $res['id'];
				
				
				
			}
			
			//用户抽取的那个奖项减1
			$mode=M('Config');
			$row=$mode->field('praisenumber')->where(array('id'=>$res['id']))->find();
			if($row['praisenumber']==-1){
				$num=-1;
			}else if($row['praisenumber']==0){
				$num=0;
			}else{
				$num=$row['praisenumber']-1;
			}
			$mode->where(array('id'=>$res['id']))->save(array('praisenumber'=>$num));
			
			
			
			
			//如果中奖，保存中奖记录
			if($user_row['prizetimes']!=0 && $res['praisecontent']!="无中奖"){
				
				//扣除一次用户中奖记录
				$num=$user_row['prizetimes']-1;
				$m->where(array('id'=>$userId))->save(array('prizetimes'=>$num));
				
				$sn_code = $this->generateSNkey();
				//追加一笔中奖记录
				$mode=M('Useraddorder');
				$addorder['aid']=$userId;
				$addorder['prizeid']=$res['id'];
				$addorder['sn_code']=$sn_code;
				$addorder['joindate']= date("Y-m-d H:i:s");
				
				$mode->add($addorder);
				
				
				//更新兑换码状态
				//$mode_sn->where(array('id'=>$sndata['id']))->save(array('status'=>1));
				
				//存储兑换码信息到session
				session('sn_code',$sn_code);
				
				//存储中奖信息到session
				session('praise_info',$res);
				
				
			}else{
				$result['praisecontent'] ="无中奖";
				$result['id'] = 8;
			}
			
			return $this->json($result);
		}
    }
	
	public function generateSNkey( $length = 15 ) {
    	// 密码字符集，可任意添加你需要的字符
    
    	$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    
    	$snkey = '';
    	for ( $i = 0; $i < $length; $i++ )
    	{
    		$snkey .= $chars[ mt_rand(0, strlen($chars) - 1) ];
    	}
    	
    	return $snkey;
    }
	
    private function getRand($proArr,$proCount){
    	$result = '';
    	$proSum=0;
    	//概率数组的总概率精度  获取库存不为0的
    	foreach($proCount as $key=>$val){
    		if($val==0){
    			continue;
    		}else{
    			$proSum=$proSum+$proArr[$key];
    		}
    	}
    	//概率数组循环 �
    	foreach ($proArr as $key => $proCur) {
    		if($proCount[$key]==0){
    			continue;
    		}else{
    			$randNum = mt_rand(1, $proSum);//关键
        		if ($randNum <= $proCur) {
        			$result = $key;
           	 		break;
        		}else{
            		$proSum -= $proCur;
        		}
    		}

    	}
    	unset ($proArr);
    	return $result;
    }
    private function json($array){
    	$this->arrayRecursive($array, 'urlencode', true);
		$json = json_encode($array);
		return urldecode($json);
    }
    //对数组中所有元素做处理
	private function arrayRecursive(&$array, $function, $apply_to_keys_also = false){
		foreach ($array as $key => $value) {
			if (is_array($value)) {
				arrayRecursive($array[$key], $function, $apply_to_keys_also);
			}else{
				$array[$key] = $function($value);
			}
			if ($apply_to_keys_also && is_string($key)){
				$new_key = $function($key);
				if ($new_key != $key){
					$array[$new_key] = $array[$key];
					unset($array[$key]);
				}
			}
		}
	}
}