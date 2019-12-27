<?php 
require_once('dbconnect.php');?>
<?php 
header("Content-type:text/html;charset=utf-8")
?>
<?php

$PhoneNumber=$_GET['PhoneNumber'];
$Academy=$_GET['Academy'];
$sql="update MissionUser set Academy ='$Academy' where PhoneNumber='$PhoneNumber'";

?>
<?php 
$result=mysql_query($sql);
if($result){
 echo json_encode("操作成功！");
	}else{
  return false;
}

 ?>