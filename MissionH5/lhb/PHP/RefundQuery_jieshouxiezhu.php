<?php $WIDout_trade_no=$_GET['WIDout_trade_no']; 
$MissionMsgId=$_GET['MissionMsgId'];
$MissionReward=$_GET['MissionReward'];
$MissionAccepterId=$_GET['MissionAccepterIdTel'];
$MissionPromulgatorId=$_GET['MissionPromulgatorId'];
$Title=$_GET['Title'];
?>

<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8">
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
		<title>退款</title>
		
	<script src="../JS/jquery-3.2.0.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/Normalize.css" />
		<link rel="stylesheet" type="text/css" href="../../lhb/css/style1.css" />
	</head>
	<body>
		<div class="top_bar">
			<a onclick="history.go(-1)"><img class="top_bar_skip" src="../../lhb/images/ski_back.jpg" /></a><a class="top_bar_txt" id="refundclick">撤销订单</a>
		</div>
		<div class="zf_box">
			<dl class="inpu_box">
				<dd><span>任务订单号：</span><input type="text" name="" readonly id="" value="<?php echo $MissionMsgId; ?>" /></dd>
				<dd><span>退款单号：</span><input type="text" name="" readonly id="WIDout_trade_no" value="<?php echo $WIDout_trade_no; ?>" /></dd>
				<dd class="no_bor"><span>退款金额：</span><input type="text" readonly name="" id="" value="<?php echo $MissionReward; ?>" /></dd>
				<textarea class="txt_js" name="100" rows="2" cols="">退款原因：</textarea>
				<img class="i_left" src="../../lhb/images/i_ri.jpg"/>
				<img class="i_right" src="../../lhb/images/i_le.jpg"/>
				
			</dl>
		</div>
		<div class="btn_box">
			<a class="btn_tj" onClick="Refun()">确定提交</a>
			<p class="note">我已同意此操作</p>
		</div>
		
		<input id="MissionAccepterId" type="hidden" value="<?php echo $MissionAccepterId; ?>">
	</body>

</html>
<script src="../../js/Jquery/session.js"></script>
<script> 
	console.log(<?php echo $MissionPromulgatorId;?>);
	console.log(localStorage.getItem("PhoneNumber"));
	function Refun(){
		
		if($("#MissionAccepterId").val()==localStorage.getItem("PhoneNumber")){
			 RefundType();
			}else{alert("你无权进行此操作！")}
	}
function RefundType()
	{
	$.ajax({
		url:"RefundType.php",
		type:"GET",
		data:{"WIDout_trade_no":$("#WIDout_trade_no").val()},
		dataType:"Json",
	   success:function(data){$.each(data,function(index,comment){
		   if(comment.PayType==1){AlipayRefund($("#WIDout_trade_no").val(),comment.TotalAmount);}else if(comment.PayType==2){WalletpayRefund($("#WIDout_trade_no").val())}else if(comment.PayType==3){OfflinePayRefund($("#WIDout_trade_no").val())}
			updateMissionState_4();	
			//insertMsg_PromulgatorCancle($("#MissionAccepterId").val());	
			console.log($("#MissionAccepterId").val());
			insertMsg_PromulgatorCancleMoney(<?php echo $MissionPromulgatorId;?>);						 
		})},
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})

}

function EmailHandle(MissionAccepterId){
	  	$.ajax({
		url:"EmailHandle.php",
		type:"GET",
		data:{"MissionAccepterId":MissionAccepterId},
		dataType:"Json",
		success:function(data){$.each(data,function(index,comment){
			sendEmail(comment.Email);console.log(comment.Email);
			SendweChat(<?php echo $WIDout_trade_no ?>,<?php echo $MissionMsgId ?>,<?php echo $Title ?>,comment.OpenId);
		 }							 
									 
	)},
		error:function(){console.log('emailfail');$("#SUBBT").before("<p style='font-size:14px'>对方没有设置QQ邮箱！您可以自行联系任务发布者哦！</p>")},
	})
  }
  function sendEmail(Email){
			$.ajax({
		url:"../../phpmailer/index.php",
		Type:"GET",
		data:{"Email":Email,"Note":"接受方已同意撤销，请及时查看"},
		dataType:"Text",
		success:function(data){},
		error:function(){},
	})}
	function SendweChat(WIDout_trade_no,MissionMsgId,Title,openid){
			$.ajax({
		url:"../../weixin/php/WechatSendForConfirm.php",
		type:"GET",
		data:{"openid":openid,"Note":"接受方已同意撤销，请及时查看","WIDout_trade_no":WIDout_trade_no,"MissionTitle":Title,"MissionMsgId":MissionMsgId},
		dataType:"Text",
		success:function(data){
			console.log(openid);
			console.log(data);
			},
		error:function(){
			 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
			},
	})}
