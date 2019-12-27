<?php require_once('dbconnect.php'); ?>
<?PHP $UserId=$_POST['UserId']; ?>
<?PHP $MissionMsgId=$_POST['MissionMsgId']; ?>
<?php $MissionAccepterITime=date("y-m-d h:i:s") ?>
<?php $sql="update MissionMsg set MissionState=1,MissionAccepterId='$UserId',MissionAccepterITime='$MissionAccepterITime' where MissionMsgId='$MissionMsgId'" ?>
<?php if(mysql_query($sql)){echo json_encode('抢单成功');}; ?>