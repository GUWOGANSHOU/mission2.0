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
	<script src="../js/Activity.js"></script>
</head>
<body style="background:#f1f1f3">
<header class="bin-fun">
    <div><img src="../images/fanhui.gif" onclick="history.go(-1)"></div>
    超级校园帮·代金券领取
</header>
<main>
    <section class="bin-ma">
        <div class="bin-u"><input id="Mobile" type="text" placeholder="请输入您的超级校园帮ID"><img src="../images/telephone.png"></div>
        <hr>
      
    </section>
    <div style="text-indent: .33rem;font-size: .26rem;line-height: .7rem;color:#656567">
        领取超级打印代金券后即可在超级校园帮|超级打印发布线上打印订单
    </div>
  
</main>
<footer class="bin-foot">
    <button Onclick="RechargeRecordInsert(GetDateNow())">确定</button>
</footer>


</body>
</html>
