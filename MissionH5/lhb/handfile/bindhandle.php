
<?php require_once('dbconnect.php');?>
<?php
$PhoneNumber=$_GET['PhoneNumber'];
$Password=$_GET['Password'];


$sql="insert into MissionUser (PhoneNumber,Password)values('$PhoneNumber','$Password')"
?>
<?php 
$result=mysql_query($sql);
if($result){
 echo json_encode("操作成功！");
	}else{
  return false;
}

 ?>