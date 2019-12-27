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
    <a onclick="history.go(-1)"><img src="../images/fanhui.gif"></a>任务发布明细
</header>
<div class="liuc">
    <div class="yes" id="i-1">已接单<img src="../images/shan.png" id="q-1"></div>
    <div class="yes" id="i-2">接单方确认<img src="../images/shan.png" id="q-2"></div>
    <div class="yes" id="i-3">发布方确认<img src="../images/shan.png" id="q-3"></div>
</div>
<main class="rtt-man">
    <section class="rtt-top">
        <div class="left" style="width:60pt; height:60pt; border-radius:30pt;"><img  id="touxiang" src="../images/touxiu-1.png" style="width:100%; height:100%"></div>
        <div class="right" style="float:left; margin-left:15pt; font-size:16pt"><input style="background:none; color:#FFF; border:none" id="MissionAccepterId" type="text"></div>
        <a href=""  id="tel" style="  width:34pt; float:right; margin-right:25pt; margin-top:-15pt"><img src="../../hbl/CSS/电话.png" style=" width:100%;"></a>

        <div class="rtt-bot" style="margin-top:.20rem; font-size:10pt">
            <img src="../images/left-shu.gif"><br>
            任务被接受时双方就可以相互联系，就任务内容进行详细说明哦！
        </div>
        </section>
           
       
        <input id="MissionAccepterIdTel" type="hidden">
        <input type="hidden" id="MissionPromulgatorId">
    
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
        <input id="WIDout_trade_no" type="hidden"/>
        <input id="MissionMsgId" type="hidden"/>
        <input id="Openid" type="hidden"/>
    </section>
</main>

<footer class="foot footadd">
    <div style="width:33%; float:left; font-size:12px;"><a  id="Refund" type="button"><div style="text-align:center; margin-top:8px;"><img src="../../image/1.png" style="margin:0 auto; width:30px; height:30px;"><p style="margin-top:-25px">撤销订单</p></div></a></div>
    <div style="width:33%; float:left; font-size:12px;"><a id="Urge" onClick="Urge()" type="button" ><div style="text-align:center;margin-top:8px;"><img src="../../image/2.png" style="margin:0 auto;width:30px; height:30px;"><p style="margin-top:-25px">催促订单</p></div></a></div>
    <div style="width:33%; float:left; font-size:12px;"><a id="compelete" type="button" ><div style="text-align:center;margin-top:8px;"><img src="../../image/3.png" style="margin:0 auto;width:30px; height:30px;"><p style="margin-top:-25px">确认完成</p></div></a></div>
</footer>

