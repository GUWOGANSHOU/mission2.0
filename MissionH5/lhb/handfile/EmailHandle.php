<?php require_once('dbconnect.php') ?>
<?php $MissionPromulgatorId=$_GET['MissionPromulgatorId']?>
<?php $sql="select * from MissionUser where PhoneNumber='$MissionPromulgatorId'"; ?>
<?php require_once('../../SqlRequire/SqlAssocRequire.php'); ?>