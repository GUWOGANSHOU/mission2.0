<?php require_once('dbconnect.php')?>
<?php $UserId=$_GET['UserId']; ?>
<?php $sql="Select *from(Select *from NoticeCenter Where ToId='$UserId' ORDER BY Id DESC LIMIT 0,20)AS NoticeCenter ORDER BY Id ASC " ;?> 
<?php require_once('../../SqlRequire/SqlAssocRequire.php') ; ?>
<?php $sql="update NoticeCenter set ReadingState=1 Where ToId='$UserId'" ;?> 
<?php mysql_query($sql);?>

