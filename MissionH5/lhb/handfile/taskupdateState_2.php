<?php require_once('dbconnect.php'); ?>
<?PHP $UserId=$_GET['UserId']; ?>
<?PHP $MissionMsgId=$_GET['MissionMsgId']; ?>
<?php $MissionCompleteTimeForAccepter=date("y-m-d h:i:s") ?>
<?php $sql="update MissionMsg set MissionState=2,MissionAccepterId='$UserId',MissionCompleteTimeForAccepter='$MissionCompleteTimeForAccepter' where MissionMsgId='$MissionMsgId'" ?>
<?php if(mysql_query($sql)){echo json_encode('操作成功');}; ?>