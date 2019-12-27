<?php 
require_once('dbconnect.php');?>
<?php 
header("Content-type:text/html;charset=utf-8")
?>
<?php

$PhoneNumber=$_POST['PhoneNumber'];
$Address=$_POST['Address'];
$sql="update MissionUser set Address ='$Address' where PhoneNumber='$PhoneNumber'";

?>
<?php $result=mysql_query($sql);
echo json_encode('Success')?>  