

<?php require_once('dbconnect.php'); ?>
<?php 
$number="select * from MissionMsg";
$Num=mysql_num_rows(mysql_query($number));
//echo $Num;
?>

<?php
$max=$Num+820;
$min=$Num+770;
$id=rand($max,$min);
//echo $id;
//$sql="select * from MissionMsg ORDER BY MissionMsgId DESC LIMIT 10 " ;
$sql="select * from MissionMsg where MissionMsgId='$id' " ;
?>
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
