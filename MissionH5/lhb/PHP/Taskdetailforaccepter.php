<?php $MissionMsgId=$_GET['MissionMsgId'];  
 $WIDout_trade_no=$_GET['WIDout_trade_no']; ?>
      
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

</head>
<body>
<header class="rtt-hea">
    <a id="back" onclick="history.go(-1)"><img src="../images/fanhui.gif"></a>任务发布明细
</header>
<div class="liuc">
    <div class="yes" id="i-1">已接单<img src="../images/shan.png" id="q-1"></div>
    <div class="yes" id="i-2">接单方确认<img src="../images/shan.png" id="q-2"></div>
    <div class="yes" id="i-3">发布方确认<img src="../images/shan.png" id="q-3"></div>
</div>
<main class="rtt-man">
    <section class="rtt-top">
        <div class="left" style="width:60pt;height:60pt;border-radius=30pt"><img  id="touxiang"src="../images/touxiu-1.png"style="width:100%;height:100%"></div>
        <div class="right" style="float:left; margin-left:15pt; font-size:16pt"><input readonly  style="background:none; color:#FFF; border:none"id="MissionPromulgatorId" type="text"></div>
        <a href=""  id="tel" style="  width:34pt; float:right; margin-right:25pt; margin-top:-15pt"><img src="../../hbl/CSS/电话.png" style=" width:100%;"></a>
        <div class="rtt-bot" style="margin-top:.20rem">
            <img src="../images/left-shu.gif"><br>
            任务被接受时双方就可以相互联系，就任务内容进行详细说明哦！
        </div>
        </section>
       
         <input id="MissionAccepterIdTel" type="hidden">
               <input id="MissionAccepterId1" type="hidden">

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
<input type="hidden"  value="" id="WIDout_trade_no">

<footer class="foot">
    <a id="Refund"  type="button"><div>撤销订单</div></a>
    <a id="compelete" type="button"><div>确认完成</div></a>
</footer>
</body>
</html>
<script src="../../js/Jquery/session.js"></script>
   

<script>
$(document).ready(function() {
	//alert(localStorage.getItem("PhoneNumber"));
	//console.log(localStorage.getItem('PhoneNumber'));
    if(!$.session.get("PhoneNumber")){
			//window.location.href="login.php";
		}
});

function getMsg_expressage(id){
	
	$.ajax({
		url:"../handfile/ExpressageHand.php?AlipayOutTradeNo=<?php echo $WIDout_trade_no ?>",
		dataType:"Json",
		Type:"GET",
		async:false,
		success:function(data){$.each(data,function(index,comment){
				var phone=comment.phonenumber;
				var phone1=phone.slice(-4);
		 		$("#pos").val(comment.buildingNum+"#"+comment.dormitory);
				$("#Detail").val(comment.deliverytype+"    取件号："+comment.deliverynumber+"    备注："+comment.note+"     下单人："+comment.username+"    手机尾号："+phone1 );
				ReadMsg_name(id);
		})},
		error:function(){}
	})
	
	}

