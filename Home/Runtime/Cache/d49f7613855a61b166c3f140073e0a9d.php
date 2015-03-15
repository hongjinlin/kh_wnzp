<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0132)file:///E:/project/%E5%BE%AE%E4%BF%A1%E5%A4%A7%E8%BD%AC%E7%9B%98/%E5%B9%B8%E8%BF%90%E5%A4%A7%E8%BD%AC%E7%9B%98%E6%8A%BD%E5%A5%96.htm -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta name="description" content="乐享微信">

<title>幸运大转盘抽奖</title>
<link href="__PUBLIC__/css/activity-style.css" rel="stylesheet" type="text/css">
<style>

#mcover {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(0, 0, 0, 0.7);
	display: none;
	z-index: 20000;
}
#mcover img {
	position: fixed;
	right: 18px;
	top: 5px;
	width: 260px;
	height: 180px;
	z-index: 20001;
}



</style>
<script>
	function exchange(){
		//alert("click me");
		window.location.href="http://www.baidu.com?sn_code=<?php echo ($sn_code); ?>";
	}
	
	function playagain(){
		window.location.href="__APP__/Index/index?gamecode=wxdc92da84d1ee8a73derr4kKDL743dKLDSFRKD&gametype=login";
	}
</script>
</head>

<body style="background-image:url(__PUBLIC__/images/bg2.jpg); background-repeat:no-repeat; background-size:100%;background-color:#a0a0a0">
<div class="main">

<input type="hidden" id="wx_share_title" value="大礼转起来！！">
	<input type="hidden" id="wx_share_desc" value="<?php echo ($wx_share_desc); ?>">
	<input type="hidden" id="wx_share_pic" value="http://wx.wayhu.com/kh_wnzp/Home/Tpl/Public/images/share.jpg">
	<input type="hidden" id="wx_share_url" value="http://wx.wayhu.com/kh_wnzp/index.php/Index/login">
 <div id="outercont" >
	<div class="praize_cont">
	<span style="font-weight:bold;font-size:14px;color:red;"><?php echo ($praise_words); ?></span>
	</div>
	<div class="content1">
	<img src="__PUBLIC__/images/sharebtn.png" onclick="$('#mcover').show()">
	<!-- <img src="__PUBLIC__/images/exchangebtn.png" onClick="exchange()">
	<img src="__PUBLIC__/images/againbtn.png" onClick="playagain()"> -->
	</div>
</div>


</div>

<div id="mcover" onclick="$(this).hide()">
    <img src="__PUBLIC__/images/guide.png">
</div>

<script src="__PUBLIC__/js/jquery-1.4.4.min.js" type="text/javascript"></script> 
<script src="__PUBLIC__/js/zhuanpanRotate.js" type="text/javascript"></script> 
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

</body></html>