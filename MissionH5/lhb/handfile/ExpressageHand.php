<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
require_once('connect.php');
?> 
<?php  $AlipayOutTradeNo=$_GET['AlipayOutTradeNo'] ?>
<?php $sql="select *from schoolhelp where AlipayOutTradeNo='$AlipayOutTradeNo'" ;?>
<?php 
$result=mysql_query($sql);
if($result){

	while($row=mysql_fetch_assoc($result)){
		$data[]=$row;
		}
	}else{
		$data=array();
echo"失败了";}
echo json_encode($data);
 ?>