$(function(){
	 $.ajax({
		url:"../handfile/Taskdetailhandle.php?MissionMsgId=<?php echo $MissionMsgId ?>",
		dataType:"Json",
		Type:"GET",
		success:function(data){$.each(data,function(index,comment){$("#Title").val(comment.MissionTitle);
		 $("#MissionAccepterId1").val(comment.MissionAccepterId);
		 $("#Reward").val(comment.MissionReward);
		 $("#MissionTimeDemand").val(comment.MissionTimeDemand);
	     $("#MissionAccepterIdTel").val(comment.MissionPromulgatorId);
		 
		 $("#WIDout_trade_no").val(comment.WIDout_trade_no);

		 
		 var phone=comment.MissionPromulgatorId;
	     $("#tel").attr("href","tel:"+phone+"");
		 
		 if($("#Title").val()=="快递代取"){
			 getMsg_expressage(comment.MissionPromulgatorId)
		}
		 else{
			$("#Detail").val(comment.MissionDescribe);
			$("#pos").val(comment.MissionPos);
		 	ReadMsg(comment.MissionPromulgatorId);
			
		 }
		 //comment.MissionState==2
		 State(comment.MissionState);
         console.log(phone);
		 ReadMsgForImage();
		})},
		error:function(){}
	})
})
</script>
    <script>
      function ReadMsgForImage(){
		
  	  $.ajax({
	  url:"../handfile/personalDataHandForImage.php?PhoneNumber="+$("#MissionAccepterIdTel").val(),
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
		function State(Ind) {
            var ind =Ind;
			if (ind==0){
                $(".liuc div").removeClass().addClass("no")
                $(".liuc img").attr("src","../images/xiaoyuan.gif");
				
			}else if (ind==1 && $("#Title").val()!=" 快递代取"){
                $("#i-2").removeClass().addClass("no");
                $("#i-3").removeClass().addClass("no");
                $("#q-2").attr("src","../images/xiaoyuan.gif");
                $("#q-3").attr("src","../images/xiaoyuan.gif");
			    $("#compelete").click(function(){updateMissionState_2();ind=2;});
				$("#Refund").click(function(){updateMissionState_0();ind=0;});
				
			}else if (ind==1 && $("#Title").val()==" 快递代取"){
                $("#i-2").removeClass().addClass("no");
                $("#i-3").removeClass().addClass("no");
                $("#q-2").attr("src","../images/xiaoyuan.gif");
                $("#q-3").attr("src","../images/xiaoyuan.gif");
				$("#compelete").click(function(){updateMissionState_2();ind=2;});
				$("#Refund").attr("onclick","alert('您不能撤销订单！请联系客服进行协商撤单！')")
				$("#Refund").removeAttr("href");
				
			}
			else if (ind==2){
                $("#i-3").removeClass().addClass("no");
                $("#q-3").attr("src","../images/xiaoyuan.gif");
				$("#Refund").click(function(){
									//window.location="../../xzf/handfile/RefundQuery.php?WIDout_trade_no="+ $("#WIDout_trade_no").val()+"&MissionMsgId=<?php echo $MissionMsgId ?>&MissionReward="+$("#Reward").val()+"&MissionAccepterIdTel="+$("#MissionAccepterIdTel").val()+"&MissionPromulgatorId="+$("#MissionPromulgatorId").val()+"&Title="+$("#Title").val()
									chexiaoHand($("#MissionAccepterIdTel").val());
									alert("请求已发送给发布方，双方协商共同撤单才算数哦！如有争议主动联系客服~");
									window.location.reload();
									});					
				$("#Refund").removeAttr("href");
				
			}else if (ind==3){
                $(".liuc div").removeClass().addClass("yes")
                $(".liuc img").attr("src","../images/shan.png");
				$("#compelete").children().text("订单已完成");
				$("#Refund").attr("onclick","alert('您已经确认完成订单！您不能撤销订单！请联系客服进行协商撤单！')")
				$("#Refund").removeAttr("href");
				
			}else if (ind==4){
				alert('该任务已被撤销！')
			   
			}
		}
       
	   function updateMissionState_2(){
		   $.ajax({
	 		 	url:"../handfile/taskupdateState_2.php?UserId="+$("#MissionAccepterId1").val()+"&MissionMsgId=<?php echo $MissionMsgId ?>",
	  			Type:"GET",
	 			dataType:"Json",
	  			success:function(data){
		  			 
					 insertMsg($("#MissionAccepterIdTel").val());
					 
					  console.log(data);
					$("#i-2").removeClass().addClass("yes");
                    $("#q-2").attr("src","../images/shan.png");
					$("#i-3").removeClass().addClass("no");
                    $("#q-3").attr("src","../images/xiaoyuan.gif");
					  alert('确认操作完成!');
					EmailHandle($("#MissionAccepterIdTel").val());
	 			 },
	 		    error:function(XMLHttpRequest){
		 			 console.log(XMLHttpRequest.readyState);
					 
	 			 },
			})
	   }

	   function insertMsg(id){  //通知发布者接受者已确认完成
		    $.ajax({
	 		 	url:"../handfile/insertMsg_proAcceot.php",
	  			type:"POST",
	 			dataType:"Json",
				data:{"PhoneNumber":id,"MissionMsgId":'<?php echo $MissionMsgId ?>'},
				async:false,
	  			success:function(data){
		  			console.log(data);

	 			 },
	 		    error:function(XMLHttpRequest){
		 			 console.log(XMLHttpRequest.readyState)
	 			 }
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
				   $("#MissionPromulgatorId").val(comment.NickName);

				  
		  	  })},
    })}
	
	
	function ReadMsg_name(id){
  	  $.ajax({
	  url:"../../hbl/handfile/personalDataHand.php?PhoneNumber="+id,
	  type:"GET",
	  async:"true",
	  dataType:"Json",
	  cache:"true",
	  success:function(data){$.each(data,function(index,comment){
				   $("#MissionPromulgatorId").val(comment.UserName);
					console.log(comment.UserName);
				  
		  	  })},
    })}
	    function updateMissionState_0(){
		   $.ajax({
	 		 	url:"../handfile/updateMissionState_0_accept.php?UserId="+$("#MissionAccepterId1").val()+"&MissionMsgId=<?php echo $MissionMsgId ?>",
	  			Type:"GET",
	 			dataType:"Json",
	  			success:function(data){
					console.log(data);
					updateMissionAccepter();
					alert('撤单成功！');
					EmailHandle1($("#MissionAccepterIdTel").val());
					insertMsg_Canle($("#MissionAccepterIdTel").val());
					
	 			 },
	 		    error:function(XMLHttpRequest){
		 			 console.log(XMLHttpRequest.readyState)
	 			 },
			})
	   }
 function chexiaoHand(MissionAcceptorId){
	  	$.ajax({
		url:"../handfile/EmailHandle.php",
		type:"GET",
		data:{"MissionPromulgatorId":MissionAcceptorId},
		dataType:"Json",
		success:function(data){$.each(data,function(index,comment){
             SendweChat_chexiao("<?php echo $WIDout_trade_no; ?>","<?php echo $MissionMsgId; ?>",$("#Title").val(),comment.OpenId,MissionAcceptorId,$("#MissionAccepterId1").val(),$("#Reward").val());
		 	console.log(MissionAcceptorId);					 
		}
	)},
		error:function(){
	},
	})
  }
  		function SendweChat_chexiao(WIDout_trade_no,MissionMsgId,Title,openid,MissionPromulgatorId,MissionAccepterIdTel,MissionReward){
		$.ajax({
		url:"../../weixin/php/WechatSendForchexiao_a.php",
		type:"GET",
		data:{"openid":openid,"Note":"接受者向您申请撤销订单，如若双方协商成功请点击详情协助发布方完成撤销，如有异议主动联系客服哦！","WIDout_trade_no":WIDout_trade_no,"MissionTitle":Title,"MissionMsgId":MissionMsgId,"MissionPromulgatorId":MissionPromulgatorId,"MissionAccepterIdTel":MissionAccepterIdTel,"MissionReward":MissionReward},
		dataType:"Text",
		success:function(data){
			console.log(openid);
			console.log(MissionAccepterIdTel);
			//window.location='mymission.php'
			},
		error:function(){
			 console.log(XMLHttpRequest.status);
 			 console.log (XMLHttpRequest.readyState);
 			 console.log (textStatus);
			},
	})}
	    function insertMsg_Canle(id){  //通知发布者接受者已取消
		    $.ajax({
	 		 	url:"../handfile/insertNotice_AccpterCancle.php?PhoneNumber="+id+"&MissionMsgId=<?php echo $MissionMsgId ?>",
	  			Type:"GET",
	 			dataType:"Json",
				async:false,
	  			success:function(data){
		  			console.log(data);
					//window.location="mymission.php";
	 			 },
	 		    error:function(XMLHttpRequest){
		 			 console.log(XMLHttpRequest.readyState)
	 			 },
			})
	   }
	    function updateMissionAccepter(){  //更新接受者id为空
		   $.ajax({
	 		 	url:"../handfile/updateMissionAcceprt.php?UserId="+$("#MissionAccepterId1").val()+"&MissionMsgId=<?php echo $MissionMsgId ?>",
	  			Type:"GET",
	 			dataType:"Json",
	  			success:function(data){
					console.log(data);
	 			 },
	 		    error:function(XMLHttpRequest){
		 			 console.log(XMLHttpRequest.readyState)
	 			 },
			})
	   }
		   //发布者邮箱读取
