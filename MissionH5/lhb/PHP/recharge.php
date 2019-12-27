<?php /*?><?php session_start();
$_SESSION['UserId']='18259083427' ;?><?php */?>
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

    <script src="../js/htmlFontSizewallet.js"></script>
    <script src="../js/jquery.js"></script>
	<script src="../../js/Jquery/session.js"></script>
    <link href="../css/wallet.css" rel="stylesheet" type="text/css">
    <link href="../css/wallet-style.css" rel="stylesheet" type="text/css">
    <script>
        var a ="wallet.html"
    </script>

</head>
<body style="background:#eaeaea">
<header>
    <a onclick="history.go(-1)"><img src="../images/return.gif"></a>充值
</header>

<main class="win-96">
    <section class="main-96">
       
        <section class="jines">
            <div class="name-je">充值金额</div>
            <div class="input-je">￥<input type="text" id="Reward" value=""></div>
            <input type="hidden" id="WIDout_trade_no" />
        </section>
    </section>
</main>
<button id="recharge" class="tixian" >充值</button>
<script>
$(document).ready(function() {
    if(!$.session.get("PhoneNumber")){
			window.location.href="login.php";
		}
});
$("#Reward").focus().on('input',function(){
	var _val = $(this).val();
	_val = _val.trim().slice(0,_val.indexOf('.')===-1?_val.length:_val.indexOf('.')+3);
	$(this).val(_val)
})
$("#Reward").change(function(){
	var _val = $(this).val();
	var _index = _val.indexOf('.')
	var arr = _val.split('.');
	if(arr[0] < 1 || arr[0] == ''){
		alert('不能小于10元');
		$(this).val('')
		return false;
	}
	if(_index == -1){
		$(this).val(_val+'.00')
		return false;
	}
	if(arr[0] == ''){
		$(this).val('0.00')
	}
	else if(arr[1] == ''){
		arr[1] = '00'
		$(this).val(arr.join('.'))
	}
	else if(arr[1].length == 1){
		arr[1] = arr[1].charAt(0)+'0';
		$(this).val(arr.join('.'))
	}
	else{
		$(this).val(arr.join('.'))
	}
})


$("#recharge").on("click",function(){
	if( $("#Reward").val() >= 0.05 && $("#Reward").val()!= '' )
	{
		window.location="../../../Mission2.0/WxpayAPI/example/jsapi.php?Reward="+$("#Reward").val();
			
	}
});
	
</script>
</body>
</html>