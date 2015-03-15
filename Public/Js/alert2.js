document.writeln("<style type=\"text\/css\">");
document.writeln("");
document.writeln(".window, .login, .gamedone {");
document.writeln("	width:290px;");
document.writeln("	position:fixed;");
document.writeln("	display:none;");
document.writeln("	top:150px;");
document.writeln("	left:50%;");
document.writeln("	 z-index:9999;");
document.writeln("	margin:-50px auto 0 -145px;");
document.writeln("	padding:2px;");
//document.writeln("	border-radius:0.6em;");
//document.writeln("	-webkit-border-radius:0.6em;");
//document.writeln("	-moz-border-radius:0.6em;");
document.writeln("	background-color: #ffffff;");
document.writeln("	-webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);");
document.writeln("	-moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);");
document.writeln("	-o-box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);");
document.writeln("	box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);");
document.writeln("	font:14px\/1.5 Microsoft YaHei,Helvitica,Verdana,Arial,san-serif;");
document.writeln("}");
document.writeln(".window .title,.login .title,.gamedone .title ,.carpoint .title{");
document.writeln("	");
document.writeln("	background-color: #A3A2A1;");
document.writeln("	line-height: 26px;");
document.writeln("    padding: 5px 5px 5px 10px;");
document.writeln("	color:#ffffff;");
document.writeln("	font-size:16px;");
//document.writeln("	border-radius:0.5em 0.5em 0 0;");
//document.writeln("	-webkit-border-radius:0.5em 0.5em 0 0;");
//document.writeln("	-moz-border-radius:0.5em 0.5em 0 0;");
document.writeln("	background-image: -webkit-gradient(linear, left top, left bottom, from( #c32733 ), to( #565656 )); \/* Saf4+, Chrome *\/");
document.writeln("	background-image: -webkit-linear-gradient(#c32733, #c32733); \/* Chrome 10+, Saf5.1+ *\/");
document.writeln("	background-image:    -moz-linear-gradient(#c32733, #c32733); \/* FF3.6 *\/");
document.writeln("	background-image:     -ms-linear-gradient(#c32733, #c32733); \/* IE10 *\/");
document.writeln("	background-image:      -o-linear-gradient(#c32733, #c32733); \/* Opera 11.10+ *\/");
document.writeln("	background-image:         linear-gradient(#c32733, #c32733);");
document.writeln("	");
document.writeln("}");
document.writeln(".window .content, .login .content, .gamedone .content {");
document.writeln("	\/*min-height:100px;*\/");
document.writeln("	overflow:auto;");
document.writeln("	padding:10px;");
document.writeln("	background: linear-gradient(#FBFBFB, #EEEEEE) repeat scroll 0 0 #FFF9DF;");
document.writeln("    color: #222222;");
document.writeln("    text-shadow: 0 1px 0 #FFFFFF;");
document.writeln("    text-align: center;");
//document.writeln("	border-radius: 0 0 0.6em 0.6em;");
//document.writeln("	-webkit-border-radius: 0 0 0.6em 0.6em;");
//document.writeln("	-moz-border-radius: 0 0 0.6em 0.6em;");
document.writeln("}");
document.writeln(".window #txt, .login #txt, .gamedone .#congar_msg {");
document.writeln("	min-height:30px;font-size:16px; line-height:22px;text-align:center;");
document.writeln("}");
document.writeln(".window .txtbtn, .login .txtbtn, .gamedone .txtbtn {");
document.writeln("	");
document.writeln("	background: #f1f1f1;");
document.writeln("	background-image: -webkit-gradient(linear, left top, left bottom, from( #DCDCDC ), to( #f1f1f1 )); \/* Saf4+, Chrome *\/");
document.writeln("	background-image: -webkit-linear-gradient( #ffffff , #DCDCDC ); \/* Chrome 10+, Saf5.1+ *\/");
document.writeln("	background-image:    -moz-linear-gradient( #ffffff , #DCDCDC ); \/* FF3.6 *\/");
document.writeln("	background-image:     -ms-linear-gradient( #ffffff , #DCDCDC ); \/* IE10 *\/");
document.writeln("	background-image:      -o-linear-gradient( #ffffff , #DCDCDC ); \/* Opera 11.10+ *\/");
document.writeln("	background-image:         linear-gradient( #ffffff , #DCDCDC );");
document.writeln("	border: 1px solid #CCCCCC;");
document.writeln("	border-bottom: 1px solid #B4B4B4;");
document.writeln("	color: #555555;");
document.writeln("	font-weight: bold;");
document.writeln("	text-shadow: 0 1px 0 #FFFFFF;");
//document.writeln("	border-radius: 0.6em 0.6em 0.6em 0.6em;");
document.writeln("	display: block;");
document.writeln("	width: 100%;");
document.writeln("	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);");
document.writeln("	text-overflow: ellipsis;");
document.writeln("	white-space: nowrap;");
document.writeln("	cursor: pointer;");
document.writeln("	text-align: windowcenter;");
document.writeln("	font-weight: bold;");
document.writeln("	font-size: 18px;");
document.writeln("	padding:6px;");
document.writeln("	margin:10px 0 0 0;");
document.writeln("}");
document.writeln(".window .txtbtn:visited,.login .txtbtn:visited,.gamedone .txtbtn:visited {");
document.writeln("	background-image: -webkit-gradient(linear, left top, left bottom, from( #ffffff ), to( #cccccc )); \/* Saf4+, Chrome *\/");
document.writeln("	background-image: -webkit-linear-gradient( #ffffff , #cccccc ); \/* Chrome 10+, Saf5.1+ *\/");
document.writeln("	background-image:    -moz-linear-gradient( #ffffff , #cccccc ); \/* FF3.6 *\/");
document.writeln("	background-image:     -ms-linear-gradient( #ffffff , #cccccc ); \/* IE10 *\/");
document.writeln("	background-image:      -o-linear-gradient( #ffffff , #cccccc ); \/* Opera 11.10+ *\/");
document.writeln("	background-image:         linear-gradient( #ffffff , #cccccc );");
document.writeln("}");
document.writeln(".window .txtbtn:hover,.login .txtbtn:hover,.gamedone .txtbtn:hover {");
document.writeln("	background-image: -webkit-gradient(linear, left top, left bottom, from( #ffffff ), to( #cccccc )); \/* Saf4+, Chrome *\/");
document.writeln("	background-image: -webkit-linear-gradient( #ffffff , #cccccc ); \/* Chrome 10+, Saf5.1+ *\/");
document.writeln("	background-image:    -moz-linear-gradient( #ffffff , #cccccc ); \/* FF3.6 *\/");
document.writeln("	background-image:     -ms-linear-gradient( #ffffff , #cccccc ); \/* IE10 *\/");
document.writeln("	background-image:      -o-linear-gradient( #ffffff , #cccccc ); \/* Opera 11.10+ *\/");
document.writeln("	background-image:         linear-gradient( #ffffff , #cccccc );");
document.writeln("}");
document.writeln(".window .txtbtn:active,.login .txtbtn:active,.gamedone .txtbtn:active {");
document.writeln("	background-image: -webkit-gradient(linear, left top, left bottom, from( #cccccc ), to( #ffffff )); \/* Saf4+, Chrome *\/");
document.writeln("	background-image: -webkit-linear-gradient( #cccccc , #ffffff ); \/* Chrome 10+, Saf5.1+ *\/");
document.writeln("	background-image:    -moz-linear-gradient( #cccccc , #ffffff ); \/* FF3.6 *\/");
document.writeln("	background-image:     -ms-linear-gradient( #cccccc , #ffffff ); \/* IE10 *\/");
document.writeln("	background-image:      -o-linear-gradient( #cccccc , #ffffff ); \/* Opera 11.10+ *\/");
document.writeln("	background-image:         linear-gradient( #cccccc , #ffffff );");
document.writeln("	border: 1px solid #C9C9C9;");
document.writeln("	border-top: 1px solid #B4B4B4;");
document.writeln("	box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3) inset;");
document.writeln("}");
document.writeln("");
document.writeln(".username input, .userphone input {");
document.writeln("background-color: #fff;");
document.writeln("background-image: none;");
document.writeln("border: 1px solid #ccc;");
document.writeln("box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;");
document.writeln("color: #555;");
document.writeln("font-size: 14px;");
document.writeln("line-height: 1.42857;");
document.writeln("margin-top: 6px;");  
document.writeln("padding: 6px 12px;");
document.writeln("transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;");
document.writeln("vertical-align: middle;");
document.writeln("}");

