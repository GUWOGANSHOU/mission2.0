<?php 
require_once('dbconnect.php');?>
<?php
$PhoneNumber=$_POST['PhoneNumber'];
$MoneyAcceptedITime=date("Y-m-d H:i:s") ;
$sql="INSERT INTO NoticeCenter (ReadingState, FromId, ToId, Content, Time, Missionid) VALUES ('0', '系统通知', '$PhoneNumber', '您的提现申请未审核通过。', '$MoneyAcceptedITime', '0')";
?>
<?php require_once('../../SqlRequire/SqlInsert.php');?>