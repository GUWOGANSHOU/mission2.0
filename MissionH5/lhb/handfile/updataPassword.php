<?php 
require_once('dbconnect.php');?>
<?php

$PhoneNumber=$_GET['PhoneNumber'];
$Password=$_GET['Password'];
$sql="update MissionUser set Password ='$Password' where PhoneNumber='$PhoneNumber'";

?>
<?php require_once('../../SqlRequire/SqlInsert.php');?>