
<!doctype html>
<html lang="en">
<head>

<title>通知中心</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta content="email=no" name="format-detection">
    <link rel="stylesheet" href="../../hbl/CSS/bootstrap.min.css">
    <link href="../css/global.css" rel="stylesheet" type="text/css">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="../css/loading.css">
 <script src="../../hbl/JS/bootstrap.min.js"></script>
<script src="../js/htmlFontSize.js"></script>
    <script src="../js/jquery.js"></script>
    <script>
	$(document).ready(function() {
    if($.session.get("PhoneNumber")=="undefined"){
			window.location.href="login.php";
		}
});
        $(function(){
            $(".right").click(function(){
                $(".zzc").show();
                $(".pc-tc").show();
            })
            $(".zzc").click(function(){
                $(".zzc").hide();
                $(".pc-tc").hide();
            })
        })
    </script>

</head>

<body style="background: #f1f1f2">

<div style="width:100%; height:100%; margin:0 auto">
  <div id="loading"  style=" margin-left:40%;display:none; width:65pt; height:65pt"class="canvas canvas5">
    <div class="spinner5"></div>   
  </div>
</div>

<header class="ind-hed" style="position: fixed;z-index: 99">
   <div class="left"> <a   href="../../hbl/PHP/IndexAcceptedTask.php"><img src="../../hbl/CSS/后退白色.png"></a></div>
    <div class="center"><img src="../images/center.gif">通知中心</div>
    <div class="right"><img src="../images/more-o.png"></div>
</header>

    <div id="blanckbar"  style="width:100%; height:52pt; background:#F1F1F2;"></div>
<!--    <section class="ind-ma">
        <div class="quwen">通知中心</div>
        <div class="quwen-1">今日趣闻今日趣闻今日趣闻今日趣闻</div>
        <div class="quwen-1" style='font-size:10px; color:#F00; position:relative; top:2rem; left:4.4rem'>"+comment.Time+"</div>
        <img src="../images/quwen-1.gif" class="quen">
        
        <img src="../images/quwen-4.gif" class="jiaoluo">
    </section>
    -->
    
    <!--<section class="ind-ma">
        <div class="quwen">今日福利</div>
        <div class="quwen-1">
            　夏天到了，炎热也来了，炎炎夏日。夏天虽然美妙，但酷热的天气真是让我们吃不消，这时的太阳精力正旺
            ，四处释放着自己的能量，搞的人们近而远之，躲在家里。夏天的街上车辆不多，行人很少。地面被晒的滚烫，
            脆弱的皮肤无法与暴露在阳光下的金属接触。
        </div>
        <img src="../images/quwen-2.gif" class="quen">
        <img src="../images/quwen-4.gif" class="jiaoluo">
    </section>
    <section class="ind-ma">
        <div class="quwen">冷知识科普</div>
        <div class="quwen-1">很多人都不知道</div>
        <img src="../images/quwen-3.gif" class="quen">
        <img src="../images/quwen-4.gif" class="jiaoluo">
    </section>-->


<!--
<footer class="inde-foot" style="display: none;">
    <div class="left"><img src="../images/pintai.png">任务平台</div>
    <div class="right"><img src="../images/yeban.gif">夜半来聊</div>
</footer>
-->

<!--

<section class="pc-tc">
    <ul>
        <li class="w42"><img src="../images/p-1.gif">广告</li>
        <li class="w34"><img src="../images/p-2.gif">课程提醒</li>
        <li class="w42"><img src="../images/p-3.gif">好友消息</li>
        <li class="w38"><img src="../images/p-4.gif">推荐接受任务</li>
        <li class="w51"><img src="../images/p-5.gif">发布任务已被接走</li>
        <li class="w40"><img  src="../images/p-6.gif">已接任务被调整</li>
    </ul>
</section>
-->

</body>
</html>
<script src="../../js/Jquery/session.js"></script>
<script type="text/javascript">
    
	$(document).ajaxStart(function(){$("#loading").slideToggle(1)});
	$(document).ajaxStop(function(){$("#loading").slideToggle(1)});
function MissionMsgGet(){
	$.ajax({
		url:"../../lhb/handfile/notifthandle.php?UserId="+$.session.get("PhoneNumber"),
		Type:"POST",
		data:"",
		dataType:"Json",
		success:function(data){$.each(data,function(index,comment){
//			var url;
//			if($.session.get("PhoneNumber")==comment.ToId){ url="TaskdetailPromulgator.php?MissionMsgId="+comment.Missionid}
//			else{url="Taskdetailforaccepter.php?MissionMsgId="+comment.Missionid}
			
				url=MissiondetailGet(comment.Missionid,comment.ToId);
			
			$("#blanckbar").after("<div class='ind-ma'><div class='quwen'>"+comment.FromId+"</div><div class='quwen-1'>"+comment.Content+"</div><img src='../images/quwen-1.gif' class='quen'><div  style='font-size:10px; color:#F00; position:relative; top:1.7rem; left:4.0rem;width:150px'>"+comment.Time+"</div><a href='"+url+"'><img src='../images/quwen-4.gif' id='more_1' class='jiaoluo'></a></div> ");
		
			
				
		})}
	})
}

function MissiondetailGet(MissionMsgId,ToId){
	var url;
	$.ajax({
		url:"../handfile/Taskdetailhandle.php?MissionMsgId="+MissionMsgId,
		dataType:"Json",
		Type:"GET",
		async:false,
		success:function(data){
			$.each(data,function(index,comment){
			
			   if($.session.get("PhoneNumber")==comment.MissionPromulgatorId && ToId==comment.MissionPromulgatorId && comment.MissionState!=4 &&comment.MissionState!=3 ){ url="TaskdetailPromulgator.php?MissionMsgId="+comment.MissionMsgId+"&WIDout_trade_no="+comment.WIDout_trade_no}
			   else if($.session.get("PhoneNumber")==comment.MissionAccepterId && ToId==comment.MissionAccepterId &&comment.MissionState!=3 && comment.MissionState!=4){url="Taskdetailforaccepter.php?MissionMsgId="+comment.MissionMsgId+"&WIDout_trade_no="+comment.WIDout_trade_no}
			   else if($.session.get("PhoneNumber")==comment.MissionAccepterId && ToId==comment.MissionAccepterId &&comment.MissionState==3){url="wallet_massage.php"}   //订单完成通知接受者链接钱包
			   else if($.session.get("PhoneNumber")==comment.MissionPromulgatorId && ToId==comment.MissionPromulgatorId &&comment.MissionState==3){url="wallet_massage.php"}    //订单完成通知发布者链接钱包
			   else if($.session.get("PhoneNumber")==comment.MissionPromulgatorId && ToId==comment.MissionPromulgatorId &&comment.MissionState==4 ){url="wallet_massage.php"}  //发布者撤销订单通知发布者链接钱包
			   else if($.session.get("PhoneNumber")==comment.MissionAccepterId && ToId==comment.MissionAccepterId &&comment.MissionState==4 ){url="Taskdetailforaccepter.php?MissionMsgId="+comment.MissionMsgId+"&WIDout_trade_no="+comment.WIDout_trade_no}    //发布者撤销订单通知接受者链接任务详情
			   
			}
	    )},
		error:function(){
			 url="../../hbl/PHP/IndexAcceptedTask.php";
			}
	})
	return url;
}

$(document).ready(function(){
		
		MissionMsgGet();
	
	})
function fn(MissionMsgId){window.location='../../lhb/PHP/TaskAccept.php?MissionMsgId='+MissionMsgId}
</script>