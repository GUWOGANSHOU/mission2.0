<?php 
require_once('dbconnect.php');?>
<?php

$PhoneNumber=$_GET['PhoneNumber'];
$sql="select OpenId,UserName,NickName,PhoneNumber,Email,Academy,Year,SchoolId,Gender,AuditState,Address from MissionUser where PhoneNumber='$PhoneNumber'";
$result=mysql_query($sql);
if($result){

	while($row=mysql_fetch_assoc($result)){
		$data[]=$row;
		}
	}else{
		$data=array();
echo"失败了";}
echo json_encode($data);
?>

 