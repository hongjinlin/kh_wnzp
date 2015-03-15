<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
        <!-- Mobile Devices Support @begin -->
        <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
            <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
            <meta content="no-cache" http-equiv="pragma">
            <meta content="0" http-equiv="expires">
            <meta content="telephone=no, address=no" name="format-detection">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
           
        <!-- Mobile Devices Support @end -->

<title>幸运大转盘抽奖</title>
<link href="__PUBLIC__/css/activity-style.css" rel="stylesheet" type="text/css">
<style type="text/css">
*{padding:0; margin:0}
.layer{background:#000; opacity:0.5; width:100%; height:100%; position:absolute; display:none; z-index:1}
.notice,.reg{background:#fff; width:50%; height:400px; position:absolute; z-index:2; left:22%; top:20%; line-height:22px; font-size:14px; border-radius:5px;  color:#CB7B03;display:none}
.notice span,.reg span{ display:block; width:80px; height:25px; line-height:25px; text-align:center; background:#00C; color:#FFF; border-radius:2px; float:left}
.notice a,.reg a{ float:right; margin-top:-5px;}


.content img{ height:40px;}
.reg{ height:160px; }
.reg input{ width:100%; height:30px; line-height:30px; font-size:16px; margin-top:10px;}
.submit{ width:100%; height:40px; line-height:40px; border-radius:5px; background:#090; color:#FFF; margin-top:20px; text-align:center; font-size:16px; font-weight:bolder;letter-spacing:5px}
</style>

<script type="text/javascript">

function reg()
{
	
    var userphone=$("#userphone").val();

	var reg_tel=new RegExp("^1[3,5,4,7,8]{1}[0-9]{9}$");
     
	 if (userphone == '') {
		alert("手机号码不能为空！");
		$("#userphone").focus();
		return;
	 } else if(!reg_tel.test(userphone))
     {
         alert('请输入有效的手机号码！');
         $("#userphone").focus();
         return false;
     }
    
    
	$.ajax({
		url : '__APP__/Index/doReg',
		data : {
				userphone :userphone
			},
		type : 'post',
		dataType : "json",
		async : false,
		error : function(ret, error) {
			alert(ret.responseText);
		},
		success : function(ret) {
			
			if(ret.status=='ok'){

				window.location.href="__APP__/Index/index?gamecode=wxdc92da84d1ee8a73derr4kKDL743dKLDSFRKD&gametype=login";
				
			}else{
				
				alert(ret.message);
				return;
				
			}
		}
		});

}
</script>

</head>

<body style="background-image:url(__PUBLIC__/images/bg0.jpg); background-repeat:no-repeat; background-size:100%;background-color:#a0a0a0">
<input type="hidden" id="wx_share_title" value="大礼转起来！！">
	<input type="hidden" id="wx_share_desc" value="小伙伴们，快来参加松江万达大转盘抽奖游戏咯！">
	<input type="hidden" id="wx_share_pic" value="http://wx.wayhu.com/kh_wnzp/Home/Tpl/Public/images/share.jpg">
	<input type="hidden" id="wx_share_url" value="http://wx.wayhu.com/kh_wnzp/index.php/Index/login">
<div class="userphone" style="margin-top:100%;margin-left:23%;width:54%;">
	<input class="input" type="tel" id="userphone" style="width:100%;height:40px;font-size:25px;">
	</div>
<div class="content">
	
<img src="__PUBLIC__/images/joinbtn.png" onClick="reg()">
</div>

<script src="__PUBLIC__/js/jquery-1.4.4.min.js" type="text/javascript"></script> 
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
wx.config({
    debug: false,
    appId: '<?php echo ($signPackage["appId"]); ?>',
    timestamp: '<?php echo ($signPackage["timestamp"]); ?>',
    nonceStr: '<?php echo ($signPackage["nonceStr"]); ?>',
    signature: '<?php echo ($signPackage["signature"]); ?>',
      jsApiList: [
        'onMenuShareTimeline',
        'onMenuShareAppMessage'
		]
  });
  wx.ready(function () {
    // 在这里调用 API
	
	
	wx.onMenuShareAppMessage({
      title: document.getElementById("wx_share_title").value,
      desc: document.getElementById("wx_share_desc").value,
      link: document.getElementById("wx_share_url").value,
      imgUrl: document.getElementById("wx_share_pic").value,
      trigger: function (res) {
       	//alert('用户点击发送给朋友');
      },
      success: function (res) {
       	//alert('已分享成功');
       	
      },
      cancel: function (res) {
        //alert('已取消');
      },
      fail: function (res) {
       // alert(JSON.stringify(res));
      }
    });
	
	wx.onMenuShareTimeline({
      title: document.getElementById("wx_share_desc").value,
      link: document.getElementById("wx_share_url").value,
      imgUrl: document.getElementById("wx_share_pic").value,
	  
      trigger: function (res) {
        // alert('用户点击分享到朋友圈');
      },
      success: function (res) {
          //alert('已分享成功');
          
      },
      cancel: function (res) {
       	//alert('已取消分享');
      },
      fail: function (res) {
        //alert(JSON.stringify(res));
      }
    });
	
  });
  
  wx.error(function (res) {
	
	alert(res.errMsg);
  });
</script>
</body>
</html>