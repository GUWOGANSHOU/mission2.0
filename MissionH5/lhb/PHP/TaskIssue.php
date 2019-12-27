<!--<?php   session_start(); if(!empty($_GET['Title'])){; ?>
<?php
												 
    $_SESSION['Title']=$_GET['Title'];};
   if(!empty($_GET['UserId'])){
    $UserId=$_SESSION['UserId']=$_GET['UserId']	;
    $_SESSION['Reason']='0';}
	
?>-->
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
    <script src="../js/datePicker.js"></script>

  <script src="../js/htmlFontSizee.js"></script>
	
	<script src="../js/jquery.js"></script>
   <script src="../../js/Jquery/session.js"></script>
    <link href="../css/globall.css" rel="stylesheet" type="text/css">
    <link href="../css/stylee.css" rel="stylesheet" type="text/css">
</head>
<body  >
<header class="rtt-hea" >
    <a href="../../hbl/PHP/IndexAcceptedTask.php"><img src="../images/fanhui.gif"></a>任务发布
</header>
<main class="rtt-man">
    <section class="rtt-top">
        <div class="left"><img src="../images/touxiu-1.png"></div>
        <div class="right">super campus sercives</div>
        <div class="rtt-bot" style="margin-top:.50rem">
            <img src="../images/left-shu.gif"><br>
            任务被接受时双方就可以相互联系，就任务内容进行交接并进行赏金的调整哦
        </div>
    </section>
    <section class="rtt-ma-1">
        <div class="left" >
            交付地点
        </div>
        <input type="text" id="Pos"  value="<?php if( !empty($_GET['name'])){echo $_GET['name'];} ?>">
        <a data-ajax="false" href="http://www.gaocimi.cn/MissionH5/lhb/PHP/map.php?Title=<?php echo $_SESSION['Title']; ?>&UserId=<?PHP echo $_SESSION['UserId'];  ?>"><img src="../images/didian.png"></a>
    </section>
    <section class="rtt-ma">
        <div class="left">
            我的任务
        </div>
        <ul class="right">
           <li class="li-1"><input id="Title" type="text" value="<?php echo $_SESSION['Title'] ;?>" onClick="this.placeholder=''"  ></li>
           <li class="li-2"><textarea onClick="this.innerHTML=''" id="Detail" maxlength="80">请描述您的任务</textarea></li>
        </ul>
    </section>
    
    <section class="rtt-ma-2">
        <div class="left">
            任务赏金
        </div>
        <input id="Reward" type="number"  onkeyup="this.value=this.value.replace(/^(\-)*(\d+)\.(\d\d).*$/,'$1$2.$3')" >
    </section>
    <section class="rtt-ma-1">
        <div class="left">
            时间要求
        </div>
         <input id="WIDout_trade_no" type="hidden" />
		 <input id="demo1" type="button" style="text-align:left"/>
		  
    </section>

<div class="rtt-bt">
    <button id="jies" type="submit">发布任务</button>
</div>
   <input id="WalletBalance" value="" type="hidden"/>
</main>
<section class="zhifu">
    <div class="zf-1">
        请选择支付方式
    </div>
    <ul>
        <li href="../../xzf/PHP/WalletPay.php?" style="	
		 color:#6d6d6d"  class="yingc defaultPay" s="a" id="WalletPay"><img src="../images/bank.png">钱包支付</li>
        <li href="../../../alipay.trade.wap.pay-PHP-UTF-8/wappay/pay.php?" class="yingc" s="b"><img src="../images/zf.png">支付宝支付</li>
        <li href="../../xzf/PHP/OffLinePay.php?" class="yingc" s="c"><img src="../images/cj.png">线下支付</li>
       
    </ul>
    <button id="submit">提交支付</button>
</section>
<div class="zzc100"> </div>
</body>
</html>

<script>

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
	GetDateNow();//生成随机码

