<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
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
    <a href='../../hbl/PHP/IndexAcceptedTask.php'><img src="../images/fanhui.gif"></a>任务明细
</header>
<main class="rtt-man">
    <section class="rtt-top">
<div class="left" style="width:60pt;height:60pt;border-radius=30pt"><img  id="touxiang"src="../images/touxiu-1.png"style="width:100%;height:100%"></div>
        <div class="right" style="float:left; margin-left:15pt; font-size:18pt">
        <input readonly  style="background:none; color:#FFF; border:none" id="MissionPromulgatorIdName" type="text">
        </div>
        <a href=""  id="tel" style="  width:34pt; float:right; margin-right:25pt; margin-top:-15pt"><img src="../../hbl/CSS/电话.png" style=" width:100%;"></a>       
         <div class="rtt-bot" style="margin-top:.50rem">
        <div class="rtt-bot" style="margin-top:-.44rem; font-size:10pt">
            <img src="../images/left-shu.gif"><br>
            任务被接受时双方就可以相互联系，就任务内容进行交接并进行赏金的调整哦
        </div>
    </section>
    
    <section class="rtt-ma">
        <div class="left">
            我的任务
        </div>
        <ul class="right">
           <li class="li-1"><input type="text" id="MissionTitle" placeholder="请输入标题"></li>
           <li class="li-2"><textarea id="MissionDescribe">请描述您的任务</textarea></li>
        </ul>
    </section>
    <section class="rtt-ma-1">
        <div class="left">
            交付地点
        </div>
        <input type="text" id="MissionPos">
        <a href="#"><img src="../images/didian.png"></a>
    </section>
    <section class="rtt-ma-2">
        <div class="left">
            任务赏金
        </div>
        <input type="text" id="MissionReward">
    </section>
    <section class="rtt-ma-1">
        <div class="left">
            时间要求
        </div>
        <input type="text" id="MissionTimeDemand" >
    </section>
</main>
<input id="UserId" type="hidden" value="<?PHP echo $_GET['UserId'] ;?>"/>
<input id="MissionMsgId"  type="hidden"  value="<?php echo $_GET['MissionMsgId']; ?>"/>
<input id="MissionPromulgatorId"  type="hidden"value=""/>
<input type="hidden"  value="" id="WIDout_trade_no">

<div class="rtt-bt" style="margin-top: -50px">
    
    <button id="SUBBT" style="height: 30px; width: 100px;background: rgb(218,218,218)" disabled="disabled"  onClick="">此单被抢！</button>
	
</div>

</body>
</html>
<script src="../../js/Jquery/session.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    if(!$.session.get("PhoneNumber")){
			window.location.href="login.php";
		}
});
function MissionUserGet(){
	$.ajax({
		url:"../../hbl/handfile/MissionUser_Get.php",
		type:"GET",
		data:{"PhoneNumber":$.session.get("PhoneNumber")},
		dataType:"Json", 
		async:false,
		success:function(data){$.each(data,function(index,comment){
			if(comment.AuditState!=1){
				$("#SUBBT").attr('onClick','').bind('click',function(){alert('您必须认证并通过审核才可以使用此功能');})
				$("#SUBBT").attr("disabled","disabled").css("background","rgb(218,218,218)").text("您不能接单");
			}else if(comment.AuditState==1){
				Read();
				//$("#SUBBT").attr("disabled",false).css("background","rgb(0,187,137)").text("接受任务");
			}
		})},
		error:function(){
			alert("请先登录！")
			window.location="login.php";
		}
	})
}
function ReadMsgForImage(){
		
  	  $.ajax({
	  url:"../handfile/personalDataHandForImage.php?PhoneNumber="+$("#MissionPromulgatorId").val(),
	  type:"GET",
	  async:false,
	  dataType:"Json",
	  
	  success:function(data){$.each(data,function(index,comment){
			
				  if(comment.UserImage){ 
                 var str=comment.UserImage;
			    var re=new RegExp(" ","g");
			   Newstr=str.replace(re,"+");
			 	 $("#touxiang").attr("src",Newstr);
				  }else{}
		  	  })
			  },
    })
	}
