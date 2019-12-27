<?php $MissionMsgId=$_GET['MissionMsgId'];  
      $WIDout_trade_no=$_GET['WIDout_trade_no'];?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta content="email=no" name="format-detection">

    <script src="../js/htmlFontSizee.js"></script>
    <script src="../js/jquery.js"></script>
    <link href="../css/globall.css" rel="stylesheet" type="text/css">
    <link href="../css/stylee.css" rel="stylesheet" type="text/css">

</head>
<body>
<header class="rtt-hea">
    <a onclick="history.go(-1)"><img src="../images/fanhui.gif"></a>任务发布明细
</header>
<div class="liuc">
    <div class="yes" id="i-1">已接单<img src="../images/shan.png" id="q-1"></div>
    <div class="yes" id="i-2">接单方确认<img src="../images/shan.png" id="q-2"></div>
    <div class="yes" id="i-3">发布方确认<img src="../images/shan.png" id="q-3"></div>
</div>
<main class="rtt-man">
    <section class="rtt-top">
        <div class="left"><img src="../images/touxiu-1.png"></div>
        <div class="right">super campus sercives</div>
        <div class="rtt-bot" style="margin-top:-6pt">
            <img src="../images/left-shu.gif"><br>
            任务被接受时双方就可以相互联系，就任务内容进行详细说明哦！
        </div>
        </section>
            <section class="rtt-ma-1">
        <div  class="left">
            接单者
        </div>
        <input id="MissionPromulgatorId" type="text">
    </section>
    </section>
    <section class="rtt-ma">
        <div class="left">
            我的任务
        </div>
        <ul class="right">
           <li class="li-1"><input id="Title" type="text" placeholder="请输入标题"></li>
           <li class="li-2"><textarea id="Detail">请描述您的任务</textarea></li>
        </ul>
    </section>
    <section class="rtt-ma-1">
        <div class="left">
            交付地点
        </div>
        <input id="pos" type="text">
        <a href="#"><img src="../images/didian.png"></a>
    </section>
    <section class="rtt-ma-1">
        <div class="left">
            任务赏金
        </div>
        <input id="Reward" type="text" >
        <a href="#"><img src="../images/moneyy.png"></a>
    </section>
    <section class="rtt-ma-1">
        <div class="left">
            时间要求
        </div>
        <input id="MissionTimeDemand" type="text" >
        <a href="#"><img src="../images/timee.png"></a>
    </section>
</main>

<footer class="foot">
    <a id="Refund" href="../../xzf/handfile/RefundQuery.php?WIDout_trade_no=<?php echo $WIDout_trade_no; ?>"><div>撤销订单</div></a>
    <a id="compelete" href=""><div>确认完成</div></a>
</footer>
</body>
</html>

<script>
	 $.ajax({
		url:"../handfile/Taskdetailhandle.php?MissionMsgId=<?php echo $MissionMsgId ?>",
		dataType:"Json",
		Type:"GET",
		success:function(data){$.each(data,function(index,comment){$("#Title").val(comment.MissionTitle);
		 $("#Detail").val(comment.MissionDescribe);$("#pos").val(comment.MissionPos);
	     $("#Detail").val(comment.fileName);   
		 $("#Reward").val(comment.MissionReward);
		 $("#MissionTimeDemand").val(comment.MissionTimeDemand);
	     $("#MissionPromulgatorId").val(comment.MissionPromulgatorId)
	     State(comment.MissionState);
		})},
		error:function(){alert(0);history.go(-1)}
	})
</script>
    <script>
       function State (Ind) {
            var ind =Ind;
            if (ind==0){
                $(".liuc div").removeClass().addClass("no")
                $(".liuc img").attr("src","../images/xiaoyuan.gif");
		     	$("#compelete").attr("onclick","alert('还没有人接单！您不能确认！')");//确认状态验证
				$("#Refund").attr("onclick","return confirm('您确定要撤销订单？')");//撤销订单验证
				//下同
            }else if (ind==1){
                $("#i-2").removeClass().addClass("no");
                $("#i-3").removeClass().addClass("no");
                $("#q-2").attr("src","../images/xiaoyuan.gif");
                $("#q-3").attr("src","../images/xiaoyuan.gif");
			    $("#compelete").attr("onclick","alert('接单方还未确认完成任务！您不能确认')")
				$("#Refund").attr("onclick","alert('已经有人接单了！您不能撤销订单！请联系接单人员进行协商撤单！')");
				$("#Refund").removeAttr("href");
            }else if (ind==2){
                $("#i-3").removeClass().addClass("no");
                $("#q-3").attr("src","../images/xiaoyuan.gif");
				$("#compelete").attr("href","../handfile/MissionConfirmhandle.php?MissionMsgId=<?php echo $MissionMsgId ?>");
				$("#compelete").attr("onclick","return confirm('您确定要确认完成？')");
				$("#Refund").attr("onclick","alert('接单员已经确认完成订单！您不能撤销订单！请联系接单人员进行协商撤单！')")
				$("#Refund").removeAttr("href");
            }else if (ind==3){
                $(".liuc div").removeClass().addClass("yes")
                $(".liuc img").attr("src","../images/shan.png");
				$("#compelete").children().text("订单已完成");
				$("#Refund").attr("onclick","alert('您已经确认完成订单！您不能撤销订单！请联系接单人员进行协商撤单！')")
				$("#Refund").removeAttr("href");
            }
        }

    </script>