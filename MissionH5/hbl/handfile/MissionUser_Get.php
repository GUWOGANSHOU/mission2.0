<?php session_start(); ?>
<?php require_once('dbconnect.php'); ?>
<?php $PhoneNumber=$_GET['PhoneNumber']; ?>
<?php $_SESSION['PhoneNumber']=$PhoneNumber; ?>
<?php $sql="select *from MissionUser where PhoneNumber=$PhoneNumber " ;

?><?php 
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