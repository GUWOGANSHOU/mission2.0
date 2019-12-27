<?php  require_once('dbconnect.php'); ?>
<?php 
$WIDout_trade_no=$_POST['WIDout_trade_no'];
$sql="select *from RechargeRecord where AlipayOutTradeNo='$WIDout_trade_no'" ?>
<?php require_once('../SqlRequire/SqlAssocRequire.php') ;?>
