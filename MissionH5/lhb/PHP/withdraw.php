

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
        var a ="wallet.php"
    </script>

</head>
<body style="background:#eaeaea">
<header>
    <a href="wallet.php"><img src="../images/return.gif"></a>提现
</header>

<main class="win-96">
    <section class="main-96">
        <section class="main-top">
            <img width="100px" src="../images/zf.png">
            <div class="ma-50">
                <ul>
                    <li class="yinh">支付宝</li>
                    <li class="kah" id="UserId"></li>
                </ul>
            </div>
            <div class="genhuan"><a href="tel:18259083427">更换绑定?<br/>点这电联客服</a></div>
        </section>
        <section class="jines">
            <div class="name-je">提现金额</div>
            <div class="input-je">￥<input id="WithdrawNum" type="text" placeholder="提现额度不能小于10元" value=""></div>
            <div class="keyon">可用余额￥<label id="jine"></label><span id="present">全部提现</span></div>
            <input id="WIDout_trade_no" type="hidden">
              <input id="WalletId" type="hidden">
        </section>
    </section>
</main>
<button class="tixian" id="submit" type="submit" onClick="confirmMe()">提现</button>
	<center><span id="Money" style="font-size: 14px; line-height:16px">帮帮会收取一丢丢手续费用于</span><div  style="font-size: 14px; line-height:16px;">应对服务器和某宝的压榨，敬请谅解</div></center>
<script>
$(document).ready(function() {
    if(!$.session.get("PhoneNumber")){
			window.location.href="login.php";
		}
});
   $(function(){
       $("#present").click(function(){
          $(".input-je input").val($("#jine").text());
		  
       })
   });
	//$.each(data,function(index,comment){console.log(comment)})
$.ajax({
		url:"../handfile/Wallethandle.php",
		type:"GET",
		data:{"UserId":$.session.get("PhoneNumber")},
		dataType:"Json",
	    success:function(data){$.each(data,function(index,comment){$("#jine").text(comment.WalletBalance);$("#WalletId").val(comment.WalletId);console.log(comment.WalletId);WalletIdTuomin()})},
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})//查余额
    function confirmMe(){
		var r=confirm("确定提现操作？");
		if(r){RechargeRecordInsert()}
	}
	function RechargeRecordInsert(){
	   if($("#WithdrawNum").val()>=10&&($("#jine").text()-$("#WithdrawNum").val()).toFixed(2)>=0){
		$.ajax({
		url:"../handfile/withdrawhandle.php",
		Type:"GET",
		data:{"WIDsubject":"提现",
			  "WIDbody":"钱包余额提现至支付宝,用户为"+$.session.get("PhoneNumber"),
			  "WIDtotal_amount":$(".input-je input").val(),
			  "PayTime":"<?php echo date("Y:m:d H:i:s") ?>",
			  "WIDout_trade_no":$("#WIDout_trade_no").val(),
			  "UserId":$.session.get("PhoneNumber"),

			 },
	    dataType:"Json",
	     success:function(data){if(data=='success'){WalletAccountHandleST()}},
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})
        }else if(($("#jine").text()-$("#WithdrawNum").val()).toFixed(2)<=0){alert('对不起您的余额不足！')}else{alert('提现额度不能小于10元！')}
	}//插入申请
	function WalletAccountHandleST(){
	$.ajax({
		type:"POST",
		url:"../../xzf/handfile/WalletAccountHandleST.php",
		data:{"WIDout_trade_no":$("#WIDout_trade_no").val(),"UserId":$.session.get("PhoneNumber")},
		dataType:"Json",
	   success:function(data){
		   $("#submit").text(data).attr("disabled","disabled");
 		   console.log(data);
		   alert("我们会在24小时内，为您的提现审核！");
		   Email();
		   
		   },
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})
	
	}//钱包余额扣减
function Email(){
	$.ajax({
		url:"../../phpmailer/index.php",
		type:"GET",
		data:{"Email":'516108843@qq.com',"Note":"有人提交了提现审核，及时审核！"},
		dataType:"Text",
	   success:function(data){console.log(data);},
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})

}	//提现通知
	
function GetDateNow() {
		var vNow = new Date();
		var sNow = "";
		sNow += String(vNow.getFullYear());
		sNow += String(vNow.getMonth() + 1);
		sNow += String(vNow.getDate());
		sNow += String(vNow.getHours());
		sNow += String(vNow.getMinutes());
		sNow += String(vNow.getSeconds());
		sNow += String(vNow.getMilliseconds());
		document.getElementById("WIDout_trade_no").value =  sNow;

	}
	GetDateNow();//生成订单
	  function WalletIdTuomin(){
	  console.log($.session.get("PhoneNumber"))
	      var phone=$("#WalletId").val();
		  var UserId=phone.replace(/(\d{3})\d{4}(\d{4})/,'$1****$2');
		  $("#UserId").text(UserId);
	      $("#WithdrawNum").on("blur",function(){$("#Money").text("本次提现手续费"+$(this).val()*0.05+"￥")})
	  }
</script>
</body>
</html>
<script src="../../js/Jquery/session.js"></script>
<script type="text/javascript" async>
  $(function(){

  })
</script>