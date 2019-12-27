<?php 
require_once('dbconnect.php');?>
<?php 
header("Content-type:text/html;charset=utf-8")
?>
<?php

$PhoneNumber=$_GET['PhoneNumber'];
$UserName=$_GET['UserName'];
$sql="update MissionUser set UserName ='$UserName' where PhoneNumber='$PhoneNumber'";

?>
<?php 
$result=mysql_query($sql);
if($result){
 echo json_encode("操作成功！");
	}else{
  return false;
}

 ?>