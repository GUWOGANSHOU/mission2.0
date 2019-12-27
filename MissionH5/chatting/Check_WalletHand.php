<?php 
require_once('../hbl/handfile/dbconnect.php');?>


<?php

$sql="SELECT * FROM `Wallet` "
?>
<?php 
$result=mysql_query($sql);
require('../SqlRequire/SqlAssocRequire.php')
 ?>