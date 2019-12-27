<?php 
require_once('dbconnect.php');?>
<?php

$WalletId=$_POST['WalletId'];
$sql="INSERT INTO `MissionTable`.`Wallet` (`WalletId`,  `UserId`) VALUES ('$WalletId','$WalletId')";
?>
<?php 
$result=mysql_query($sql);
if($result){
 echo json_encode("操作成功！");
	}else{
  return false;
}

 ?>