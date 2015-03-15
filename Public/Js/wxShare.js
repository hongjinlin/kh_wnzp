/*******************************
 * Author:Mr.Think
 * Description:微信分享通用代码
 * 使用方法：_WXShare('分享显示的LOGO','LOGO宽度','LOGO高度','分享标题','分享描述','分享链接','微信APPID(一般不用填)');
 *******************************/

    //��ʼ������
    var img111='http://test.com/test.png';
    var width=320;
    var height=195;

    
    var url='http://test.com/index.html';
    var appid='';
	var score='';
	
     //微信内置方法
    function _ShareFriend() {
		
		var title  = document.getElementById("wx_share_title").value;
		var desc= document.getElementById("wx_share_desc").value;
		var img111= document.getElementById("wx_share_pic").value;
		var url= document.getElementById("wx_share_url").value;
		
        WeixinJSBridge.invoke('sendAppMessage',{
              'appid': appid,
              'img_url': img111,
              'img_width': width,
              'img_height': height,
              'link': url,
              'desc': desc,
              'title': title
              }, function (res) {
				
				_report('send_msg', res.err_msg);
				})
    }
	
    function _ShareTL() {	
		
		var title  = document.getElementById("wx_share_title").value;
		var desc= document.getElementById("wx_share_desc").value;
		var img111= document.getElementById("wx_share_pic").value;
		var url= document.getElementById("wx_share_url").value;
		
        WeixinJSBridge.invoke('shareTimeline',{
              'img_url': img111,
              'img_width': width,
              'img_height': height,
              'link': url,
              'desc': desc,
              'title': desc
              }, function(res) {
			  //分享给好友成功
			  
              _report('timeline', res.err_msg);
              });
    }
	
	
    function _ShareWB() {
		
		var title  = document.getElementById("wx_share_title").value;
		var desc= document.getElementById("wx_share_desc").value;
		var img111= document.getElementById("wx_share_pic").value;
		var url= document.getElementById("wx_share_url").value;
		
        WeixinJSBridge.invoke('shareWeibo',{
              'content': desc,
              'url': url,
              }, function(res) {
				//分享微博成功
				
              _report('weibo', res.err_msg);
              });
    }
    // 当微信内置浏览器初始化后会触发WeixinJSBridgeReady事件。
    document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
            // 发送给好友
            WeixinJSBridge.on('menu:share:appmessage', function(argv){
                _ShareFriend();
          });

            // 分享到朋友圈
            WeixinJSBridge.on('menu:share:timeline', function(argv){
                _ShareTL();
                });

            // 分享到微博
            WeixinJSBridge.on('menu:share:weibo', function(argv){
                _ShareWB();
           });
    }, false);
