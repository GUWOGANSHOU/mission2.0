<?php 
require_once('dbconnect.php');?>
<?php

$PhoneNumber=$_GET['PhoneNumber'];
$MissionMsgId=$_GET['MissionMsgId'];
$Content=$_GET['Content'];
$moneyTimeForPromulgator=date("Y-m-d H:i:s") ;
$sql="INSERT INTO `MissionTable`.`NoticeCenter` (`ReadingState`, `FromId`, `ToId`, `Content`, `Time`, `Missionid`) VALUES ('0', '系统通知', '$PhoneNumber', '$Content', '$moneyTimeForPromulgator', '$MissionMsgId')";
?>
<?php require_once('../SqlRequire/SqlInsert.php');?>
