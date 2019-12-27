
<html>
<head>
<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>提现审核</title>
<link rel="stylesheet" href="../CSS/bootstrap.min.css">
<script src="../JS/jquery-3.2.0.js"></script>
<script src="../JS/bootstrap.min.js"></script> 
<style>
html,body,.page{width:100%; height:100%; overflow: auto; margin:0; padding:0; background:#FFF}

.header{ height:38pt; background:#00BB89;}
.t{ height:200pt; border:#999 1pt solid; width:100%; margin-bottom:10pt}
.image{ height:180pt; width:200pt;border:#999 1pt solid; margin-top:10pt; float:left; overflow:hidden}
.Msg{ float:left; margin-top:80pt; margin-left:-25pt; width:50pt; height:50pt}
.OK{ float:left; margin-top:10pt; margin-left:15pt; width:50pt; height:50pt;}
#Yes{ background:#CCF5AF; border-radius:5pt; width:50pt;}
#No{ margin-top:10pt;  border-radius:5pt; width:50pt;}
</style>
</head>

<body>
<div class="header text-center navbar-fixed-top">
	<a href="Check_AC.php" style="float:left; height:20pt; width:20pt; margin-top:9pt; overflow:hidden"><img src="../CSS/后退白色.png"  style="width:100%" ></a>
  	<h1 style="font-size:15pt; color:#FFF; margin:0 10% ; line-height:38pt">提现审核</h1>
	<a href="Check_AC.php">认证审核</a>
</div>
<div id="blanckbar" style="height:48pt"></div>



</body>
</html>

<script type="text/javascript">
function GetRechargeRecord(){
	$.ajax({
		url:"../handfile/RechargeRecordResponse.php",
		type:"GET",
		data:{},
		dataType:"Json",
	   success:function(data){$.each(data,function(index,comment){
		   AlipayOutTradeNoString=comment.AlipayOutTradeNo;
		   $("#blanckbar").after("<div class='t'><div class='image'><div>提现Id:"+comment.UserId+"</br>支付宝Id:"+GetWalletId(comment.UserId)+"</div><div>提现金额:"+comment.TotalAmount+"</div><div>申请时间:"+comment.SendPayDate+"</div><div>流水单号:"+comment.AlipayOutTradeNo+"</div></div><div class='OK'><button id='Yes' onclick='alipaytranf("+GetWalletId(comment.UserId)+","+AlipayOutTradeNoString.substring(0,4)+","+AlipayOutTradeNoString.substring(4,99)+","+comment.TotalAmount+")' type='submit'>通过</button><button onclick='reject("+AlipayOutTradeNoString.substring(0,4)+","+AlipayOutTradeNoString.substring(4,99)+","+comment.UserId+")' id='No' type='submit'>不通过</button></div></div>")
	   })},
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})

}//	获得提现信息
	
function InsertNotice_AC(PhoneNumber){  //审核成功
	$.ajax({
	 		 	url:"../handfile/Insert_tranf.php",
	  			type:"POST",
	 			dataType:"Text",
				data:{"PhoneNumber":PhoneNumber},
				async:false,
	  			success:function(data){

	 			 },
	 		    error:function(XMLHttpRequest){
		 			 console.log(XMLHttpRequest.readyState)
	 			 },
			})
}
function InsertNotice_AC_no(PhoneNumber){  //审核不成功
	$.ajax({
	 		 	url:"../handfile/Insert_tranf_no.php",
	  			type:"POST",
	 			dataType:"Text",
				data:{"PhoneNumber":PhoneNumber},
				async:false,
	  			success:function(data){
		 console.log(data);
	 			 },
	 		    error:function(XMLHttpRequest){
		 			 console.log(XMLHttpRequest.readyState)
	 			 },
			})
}
  

function alipaytranf(PhoneNumber,AlipayOutTradeNoString1,AlipayOutTradeNoString2,TotalAmount){
	console.log(AlipayOutTradeNoString1.toString()+AlipayOutTradeNoString2.toString())
	$.ajax({
		url:"../../../alipaytranf/tranf.php",
		type:"GET",
		data:{"PhoneNumber":PhoneNumber,"Code":AlipayOutTradeNoString1.toString()+AlipayOutTradeNoString2.toString(),"amount":(TotalAmount*0.95).toFixed(2)},
		dataType:"Json",
	   success:function(data){if(data=="成功"){
		   updateRechargeRecord(AlipayOutTradeNoString1.toString()+AlipayOutTradeNoString2.toString(),PhoneNumber);
		   console.log(data);
	   }else{console.log(data);}},
		  error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})

}//提现接口
function updateRechargeRecord(AlipayOutTradeNo,PhoneNumber){
		$.ajax({
		url:"../handfile/updateRechargeRecordResponse.php",
		type:"POST",
		data:{"AlipayOutTradeNo":AlipayOutTradeNo,"Type":1},
		dataType:"Json",
	   success:function(data){alert("提现操作成功");InsertNotice_AC(PhoneNumber);console.log(data)
							 // window.location.reload()
							 },
		  error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})
}//更新交易记录使得trade_state为Success
function  reject(AlipayOutTradeNoString1,AlipayOutTradeNoString2,PhoneNumber){		
		console.log(AlipayOutTradeNoString1.toString()+AlipayOutTradeNoString2.toString())
	$.ajax({
		url:"../handfile/updateRechargeRecordResponse.php",
		type:"POST",
		data:{"AlipayOutTradeNo":AlipayOutTradeNoString1.toString()+AlipayOutTradeNoString2.toString(),"Type":0},
		dataType:"Json",
	   success:function(data){alert("提现操作驳回成功");
	   console.log(PhoneNumber);
	    console.log(data);
	   InsertNotice_AC_no(PhoneNumber);
	   window.location.reload()
							 },
		  error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})}//更新交易记录使得trade_state为Fail
$(function(){
	GetRechargeRecord()
})
function GetWalletId(UserId){
		$.ajax({
		url:"../../lhb/handfile/Wallethandle.php",
		type:"GET",
		async:false,
		data:{"UserId":UserId},
		dataType:"Json",
	    success:function(data){$.each(data,function(index,comment){WalletId=comment.WalletId})
							 },
		error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})
		return WalletId;
}
</script>