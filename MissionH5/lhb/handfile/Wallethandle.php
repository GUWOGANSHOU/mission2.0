<?PHP require_once('dbconnect.php'); ?>
<?php $UserId=$_GET['UserId']; ?>
<?PHP  $sql="select  WalletBalance,WalletId from Wallet where  UserId='$UserId' ";?>
<?PHP  require_once('../../SqlRequire/SqlAssocRequire.php') ?>