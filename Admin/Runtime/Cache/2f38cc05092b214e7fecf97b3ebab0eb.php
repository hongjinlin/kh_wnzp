<?php if (!defined('THINK_PATH')) exit();?>
<script type="text/javascript" src="__PUBLIC__/Js/showdate.js"></script>
<!DOCTYPE html>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>拼图游戏后台</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0 ,user-scalable=no">

    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/style.css" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/bootstrap.min.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/Admin/jquery.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/Admin/bootstrap.min.js"></script>

    <!--[if lt IE 9]>
		<script type="text/javascript" src="__PUBLIC__/Js/Admin/html5shiv.min.js"></script>
		<script type="text/javascript" src="__PUBLIC__/Js/Admin/respond.min.js"></script>

    <![endif]-->
	<script type="text/javascript" src="__PUBLIC__/Js/Admin/functions.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/Admin/jquery.form.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/Admin/asyncbox.js"></script>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/default.css" />

	</head>

	<body>

		<nav class="navbar navbar-inverse navbar-static-top" role="navigation">

			<a href="http://www.wayhu.com"  target="_black"><img class="img-rounded" src="__PUBLIC__/Images/bot_logo.png" /></a>
			<p style="text-align:right;margin-top:-53px;color:white;">拼图游戏后台欢迎你 <<?php echo (session('username')); ?>>
			
			<a href="__APP__/Index/home"  class="btn btn-default navbar-btn btn-group-lg">后台首页</a>
			
			<a href="__APP__/Register/pswModify" class="btn btn-default navbar-btn btn-group-lg">修改个人信息</a>

			<a href="__APP__/Login/doLogout"  class="btn btn-default navbar-btn btn-group-lg">退出登录</a>


		</nav>

	

	

				


<div class="pull-left diywap_left">
			
			<div class="list-group" id="accordion">
			
				<?php if($_SESSION['role']== 'level_1_admin' ): ?><h4>
					<a class="list-group-item active navbar-link " data-toggle="collapse"  data-parent="#accordion" href="#collapseOne">
					商品管理  <span class="glyphicon  glyphicon-arrow-down"></span></a>
				</h4>
					<div id="collapseOne" class="panel-collapse collapse  
					<?php  if(strstr(__SELF__, 'addGoodsType')){echo ' in';} if(strstr(__SELF__, 'goodsTypeInfo')){echo ' in';} if(strstr(__SELF__, 'modifyGoodsType')){echo ' in';} if(strstr(__SELF__, 'searchGoodsType')){echo ' in';} if(strstr(__SELF__, 'addGoods')){echo ' in';} if(strstr(__SELF__, 'goodsInfo')){echo ' in';} if(strstr(__SELF__, 'modifyGoods')){echo ' in';} if(strstr(__SELF__, 'searchGoods')){echo ' in';} ?> ">
				<a href="__APP__/GoodsType/addGoodsType" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 添加商品类别</a>
				<a href="__APP__/GoodsType/goodsTypeInfo" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 商品类别列表</a>
				<a href="__APP__/Goods/addGoods" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 添加商品</a>
				<a href="__APP__/Goods/goodsInfo" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 商品列表</a>
				
				</div><?php endif; ?>

				<h4>
				<a class="list-group-item active navbar-link" data-toggle="collapse"  data-parent="#accordion" href="#collapsetwo">用户管理 <span class="glyphicon  glyphicon-arrow-down"></span></a>	
				</h4>
				<div id="collapsetwo" class="panel-collapse collapse
					<?php  if(strstr(__SELF__, 'userInfo')){echo ' in';} if(strstr(__SELF__, 'searchUser')){echo ' in';} if(strstr(__SELF__, 'exchangeGift')){echo ' in';} if(strstr(__SELF__, 'scoreInfo')){echo ' in';} if(strstr(__SELF__, 'searchScore')){echo ' in';} if(strstr(__SELF__, 'modifyScore')){echo ' in';} if(strstr(__SELF__, 'exchangeInfo')){echo ' in';} if(strstr(__SELF__, 'searchExchange')){echo ' in';} ?>				
				">
				<a href="__APP__/User/userInfo" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span>用户记录查询</a>
				<a href="__APP__/User/scoreInfo"  class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span>游戏成绩查询</a>				
				<a href="__APP__/User/exchangeInfo"  class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span>兑换记录查询</a>	
				</div>

				<!--角色判断-->

				<?php if($_SESSION['role']== 'level_1_admin' ): ?><h4>
				<a class="list-group-item active navbar-link" data-toggle="collapse"  data-parent="#accordion" href="#collapsethree">配置管理 <span class="glyphicon  glyphicon-arrow-down"></span></a>	
					</h4>
				<div id="collapsethree" class="panel-collapse collapse
					<?php  if(strstr(__SELF__, 'system')){echo ' in';} if(strstr(__SELF__, 'game')){echo ' in';} if(strstr(__SELF__, 'weixin')){echo ' in';} ?>				
				">
				<a href="__APP__/Config/configInfo/grouptype/system" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 系统配置</a>					
				<a href="__APP__/Config/configInfo/grouptype/game"  class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 活动配置</a>
				<a href="__APP__/Config/configInfo/grouptype/weixin" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 微信配置</a>
				
					</div>
				
				
					<h4>
				<a class="list-group-item active navbar-link" data-toggle="collapse"  data-parent="#accordion" href="#collapsefour">角色管理 <span class="glyphicon  glyphicon-arrow-down"></span></a>	
					</h4>
				<div id="collapsefour" class="panel-collapse collapse
					<?php  if(strstr(__SELF__, 'adminInfo')){echo ' in';} if(strstr(__SELF__, 'addAdmin')){echo ' in';} if(strstr(__SELF__, 'searchAdmin')){echo ' in';} ?>				
				">
				<a href="__APP__/Admin/addAdmin" class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span> 添加管理员</a>					
				<a href="__APP__/Admin/adminInfo"  class="list-group-item"><span class="glyphicon glyphicon-circle-arrow-right"></span>管理员列表</a>
					</div><?php endif; ?>	
				

				<a class="list-group-item active navbar-link " href="http://www.wayhu.com">官方网站：www.wayhu.com</a>
				<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1599675606&site=qq&menu=yes" class="list-group-item active navbar-link ">
				<img border="0" src="http://wpa.qq.com/pa?p=2:1599675606:51" alt="点击这里给我发消息" title="点击这里给我发消息"/> 技术QQ</a>
				
			</div>
			
			
		</div>	


