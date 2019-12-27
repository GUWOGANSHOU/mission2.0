
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta content="email=no" name="format-detection">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <link href="../css/global.css" rel="stylesheet" type="text/css">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <script src="../js/jquery.js"></script>
    <script src="../../js/Jquery/session.js"></script>
    <script src="../js/htmlFontSize.js"></script>
    <script src="../js/jquery-1.9.0.min.js"></script>
    <script src="../js/jquery.toggle-password.min.js"></script>
    <script src="../../js/Jquery/jquery.cookie.js"></script>
 <style>
    .onoffswitch {
        position: relative;
        width: 83px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    .onoffswitch-checkbox {
        display: none;
    }

    .onoffswitch-label {
        display: block;
        overflow: hidden;
        cursor: pointer;
        border: 2px solid #999999;
        border-radius: 20px;
    }

    .onoffswitch-inner {
        display: block;
        width: 200%;
        margin-left: -100%;
        transition: margin 0.3s ease-in 0s;
    }

    .onoffswitch-inner:before,
    .onoffswitch-inner:after {
        display: block;
        float: left;
        width: 50%;
        height: 30px;
        padding: 0;
        line-height: 30px;
        font-size: 19px;
        color: white;
        font-family: Trebuchet, Arial, sans-serif;
        font-weight: bold;
        box-sizing: border-box;
    }

    .onoffswitch-inner:before {
        content: "ON";
        padding-left: 13px;
        background-color: #4FACDB;
        color: #FFFFFF;
    }

    .onoffswitch-inner:after {
        content: "OFF";
        padding-right: 13px;
        background-color: #F50E4C;
        color: #FAFAFA;
        text-align: right;
    }

    .onoffswitch-switch {
        display: block;
        width: 21px;
        margin: 4.5px;
        background: #FFFFFF;
        position: absolute;
        top: 0;
        bottom: 0;
        right: 49px;
        border: 2px solid #999999;
        border-radius: 20px;
        transition: all 0.3s ease-in 0s;
    }

    .onoffswitch-checkbox:checked+.onoffswitch-label .onoffswitch-inner {
        margin-left: 0;
    }

    .onoffswitch-checkbox:checked+.onoffswitch-label .onoffswitch-switch {
        right: 0px;
    }
	.onoffswitch{
		float:right;
		margin-top:4%;}
</style>

</head>
<body class="login-bg">
<header class="login-head">
    <div id="tou" class="login-avatar">
        <img src="../images/avatar.png">
    </div>
    <img src="../images/welcome.gif" class="pos">
</header>
<main>
    <section class="login-user">
        <div class="login-user-u"><input id="user" type="tel" placeholder="账号（手机号码）" class="ui-1"><input type="image" src="../images/delete.png" class="ui-2"></div>
        <hr>
        <div class="login-user-u"><input id="mis"type="password" placeholder="密码" class="ui-1"><input type="image" src="../images/toview.gif" class="ui-3" id="msa"></div>
    </section>
    <section class="login-jizhu">
        记住我<div class="onoffswitch">
     <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
     <label class="onoffswitch-label" for="myonoffswitch">
         <span class="onoffswitch-inner"></span>
         <span class="onoffswitch-switch"></span>
     </label>
 </div>
    </section>
    <section class="login-log">
        <button  id="log" onClick="loginMe()"class="log">登录</button>
        <button class="log-c" onClick="window.location='bind.php'">注册</button>
    </section>
    <input onClick="window.location='PasswordReset.php'" type="button" class="login-wj" value="遗忘密码">
    
</main>
</body>
</html>
    <script src="../../js/Jquery/session.js"></script>
<script type="text/javascript">
	  console.log($.session.get("PhoneNumber"));
	  console.log(localStorage.getItem("PhoneNumber"));

	function loginMe(){
  	 $.ajax({
	  url:"../handfile/loginhandle.php?PhoneNumber="+$("#user").val(),
	  Type:"GET",
	  dataType:"Json",
	  success:function(data){$.each(data,function(index,comment){

		
		     if($("#mis").val()==comment.Password){
			   
			   $.session.set('PhoneNumber',$("#user").val());
			   localStorage.setItem("PhoneNumber",$("#user").val());
			  	//window.location="../../index2.php?PhoneNumber=" + $.session.get('PhoneNumber');
			 window.location="../../hbl/PHP/IndexAcceptedTask.php";
			  // console.log(comment.Password)
			  }
			  else if($("#mis").val()==""){alert("请输入密码！")}
			  else if($("#mis").val()!=comment.Password){alert("密码错误！")}
		  }); Save()},
		 error:function(data){
			 if($("#user").val()==""){ alert("请输入正确账号")}
			 else{ alert("您还没有注册哦！")}
			 }
  })}

function GetImage(){ 

	  $.ajax({
	  url:"../handfile/loginhandle.php?PhoneNumber="+$("#user").val(),
	  Type:"GET",
	  dataType:"Json",
	  success:function(data){$.each(data,function(index,comment){
		 if(comment.UserImage){
				  var str=comment.UserImage;
				  var re=new RegExp(" ","g");
				  var Newstr=str.replace(re,"+");
 				 $("#tou > img").attr("src",Newstr );
		 }
	  });	  }
	 })
	
};  
	
	$("#user").blur(function(){GetImage()});
	setTimeout(function(){ GetImage()},100)
</script>
<script>
$(document).ready(function() {

    $(".ui-2").on("touchstart",function(){
		$("#user").val("").focus();
	
		})
		if(localStorage.getItem("PhoneNumber")===" "||$.session.get("PhoneNumber")===" "){ 
	       
		}else{	
			$.session.set('PhoneNumber',localStorage.getItem("PhoneNumber"));
//	     	window.location="../../hbl/PHP/IndexAcceptedTask.php";
		}

});
</script>
<script>
$(function(){

    $('#mis').togglePassword({
        el: '#msa'
    });
});
</script><script type="text/javascript">
  $(document).ready(function () {
    if ($.cookie("rmbUser") == "true") {
    $("#myonoffswitch").attr("checked", true);
    $("#user").val($.cookie("username"));
    $("#mis").val($.cookie("password"));
    }
  });
 
  //记住用户名密码
  function Save() {
    if ($("#myonoffswitch").attr("checked")) {
      var str_username = $("#user").val();
      var str_password = $("#mis").val();
      $.cookie("rmbUser", "true", { expires: 7 }); //存储一个带7天期限的cookie
      $.cookie("username", str_username, { expires: 7 });
      $.cookie("password", str_password, { expires: 7 });
    }
    else {
      $.cookie("rmbUser", "false", { expire: -1 });
      $.cookie("username", "", { expires: -1 });
      $.cookie("password", "", { expires: -1 });
    }
  };
 
</script>


