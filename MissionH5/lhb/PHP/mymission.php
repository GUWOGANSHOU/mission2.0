<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta content="email=no" name="format-detection">

    <script src="../js/htmlFontSizee.js"></script>
    <script src="../js/jquery.js"></script>
    <link href="../css/globall.css" rel="stylesheet" type="text/css">
    <link href="../css/stylee.css" rel="stylesheet" type="text/css">
    <script>
	$(document).ready(function() {
    if(!$.session.get("PhoneNumber")){
			window.location.href="login.php";
		}
});
        $(function () {
            $(".yifabbu").on("touchstart",function () {
                if ($("[name=yifabbu]").is(":hidden")){
                    $("[name=yifabbu]").slideDown();
                    $("#yifabbu").attr("src","../images/shang.gif")
                }else {
                    $("[name=yifabbu]").slideToggle(200);
                    $("#yifabbu").attr("src","../images/pp.png")
                }
            })
            $(".yifabbu-1").on("touchstart",function () {
                if ($("[name=yifabbu-1]").is(":hidden")){
                    $("[name=yifabbu-1]").slideDown();
                    $("#yifabbu-1").attr("src","../images/shang.gif")
                }else {
                    $("[name=yifabbu-1]").slideToggle(200);
                    $("#yifabbu-1").attr("src","../images/pp.png")
                }
            })
            $(".yifabbu-2").on("touchstart",function () {
                if ($("[name=yifabbu-2]").is(":hidden")){
                    $("[name=yifabbu-2]").slideDown();
                    $("#yifabbu-2").attr("src","../images/shang.gif")
                }else {
                    $("[name=yifabbu-2]").slideToggle(200);
                    $("#yifabbu-2").attr("src","../images/pp.png")
                }
            })
			
        })
    </script>
</head>
<body style="background:#e7e7e7" >
<header class="rtt-hea" style="position: fixed">
    <a href="../../hbl/PHP/mine.php"><img src="../images/fanhui.gif"></a>我的任务
</header>
	<div style="height: 50px;width: 100%"></div>
<main class="des">
    <section class="des-1" id="MissionPromulgate">
        <div class="yifabbu">已发布任务<img src="../images/shang.gif" id="yifabbu"></div>
        <a id="MoreAppend" Onclick="MoreMsg()"><div class="chakna" name="yifabbu">查看更多</div></a>
        <a id="MissionPromulgateA1" href="../../lhb/PHP/TaskdetailPromulgator.php"><div class="renwu"  name="yifabbu">
            <label id="MissionPromulgateTitle"></label><br>
            <span id="MissionPromulgateDetail"></span>
            <span id="MissionMsgId" style="display: none"></span>
        </div></a>
        <a id="MissionPromulgateA2" href="../../lhb/PHP/TaskdetailPromulgator.php"><div class="renwu" name="yifabbu"> 
            <label id="MissionPromulgateTitle"></label><br>
            <span id="MissionPromulgateDetail"></span>
            <span id="MissionMsgId" style="display: none"></span> </div></a>
    </section>
    <section class="des-1">
        <a href="#"> <div id="accepted" class="yifabbu-1">已接受任务<img src="../images/shang.gif" id="yifabbu-1"></div></a>
<!--
       <a href="" ><div class="renwu"  name="yifabbu-1"><br>
            <a href="" id="accepted1">
            <span></span>
        </div></a>
         <a href="" ><div class="renwu"  name="yifabbu-1"><br>
            <a href="" id="accepted2">
            <span></span>
        </div></a>
-->
       
    </section>
    <section class="des-1">
        <a href="#" ><div class="yifabbu-2" id="Complete">完成的任务<img src="../images/shang.gif" id="yifabbu-2"></div></a>
<!--
        <a href="#"  style="">
            <div class="renwu" name="yifabbu-2">
            <label> </label><br>
            <span> </span>
        </div>
        </a>