function EmailHandle(MissionAcceptorId){
	  	$.ajax({
		url:"../handfile/EmailHandle.php",
		type:"GET",
		data:{"MissionPromulgatorId":MissionAcceptorId},
		dataType:"Json",
		success:function(data){$.each(data,function(index,comment){
			SendEmail(comment.Email);console.log(comment.Email);
			SendweChat("<?php echo $WIDout_trade_no; ?>","<?php echo $MissionMsgId; ?>",$("#Title").val(),comment.OpenId);
            window.location.reload();;
		 }							 
									 
	)},
		error:function(){console.log('emailfail');$("#SUBBT").before("<p style='font-size:14px'>对方没有设置QQ邮箱！您可以自行联系任务发布者哦！</p>")},
	})
  }
  function EmailHandle1(MissionAcceptorId){
	  	$.ajax({
		url:"../handfile/EmailHandle.php",
		type:"GET",
		data:{"MissionPromulgatorId":MissionAcceptorId},
		dataType:"Json",
		success:function(data){$.each(data,function(index,comment){
			SendweChat_cancle("<?php echo $WIDout_trade_no; ?>","<?php echo $MissionMsgId; ?>",$("#Title").val(),comment.OpenId);
           window.location.reload();
		 }							 
									 
	)},
		error:function(){console.log('emailfail');$("#SUBBT").before("<p style='font-size:14px'>对方没有设置QQ邮箱！您可以自行联系任务发布者哦！</p>")},
	})
  }
	function SendEmail(Email){
			$.ajax({
		url:"../../phpmailer/index.php",
		type:"GET",
		data:{"Email":Email,"Note":"您发布的任务被接受者确认完成了！请及时查看并确认任务完成！"},
		dataType:"Text",
		success:function(data){$("#SUBBT").before("<p style='font-size:14px;width:100%;text-align:center;'>邮件提示成功！</p>")},
		error:function(){$("#SUBBT").before("<p style='font-size:14px'>网络异常！请稍后再试</p>")},
	})}//确认任务后发送邮箱
	function SendweChat(WIDout_trade_no,MissionMsgId,Title,openid){
			$.ajax({
		url:"../../weixin/php/WechatSendForConfirm.php",
		type:"GET",
		data:{"openid":openid,"Note":"您发布的任务被接受者确认完成了！请及时查看并确认任务完成！","WIDout_trade_no":WIDout_trade_no,"MissionTitle":Title,"MissionMsgId":MissionMsgId},
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
	function SendweChat_cancle(WIDout_trade_no,MissionMsgId,Title,openid){
			$.ajax({
		url:"../../weixin/php/WechatSendForConfirm.php",
		type:"GET",
		data:{"openid":openid,"Note":"您发布的任务被接受者取消了","WIDout_trade_no":WIDout_trade_no,"MissionTitle":Title,"MissionMsgId":MissionMsgId},
		dataType:"Text",
		success:function(data){
			console.log(openid);
			console.log(data);
			window.location='mymission.php'
			},
		error:function(){
			 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
			},
	})}
    </script>