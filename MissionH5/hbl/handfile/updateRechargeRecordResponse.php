<?php  require_once('dbconnect.php'); ?>
<?php $AlipayOutTradeNo=$_POST['AlipayOutTradeNo']; ?>
<?php $Type=$_POST['Type'] ;?>
<?php  if($Type==1){$sql="update RechargeRecord set TradeSuccess='Success' where AlipayOutTradeNo='$AlipayOutTradeNo' ";}else{$sql="update RechargeRecord set TradeSuccess='Fail' where AlipayOutTradeNo='$AlipayOutTradeNo' ";}?>
<?php if(mysql_query($sql)){echo json_encode("操作成功");}else{echo json_encode("操作失败");}; ?>