$(document).ready(function(){
 
$("#Reward").on('input',function(){
	var _val = $(this).val();
	_val = _val.trim().slice(0,_val.indexOf('.')===-1?_val.length:_val.indexOf('.')+3);
	$(this).val(_val)
})
$("#Reward").blur(function(){
	var _val = $(this).val();
	var _index = _val.indexOf('.')
	var arr = _val.split('.');
	
	if(_val==''){
		$(this).val('')
		return false;
	}
	if(isNaN(_val)){
		alert('请输入正确金额')
		$(this).val('');
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

	//读取账户余额
	$("#submit").on("click",function(){
  	var URL
	="WIDout_trade_no="
	+$("#WIDout_trade_no").val()
	+"&Title="
	+encodeURIComponent($("#Title").val())
	+"&Detail="
	+encodeURIComponent($("#Detail").val())
	+"&Pos="
	+encodeURIComponent($("#Pos").val())
	+"&Reward="
	+$("#Reward").val()  
	+"&TimeDemand="
	+$("#demo1").val()
	+"&Reason=0"
	+"&UserId="
	+$.session.get("PhoneNumber");
	
	if($(this).attr("href")){window.location=$(this).attr("href")+URL;}else{
		$("#WalletPay").attr("hreftext","../../xzf/PHP/WalletPay.php?"+URL)
		$("#WalletPay").trigger("click");
		
	}
	

})//参数跳转,提交操作

	$("#WalletPay").on("click",function(e){	
	if(($("#WalletBalance").val()-$("#Reward").val()).toFixed(2)>=0){
	   console.log(($("#WalletBalance").val()-$("#Reward").val()).toFixed(2));
	    window.location=$("#WalletPay").attr("hreftext")
		console.log(e)
		console.log($("#WalletPay").attr("href"))
	}else{
		
	    	alert("您的余额不足！请充值或者调整赏金");
		    $("#submit").attr("disabled","disabled")
	}})

//余额判断
})	


</script>



<script>
    $(function () {
            $("#jies").on("touchstart",function () {
				if(!$('#Pos').val()){
            		alert('请填写交付地点');
            		return false;
            	}
            	if(!$('#Detail').val()){
            		alert('请填写任务描述');
            		return false;
            	}
            	if(isNaN($("#Reward").val())){
            		return false;
            	}
            	if($("#Reward").val() < 1){
            		alert('赏金金额不能低于一元');
            		return false;
            	}
            	if(!$("#demo1").val()){
            		alert('请选择时间');
            		return false;
            	}
                $(".zhifu").slideToggle(200);
                $(".zzc100").slideToggle(200);
                $(".zhifu li").each(function () {
                      $(this).on("touchstart",function () {
					 
                      $(this).css({"background":"#c9c9c9","color":"#6d6d6d"});
					  $(this).siblings().css("background-color","white")
                    })
                })
            })
            $(".zzc100").on("touchstart",function () {
                $(".zhifu").slideToggle(200);
                $(".zzc100").slideToggle(200);
            })
        })
 </script>
 <script>
 $(document).ready(function() {
	$(".yingc").on("touchstart",function(){
		
		var st = $(this).attr('href');
		$("#submit").attr('href',st);
		 $("#submit").removeAttr("disabled");
	})
})
 </script>
 <script>
 $(document).ready(function() {
	$(".yingc").on("touchstart",function(){
		var st = $(this).attr('href');
		$("#submit").attr('href',st)
	})
})
 </script>
 	<script>
	var calendar = new datePicker();
calendar.initdate({
	'trigger': '#demo1', /*按钮选择器，用于触发弹出插件*/
	'type': 'datetime',/*模式：date日期；datetime日期时间；time时间；ym年月；*/
	'minDate':'1900-1-1',/*最小日期*/
	'maxDate':'2100-12-31',/*最大日期*/
	'onSubmit':function(){/*确认时触发事件*/
		var theSelectData=calendar.value;
	},
	'onClose':function(){/*取消时触发事件*/
	}
});
	
	</script>
<script src="../../js/Jquery/session.js"></script>
   <script>
   $(document).ready(function() {
    if(!$.session.get("PhoneNumber")){
			window.location.href="login.php";
		}
});
	$.ajax({
		url:"../handfile/Wallethandle.php",
		Type:"GET",
		data:{"UserId":$.session.get("PhoneNumber")},
		dataType:"Json",
	   success:function(data){$.each(data,function(index,comment){$("#WalletBalance").val(comment.WalletBalance)})},
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
 console.log ($.session.get("PhoneNumber"));
   },

	})



</script>