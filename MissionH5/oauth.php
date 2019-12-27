<?php
 header("Location:lhb/PHP/TaskIssueType.php");
?>
<?php
$code = $_GET['code'];
$state = $_GET['state'];
$PhoneNumber=$_GET['state'];
//$PhoneNumber=15695902162;

//换成自己的接口信息
$appid = 'wxcd7d0badeb0e013f';
$appsecret = '18d11d5d0e13a4e377edbdb1cfb0c047';
if (empty($code)) $this->error('授权失败');
$token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$appsecret.'&code='.$code.'&grant_type=authorization_code';
$token = json_decode(file_get_contents($token_url));
if (isset($token->errcode)) {
 echo '<h1>错误：</h1>'.$token->errcode;
 echo '<br/><h2>错误信息：</h2>'.$token->errmsg;
 exit;
}
$access_token_url = 'https://api.weixin.qq.com/sns/oauth2/refresh_token?appid='.$appid.'&grant_type=refresh_token&refresh_token='.$token->refresh_token;
//转成对象
$access_token = json_decode(file_get_contents($access_token_url));
if (isset($access_token->errcode)) {
 echo '<h1>错误：</h1>'.$access_token->errcode;
 echo '<br/><h2>错误信息：</h2>'.$access_token->errmsg;
 exit;
}
$user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token->access_token.'&openid='.$access_token->openid.'&lang=zh_CN'; //开源软件:phpfensi.com
//转成对象
$user_info = (array)json_decode(file_get_contents($user_info_url));

if (isset($user_info->errcode)) {
 echo '<h1>错误：</h1>'.$user_info->errcode;
 echo '<br/><h2>错误信息：</h2>'.$user_info->errmsg;
 exit;
}
?>
<?php 
require_once('SqlRequire/dbconnect.php');
?>
<?php

$OpenId=$user_info['openid'];
$sql="update MissionUser set OpenId ='$OpenId' where PhoneNumber='$PhoneNumber'";

?>
<?php 
$result=mysql_query($sql);
if($result){
 echo json_encode("操作成功！");
	}else{
  return false;
}

 ?>

<?php /*?><?php
//打印用户信息
echo '<pre>';
print_r($user_info);
print_r($user_info['openid']);

echo '</pre>';
?><?php */?>
