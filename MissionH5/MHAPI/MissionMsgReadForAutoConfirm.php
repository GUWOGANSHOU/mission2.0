<?php require_once('dbconnect.php') ;?>
<?php
function AutoConfirm(){
$sql="select  *from MissionMsg where MissionState='2'";
require_once('../SqlRequire/SqlAssocRequire.php');
	}
AutoConfirm();
?>