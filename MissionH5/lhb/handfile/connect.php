<?php
  $root='oldfile';
  $password='oldfile';
  $host='localhost';
  $con=mysql_connect($host,$root,$password);
  $db='oldfile';
  if($con == false){echo "连接失败" ;}else{
	
  }
    if(mysql_select_db($db)){}
     else{echo "选择数据库失败" ;};

  ?>     