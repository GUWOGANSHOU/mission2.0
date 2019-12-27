<?php 
   $UserId=$_GET['UserId'];
?>

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
   <script src="../../js/Jquery/jquery-3.2.0.js"></script>
    <link href="../css/wallet.css" rel="stylesheet" type="text/css">
    <link href="../css/wallet-style.css" rel="stylesheet" type="text/css">
	<style>
		.Account{
			font-size: 14px;
			position: relative;
			margin-top: -45px;
			margin-right: 30px;
			left: 85%;
			top: 75px;
		}
	</style>
</head>
<body>

<header style="position: fixed">
    <a  onClick="history.go(-1)"><img src="../images/return.gif"></a>我的账单
</header>
	<div style="height: 50px"></div>
<main class="w-96">
<!--   <img src="../images/钱包.png">
   <img src="../images/支付宝.png">
   <img src="../images/线下支付.png">-->
    <section id="pole" style='display: none;'>
        <img src="../images/construction Bank.png">
        <!--<div class="nam-tim" >
            <ul>
                <li class="name-n">建设银行充值</li>
                <li class="ta-tm"><data value="08-04">10-04</data>&nbsp; <time>10:30</time></li>
            </ul>
        </div>
        <div class="amount-1">+80000000.00</div>-->
    </section>
</main>
</body>
</html>
<script src="../../js/Jquery/session.js"></script>
<script>

$.ajax({
		url:"../handfile/mybillhandle.php?UserId=<?php echo $UserId ?>",
		Type:"GET",
		dataType:"Json",
	   success:function(data){$.each(data,function(index,comment){
		   var urlPay;
		   if(comment.PayType==1){urlPay="../images/支付宝.png"}
			else if(comment.PayType==2){urlPay="../images/钱包.png"}
			else if(comment.PayType==3){urlPay="../images/线下支付.png"}
		   if(comment.Reason==0){fuhao="-"}else{fuhao="+"};$("#pole").after("<section ><img id='tou' src='"+urlPay+"'><div class='nam-tim'><ul><li class='name-n'>"+comment.body+"</li><li class='ta-tm'><data id='PayTime' value='08-04'>"+comment.SendPayDate+"</data>&nbsp; <time ></time></li></ul></div><div class='amount'>"+fuhao+comment.TotalAmount+"￥"+"</div><p class='Account'>"+"余额:"+comment.WalletAccount+"</p></section>")})},
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})
	

</script>
