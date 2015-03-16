<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<title>拼图游戏后台登陆</title>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/basic.css" />
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/main.css" />
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/bootstrap.min.css" />
		<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
		<script>
			$(function(){
				$('#post').click(function(){
					$('form[name="myForm"]').submit();
				});

				$('img[class="register"]').click(function(){
					window.location='__APP__/Register/reg';
				});
			});
		</script>
	</head>
	<body>
		
		<div class="container col-md-4 col-md-offset-4" style="margin-top:10%;">

<div class="panel panel-primary ">

  <div class="panel-heading" id="msg">拼图游戏后台登陆</div>

  <div class="panel-body">

    <form method="post" action="__URL__/doLogin" class="form-horizontal" role="form" name='myForm'/>

	  <div class="form-group">

	   <label for="username" class="col-sm-3 control-label">用户名:</label>

	    <div class="col-sm-6">

			<input type="username" class="form-control" name="username" placeholder="用户名" />

		</div>

	  </div>

	   <div class="form-group">

	   <label for="pwd" class="col-sm-3 control-label">密　码:</label>

	    <div class="col-sm-6">

			<input type="password" class="form-control" name="password" placeholder="密　码" />

		</div>

	  </div>

	   <div class="form-group">

	   <label for="code" class="col-sm-3 control-label">验证码:</label>

	    <div class="col-sm-6 ">

			<input type='text' name='code'/>
					<img src='__APP__/Public/code?w=30&h=30' onclick='this.src=this.src+"?"+Math.random()'/>

		</div>

	  </div>

	



		<button type="button" class="btn btn-primary btn-lg btn-block" id="post" >登陆</button>

	</form>

</div>
	</body>
</html>