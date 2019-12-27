<?php 
require_once('dbconnect.php');?>

<?php

$PhoneNumber=$_POST['PhoneNumber'];
$StudentCardImage=$_POST['StudentCardImage'];

$sql="update MissionUser set StudentCardImage ='$StudentCardImage' where PhoneNumber='$PhoneNumber'";

?>
<?php require_once('../../SqlRequire/SqlInsert.php');?>