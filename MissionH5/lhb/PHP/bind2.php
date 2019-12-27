<!DOCTYPE html>
<html lang="en">
<head>
    <title>绑定手机号</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta content="email=no" name="format-detection">

    <link href="../css/global.css" rel="stylesheet" type="text/css">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <script src="../js/htmlFontSize.js"></script>
	<script src="../js/jquery.js"></script>
	<script src="../../js/Jquery/jquery.cookie.js"></script>
</head>
<body style="background:#f1f1f3">
<header class="login-head">
    <div id="tou" class="login-avatar">
        <img src="../images/avatar.png">
    </div>
    <p style=" font-size:.33rem; text-align:center; color:#08be8e; margin-left:1px;">WELCOME</p>
</header>

<main>
    <section class="bin-ma">
        <div class="bin-u"><input id="Mobile" type="text" placeholder="请输入您的手机号码"><img src="../images/telephone.png"></div>
        <hr>
        <div class="bin-u"><input  id="mis" placeholder="请设置6-16位密码"><img src="../images/suo.png"></div>
    </section>
    <div style="text-indent: .33rem;font-size: .26rem;line-height: .7rem;color:#656567">
        输入手机号/密码，完成注册(以英文字母开头，只能包含英文字母、数字、下划线)
    </div>
    <section class="bin-yanz">
        <div class="left"><button id="GetCode" style="width: 1.95rem;height: .62rem" onClick="GetPhone()">获取验证码</button></div>
        <div><input type="text" id="Code" placeholder="输入验证码"></div>
		<div class="right"><span id="Second">60</span>秒后重新发送</div>
        <input id="CodeHidden" value="" type="hidden"/>
       
    </section>
</main>
<footer class="bin-foot">
    <button Onclick="InsertMsgOK()">下一步</button>
    <div>提交后重要信息不能修改</div>
</footer>


</body>
</html>
<script type="text/javascript">
	  function GetCode(){
		  $.ajax({
		  url:"http://www.gaocimi.cn/MissionH5/xzf/handfile/MobileNote.php?Mobile="+$("#Mobile").val(),
		  type:"GET",
		  dataType:"Json",
		  success:function(data){$("#CodeHidden").val(data);CountDown();},
		  error:function(data){console.log(data);console.log();}
	  })
	  }
	   function GetPhone(){
		  $.ajax({
		  url:"../handfile/personalDataHand.php?PhoneNumber="+$("#Mobile").val(),
		  type:"GET",
		  dataType:"Json",
		  success:function(data){
			  alert("该账号已存在，请直接登录")
		  },
		  error:function(data){
			  GetCode();
			  CountDown();//倒计时
		  } 
		})
	  }
	function CountDown(){
		$("#GetCode").attr("disabled","disabled");
		var timer,i=60;
			timer=setInterval(function(){if(i>0){$("#Second").text(i=i-1)}else{clearInterval(timer);$("#GetCode").removeAttr("disabled");$("#Second").text(60)}},1000)
	}
	  function InsertMsg(){
		  $.ajax({
		  url:"../handfile/bindhandle.php",
		  Type:"GET",
		  dataType:"Json",
		  data:{"PhoneNumber":$("#Mobile").val(),"Password":$("#mis").val()},
		  success:function(data){
			  console.log($("#Mobile").val());
			  InsertWalletId();
			  window.location="../../hbl/PHP/AC.php?PhoneNumber="+$("#Mobile").val();
			  },
		  error:function(XMLHttpRequest,textStatus,errorThrown){
			  		console.log(XMLHttpRequest.status);
			  		console.log(XMLHttpRequest.readyState);
					console.log(textStatus);
			  }
	  })
	  }
	  function InsertWalletId(){
		  $.ajax({
		  url:"../handfile/insertWalletId.php",
		  Type:"GET",
		  dataType:"Json",
		  data:{"WalletId":$("#Mobile").val()},
		  success:function(data){
			  console.log($("#Mobile").val());
			  
			  //window.location="../../hbl/PHP/AC.php";
			  },
		  error:function(XMLHttpRequest,textStatus,errorThrown){
			  		console.log(XMLHttpRequest.status);
			  		console.log(XMLHttpRequest.readyState);
					console.log(textStatus);
			  }
	  })
	  }
	  function InsertMsgOK(){
		  if($("#Code").val()==""){alert("请输入验证码！")}
		 else if($("#Code").val()==$("#CodeHidden").val()){
			  if($("#mis").val()==""){
				  alert("请设置密码！")
				  }
//			  else if($("#mis").val()==password){
//				  alert("请输入新密码哦")	
//			  }
			  else {InsertMsg();}
		  }
			
		else if($("#Code").val()!=$("#CodeHidden").val()) {alert("验证码错误！")}
	  }

		  $("#Mobile").on("blur",function(){if($("#Mobile").val().length!=11){
			  $("#Mobile").focus(); $("#Mobile").attr("placeholder","请输入手机号！")

		  }})
		  
		  $("#mis").on("blur",function(){
		  var reg =/^[a-zA-Z][a-zA-Z0-9_]*$/; 
	      if(!reg.test($("#mis").val())){
            alert("密码只能由数字和字母组成");
       }  if( $("#mis").val().length<6){
		   alert("密码至少6位");
	   }  if( $("#mis").val().length>16){
		   alert("密码最多16位");
	   }
		  })
	      
	      
</script>