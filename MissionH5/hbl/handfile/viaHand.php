<?php 
require_once('dbconnect.php');?>

<?php

$PhoneNumber=$_POST['PhoneNumber'];
$UserImage=$_POST['UserImage'];

$sql="update MissionUser set UserImage ='$UserImage' where PhoneNumber='$PhoneNumber'";

?>
<?php 
$result=mysql_query($sql);
if($result){
 echo json_encode("操作成功！");
	}else{
  return false;
}

 ?>