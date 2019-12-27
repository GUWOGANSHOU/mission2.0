<?php require_once('dbconnect.php'); ?>
<?php  $PhoneNumber=$_GET['PhoneNumber']?>
<?php if(!empty($_GET['More'])){$URL="limit 2,30" ;}else{$URL="limit 30" ;}  ?>
<?php $sql="select *from MissionMsg where (MissionAccepterId='$PhoneNumber' or MissionPromulgatorId='$PhoneNumber') and MissionState='3' order by MissionMsgId DESC";?>
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