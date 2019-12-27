<?php require_once('dbconnect.php'); ?>
<?php  $PhoneNumber=$_GET['PhoneNumber']?>
<?php if(!empty($_GET['More'])){$URL="limit 30" ;}else{$URL="limit 2,30" ;}  ?>
<?php $sql="select *from(select *from MissionMsg where MissionAccepterId='$PhoneNumber' AND MissionState!=4 AND MissionState!=3 order by MissionMsgId DESC)AS MissionMsg order by MissionMsgId ASC ".$URL;?>
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