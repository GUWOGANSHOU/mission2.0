<!doctype html>
<html>
<head>
<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>设置</title>
<link rel="stylesheet" href="../CSS/bootstrap.min.css">
<script src="../JS/jquery-3.2.0.js"></script>
<script src="../JS/bootstrap.min.js"></script> 
	<script src="../../js/Jquery/jquery.cookie.js"></script>
	
<style>
html,body,.page{width:100%; height:100%; overflow: auto; margin:0; padding:0; background:#F0F0F0}

.header{ height:40pt; background:#10C091;}

.t1{background:#FFF; width:100%; height:41pt; border-bottom:1px #CCCCCC solid; padding-left:10pt; padding-right:10pt}

.t11{width:80%; float:left; font-size:12pt; line-height:41pt;}
.t12{width:20pt; height:20pt; margin-top:4%; float:right}
	
</style>
</head>

<body>
<div class="header text-center navbar-fixed-top">
	<a href="mine.php" style="float:left; height:30pt; width:30pt; margin-top:5pt; overflow:hidden"><img src="../CSS/后退白色.png"  style="width:100%" ></a>
  	<h1 style="font-size:17pt; color:#FFF; margin:0 10% ; line-height:40pt">设置 </h1>
</div>
<!--
<div class="t1" style=" margin-top:68pt">
	<div class="t11" >账号与安全</div>
    <div class="t12"><a href=""><img src="../CSS/下一页、前进灰色.png" style="width:100%"></a></div>
</div>
-->
<!--
<div class="t1">
	<div class="t11" >消息与提醒</div>
    <div class="t12" ><a href=""><img src="../CSS/下一页、前进灰色.png" style="width:100%"></a></div>
</div>
-->
<!--
<div class="t1">
	<div class="t11" >多语言</div>
    <div class="t12" ><a href=""><img src="../CSS/下一页、前进灰色.png" style="width:100%"></a></div>
</div>
-->
<!--
<div class="t1" style="margin-top:14pt">
	<div class="t11" >常用地址管理</div>
    <div class="t12"><a href=""><img src="../CSS/下一页、前进灰色.png" style="width:100%"></a></div>
</div>
-->
<div class="t1" onclick="window.location='../../xzf/userpoint.html'" style=" margin-top:68pt">
	<div class="t11" >用户指南</div>
    <div class="t12"><a href="../../xzf/userpoint.html"><img src="../CSS/下一页、前进灰色.png" style="width:100%"></a></div>
</div>
<div class="t1" onclick="window.location='../../xzf/question.html'" style="margin-top:14pt;">
	<div class="t11" >常见问题</div>
    <div class="t12" ><a href="../../xzf/question.html"><img src="../CSS/下一页、前进灰色.png" style="width:100%"></a></div>
</div>
<div class="t1" onclick="window.location='../../xzf/useragreement.htm'" >
	<div class="t11" >用户协议</div>
    <div class="t12"><a href="../../xzf/useragreement.htm"><img src="../CSS/下一页、前进灰色.png" style="width:100%"></a></div>
</div>
<div class="t1" onClick="window.location='../../xzf/aboutu.html'">
	<div class="t11" >关于我们</div>
    <div class="t12"><a href="../../xzf/aboutu.html"><img src="../CSS/下一页、前进灰色.png" style="width:100%"></a></div>
</div>

<div class="t1" style="margin-top:14pt; margin-bottom:18pt;">
	<div onClick="fn()" style=" font-size:14pt; line-height:44pt; color:#F00; text-align:center">退出当前账号</div>
    
</div>
</body>
</html>
<script src="../../js/Jquery/session.js"></script>
<script>function fn(){
		$.ajax({
			url:"../handfile/sessiondestory.php",
			type:"GET",
			dataType:"Text",
			success:function(data){console.log(data)},
		})
		localStorage.setItem("PhoneNumber"," ");
		$.session.set("PhoneNumber"," ");
		window.location.href="../../lhb/PHP/login.php";
		}
		
	</script>