//function insertMsg_PromulgatorCancle(id){ //通知接单者发布者已取消订单
//		    $.ajax({
//	 		 	url:"insertNotice_PromulgatorCanle.php?PhoneNumber="+id+"&MissionMsgId=<?php echo $MissionMsgId ?>",
//	  			type:"GET",
//	 			dataType:"Json",
//				async:false,
//	  			success:function(data){
//		  			console.log(data);
//					console.log("通知接单者发布者已取消订单");
//					console.log(id);
//					EmailHandle(id);
//	 			 },
//	 		    error:function(XMLHttpRequest){
//		 			 console.log(XMLHttpRequest.readyState)
//					 console.loh("通知接单者发布者已取消订单失败")
//	 			 },
//			})
//	   }
function insertMsg_PromulgatorCancleMoney(id){ //通知发布者退款成功
		    $.ajax({
	 		 	url:"insertNotice_moneyCanle.php?PhoneNumber="+id+"&MissionMsgId=<?php echo $MissionMsgId ?>",
	  			type:"GET",
	 			dataType:"Json",
				async:false,
	  			success:function(data){
		  			console.log(data);
					EmailHandle(id);
	 			 },
	 		    error:function(XMLHttpRequest){
		 			 console.log(XMLHttpRequest.readyState)
	 			 },
			})
	   }  
function updateMissionState_4(){
		   $.ajax({
	 		 	url:"updateMissionState_4.php?UserId=<?php echo $MissionPromulgatorId;?>"+"&MissionMsgId=<?php echo $MissionMsgId ?>",
	  			type:"GET",
	 			dataType:"Json",
	  			success:function(data){
					console.log(data);
	 			 },
	 		    error:function(XMLHttpRequest){
		 			 console.log(XMLHttpRequest.readyState)
	 			 },
			})
	   }
