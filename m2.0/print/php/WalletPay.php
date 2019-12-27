<?php session_start(); ?>
<?php $Title='打印任务';?>
<?php $Detail=$_SESSION['print']['page-size'].",".$_SESSION['print']['paper-type']."\n
第". $_SESSION['print']['page-begin']."页 到 第".$_SESSION['print']['page-end']."页,\n
缩印要求:".$_SESSION['print']['list-option']."\n
彩印要求:".$_SESSION['print']['paper-color']."\n
备注:".$_SESSION['print']['remark']; ?>
<?php $Pos=$_SESSION['print']['fileName']; ?>
<?php $Reward=$_SESSION['print']['price']?>
<?php $TimeDemand='' ?>
 <?php $PayTime=date("Y-m-d H:i:s");
 $_SESSION['print']['payTime'] = $PayTime;
 $_SESSION['print']['WIDout_trade_no'] =date("Ymdhis");?> 
<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8">
		<meta name="renderer" content="webkit">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
		<title>钱包支付</title>
		<link rel="stylesheet" type="text/css" href="/MissionH5/lhb/css/style1.css" />

	</head>
	<body>
		<div class="top_bar">
			<a onclick='history.go(-1)'><img class="top_bar_skip" src="/MissionH5/lhb/images/ski_back.jpg" /></a><a class="top_bar_txt">钱包支付</a>
		</div>
	
		<div class="zf_box">
			<dl class="inpu_box">
				<dd><span>商户订单号：</span><input name="WIDout_trade_no" type="text" id="WIDout_trade_no" value="<?php echo $_SESSION['print']['WIDout_trade_no']?>"  /></dd>
				<dd><span>订单名称：</span><input type="text" name="WIDsubject" id="WIDsubject" name="WIDsubject" value="<?php echo $Title;?>" /></dd>
				<dd class="no_bor"><span>付款金额：</span><input name="WIDtotal_amount"  type="text" id="WIDtotal_amount" name="WIDtotal_amount"d="" value="<?php echo $Reward; ?>" /></dd>
				<textarea id="WIDbody" name="WIDbody" class="txt_js" name="100" rows="2" cols=""><?php  
				echo $Detail ;?> <?php echo '文件：'.$Pos;?></textarea>
				<input name="PayTime" value="<?php echo $PayTime; ?>" style="display: none"/>
				<input id="UserId" name="UserId" value="" style="display: none"/>
				<input name="Pos" value="<?php echo $Pos; ?>" style="display: none"/>
				<input name="TimeDemand" value="<?php echo $TimeDemand; ?>" style="display: none"/>
				<img class="i_left" src="/MissionH5/lhb/images/i_ri.jpg"/>
				<img class="i_right" src="/MissionH5/lhb/images/i_le.jpg"/>
				<input id="WalletBalance" value="" type="hidden" /></dl>
				
			</dl>
		</div>
		<div class="btn_box">

			<button style="font-size: 14px;" id="submit" onClick="OnSubmit()" class="btn_tj">确认</button>
			<p>我已同意此操作</p>
		</div>
		
	</body>

</html>

<script src="/MissionH5/js/Jquery/jquery-3.2.0.js"></script>
<script src="/MissionH5/js/Jquery/session.js"></script>
<script type="text/javascript" src="/MissionH5/weixin/JSfunction/OrderNote.js"></script>
<script src="/Mission2.0/JSAPI/UserDataRead.js"></script>
<script language="javascript">
	$("#UserId").val($.session.get("PhoneNumber"));
	$("#WIDbody").html($("#WIDbody").text()+'\n'+'\n'+$.session.get("SchoolId")+$.session.get("Address"))
	console.log($("#WIDbody").text())
		 $.ajax({
                    url: "/MissionH5/lhb/handfile/Wallethandle.php",
                    type: "GET",
                    data: {
                      "UserId": $.session.get("PhoneNumber")
                    },
                    dataType: "Json",
                    success: function(data) {
                       $.each(data,function(index, comment) {
                        $("#WalletBalance").val(comment.WalletBalance)
                      })
					  if(sessionStorage.getItem('next')) {
					   OnSubmit();
					  }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                      console.log(XMLHttpRequest.status);
                      console.log(XMLHttpRequest.readyState);
                      console.log(textStatus);
                      console.log($.session.get("PhoneNumber"));
                    },

                  }) //读取账户余额
	
	function OnSubmit() {
          
    if(($("#WalletBalance").val()-$("#WIDtotal_amount").val()).toFixed(2)>=0){
	         RechargeRecordInsert();
		     $("#submit").attr("disabled","disabled")
		      
	}else{
	    	alert("您的余额不足！请充值!");
		    window.location="/MissionH5/lhb/PHP/recharge.php";
		    $("#submit").attr("disabled","disabled");
	}}
	
	
	function RechargeRecordInsert(){
		$.ajax({
		url:"/MissionH5/xzf/handfile/WalletPayHandle.php",
		Type:"GET",
		data:{"WIDsubject":$("#WIDsubject").val(),
			  "WIDbody":$("#WIDbody").val(),
			  "WIDtotal_amount":'<?php echo $Reward; ?>',
			  "PayTime":'<?php echo $PayTime ;?>',
			  "WIDout_trade_no":$("#WIDout_trade_no").val(),
			  "UserId":$.session.get("PhoneNumber"),
			  "Pos":'<?php echo $Pos;?>',
			  "TimeDemand":'<?PHP echo $TimeDemand; ?>'
			 },
		dataType:"Json",
	   success:function(data){WalletAccountHandleST()},
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})

	}
	
	function WalletAccountHandleST(){
	$.ajax({
		type:"POST",
		url:"/MissionH5/xzf/handfile/WalletAccountHandleST.php",
		data:{"WIDout_trade_no":$("#WIDout_trade_no").val(),"UserId":$.session.get("PhoneNumber")},
		dataType:"Json",
	   success:function(data){
		   $("#submit").text(data).attr("disabled","disabled");
		   alert("操作成功!"); 
         OrderNote1.NoteSend();
		 OrderNote2.NoteSend();
		   setTimeout(window.location="paySuccess.php",2000)
		   },
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
		console.log(XMLHttpRequest.status);
		console.log (XMLHttpRequest.readyState);
		console.log (textStatus);
   },

	})
	
	}
	var UserData=new UserDataRead();
	UserDataShopId=UserData.UserDataViaPhoneNumber(<?php echo $_SESSION['print']['shopId']; ?>);
	console.log(UserDataShopId[0].OpenId);
	var OrderNote1=new OrderNote("oTBU2wE9J8DhAAEccMDA7uDEUV9U",$("#WIDsubject").val());		 
 	var OrderNote2=new OrderNote(UserDataShopId[0].OpenId,$("#WIDsubject").val());	

	
</script>
</html>