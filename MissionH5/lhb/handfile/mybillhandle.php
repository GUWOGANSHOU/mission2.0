<?PHP require_once('dbconnect.php'); ?>
<?php $UserId=$_GET['UserId']; ?>
<?PHP  $sql="select  *from RechargeRecord where  UserId='$UserId' ";?>
<?php 
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