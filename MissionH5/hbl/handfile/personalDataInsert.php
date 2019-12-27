<?php 
require_once('dbconnect.php');?>
<?php

$PhoneNumber=$_GET['PhoneNumber'];
$NickName=$_GET['NickName'];
$sql="update MissionUser set NickName ='$NickName' where PhoneNumber='$PhoneNumber'";

?>
<?php require_once('../../SqlRequire/SqlInsert.php');?>