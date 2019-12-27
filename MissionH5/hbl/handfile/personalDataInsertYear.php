<?php 
require_once('dbconnect.php');?>
<?php

$PhoneNumber=$_GET['PhoneNumber'];
$Year=$_GET['Year'];
$sql="update MissionUser set Year ='$Year' where PhoneNumber='$PhoneNumber'";

?>
<?php 
$result=mysql_query($sql);
if($result){
 echo json_encode("操作成功！");
	}else{
  return false;
}

 ?>