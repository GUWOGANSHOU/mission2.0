<?php 
require_once('dbconnect.php');?>
<?php

$PhoneNumber=$_GET['PhoneNumber'];

$sql="update MissionUser set AuditState =1 where PhoneNumber='$PhoneNumber'";

?>
<?php 
$result=mysql_query($sql);
if($result){
 echo json_encode("操作成功！");
	}else{
  return false;
}

 ?>