<?php 
require_once('dbconnect.php');
?>
<?php
$sql="SELECT * FROM `Wallet` ";
?>
<?php 
$result=mysql_query($sql);

 ?><?php 
$result=mysql_query($sql);
if($result){
while($row=mysql_fetch_assoc($result)){
		$data[]=$row;}}else{$data=array();
echo"失败了";}
echo json_encode($data);
 ?>