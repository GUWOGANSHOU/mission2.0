<?php
include '/www/wwwroot/Mission2.0/PHPAPI/dbconnect.php';
$sql = "select MissionTitle,MissionDescribe,MissionReward,
MissionPromulgatorTime,MissionPromulgatorId,MissionPos,WIDout_trade_no,
MissionTimeDemand,MissionAccepterId from MissionMsg";
$result=mysql_query($sql);

    $path =  "/Mission2.0/print/upload/".$_GET['UserId']."/".$_GET['fileName'];
    echo $path;
    echo "<script>window.location.href='$path'</script>";
?>