<?php 
require_once('dbconnect.php');?>
<?php

$PhoneNumber=$_GET['PhoneNumber'];
$Gender=$_GET['Gender'];
$sql="update MissionUser set Gender ='$Gender' where PhoneNumber='$PhoneNumber'";

?>
<?php 
$result=mysql_query($sql);
if($result){
 echo json_encode("操作成功！");
	}else{
  return false;
}

 ?>