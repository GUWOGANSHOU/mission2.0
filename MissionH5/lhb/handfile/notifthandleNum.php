<?php require_once('dbconnect.php')?>
<?php $UserId=$_GET['UserId']; ?>
<?php $sql="Select *from NoticeCenter Where ToId='$UserId' and ReadingState='0' " ;?> 
<?php $Num=mysql_num_rows(mysql_query($sql))  ;
      echo $Num;
?>

