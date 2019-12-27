<?php session_start(); ?>

<?php header("Content-type: text/html; charset=utf-8"); ?>

<?php

$_SESSION['print']['shopName'] = $_POST["shopName"];

$_SESSION['print']['page-size'] = $_POST["page-size"];
$_SESSION['print']['page-begin'] = $_POST["page-begin"];
$_SESSION['print']['page-end'] = $_POST["page-end"];

$_SESSION['print']['num'] = $_POST["num"];

$_SESSION['print']['paper-type']= $_POST["paper-type"];

$_SESSION['print']['paper-color']= $_POST["paper-color"];

$_SESSION['print']['list-option']= $_POST["list-option"];

switch ($_POST["distribution-fee"]) {
  case "0":
    $_SESSION['print']['distribution-fee'] = 0;
    break;
  case "3":
    $_SESSION['print']['distribution-fee'] = 3;
    break;
  default:
    $_SESSION['print']['distribution-fee'] = 1;
}

$_SESSION['print']['shopId']=$_POST["ShopId"];




function priceSum ($pageNum, $listOption, $paperType, $paperColor, $num, $distributionFee) {
  $c = 1;
  $d = 0;
  if ($paperType === 'single') {
    $paperColor === '1' ? $a = .15 : $a = 1;
    $listOption === '1' ? $b = 1 : $b = $listOption;
  } else {
    $paperColor === '1' ? $a = 0.2 : $a = 1.5;
    $listOption === '1' ? $b = 2 : $b = 2 * $listOption;
  }
  return round($num * (ceil($pageNum / $b) * $a * $c + $d) + $distributionFee, 2);
}

$_SESSION['print']['price']= priceSum(
      $_SESSION['print']['page-end'] - $_SESSION['print']['page-begin'] + 1,
      $_SESSION['print']['list-option'],
      $_SESSION['print']['paper-type'],
      $_SESSION['print']['paper-color'],
      $_SESSION['print']['num']
);
// $_SESSION['print']['price']= $_POST["price"];



//0.15,0.2 * num

// $hello = $_SESSION['print']['file-name'];

//       echo "<script> alert('{$hello}') </script>";

$url = "../print-pay.html";  

      echo "<script>window.location.href='$url'</script>";



?>