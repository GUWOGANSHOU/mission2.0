<?php 
require_once('dbconnect.php');?>
<?php

$PhoneNumber=$_POST['PhoneNumber'];
$MoneyAcceptedITime=date("Y-m-d H:i:s") ;
$sql="INSERT INTO `MissionTable`.`NoticeCenter` (`ReadingState`, `FromId`, `ToId`, `Content`, `Time`, `Missionid`) VALUES ('0', '系统通知', '$PhoneNumber', '您未审核通过，重新核对认证？', '$MoneyAcceptedITime', '$MissionMsgId')";
?>
<?php require_once('../../SqlRequire/SqlInsert.php');?>