<?php require_once('dbconnect.php'); ?>
<?php $WIDout_trade_no=$_GET['WIDout_trade_no']; ?>

<?php $MissionState=$_GET['MissionState']; ?>
<?php $MissionCompleteTimeForpro=date("Y-m-d H:i:s") ?>
<?php $sql="update MissionMsg set MissionState='$MissionState',MissionCompleteTimeForPromulgator='$MissionCompleteTimeForpro' where WIDout_trade_no='$WIDout_trade_no'" ;?>

<?php require_once('../SqlRequire/SqlInsert.php');?>

