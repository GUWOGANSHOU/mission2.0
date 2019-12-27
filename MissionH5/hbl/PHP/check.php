<?php
  error_reporting(E_ALL^E_NOTICE^E_WARNING);
  $root='MissionTable';
  $password='Mission';
  $host='localhost';  
  $con=mysql_connect($host,$root,$password);
  $db='oldfile';
  
  if($con == false){echo "连接失败" ;}else{
	  echo "连接成功" ;
  }
  mysql_select_db($db);
  mysql_query('set name utf8');
  ?>     
  <?php
	$sql="SELECT * FROM `schoolhelp` ";

//$sql="select *from MissionMsg order by MissionMsgId DESC";



    if($result=mysql_query($sql)){
  while($row=mysql_fetch_assoc($result)){
	$data[]=$row;
}}else{
	$data=array();
}

	?>
<html>
<head>
<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>快递记录</title>
<link rel="stylesheet" href="../CSS/bootstrap.min.css">
<script src="../JS/jquery-3.2.0.js"></script>
<script src="../JS/bootstrap.min.js"></script> 
<style>
html,body,.page{width:100%; height:100%; overflow: auto; margin:0; padding:0; background:#FFF}

.header{ height:38pt; background:#00BB89;}
.t{ height:200pt; border:#999 1pt solid; width:100%; margin-bottom:10pt}
.image{ height:180pt; width:200pt;border:#999 1pt solid; margin-top:10pt; float:left; overflow:hidden}
.Msg{ float:left; margin-top:80pt; margin-left:-25pt; width:50pt; height:50pt}
.OK{ float:left; margin-top:10pt; margin-left:15pt; width:50pt; height:50pt;}
#Yes{ background:#CCF5AF; border-radius:5pt; width:50pt;}
#No{ margin-top:10pt;  border-radius:5pt; width:50pt;}
</style>
</head>

<body>
<div class="header text-center navbar-fixed-top">
  	<h1 style="font-size:15pt; color:#FFF; margin:0 10% ; line-height:38pt">快递记录</h1>
</div>
<div id="blanckbar" style="height:48pt"></div>

 <?php
	foreach($data as $value){
		
		echo '<div style="width:98%; margin:0 auto; border:#00BB89 1px solid">
  
    <div class="tl MissionTitle">快递商家：'.$value['deliverytype'].'</div>		
    <div class="PosContent" >取件号：'.$value['deliverynumber'].'</div>
      <div class="PosContent" >姓名：'.$value['username'].'</div>
	  <div class="PosContent" >电话：'.$value['phonenumber'].'</div>
      <div class="MissionDescribeContent" >备注：'.$value['note'].'</div>
</div>
';}
	?>


</body>
</html>

<script type="text/javascript">


//	获得提现信息
	

</script>