$(function(){
	MissionUserGet();
	})
	function TaskAcceptSubmit(){
		$.ajax({
		url:"../handfile/TaskAcceptSubmitHandle.php",
		type:"POST",
		data:{"MissionMsgId":$("#MissionMsgId").val(),"UserId":$("#UserId").val()},
		dataType:"Json",
		success:function(data){
			
		    $("#SUBBT").attr("disabled","disabled").css({"background":"rgb(218,218,218)","height":"35px"}).text(data);
			if(data=="抢单成功"){
			EmailHandle($("#MissionPromulgatorId").val());

		    insertMsg();}
		},
		})
	}
	function Read(){
		
	$.ajax({
		url:"../handfile/TaskAcceptHandle.php",
		type:"GET",
		data:{"MissionMsgId":$("#MissionMsgId").val()},
		dataType:"Json",
		success:function(data){$.each(data,function(index,comment){
			console.log(comment);
			$("#MissionPromulgatorId").val(comment.MissionPromulgatorId);
			$("#MissionTitle").val(comment.MissionTitle);
			if(comment.MissionTitle==' 快递代取'){
				$("#MissionDescribe").val('接单后见快件详情');
			}else{   $("#MissionDescribe").val(comment.MissionDescribe);}
			$("#MissionPos").val(comment.MissionPos);
			$("#MissionReward").val(comment.MissionReward);
			$("#WIDout_trade_no").val(comment.WIDout_trade_no);
			$("#MissionTimeDemand").val(comment.MissionTimeDemand);
			var phone=comment.MissionPromulgatorId;
	        $("#tel").attr("href","tel:"+phone+"");
			ReadMsg(comment.MissionPromulgatorId);	
			ReadMsgForImage();			
			console.log(comment.MissionAccepterId);
			if(comment.MissionAccepterId){
            $("#SUBBT").attr("disabled","disabled").css("background","rgb(218,218,218)").text("此单被抢！");
			}else{
			$("#SUBBT").removeAttr("disabled").css("background","#08be8e").text("接受任务").attr("onclick","TaskAcceptSubmit()");
			}
		})}
	})
	}
function ReadMsg(id){
  	  $.ajax({
	  url:"../../hbl/handfile/personalDataHand.php?PhoneNumber="+id,
	  type:"GET",
	  async:"true",
	  dataType:"Json",
	  cache:"true",
	  success:function(data){$.each(data,function(index,comment){
				  $("#MissionPromulgatorIdName").val(comment.NickName);

				  
		  	  })},
    })}
  function EmailHandle(MissionPromulgatorId){
	  	$.ajax({
		url:"../handfile/EmailHandle.php",
		type:"GET",
		data:{"MissionPromulgatorId":MissionPromulgatorId},
		dataType:"Json",
		success:function(data){$.each(data,function(index,comment){
			SendEmail(comment.Email);console.log(comment.Email);
           SendweChat($("#WIDout_trade_no").val(),$("#MissionMsgId").val(),$("#MissionTitle").val(),comment.OpenId);
		 }							 
									 
	)},
		error:function(){console.log('emailfail');$("#SUBBT").before("<p style='font-size:14px'>对方没有设置QQ邮箱！您可以自行联系任务发布者哦！</p>")},
	})
  }
	function SendEmail(Email){
			$.ajax({
		url:"../../phpmailer/index.php",
		type:"GET",
		data:{"Email":Email},
		dataType:"Text",
		success:function(data){$("#SUBBT").before("<p style='font-size:14px;width:100%;text-align:center;'>邮件提示成功！</p>")},
		error:function(){$("#SUBBT").before("<p style='font-size:14px'>网络异常！请稍后再试</p>")},
	})}
   function insertMsg(){
		    $.ajax({
	 		 	url:"../handfile/insertMsg_accept.php",
	  			type:"GET",
	 			dataType:"Json",
				data:{"PhoneNumber":$("#MissionPromulgatorId").val(),"MissionMsgId":$("#MissionMsgId").val()},
				async:false,
	  			success:function(data){
		  			console.log($("#MissionPromulgatorId").val());
	 			 },
	 		    error:function(XMLHttpRequest){
		 			 console.log(XMLHttpRequest.readyState)
	 			 },
			})
	   }
function SendweChat(WIDout_trade_no,MissionMsgId,Title,openid){
			$.ajax({
		url:"../../weixin/php/WechatSendForConfirm.php",
		type:"GET",
		data:{"openid":openid,"Note":"您的任务被接走啦！快点击查看吧","WIDout_trade_no":WIDout_trade_no,"MissionTitle":Title,"MissionMsgId":MissionMsgId},
		dataType:"Text",
		success:function(data){
			console.log(openid);
			console.log(data);
			},
		error:function(){
			 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
			},
	})}

	</script>