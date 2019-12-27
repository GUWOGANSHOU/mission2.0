<?php session_start(); ?>

<?php

include '/www/wwwroot/Mission2.0/PHPAPI/dbconnect.php';

$Title='打印任务';

// $message =$_SESSION['print']['num'];

// echo "<script> alert('{$message}') </script>";

switch($_SESSION['print']['list-option']){
	case 1:$_SESSION['print']['list-option']='无缩印';break;
	case 6:$_SESSION['print']['list-option']='六分之一缩印';break;
	case 9:$_SESSION['print']['list-option']='九分之一缩印';break;
}

switch($_SESSION['print']['paper-color']){
	case 1:$_SESSION['print']['paper-color']='黑白印';break;
	case 2:$_SESSION['print']['paper-color']='彩印';break;

}
switch($_SESSION['print']['paper-type']){ 
	case 'single':$_SESSION['print']['paper-type']='单面';break;
	case 'double':$_SESSION['print']['paper-type']='双面';break;
}


$Detail=$_SESSION['print']['page-size'].",".$_SESSION['print']['paper-type'].",".$_SESSION['print']['num']."份"."\n

第". $_SESSION['print']['page-begin']."页 到 第".$_SESSION['print']['page-end']."页,\n

--".$_SESSION['print']['list-option']."\n

--".$_SESSION['print']['paper-color']."\n

---备注:".$_SESSION['print']['remark']; 

$Reward=$_SESSION['print']['price']; 

$PayTime=$_SESSION['print']['payTime'];

$WIDout_trade_no=$_SESSION['print']['WIDout_trade_no'];//任务id

$UserId=$_SESSION['PhoneNumber'];//用户id

$fileName = $_SESSION['print']['fileName'];





$MissionTimeDemand='';

$Pos=$_SESSION['print']['shopName'];

$PayType='';

$MissionType='';

$MissionAccepterId=$_SESSION['print']['shopId'];//商家id



$sql="insert into MissionMsg(MissionTitle,MissionDescribe,MissionReward,

MissionPromulgatorTime,MissionPromulgatorId,MissionPos,WIDout_trade_no,

MissionTimeDemand,MissionAccepterId,fileName)

values('$Title','$Detail','$Reward','$PayTime','$UserId','$Pos',

'$WIDout_trade_no','$MissionTimeDemand','$MissionAccepterId','$fileName')";



$result=mysql_query($sql);

if($result){
	

	$url = "http://www.gaocimi.cn/MissionH5/hbl/PHP/IndexAcceptedTask.php";  

	// echo "<script>window.location.href='$url'</script>";

	header("location:".$url);

	}else{

 echo json_encode("操作失败！");

}

?>