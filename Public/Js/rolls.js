var lastLeft = new Date();
var lastRight = new Date();
var shaking = false;
var stopNum = 0;
var ds, a1, a2, a3, a4, a5, a6;

window.sounds = new Object();
var sound = new Audio('/Public/Images/bo.mp3');
var gamecoin = 0;
sound.load();
// 首先，定义一个摇动的阀值
var SHAKE_THRESHOLD = 3000;
// 定义一个变量保存上次更新的时间
var last_update = 0;
// 紧接着定义x、y、z记录三个轴的数据以及上一次出发的时间
var x;
var y;
var z;
var last_x;
var last_y;
var last_z;

function deviceMotionHandler(eventData) {
　　// 获取含重力的加速度
　　var acceleration = eventData.accelerationIncludingGravity; 

　　// 获取当前时间
　　var curTime = new Date().getTime(); 
　　var diffTime = curTime -last_update;
　　// 固定时间段
　　if (diffTime > 100) {
　　　　last_update = curTime; 

　　　　x = acceleration.x; 
　　　　y = acceleration.y; 
　　　　z = acceleration.z; 

　　　　var speed = Math.abs(x + y + z - last_x - last_y - last_z) / diffTime * 10000; 

　　　　if (speed > SHAKE_THRESHOLD) { 
　　　　　　// TODO:在此处可以实现摇一摇之后所要进行的数据逻辑操作
　　　　　　begin_func();
			//alert("test yao!");
		}

　　　　last_x = x; 
　　　　last_y = y; 
　　　　last_z = z; 
	} 
}

window.onload = function() {
	window.scroll(0, 0);
	
	
	if (window.DeviceMotionEvent) {
		
　　　　// 移动浏览器支持运动传感事件
　　　　window.addEventListener('devicemotion', deviceMotionHandler, false);
	}

	var str = aaajax('./initGame');
	
	switch (str.status) {

		case '200':
			$("#id_leftcount").html(str.times);
			gamecoin = parseInt(str.score);
			addinfo(str);
			break;
		case '204':
			$("#txt").show();
			$("#txt").html("网络出错啦,请稍候再来！");
			break;
		case '205':
			alert("您好，本次博饼活动已经结束！");
			window.location.href = "../Login/sign.html";
			break;
		case '206':
			alert("您好，您当前的登陆时点不在有效范围内！");
			window.location.href = "../Login/sign.html";
			break;
		case '300':
			$("#txt").html("您还没登录哟！");
			alert("您还没登录哟！");
			window.location.href = "../Login/sign.html";
			break;
		default:
			$("#txt").html("出错啦,请重新登录！");
			break;
	}
}

function imghide() {

	var str = bbajax('./startGame');
	$("#txt").show();
	switch (str.status) {
		case '200':
			ds = str.roll;
			a1 = ds.substr(0, 1);
			a2 = ds.substr(1, 1);
			a3 = ds.substr(2, 1);
			a4 = ds.substr(3, 1);
			a5 = ds.substr(4, 1);
			a6 = ds.substr(5, 1);
			document.getElementById("rezult").innerHTML = "<img src='/Public/Images/dian" + a1 + ".png' id='p1' class='p_1' /> <img src='/Public/Images/dian" + a2 + ".png' id='p2' class='p_2' /> <img src='/Public/Images/dian" + a3 + ".png' id='p3' class='p_3' /> <img src='/Public/Images/dian" + a4 + ".png' id='p4' class='p_4' /> <img src='/Public/Images/dian" + a5 + ".png' id='p5' class='p_5' /> <img src='/Public/Images/dian" + a6 + ".png' id='p6' class='p_6' />";
			$("#txt").html(str.score_each);
			$("#id_leftcount").html(str.times);
			gamecoin += parseInt(str.score_each);
			
			addinfo(str);

			//如果是最后一次，自动加载提示信息
			if(str.times<=0){
				setTimeout('opencartDiv('+gamecoin+',1)',2000); 
			}
			break;
		case '201':
			$("#txt").html("您的博饼次数已经用完！");
			break;
		case '300':
			$("#txt").html("您还没登录哟！");
			alert("您还没登录哟！");
			window.location.href = "sign.html";
			break;
		case '203':
			$("#txt").html("全部包厢博完了！");
			break;
		case '204':
			$("#txt").html("本次博饼活动已经结束！");
			break;
		case '205':
			$("#txt").html("您点击太快了休息几秒吧！");
			break;
		default:
			$("#txt").html("出错啦,请重新登录！");
			break;
	};
	$("#loading").hide();
	$("#rezult").show();
	$("#boyiba").attr("disabled", false);
	//$("#i_bg").attr("src","images/l"+arr[5]+".wav")
}

