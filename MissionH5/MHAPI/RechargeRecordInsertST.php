<?php

require_once('dbconnect.php'); ?>

<?php $Title=$_POST['WIDsubject']; ?>
<?php $Detail=$_POST['WIDbody']; ?>
<?php $Reward=$_POST['WIDtotal_amount']; ?> 
<?php $PayTime=$_POST['PayTime']; ?> 
<?php $WIDout_trade_no=$_POST['WIDout_trade_no'];?>
<?php $UserId=$_POST['UserId']; ?>  
<?php $PayType=$_POST['PayType'];     
      $Reason=$_POST['Reason'];?>   
<?php $sql="insert into RechargeRecord(AlipayOutTradeNo,TotalAmount,Body,SendPayDate,TradeSuccess,UserId,PayType,Reason,Title)values('$WIDout_trade_no','$Reward','$Detail','$PayTime','TRADE_SUCCESS','$UserId','$PayType','$Reason','$Title')"; ?>
<?php if(mysql_query($sql)){echo json_encode("success");}else{echo json_encode("fail");} ;?>
   