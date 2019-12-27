<?php
require_once('connect.php');
?> 
<?php  $AlipayOutTradeNo=$_GET['AlipayOutTradeNo'] ?>
<?php $sql="select *from schoolhelp where AlipayOutTradeNo='$AlipayOutTradeNo'" ;?>
<?php $result=mysql_query($sql);?>
<?php echo json_encode(mysql_fetch_array($result)) ?>