</body>
</html>
<?php $MissionMsgId=$_GET['MissionMsgId'];  ?>
<script src="../../js/Jquery/session.js"></script>
<script>
$(document).ready(function() {
	
	console.log(localStorage.getItem("PhoneNumber"));
   if(!localStorage.getItem("PhoneNumber")){
		//window.location.href="login.php";
		}
});
	 $.ajax({
		url:"../handfile/Taskdetailhandle.php?MissionMsgId=<?php echo $MissionMsgId ?>",
		dataType:"Json",
		type:"GET",
		success:function(data){$.each(data,function(index,comment){$("#Title").val(comment.MissionTitle);
		$("#MissionPromulgatorId").val(comment.MissionPromulgatorId);
		$("#Reward").val(comment.MissionReward);
		$("#MissionTimeDemand").val(comment.MissionTimeDemand);
		 $("#WIDout_trade_no").val(comment.WIDout_trade_no);
		//if(comment.MissionAccepterId){
//			ReadMsg(comment.MissionAccepterId);
//			var phone=comment.MissionAccepterId;
//		   $("#tel").attr("href","tel:"+phone+"")
//							      }else {$("#MissionAccepterId").val("您的订单还被未接单哦");}
//								  
								  
		if($("#Title").val()=="快递代取"){
			 getMsg_expressage();
			 if(comment.MissionAccepterId){
			ReadMsg_name(comment.MissionAccepterId);
			
			var phone=comment.MissionAccepterId;
		   $("#tel").attr("href","tel:"+phone+"")
							      }else {$("#MissionAccepterId").val("您的订单还被未接单哦");}
		}
		 else{
			 $("#Detail").val(comment.fileName+"\n"+comment.MissionDescribe);
			$("#pos").val(comment.MissionPos);
		 	if(comment.MissionAccepterId){
			ReadMsg(comment.MissionAccepterId);
			var phone=comment.MissionAccepterId;
		   $("#tel").attr("href","tel:"+phone+"")
							      }else {$("#MissionAccepterId").val("您的订单还被未接单哦");}
								  
		 }
			State(comment.MissionState);
		    console.log(comment.MissionMsgId);
		 
		 $("#MissionMsgId").val(comment.MissionMsgId);
		 $("#MissionAccepterIdTel").val(comment.MissionAccepterId);	
		 ReadMsgForImage();												
		})},
		error:function(){alert(0)}
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
	function getMsg_expressage(){
	
	$.ajax({
		url:"../handfile/ExpressageHand.php?AlipayOutTradeNo="+$("#WIDout_trade_no").val(),
		dataType:"Json",
		type:"GET",
		async:false,
		success:function(data){$.each(data,function(index,comment){
		 		$("#pos").val(comment.buildingNum+"#"+comment.dormitory);
				$("#Detail").val(comment.deliverytype+"    取件号："+comment.deliverynumber+"    备注："+comment.note );
				
				
								  
				
		})},
		error:function(){}
	})
	
	}
	function ReadMsg_name(id){
  	  $.ajax({
	  url:"../../hbl/handfile/personalDataHand.php?PhoneNumber="+id,
	  type:"GET",
	  async:"true",
	  dataType:"Json",
	  cache:"true",
	  success:function(data){$.each(data,function(index,comment){
		          
				   $("#MissionAccepterId").val(comment.UserName);
					console.log(comment.UserName);
				  
		  	  })},
    })}
       function State (Ind) {
            var ind =Ind;
            if (ind==0){
                $(".liuc div").removeClass().addClass("no")
                $(".liuc img").attr("src","../images/xiaoyuan.gif");
		     	$("#compelete").attr("onclick","alert('还没有人接单！您不能确认！')");//确认状态验证
				$("#Refund").click(function(){
									window.location="../../xzf/handfile/RefundQuery.php?WIDout_trade_no="+ $("#WIDout_trade_no").val()+"&MissionMsgId=<?php echo $MissionMsgId ?>&MissionReward="+$("#Reward").val()+"&MissionAccepterIdTel="+$("#MissionAccepterIdTel").val()+"&MissionPromulgatorId="+$("#MissionPromulgatorId").val()+"&Title="+$("#Title").val()
									
									});
				//下同
            }else if (ind==1){
                $("#i-2").removeClass().addClass("no");
                $("#i-3").removeClass().addClass("no");
                $("#q-2").attr("src","../images/xiaoyuan.gif");
                $("#q-3").attr("src","../images/xiaoyuan.gif");
			    $("#compelete").attr("onclick","alert('接单方还未确认完成任务！您不能确认')");
				$("#Refund").click(function(){
									window.location="../../xzf/handfile/RefundQuery.php?WIDout_trade_no="+ $("#WIDout_trade_no").val()+"&MissionMsgId=<?php echo $MissionMsgId ?>&MissionReward="+$("#Reward").val()+"&MissionAccepterIdTel="+$("#MissionAccepterIdTel").val()+"&MissionPromulgatorId="+$("#MissionPromulgatorId").val()+"&Title="+$("#Title").val()
									//alert("请求已发送给接受方，双方协商共同撤单才算数哦！如有争议主动联系客服~");
									});
				$("#Refund").removeAttr("href");
            }else if (ind==2){
                $("#i-3").removeClass().addClass("no");
                $("#q-3").attr("src","../images/xiaoyuan.gif");
				$("#compelete").click(function(){ind=3;
												 $("#compelete").unbind("click");
												 updateMissionState_3();    
												 alert('任务确认完成！');});     
	            $("#Refund").click(function(){
									chexiaoHand($("#MissionAccepterIdTel").val());
									alert("请求已发送给接受方，双方协商共同撤单才算数哦！如有争议主动联系客服~");
									
									});				
				$("#Refund").removeAttr("href");
            }else if (ind==3){
                $(".liuc div").removeClass().addClass("yes")
                $(".liuc img").attr("src","../images/shan.png");
				$("#compelete").children().text("订单已完成");
				$("#Refund").attr("onclick","alert('您已经确认完成订单！您不能撤销订单！请联系接单人员进行协商撤单！')")
				$("#Refund").removeAttr("href");
            }else if (ind==4){
				alert('该任务已被撤销！')
			   
			}
        }
		 function ReadMsg(id){
  	  $.ajax({
	  url:"../../hbl/handfile/personalDataHand.php?PhoneNumber="+id,
	  type:"GET",
	  async:"true",
	  dataType:"Json",
	  cache:"true",
	  success:function(data){$.each(data,function(index,comment){
				   $("#MissionAccepterId").val(comment.NickName);
                    $("#Openid").val(comment.OpenId);
				  
		  	  });ReadSensitive()}, 
    })}
		function updateMissionState_3(){
		   $.ajax({
	 		 	url:"../handfile/teskupdateState_3.php?UserId="+$("#MissionPromulgatorId").val()+"&MissionMsgId=<?php echo $MissionMsgId ?>",
	  			type:"GET",
	 			dataType:"Json",
	  			success:function(data){
					console.log(data);
					
					TaskAcceptComfirm(<?php echo $MissionMsgId ;?>);//任务确认完成，把赏金派发记录写到数据库
					           
                    

	 			 },
	 		    error:function(XMLHttpRequest){
		 			 console.log(XMLHttpRequest.readyState)
	 			 },
			})
	   }
	   

	   function insertMsg_moneyAccept(id){   //发布赏金以到账
		    $.ajax({
	 		 	url:"../handfile/insertNotice_moneyAccept.php?PhoneNumber="+id+"&MissionMsgId=<?php echo $MissionMsgId ?>",
	  			type:"GET",
	 			dataType:"Json",
				async:false,
	  			success:function(data){
		  			console.log(data);
	 			 },
	 		    error:function(XMLHttpRequest){
		 			 console.log(XMLHttpRequest.readyState)
	 			 },
			})
	   }

       function TaskAcceptComfirm(MissionMsgId){
		   $.ajax({
		url:"../../xzf/handfile/TaskAcceptComfirm.php",
		type:"GET",
		data:{"MissionMsgId":MissionMsgId},
		dataType:"Json",
	    success:function(data){            
	   			WIDout_trade_no=$("#WIDout_trade_no").val()+"Reward";
				$(".liuc div").removeClass().addClass("yes")
                $(".liuc img").attr("src","../images/shan.png");
				$("#compelete").children().text("订单已完成");
				$("#Refund").attr("onclick","alert('您已经确认完成订单！您不能撤销订单！请联系接单人员进行协商撤单！')")
				$("#Refund").removeAttr("href");
				if(data!="offline"){
				WalletAccountHandleST(WIDout_trade_no,$("#MissionAccepterIdTel").val());
				
				}else{
					alert("线下支付确认成功");
					EmailHandle($("#MissionAccepterIdTel").val());//
				}
							 
							 
	    },
        

		   error: function(XMLHttpRequest, textStatus, errorThrown) {
           console.log(XMLHttpRequest.status);
           console.log (XMLHttpRequest.readyState);
           console.log (textStatus);
   },

	})

	   }
function WalletAccountHandleST(WIDout_trade_no,UserId){
			$.ajax({
		url:"../../xzf/handfile/WalletAccountHandleST.php",
		type:"POST",
		data:{"UserId":UserId,"WIDout_trade_no":WIDout_trade_no},
		dataType:"Text",
	   success:function(data){
		   EmailHandle($("#MissionAccepterIdTel").val());
		   insertMsg_moneyAccept($("#MissionAccepterIdTel").val())
	   },
		   error: function(XMLHttpRequest, textStatus, errorThrown) {alert('赏金派发失败,请联系管理员')
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})

		}//为接受任务人派发奖金
		
		//接单者邮箱读取
function EmailHandle(MissionAcceptorId){
	  	$.ajax({
		url:"../handfile/EmailHandle.php",
		type:"GET",
		data:{"MissionPromulgatorId":MissionAcceptorId},
		dataType:"Json",
		success:function(data){$.each(data,function(index,comment){
			SendEmail(comment.Email);console.log(comment.OpenId);
			SendweChat($("#WIDout_trade_no").val(),$("#MissionMsgId").val(),$("#Title").val(),comment.OpenId);
             
		 }							 
									 
	)},
		error:function(){console.log('emailfail');$("#SUBBT").before("<p style='font-size:14px'>对方没有设置QQ邮箱！您可以自行联系任务发布者哦！</p>")},
	})
  }
  function chexiaoHand(MissionAcceptorId){
	  	$.ajax({
		url:"../handfile/EmailHandle.php",
		type:"GET",
		data:{"MissionPromulgatorId":MissionAcceptorId},
		dataType:"Json",
		success:function(data){$.each(data,function(index,comment){
             SendweChat_chexiao($("#WIDout_trade_no").val(),$("#MissionMsgId").val(),$("#Title").val(),comment.OpenId,$("#MissionPromulgatorId").val(),MissionAcceptorId,$("#Reward").val());
		 	console.log(MissionAcceptorId);	
			window.location.reload();				 
		}
	)},
		error:function(){
	},
	})
  }
	function SendEmail(Email){
			$.ajax({
		url:"../../phpmailer/index.php",
		type:"GET",
		data:{"Email":Email,"Note":"您接受的任务被发布者确认完成！赏金已经到账，请及时查看(线下支付不会有金额变动哦)！"},
		dataType:"Text",
		success:function(data){$("#SUBBT").before("<p style='font-size:14px;width:100%;text-align:center;'>邮件提示成功！</p>")},
		error:function(){$("#SUBBT").before("<p style='font-size:14px'>网络异常！请稍后再试</p>")},
	})}//确认任务后发送邮箱
		function Urge(){
			$.ajax({
				url:"../../weixin/php/OrderUrge.php",
				type:"GET",
				data:{"openid":$("#Openid").val(),"WIDout_trade_no":$("#WIDout_trade_no").val(),"Reward":$("#Reward").val(),"NickName":$("#MissionAccepterId").val()},
				dataType:"json",
				success:function(data){alert('催单成功,对方已经收到您的催单提醒！')},
				error:function(){
			  console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
			},
			})
		}//催单
		function SendweChat(WIDout_trade_no,MissionMsgId,Title,openid){
			$.ajax({
		url:"../../weixin/php/WechatSendForConfirm_a.php",
		type:"GET",
		data:{"openid":openid,"Note":"您接受的任务被发布者确认完成！赏金已经到账，请及时查看(线下支付不会有金额变动哦)！","WIDout_trade_no":WIDout_trade_no,"MissionTitle":Title,"MissionMsgId":MissionMsgId},
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
		//更新更多敏感信息
		
		function SendweChat_chexiao(WIDout_trade_no,MissionMsgId,Title,openid,MissionPromulgatorId,MissionAccepterIdTel,MissionReward){
		$.ajax({
		url:"../../weixin/php/WechatSendForchexiao.php",
		type:"GET",
		data:{"openid":openid,"Note":"发布者向您申请撤销订单，如若双方协商成功请点击详情协助发布方完成撤销，如有异议主动联系客服哦！","WIDout_trade_no":$("#WIDout_trade_no").val(),"MissionTitle":Title,"MissionMsgId":MissionMsgId,"MissionPromulgatorId":MissionPromulgatorId,"MissionAccepterIdTel":MissionAccepterIdTel,"MissionReward":MissionReward},
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
	function ReadSensitive(){
		if($("#MissionTimeDemand").text=="0000-00-00 00:00:00"){
			alert("这里是快递")
		}
	}
		
    </script>