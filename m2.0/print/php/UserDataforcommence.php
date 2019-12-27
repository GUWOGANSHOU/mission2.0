<?php

/**

 * 传入PhoneNumber,Password

 * 登入操作

*/ 

include '/www/wwwroot/Mission2.0/PHPAPI/dbconnect.php';

$sql = "SELECT SchoolId,Address,UserName FROM MissionUser

    WHERE phoneNumber='".$_POST['PhoneNumber']."' ";  



$result = mysql_query($sql) or die(mysql_error());

$arr = array();
if($row = mysql_fetch_array($result)){
	
    $arr["SchoolId"] = $row["SchoolId"];
    $arr["Address"] = $row["Address"];
	 $arr["UserName"] = $row["UserName"];
}else{

}
echo json_encode($arr);

?>