<?php
    $PhoneNumber=$_GET['PhoneNumber'];
	$appid='wxcd7d0badeb0e013f';
	header('location:https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri=http%3A%2F%2Fwww.gaocimi.cn%2FMissionH5%2Foauth.php&response_type=code&scope=snsapi_userinfo&state='.$PhoneNumber.'#wechat_redirect ')
?>