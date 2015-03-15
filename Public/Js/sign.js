//window.onload = function() {
//
//	
//	checkLogin();
//
//}
//
//
//function checkLogin() {
//
//	$.ajax({
//		type : "post",
//		url : 'webServer.php?t=' + Math.random(),
//		data : {
//			type : "checkLogin"
//		},
//		cache : false,
//		async : false,
//		success : function(returnBack) {
//
//			if (returnBack == 1) {
//				window.location.href = 'index.html';
//			}
//		}
//	});
//}

function sub() {

	var name = document.getElementById("name").value;

	var phone = document.getElementById("phone").value;

	if (precheck(name, phone)) {

		$.ajax({
			type : "post",
			url : './doLogin',
			data : {
				username : name,
				userphone : phone
			},
			cache : false,
			async : false,
			success : function(returnBack) {
				
				if (returnBack > 0) {
					window.location.href = '../Index/index.html';
				}else if(returnBack == 'game_over'){
					alert("博饼活动还没开始或已经结束！");
				}else if(returnBack == 'username_error'){
					alert("用户名错误，请重新输入！");
				} else if(returnBack == 'game_over'){
					alert("您好，本次博饼活动已经结束！");
				} else if(returnBack == 'time_over'){
					alert("您好，您当前的登陆时点不在有效范围内！");
				}else if(returnBack == 'userlogin_error'){
					alert("用户登录异常，请重新输入！");
				}else if(returnBack == 'useradd_error'){
					alert("新增用户失败，请重新输入！");
				}
				else {
					alert("网络出错");
				}
			}
		});
	}
}

function CheckUserName(name) {

	var myCheck = new Site_FC();
	return myCheck.checkValue(name, myCheck.EmptyRegular, "请输入您的姓名") && myCheck.checkValue(name, myCheck.ChinaNameRegular, "姓名请输入2-6个中文");
}

function CheckUserMobile(phone) {

	var myCheck = new Site_FC();
	return myCheck.checkValue(phone, myCheck.EmptyRegular, "请输入您的手机号码") && myCheck.checkValue(phone, myCheck.MobileRegular, "手机号码格式错误");
}

function precheck(name, phone) {

	var err = 0;
	if (!CheckUserName(name)) {
		err = err + 1;
		return false;
	}

	if (!CheckUserMobile(phone)) {
		err = err + 1;
		return false;
	}

	if (err > 0)
		return false;
	else
		return true;
}