document.writeln("#gameclosebutton,#sharebutton{width: 40%;float:left;margin:10px 0 0 15px;}");


document.writeln(".window .title .close,.login .title .close, .gamedone .title .close {");
document.writeln("	float:right;");
document.writeln("	background-image: url(\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAACTSURBVEhL7dNtCoAgDAZgb60nsGN1tPLVCVNHmg76kQ8E1mwv+GG27cestQ4PvTZ69SFocBGpWa8+zHt\/Up+IN+MhgLlUmnIE1CpBQB2COZibfpnXhHFaIZkYph0SOeeK\/QJ8o7KOek84fkCWSBtfL+Ny2MPpCkPFMH6PWEhWhKncIyEk69VfiUuVhqJefds+YcwNbEwxGqGIFWYAAAAASUVORK5CYII=\");");
document.writeln("	width:26px;");
document.writeln("	height:26px;");
document.writeln("	display:block;	");
document.writeln("}");
document.writeln("<\/style>");

document.writeln("<div class=\"window\" id=\"windowcenter\">");
document.writeln("	<div id=\"title\" class=\"title\">消息提醒<span class=\"close\" id=\"alertclose\"><\/span><\/div>");
document.writeln("	<div class=\"content\">");
document.writeln("	 <div id=\"txt\"><\/div>");
document.writeln("	 <input type=\"button\" value=\"确定\" id=\"windowclosebutton\" name=\"确定\" class=\"txtbtn\">	");
document.writeln("	<\/div>");
document.writeln("<\/div>");

