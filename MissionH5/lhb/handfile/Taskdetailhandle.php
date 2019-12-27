<?php require_once('dbconnect.php'); ?>
<?php  $MissionMsgId=$_GET['MissionMsgId'] ?>
<?php $sql="select *from MissionMsg where MissionMsgId='$MissionMsgId'" ;?>
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