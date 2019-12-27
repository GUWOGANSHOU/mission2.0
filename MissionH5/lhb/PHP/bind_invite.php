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
	<script src="../js/bind_invite.js"></script>
</head>
<body style="background:#f1f1f3">
<header class="bin-fun">
    <div><img src="../images/fanhui.gif" onclick="window.location='login.php'"></div>
    超级校园帮·邀请注册
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
    <button Onclick="InsertMsg()">下一步</button>
    <div>提交后重要信息不能修改</div>
</footer>


</body>
</html>
