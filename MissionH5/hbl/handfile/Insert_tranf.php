<?php 
require_once('dbconnect.php');?>
<?php
$PhoneNumber=$_POST['PhoneNumber'];
$MoneyAcceptedITime=date("Y-m-d H:i:s") ;
$sql="INSERT INTO `MissionTable`.`NoticeCenter` (`ReadingState`, `FromId`, `ToId`, `Content`, `Time`, `Missionid`) VALUES ('0', '系统通知', '$PhoneNumber', '提现审核成功！快去查看吧', '$MoneyAcceptedITime', '0')";
?>
<?php require_once('../../SqlRequire/SqlInsert.php');?>