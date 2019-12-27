<?php

/**

 * 传入PhoneNumber,Password

 * 登入操作

*/ 

include '/www/wwwroot/Mission2.0/PHPAPI/dbconnect.php';

$sql = "SELECT userName,userImage FROM MissionUser

    WHERE phoneNumber='".$_POST['PhoneNumber']."' AND password='".$_POST['Password']."'";



$result = mysql_query($sql) or die(mysql_error());

$arr = array();
if($row = mysql_fetch_array($result)){
    $arr["MatchState"] = "success";
    $arr["Image"] = $row["userImage"];
    $arr["Username"] = $row["userName"];
}else{
    $arr["MatchState"] = "error";
}
echo json_encode($arr);

?>