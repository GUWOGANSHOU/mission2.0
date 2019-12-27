<?php 
require_once('dbconnect.php');?>
<?php

$PhoneNumber=$_GET['PhoneNumber'];
$MissionMsgId=$_GET['MissionMsgId'];
$MissionAccepterITime=date("Y-m-d H:i:s") ;
$sql="INSERT INTO `MissionTable`.`NoticeCenter` (`ReadingState`, `FromId`, `ToId`, `Content`, `Time`, `Missionid`) VALUES ('0', '系统通知', '$PhoneNumber', '您的任务已被接走了，快来查看吧', '$MissionAccepterITime', '$MissionMsgId')";
?>
<?php 
$result=mysql_query($sql);
if($result){
 echo json_encode("操作成功！");
	}else{
  return false;
}

 ?>
