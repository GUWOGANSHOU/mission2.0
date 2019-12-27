<?php require('dbconnect.php'); ?>

<?PHP 
$UserId=$_GET['UserId'];
$Id=$_GET['Id'];
if(!empty($_GET['Title'])){
	$Title=$_GET['Title'];
	$sqlTitle="Update MissionExpert set Title='$Title',MissionExpertState='0' where UserId='$UserId'and Id='$Id'";
	if(mysql_query($sqlTitle)){echo json_encode('Title');}else{echo json_encode('TitleFail');};
}
if(!empty($_GET['Content'])){
	$Content=$_GET['Content'];
	$sqlContent="Update MissionExpert set Content='$Content',MissionExpertState='0' where UserId='$UserId' and Id='$Id' ";
	if(mysql_query($sqlContent)){echo json_encode('Content');}else{echo json_encode('ContentFail');};
}
if(!empty($_GET['AveragePrice'])){
	$AveragePrice=$_GET['AveragePrice'];
	$sqlAveragePrice="Update MissionExpert set AveragePrice='$AveragePrice',MissionExpertState='0' where UserId='$UserId'and Id='$Id'";
	if(mysql_query($sqlAveragePrice)){echo json_encode('AveragePrice');}else{echo json_encode('AveragePriceFail');};
}
if(!empty($_GET['Image'])){
	$Image=$_GET['Image'];
	$sqlImage="Update MissionExpert set Image='$Image',MissionExpertState='0' where UserId='$UserId' and Id='$Id'";
	if(mysql_query($sqlImage)){echo json_encode('Image');}else{echo json_encode('ImageFail');};
}
if(!empty($_GET['MissionExpertState'])){
	$MissionExpertState=$_GET['MissionExpertState'];
	$sqlMissionExpertState="Update MissionExpert set MissionExpertState='$MissionExpertState' where UserId='$UserId'  and Id='$Id'";
	if(mysql_query($sqlMissionExpertState)){echo json_encode('MissionExpertState');}else{echo json_encode('MissionExpertStateFail');};
}
?>