<script>
				$(function(){
				
				//提交表单
				$('img.search').click(function(){
					$('form[name="searchExchangeForm"]').submit();
				});
				
				$('#exportData').click(function(){
					
					var startdate='blank';
					var enddate='blank';
					var username='blank';
					var userphone='blank';
					
					if($("#startdate").val()!=''){
						startdate =$("#startdate").val();
					}
					
					if($("#enddate").val()!=''){
						enddate =$("#enddate").val();
					}
					
					if($("#username").val()!=''){
						username =$("#username").val();
					}
					
					if($("#userphone").val()!=''){
						userphone =$("#userphone").val();
					}

					window.location.href = "__APP__/User/exportExchangeData/startdate/"+startdate+"/enddate/"+enddate+"/username/"+username+"/userphone/"+userphone;
				});
			});
		</script>		
	<div class="diywap_right">

		<div class="well well-sm">兑换记录查询</div>
					
					<form  name="searchExchangeForm" action="__APP__/User/searchExchange"  method="get" >
		<div>
			开始时间:<input type="text" id="startdate" name="startdate" onclick="return Calendar('startdate');" value="<<?php echo ($_GET['startdate']); ?>>" class="text" style="width:85px;"/>
			结束时间:<input type="text" id="enddate" onclick="return Calendar('enddate');" value="<<?php echo ($_GET['enddate']); ?>>" name="enddate" class="text" style="width:85px;"/>
			用户名称:<input type='text' name='username' id="username" value="<<?php echo ($_GET['username']); ?>>"/>
			用户手机: <input type='text' name='userphone' id="userphone" value="<<?php echo ($_GET['userphone']); ?>>"/>
			 		 
			<button type="submit" class="btn btn-primary btn-lg" id="search">查询</button>
			<div class="btn btn-primary btn-lg" id="exportData">导出数据</div>
		</div>
		</form>
		</br>
		
		<table class="table table-hover table-bordered">
			<tr>
				<th>兑换时间</th>
				<th>用户名称</th>
				<th>用户手机</th>
				<th>用户成绩</th>
				<th>兑换备注</th>
				<th>操作管理员</th>
			</tr>
			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="active">
					<td><<?php echo ($vo["exchangedatetime"]); ?>></td>
					<td><<?php echo ($vo["username"]); ?>></td>
					<td><<?php echo ($vo["userphone"]); ?>></td>
					<td><<?php echo ($vo["score"]); ?>></td>
					<td><<?php echo ($vo["exchangenote"]); ?>></td>
					<td><<?php echo ($vo["operationadmin"]); ?>></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>

		</table>
		
		</br>
		<div style="text-align:center;"><<?php echo ($page); ?>></div>

			</div>

		

</div>

</body>

</html>