<?php

require_once('dbconnect.php'); ?>

<?php $Title=$_GET['WIDsubject']; ?>
<?php $Detail=$_GET['WIDbody']; ?>
<?php $Reward=$_GET['WIDtotal_amount']; ?> 
<?php $PayTime=$_GET['PayTime']; ?> 
<?php $WIDout_trade_no=$_GET['WIDout_trade_no'];?>
<?php $UserId=$_GET['UserId']; ?>
<?php $sql="insert into RechargeRecord(AlipayOutTradeNo,TotalAmount,Body,SendPayDate,TradeSuccess,UserId,PayType,Reason,Title)values('$WIDout_trade_no','$Reward','$Detail','$PayTime','None','$UserId','1','0','$Title')"; ?>
<?php if(mysql_query($sql)){echo json_encode("success");}else{echo json_encode("fail");} ;?>
