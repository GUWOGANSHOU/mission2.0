<?php session_start(); ?>
<?php

$_SESSION['print']['remark'] = $_POST['remark'];

$url = "WalletPay.php";
echo "<script>window.location.href='$url'</script>";
// &Title=打印任务
// &Detail=".$_SESSION['print']['page-size'].",".$_SESSION['print']['paper-type']."\n
// 第". $_SESSION['print']['page-begin']."页 到 第".$_SESSION['print']['page-end']."页,\n
// 缩印要求:无\n
// 备注:".$_SESSION['print']['remark']."
// &Pos=".$_SESSION['print']['fileName']."
// &Reward=".$_SESSION['print']['price']."
// &TimeDemand1=
// ";  
// $url = urlencode($url); 
?>
