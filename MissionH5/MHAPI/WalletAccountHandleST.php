<?php require_once('dbconnect.php') ?>
<?php  
	    Accountquery();
   function Accountquery(){
	   $AlipayOutTradeNo=$_POST['WIDout_trade_no'];
	   $PhoneNumber=$_POST['UserId'];
	   $SQL="SELECT TotalAmount,Reason,PayType from RechargeRecord where AlipayOutTradeNo='$AlipayOutTradeNo'";//获得交易方式和交易用途
	   $Result=mysql_query($SQL);
	   if($arr=mysql_fetch_array($Result)){
		   $TotalAmount=$arr['TotalAmount'];
		   $Reason=$arr['Reason'];
		    $PayType=$arr['PayType'];
	   };
	   $SQL="SELECT WalletBalance from Wallet where UserId='$PhoneNumber'";
	   $Result=mysql_query($SQL);
	   if($arr=mysql_fetch_array($Result)){
		   $WalletBalance=$arr['WalletBalance'];
		   AccountCaculate($TotalAmount,$Reason,$WalletBalance);
	   };
	
   }

    function AccountCaculate($TotalAmount,$Reason,$WalletBalance){
	  switch ($Reason)
	  {
		  case 0:$WalletBalance=$WalletBalance-$TotalAmount;
			  break;	 
		  case 1:$WalletBalance=$WalletBalance+$TotalAmount;
			  break;
		  default:echo json_encode("StateError");
	  }
	  $PhoneNumber=$_POST['UserId'];
	  $SQLLAST="update Wallet set WalletBalance='$WalletBalance' where UserId='$PhoneNumber'";
	  if($result=mysql_query($SQLLAST)){
	   AccountInsertMsg($WalletBalance);
	//   echo json_encode("操作成功");
	  }//扣钱
  }
  function AccountInsertMsg($WalletBalance){
	  $AlipayOutTradeNo=$_POST['WIDout_trade_no'];
	  $sql="update RechargeRecord set WalletAccount='$WalletBalance' where AlipayOutTradeNo='$AlipayOutTradeNo' ";
	  if(mysql_query($sql)){
		  echo json_encode("操作成功！");
	  }else{echo json_encode("余额插入失败！");}
  }//把钱包余额写入交易记录
?>
