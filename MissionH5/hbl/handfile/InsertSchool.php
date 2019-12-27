<?php 
require_once('dbconnect.php');?>
<?php 
header("Content-type:text/html;charset=utf-8")
?>
<?php

$PhoneNumber=$_GET['PhoneNumber'];
$SchoolId=$_GET['SchoolId'];
$sql="update MissionUser set SchoolId ='$SchoolId' where PhoneNumber='$PhoneNumber'";

?>
<?php require_once('../../SqlRequire/SqlInsert.php');?>