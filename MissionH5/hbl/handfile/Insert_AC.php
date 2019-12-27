<?php 
require_once('dbconnect.php');?>
<?php

$PhoneNumber=$_POST['PhoneNumber'];
$MoneyAcceptedITime=date("Y-m-d H:i:s") ;
$sql="INSERT INTO `MissionTable`.`NoticeCenter` (`ReadingState`, `FromId`, `ToId`, `Content`, `Time`, `Missionid`) VALUES ('0', '系统通知', '$PhoneNumber', '您已通过审核，快去体验更多功能吧', '$MoneyAcceptedITime', '$MissionMsgId')";
?>
<?php require_once('../../SqlRequire/SqlInsert.php');?>