function addinfo(str) {

	var gchtml = document.getElementById("id_gamecoin");
	gchtml.innerHTML = gamecoin;

	switch(parseInt(str.score_each)) {

		case 0:
			$("#txt").html("分享好友，再来一次（0分）");
			break;
		case str.yixiu_score:
			$("#txt").html("小小秀才，下次再来（一秀"+str.yixiu_score+"分）");
			break;
		case str.erju_score:
			$("#txt").html("一举成名，二举成双（二举"+str.erju_score+"分）");
			break;
		case str.sijin_score:
			$("#txt").html("四海升平，四世同堂（四进"+str.sijin_score+"分）");
			break;
		case str.sanhong_score:
			$("#txt").html("三朋四友，必要分享（三红"+str.sanhong_score+"分）");
			break;
		case str.duitang_score:
			$("#txt").html("一帆风顺，心想事成（对堂"+str.duitang_score+"分）");
			break;
		case str.sidianhong_score:
			$("#txt").html("四点红，属我最红（四点红"+str.sidianhong_score+"分）");
			break;
		case str.wuzi_score:
			$("#txt").html("五子登科，我有豪车（五子"+str.wuzi_score+"分）");
			break;
		case str.heiliubo_score:
			$("#txt").html("黑六勃，六六顺（黑六勃"+str.heiliubo_score+"分）");
			break;
		case str.biandijin_score:
			$("#txt").html("遍地锦，锦上添花（遍地锦"+str.biandijin_score+"分）");
			break;
		case str.liubeihong_score:
			$("#txt").html("六杯红，红红火火（六杯红"+str.liubeihong_score+"分）");
			break;
		case str.zhuanyuan_score:
			$("#txt").html("耶！最大状元（状元插金花"+str.zhuanyuan_score+"分）");
			break;
		default:
			$("#txt").html("出错啦，请稍候再来！");
			break;
	}
	
}

var nowDate = 0, lastDate = 0;

function begin_func() {
	
	nowDate = new Date().getTime();
	//	alert(nowDate-lastDate);
	if (nowDate - lastDate < 1500) {
		lastDate = nowDate;
		return false;
	}
	
	var bbCount = parseInt($("#id_leftcount").html());
	if (bbCount > 0) {
		//		OnClick();
		sound.play();
		$("#txt").hide();
		$("#rezult").hide();
		$("#yaobin").hide();
		$("#loading").show();
		$("#boyiba").attr("disabled", true);
		setTimeout(imghide, 1000);

	} else {
		$("#txt").show();
		$("#txt").html("您今日的次数已用尽,请明天继续！");
	}

}

function addOne(){
	
	
	$("#shareImg").show();
	closeMast();//关闭提示框
	//var str = ccajax('webServer.php?t=' + Math.random());
}

var jqresult;
function bbajax(url) {
	
	$.ajax({
		url : url,
		type : 'post',
		dataType : "json",
		async : false,
		error : function(ret, error) {
			alert(ret.responseText);
		},
		success : function(ret) {

			if (!ret) {
				return;
			}
			jqresult = ret;
		}
	});

	return jqresult;
}

function aaajax(url) {

	$.ajax({
		url : url,
		type : 'post',
		dataType : "json",
		async : false,
		error : function(ret, error) {
			alert(ret.responseText);
		},
		success : function(ret) {
			
			if (!ret) {
				return;
			}
			jqresult = ret;
		}
	});

	return jqresult;
}

function ccajax(url) {

	$.ajax({
		url : url,
		type : 'post',
		dataType : "json",
		data : {
			type : "addOne"
		},
		async : false,
		error : function(ret, error) {
			alert(ret.responseText);
		},
		success : function(ret) {

			if (!ret) {
				return;
			}
			jqresult = ret;
		}
	});

	return jqresult;
}

function shareHide(){
	
	$("#shareImg").hide();
	
}

function quitLogin() {
	$.ajax({/*退出登录*/
		type : "post",
		async : false,
		dataType : "json",
		data : {
			type : "quitLogin"
		},
		url : '../Login/quitLogin',
		error : function(ret, error) {
			alert(error);
		},
		success : function(data) {
			
			if (data != null && data != '') {
				alert("退出成功!");
				window.location.href = "../Login/sign.html";
			}
		}
	});
}
