<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta content="email=no" name="format-detection">

    <script src="http://www.gaocimi.cn/MissionH5/lhb/js/htmlFontSizewallet.js"></script>

	<script src="http://www.gaocimi.cn/MissionH5/js/Jquery/jquery-3.2.0.js"></script>
    <link href="http://www.gaocimi.cn/MissionH5/lhb/css/wallet.css" rel="stylesheet" type="text/css">
    <link href="http://www.gaocimi.cn/MissionH5/lhb/css/wallet-style.css" rel="stylesheet" type="text/css">
</head>
<body style="background:#eaeaea;">
<header>
	<a  href="../../hbl/PHP/mine.php"> <img src="http://www.gaocimi.cn/MissionH5/lhb/images/return.gif"></a>钱包
</header>
<main class="ma-ea">
    <section class="he-451">
        <div class="balance"><img src="http://www.gaocimi.cn/MissionH5/lhb/images/small-change.png">账户余额（ 元 ）</div>
        <div class="money" id="balancemoney">0.00</div>
        <a href="mybill.php">
            <div class="view">查看我的账单</div>
            <img class="img-dw" src="http://www.gaocimi.cn/MissionH5/lhb/images/baise-jr.gif">
        </a>
    </section>
    <section class="mtp-46">
       <a href="recharge.php">
        <div>
            <img src="http://www.gaocimi.cn/MissionH5/lhb/images/bank.png" class="fun-inm">充值
            <img src="http://www.gaocimi.cn/MissionH5/lhb/images/return-jr.gif" class="enter">
        </div>
		</a>
        <a href="withdraw.php">
            <div>
                <img src="http://www.gaocimi.cn/MissionH5/lhb/images/recharge.png" class="fun-inm">提现
                <img src="http://www.gaocimi.cn/MissionH5/lhb/images/return-jr.gif" class="enter">
            </div>
        </a>
    </section>
</main>
<div class="common"><a href="#">常见问题</a></div>
</body>
</html>
<script src="../../js/Jquery/session.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    if(!$.session.get("PhoneNumber")){
			window.location.href="login.php";
		}
});
		if($.session.get("PhoneNumber")==undefined){window.location='login.php';};//跳转登陆
	$.ajax({
		url:"../handfile/Wallethandle.php?UserId="+$.session.get("PhoneNumber"),
		Type:"GET",
		dataType:"Json",
		success:function(data){$.each(data,function(index,comment){var a=comment.WalletBalance;$("#balancemoney").text(parseFloat(a).toFixed(2))})},
	    error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(XMLHttpRequest.status);
        console.log (XMLHttpRequest.readyState);
        console.log (textStatus);
   },

	})</script>