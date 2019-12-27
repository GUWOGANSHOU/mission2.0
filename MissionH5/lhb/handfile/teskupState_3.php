<?php require_once('dbconnect.php'); ?>
<?PHP $UserId=$_GET['UserId']; ?>
<?PHP $MissionMsgId=$_GET['MissionMsgId']; ?>
<?php $MissionAccepterITime=date("y-m-d h:i:s") ?>
<?php $sql="update MissionMsg set MissionState=3,MissionPromulgatorId='$UserId',MissionAccepterITime='$MissionAccepterITime' where MissionMsgId='$MissionMsgId'" ?>
<?php if(mysql_query($sql)){echo json_encode('操作成功');}; ?>