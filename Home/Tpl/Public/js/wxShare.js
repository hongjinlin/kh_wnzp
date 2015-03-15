	var appid="";
   	var imgUrl = "http://www.wayhu.com/weixin/zhuanpan/Home/Tpl/Public/images/share.jpg";
	var lineLink = "http://www.wayhu.com/weixin/zhuanpan/index.php/Index/login.html";
	var title = "测试分享标题";
	var contents = "小伙伴们，快来参加大转盘抽奖游戏咯！";
	var wx_share_desc = document.getElementById("wx_share_desc").value;
   function shareFriend(sharePrivat) { 
   		if(wx_share_desc!=null && wx_share_desc !=""){
			contents = wx_share_desc;
		}     
		WeixinJSBridge.invoke('sendAppMessage',{"appid": appid, "img_url": imgUrl, "img_width": "120", "img_height": "120","link": lineLink, "desc": contents, "title": title},
			function (res) {
				
				 _report('send_msg', res.err_msg);});
	}
	function shareTimeline(sharePlubic) {
		
		if(wx_share_desc!=null && wx_share_desc !="0"){
			contents = wx_share_desc;
		}    
		
		WeixinJSBridge.invoke('shareTimeline',{ "img_url": imgUrl, "img_width": "70", "img_height": "70", "link": lineLink, "desc": contents, "title": contents },
			function (res) { 
			
				
			_report('timeline', res.err_msg);
			});
	}
    document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
        WeixinJSBridge.on('menu:share:appmessage', function (argv) { shareFriend();});
        WeixinJSBridge.on('menu:share:timeline', function (argv) { shareTimeline();});
    }, false);
    document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
        WeixinJSBridge.call('showOptionMenu');
        WeixinJSBridge.call('hideToolbar');
    });