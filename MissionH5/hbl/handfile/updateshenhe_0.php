<?php 
require_once('dbconnect.php');?>
<?php

$PhoneNumber=$_GET['PhoneNumber'];

$sql="update MissionUser set AuditState =0 where PhoneNumber='$PhoneNumber'";

?>
<?php require_once('../../SqlRequire/SqlInsert.php');?>