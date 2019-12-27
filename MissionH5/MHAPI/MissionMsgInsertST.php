<?php 
require_once('dbconnect.php');




InitFn();
function InitFn(){
$Title=$_POST['Title'];
$Detail=$_POST['Detail']; 
$Reward=$_POST['Reward']; 
$PayTime=$_POST['PayTime'];
$WIDout_trade_no=$_POST['WIDout_trade_no'];
$UserId=$_POST['UserId'];
$MissionTimeDemand=$_POST['MissionTimeDemand'];
$Pos=$_POST['Pos'];
$PayType=$_POST['PayType'];
$SQL="insert into MissionMsg(MissionTitle,MissionDescribe,MissionReward,MissionPromulgatorTime,MissionPromulgatorId,MissionPos,WIDout_trade_no,MissionTimeDemand)values('$Title','$Detail','$Reward','$PayTime','$UserId','$Pos','$WIDout_trade_no','$MissionTimeDemand')";
mysql_query($SQL);
$sqlReason="select Reason from RechargeRecord where AlipayOutTradeNo='$WIDout_trade_no'";
$ReasonResult=mysql_query($sqlReason); 
$arr=mysql_fetch_array($ReasonResult);
$Reason=$arr[0];
echo json_encode($Reason);
//拉取Reason
}