function AlipayRefund(WIDout_trade_no,TotalAmount)
	{
$.ajax({
	 url:"http://www.gaocimi.cn/alipay.trade.wap.pay-PHP-UTF-8/wappay/refund.php",
	 type:"GET",
	 dataType:"Json",
	 data:{"WIDout_trade_no":WIDout_trade_no,"WIDrefund_amount":TotalAmount},
	 success:function(data){if(data.msg=="Success"){
		 
		 RefundHandle(data.gmt_refund_pay,data.refund_fee,data.out_trade_no,"1",<?php echo $MissionPromulgatorId;?>,data.msg)
		 //调用退款接口
	 }},
	 error:function(){console.log(1)},
 })}
	
	function WalletpayRefund(WIDout_trade_no)
	{	
	$.ajax({
	 url:"http://www.gaocimi.cn/MissionH5/xzf/handfile/WalletRefundhandle.php",
	 type:"POST",
	 dataType:"Json",
	 data:{"AlipayOutTradeNo":WIDout_trade_no},
	 success:function(data){$.each(data,function(index,comment){ RefundHandle(getNowFormatDate() ,comment.TotalAmount,comment.AlipayOutTradeNo,"1",<?php echo $MissionPromulgatorId;?>,comment.TradeSuccess)}
	 )},
})	
}   
	 function OfflinePayRefund(WIDout_trade_no)
	{
		$.ajax({
		url:"../handfile/OffLineRefundhandle.php",
		type:"GET",
		data:{"AlipayOutTradeNo":WIDout_trade_no},
		dataType:"Json",
	   success:function(data){$.each(data,function(index,comment){RefundHandle(getNowFormatDate() ,comment.TotalAmount,comment.AlipayOutTradeNo,"1",<?php echo $MissionPromulgatorId;?>,comment.TradeSuccess)})},
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})

	}
	

	
	
	
    function RefundHandle(SendPayDate,TotalAmount,AlipayOutTradeNo,Reason,UserId,TradeSuccess){
	$.ajax({
	 url:"http://www.gaocimi.cn/MissionH5/xzf/handfile/RefundHandle.php",
	 type:"GET",
	 dataType:"Json",
	 data:{"SendPayDate":SendPayDate,"TotalAmount":TotalAmount,"AlipayOutTradeNo":AlipayOutTradeNo,"Reason":Reason,"UserId":UserId,"TradeSuccess":TradeSuccess},
	 success:function(data){
		 PayType=data;
		 if(PayType==2)
		 {
		 WalletAccountHandle(AlipayOutTradeNo+"REFUND",UserId);}
		 else if(PayType==1)
		 {   AccountInsertMsg(AlipayOutTradeNo+"REFUND",UserId)
			 $(".note").text("操作成功,请稍候支付宝退款！")}
		 else if(PayType==3)
		 {   AccountInsertMsg(AlipayOutTradeNo+"REFUND",UserId)
			 $(".note").text("操作成功,已撤销！");}

	 },
	 error:function(XMLHttpRequest){$(".note").text("该订单已退款,请勿重复操作")},
	})
	
	
	
	
}
	function WalletAccountHandle(AlipayOutTradeNo,UserId){
 
	$.ajax({
		url:"WalletAccountHandleST.php",
		type:"POST",
		data:{"WIDout_trade_no":AlipayOutTradeNo,"UserId":UserId},
		dataType:"Text",
	    success:function(data){alert("退款成功");
    	
			   var Page="<?php if(!empty($_GET['Page'])){echo $_GET['Page'];} ?>";
			    if(Page=="press"){
					PressRefundQuery()
				}else{window.location="../../lhb/PHP/mymission.php";}//特殊通道为快递业务关闭订单
				
							  },
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
    console.log(XMLHttpRequest.status);
    console.log (XMLHttpRequest.readyState);
    console.log (textStatus);
   },

	})

	}
	function AccountInsertMsg(AlipayOutTradeNo,UserId){
		$.ajax({
			url:"AccountInsertMsg.php",
			type:"POST",
			data:{"WIDout_trade_no":AlipayOutTradeNo,"UserId":UserId},
			dataType:"Text",
			success:function(data){console.log(data)},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
    console.log(XMLHttpRequest.status);
    console.log (XMLHttpRequest.readyState);
    console.log (textStatus);
   },
})
	}
	
	function getNowFormatDate() {
    var date = new Date();
    var seperator1 = "-";
    var seperator2 = ":";
    var month = date.getMonth() + 1;
    var strDate = date.getDate();
    if (month >= 1 && month <= 9) {
        month = "0" + month;
    }
    if (strDate >= 0 && strDate <= 9) {
        strDate = "0" + strDate;
    }
    var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate
            + " " + date.getHours() + seperator2 + date.getMinutes()
            + seperator2 + date.getSeconds();
    return currentdate;
}
	
	
/////////////////////////////////////////////////////////////////////
////	以下为快递业务退款通道
   function PressRefundQuery(){
	   
	   $.ajax({
		url:"../../../oldfile/WEBAPP/handle/PressRefundUpdate.php",
		type:"POST",
		data:{"WIDout_trade_no":"<?php if(!empty($_GET['WIDout_trade_no'])){echo $_GET['WIDout_trade_no'];} ?>"},
		dataType:"Json",
	   success:function(data){console.log(data);schoolhelpupdatestate(<?php echo $_GET['WIDout_trade_no'] ?>)},
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})

   }////特殊通道为快递业务关闭订单
function schoolhelpupdatestate(){
	   $.ajax({
		url:"../../../oldfile/WEBAPP/handle/schoolhelpupdatestate.php",
		type:"POST",
		data:{"AlipayOutTradeNo":"<?php if(!empty($_GET['WIDout_trade_no'])){echo $_GET['WIDout_trade_no'];} ?>"},
		dataType:"Json",
	   success:function(data){console.log(data);SendEmail()},
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})
}//更新快递状态
	function SendEmail(){
			$.ajax({
		url:"../../phpmailer/index.php",
		type:"GET",
		data:{"Email":"516108843@qq.com","Note":"客户撤单了请及时查看"},
		dataType:"Text",
		success:function(data){console.log(data);history.back();},
		error:function(){$("#SUBBT").before("<p style='font-size:14px'>网络异常！请稍后再试</p>")},
	})}//撤销后后发送邮箱
</script>