<?php require_once('dbconnect.php'); ?>

<?php 

if(empty($_GET['UserId'])||empty($_GET['MissionMsgId'])){UpdateAuto();}else{UpdateOne();};


function UpdateOne(){ ?>
<?PHP $UserId=$_GET['UserId']; ?> 
<?PHP $MissionMsgId=$_GET['MissionMsgId']; ?>
<?php $MissionState=$_GET['MissionState']; ?>
<?php $MissionCompleteTimeForAccepter=date("y-m-d h:i:s") ?>
<?php $sql="update MissionMsg set MissionState='$MissionState',MissionAccepterId='$UserId',MissionCompleteTimeForAccepter='$MissionCompleteTimeForAccepter' where MissionMsgId='$MissionMsgId'" ;
					 if(mysql_query($sql)){echo json_encode('success');}; 
					   }?>
<?php 
function UpdateAuto(){
	$MissionState=$_GET['MissionState']; 
	$sql="update MissionMsg set MissionState='$MissionState' where MissionState='2'";
	if(mysql_query($sql)){echo json_encode('success');}; 
}
?>
<?php ?>