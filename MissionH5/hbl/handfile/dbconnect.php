<?php
  header('Content-Type: text/json; charset=utf-8');
  $root='MissionTable';
  $password='Mission';
  $host='localhost';  
  $con=mysql_connect($host,$root,$password);
  $db='MissionTable';
  
  if($con == false){echo "连接失败" ;}else{
  }
  mysql_select_db($db);
  mysql_query('set name utf8');
  ?>     