-->
<!--        <a href="#"><div class="renwu"name="yifabbu-2">  </div></a>-->
    </section>
</main>

</body>
</html>
<script src="../../js/Jquery/session.js"></script>
<script type="text/javascript">
	$.ajax({
		url:"../handfile/mymissionhandleforMissionPromulgatorId.php?PhoneNumber="+$.session.get("PhoneNumber"),
		dataType:"Json",
		Type:"GET",
		success:function(data){
			$.each(data,function(index,comment){
		
				$("#MissionPromulgateA"+(index+1)+ " #MissionPromulgateTitle").text(comment.MissionTitle);
		 $("#MissionPromulgateA"+(index+1)+" #MissionPromulgateDetail").text(comment.MissionDescribe); 
		$("#MissionPromulgateA"+(index+1)).attr("href",$("#MissionPromulgateA"+(index+1)).attr("href")+"?MissionMsgId="+comment.MissionMsgId+"&WIDout_trade_no="+comment.WIDout_trade_no);}
		)
		},
	})//读取默认两条自己发布任务的记录
	
	function MoreMsg(){
		
		$.ajax({
		url:"../handfile/mymissionhandleforMissionPromulgatorId.php?PhoneNumber="+$.session.get("PhoneNumber"),//More必填才能获取更多信息
		dataType:"Json",
		Type:"GET",
		success:function(data){$.each(data,function(index,comment){
		
			$("#MoreAppend").after("<a id='MissionPromulgateA1' href='../../lhb/PHP/TaskdetailPromulgator.php?MissionMsgId="+comment.MissionMsgId+"&WIDout_trade_no="+comment.WIDout_trade_no+"'><div class='renwu'  name='yifabbu'><label id='MissionPromulgateTitle'>"+comment.MissionTitle+"</label><br><span id='MissionPromulgateDetail'>"+comment.MissionDescribe+"</span><span>"+comment.MissionPromulgatorTime+"</span><span id='MissionMsgId' style='display: none'>"+comment.MissionMsgId+"</span></div></a>")
			
		});},
		complete:function(){
			$("#MoreAppend").removeAttr("Onclick");
		}
	})//读取更多记自己发布的任务的记录
	}
	
	function accepter(){
	   $.ajax({
	   url:"../handfile/mymissionhandleforMissionAccepterId.php?PhoneNumber="+$.session.get("PhoneNumber")+"&More=1",
	   dataType:"Json",
	   Type:"GET",
	   success: function(data){$.each(data,function(index,comment){
			$("#accepted").after("<a href='../../lhb/PHP/Taskdetailforaccepter.php?MissionMsgId="+comment.MissionMsgId+"&WIDout_trade_no="+comment.WIDout_trade_no+"'><div class='renwu'  name='yifabbu-1'><label id=>"+comment.MissionTitle+"</label><br><span>"+comment.MissionDescribe+"</span><span>"+comment.MissionAccepterITime+"</span><span style='display: none'>"+comment.MissionMsgId+"</span></div></a>")})
			}
	   })
	}
	accepter()//读取自己接受的任务信息
	
	//完成的任务信息
		function Complete(){
	   $.ajax({
	   url:"../handfile/mymissionhandleforComplete.php?PhoneNumber="+$.session.get("PhoneNumber")+"&More=1",
	   dataType:"Json",
	   Type:"GET",
	   success: function(data){$.each(data,function(index,comment){
			console.log(comment);
			$("#Complete").after("<a href='../../lhb/PHP/Taskdetailforaccepter.php?MissionMsgId="+comment.MissionMsgId+"&WIDout_trade_no="+comment.WIDout_trade_no+"'><div class='renwu'  name='yifabbu-2'><label id=>"+comment.MissionTitle+"</label><br><span>"+comment.MissionDescribe+"</span><span style='display: none'>"+comment.MissionMsgId+"</span></div></a>")});
			$(".yifabbu-2").trigger("click");
			}
	   })
	}
	Complete()
	
	

	
</script>