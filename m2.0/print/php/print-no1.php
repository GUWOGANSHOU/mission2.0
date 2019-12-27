<?php session_start(); ?>

<?php header("Content-type: text/html; charset=utf-8"); ?>

<?php

if ($_FILES["file"]["error"] <= 0) {

    if(isset($_POST["phoneNumber"])){

        $_SESSION["PhoneNumber"] = $_POST["phoneNumber"];

    }

    if(!isset($_SESSION["PhoneNumber"])){

        $_SESSION["PhoneNumber"]='123456';

    }

    $dir = 'upload/'.$_SESSION["PhoneNumber"];

    if (!file_exists("../".$dir)){

        mkdir("../".$dir,0777,true);

    }

	$_FILES['file']["name"]=$_POST['address'].$_FILES['file']["name"];
	
    move_uploaded_file($_FILES["file"]["tmp_name"],

        "../".$dir."/" . $_FILES["file"]["name"]);


  $print = array(

    'fileName' =>  $_FILES["file"]["name"],

  );

$_SESSION['print'] = $print;

$url = "../print-no2.html";  

echo "<script >window.location.href='$url'</script>";
  

}else{

    echo "上传失败";

    header("Location: print-no1.html"); 

}

        // echo "Upload: " . $_FILES["file"]["name"] . "<br />";

    // echo "Type: " . $_FILES["file"]["type"] . "<br />";

    // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";

    // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

// if (file_exists("upload/" . $_FILES["file"]["name"]))

    // echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

?>

