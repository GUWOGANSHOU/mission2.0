<?php 
header("Content-type:text/html;charset=utf-8")
?>
<?php 
require_once('dbconnect.php');?>

<?php

$PhoneNumber=$_GET['PhoneNumber'];
$SchoolId=$_GET['SchoolId'];
$sql="update MissionUser set SchoolId ='$SchoolId' where PhoneNumber='$PhoneNumber'";

?>
<?php 
$result=mysql_query($sql);
if($result){
 echo json_encode("操作成功！");
	}else{
  return false;
}

 ?>