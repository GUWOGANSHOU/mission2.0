

<?php
require_once("../lhb/handfile/dbconnect.php");

require_once("functions.php");
if(!empty($_GET['Note'])){
$Note=$_GET['Note'];}else{$Note='您的任务订单被接受，请及时查看';}
$QQmail=$_GET['Email'];
$flagTwo = sendMail($QQmail,'超级校园帮',$Note);
if($flagTwo){echo json_encode("success");}else{echo json_encode("fail");}

?>