//登陆框定义
document.writeln("<div class=\"login\" id=\"windowlogin\">");
document.writeln("	<div id=\"title\" class=\"title\">用户登陆<span class=\"loginclose\" id=\"loginclose\"><\/span><\/div>");
document.writeln("	<div class=\"content\">");
document.writeln("	<div class=\"username\">");
document.writeln("	您的姓名：<input type=\"text\" class=\"input\" id=\"name\" />");
document.writeln("	 <\/div>");
document.writeln("	<div class=\"userphone\">");
document.writeln("	手机号码：<input type=\"tel\" class=\"input\" id=\"phone\" />");

document.writeln("	 <\/div>");
document.writeln("	<span id=\"err_msg\" style=\"color:red\"><\/span>");
document.writeln("	 <input type=\"button\" value=\"登陆\" id=\"loginbutton\" name=\"登陆\" class=\"txtbtn\">	");
document.writeln("	<\/div>");
document.writeln("<\/div>");

//完成游戏框定义
document.writeln("<div id=\"gamedone\" class=\"gamedone\">");
document.writeln("<div id=\"title\" class=\"title\">消息提醒<span id=\"gameclose\" class=\"close\"></span>");
document.writeln("<\/div>");
document.writeln("<div class=\"content\">");
document.writeln("<div id=\"congar_msg\"><\/div>");
document.writeln("<input id=\"gameclosebutton\" class=\"txtbtn\" type=\"button\" name=\"确定\" value=\"确定\"> ");
document.writeln("<input id=\"sharebutton\" class=\"txtbtn\" type=\"button\" name=\"分享\" onclick=\"addOne()\" value=\"分享\"> ");
document.writeln("	<\/div>");
document.writeln("<\/div>");

$(document).ready(function () { 

$("#windowclosebutton").click(function () { 
$("#windowcenter").fadeOut(100);
}); 
$("#alertclose").click(function () { 
$("#windowcenter").fadeOut(100);
}); 

$("#gameclose").click(function () { 
$("#gamedone").fadeOut(100);
}); 
$("#gameclosebutton").click(function () { 
$("#gamedone").fadeOut(100);
}); 

$("#sharebutton").click(function () { 
$("#gamedone").fadeOut(100);
}); 

$("#loginbutton").click(function () { 
	//这边最好做ajax判断
	
	var tel = $("#phone").val();
    var name = $("#name").val();
	var err_msg = "";
	var reg_name = new RegExp("^[\\u4e00-\\u9fa5]{2,6}$"); 
	var reg_tel=new RegExp("^1[3,5,4,7,8]{1}[0-9]{9}$");
	
	document.getElementById("err_msg").innerHTML="";
	
	if (name == '') {
	 	err_msg = err_msg +"姓名不能为空</br>";
    }else if(!reg_name.test(name)){
		err_msg = err_msg +"姓名请输入2-6个中文</br>";
	}
	
	if (tel == '') {
	 	err_msg = err_msg +"电话不能为空</br>";
    } else if(!reg_tel.test(tel)){
		err_msg = err_msg +"请输入正确的电话号码!</br>";
	}
	
	if(err_msg!=''){
		document.getElementById("err_msg").innerHTML=err_msg;
		return;
	}else{

		$.ajax({
		url : './doReg',
		data : {
				username : name,
				userphone : tel
			},
		type : 'post',
		dataType : "json",
		async : false,
		error : function(ret, error) {
			alert(ret.responseText);
		},
		success : function(ret) {
			
			if(ret.status=='ok'){
				$("#windowlogin").fadeOut(100);
				location.reload();
			}else{
				
				document.getElementById("err_msg").innerHTML=ret.message;
				return;
				
			}
		}
		});

	}
	
	
	
	
}); 
$("#loginclose").click(function () { 
$("#windowlogin").fadeOut(100);
}); 

}); 
function alert(title,timeout){ 

$("#windowcenter").fadeIn(); 
$("#txt").html(title);
//$("#windowcenter").hide("slow"); 

	if(timeout > 0){
		setTimeout('$("#windowcenter").fadeOut(100)',timeout);
	}
} 

function loginbox(timeout){ 

$("#windowlogin").fadeIn(); 
	if(timeout > 0){
		setTimeout('$("#windowlogin").fadeOut(100)',timeout);
	}
}

function gamedonebox(congar_msg,timeout){ 

$("#congar_msg").text(congar_msg);
$("#gamedone").fadeIn(); 
	if(timeout > 0){
		setTimeout('$("#gamedone").fadeOut(100)',timeout);
	}
}

function addOne(){
	
	$("#shareImg").show();
	
}

function shareHide(){
	
	$("#shareImg").hide();
	
}