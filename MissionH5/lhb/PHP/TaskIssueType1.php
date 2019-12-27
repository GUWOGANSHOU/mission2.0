<!DOCTYPE html>

<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta content="email=no" name="format-detection">
     
    <link href="../css/global.css" rel="stylesheet" type="text/css">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <script src="../js/htmlFontSize.js"></script>
	<script src="../js/jquery.js"></script>
</head>
<body style="background:#f1f1f3">
<header class="bin-fun">
    <div onClick="history.go(-1)"><img src="../images/fanhui.gif"></div>
    任务发布
</header>
<main class="main-ren">
    <div class="ren-c">任务类型</div>
    <ul>
        <li class="re-1">学习任务</li>
    </ul>
    <ul>
        <li class="re-2">维修任务</li>
        <li class="re-2">跑腿任务</li>
    </ul>
    <ul>
        <li class="re-3">兼职任务</li>
        <li class="re-3">物品收购</li>
        <li class="re-3">生活任务</li>
    </ul>
    <ul>
        <li class="re-2">艺术任务</li>
        <li class="re-2">陪同任务</li>
    </ul>
    <div class="w315" style="display: none;">
        紧急任务
    </div>
    <ul>
        <li class="re-1">其它</li>
    </ul>
</main>

</body>
</html>
<script src="../../js/Jquery/session.js"></script>
<script type="text/javascript">
	
$(document).ready(function(){
		if(localStorage.getItem("PhoneNumber")===" "||$.session.get("PhoneNumber")==="  "){
	window.location="../../lhb/PHP/login.php";
}
	$("ul li").on("touchstart",function(){window.location="TaskIssue1.php?Title="+$(this).text()+"&UserId="+$.session.get("PhoneNumber");})
})
</script>