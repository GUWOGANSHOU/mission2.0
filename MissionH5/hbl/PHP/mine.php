<!doctype html>
<html>
<head>
<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>我</title>
<link rel="stylesheet" href="../CSS/bootstrap.min.css">
<script src="../JS/jquery-3.2.0.js"></script>
<script src="../JS/bootstrap.min.js"></script> 

<style>
html,body,.page{width:100%; height:100%; overflow: auto; margin:0; padding:0; background:#F0F0F0}

.header{ height:48pt; background:#10C091;}
.t1{background:#FFF; width:100%; height:41pt; border-bottom:1px #CCCCCC solid; padding-left:10pt; padding-right:10pt}
.t2{background:#FFF; width:100%; height:82pt; border-bottom:1px #CCCCCC solid; padding-left:10pt; padding-right:10pt}

.t21{width:70pt; height:70pt; float:left; font-size:12pt; margin-top:2%}
.t22{width:40%; height:55pt; float:left; margin-top:4%; margin-left:10pt}
.t23{width:40pt; height:40pt; margin-top:6%; float:right}


.t11{width:30pt; height:20pt; float:left; margin-top:2%}
.t12{ width:100pt; line-height:20pt; float:left; font-size:12pt; margin-left:10pt; margin-top:3.5% }
.t13{width:20pt; height:20pt; margin-top:3.5%; float:right}
.trans{ animation: translation 0.5s;-webit-animation: translation 0.5s;position: relative}
.trans2{ animation: translation 0.7s;-webit-animation: translation 0.7s;position: relative}
.trans3{ animation: translation 0.9s;-webit-animation: translation 0.9s;position: relative}
.trans4{ animation: translation 1.1s;-webit-animation: translation 1.1s;position: relative}
.trans5{ animation: translation 1.3s;-webit-animation: translation 1.3s;position: relative}
.trans6{ animation: translation 1.5s;-webit-animation: translation 1.5s;position: relative}
	.trans7{ animation: translation 1.7s;-webit-animation: translation 1.7s;position: relative}
		.trans8{ animation: translation 1.9s;-webit-animation: translation 1.9s;position: relative}
	@keyframes translation{
		0% {left: -600px}
		100% {left: 0px}
	}
	@-webkit-keyframes translation{
		0% {left: -600px}
		100% {left: 0px}
	}
</style>
</head>

<body>
<div class="header text-center navbar-fixed-top">
	<a href="IndexAcceptedTask.php" style="float:left; height:30pt; width:30pt; margin-top:8pt; overflow:hidden"><img src="../CSS/后退白色.png"  style="width:100%" ></a>
  	<h1 style="font-size:17pt; color:#FFF; margin:0 10% ; line-height:48pt">我</h1>
</div>

<div class="t2" style=" margin-top:48pt">
	<div class="t21" style="overflow:hidden" id="changeAvatar"><img src="../../lhb/images/avatar.png"style=" height:100%; border-radius:35pt;width:100%"></div>
	<div  class="t22" >
    	<div id="gender" style="width:16pt; height:16pt; margin-left:1pt; margin-top:-4pt; float:left; display:inline-block"><img src="../CSS/17男.png" style="width:100%"></div><div  id="name"style="width:60%; font-size:12pt; float:left"></div><br />
        <div  id="School" style="width:100%; font-size:10pt; color:#999; margin-top:10pt">福州大学</div>
        <div  id="AC_oK" style=" margin-left:-3pt;display:none;width:40pt; height:13pt"><img src="../CSS/已认证.png" style=" height:100%"><span style="font-size:6pt; color:#999">已认证</span></div>
    </div>
    <div class="t23"><a href="personalData.php"><img src="../CSS/下一页、前进灰色.png" style="width:100%"></a></div>

</div>

<div class="t1 trans" style="margin-top:15pt" onClick="window.location='../../lhb/PHP/wallet.php'">
	<div class="t11"><img src="../CSS/钱包.png" style="width:100%"></div>
    <div class="t12">钱包</div>
    <div class="t13"><a href="../../lhb/PHP/wallet.php"><img src="../CSS/下一页、前进灰色.png" style="width:100%"></a></div>
</div>

<div class="t1 trans2" onClick="window.location='../../lhb/PHP/mymission.php'">
	<div class="t11"><img src="../CSS/星.png" style="width:100%"></div>
    <div class="t12">我的任务</div>
    <div class="t13"><a href="../../lhb/PHP/mymission.php"><img src="../CSS/下一页、前进灰色.png" style="width:100%"></a></div>
</div>
<div class="t1 trans3" id="AC" onClick="window.location='AC_name.php'" style="margin-top:15pt" >
	<div class="t11"><img src="../CSS/认证 (1).png" style="width:100%"></div>
    <div class="t12">身份认证</div>
    
    <div class="t13 trans4"><a   href="#"><img src="../CSS/下一页、前进灰色.png" style="width:100%"></a></div>
<div id="Number1" style=" display:none;width:23px; height:23px; z-index:9;border:#F00 3px solid; float:right; margin-top:4%;border-radius:13px;  line-height:18px; color:#FFF; text-align:center;  background:#F00"><strong>1</strong></div>
</div>
<div class="t1 trans5"  onClick="window.location='../../xzf/PHP/MissionExperAcedList.php'">
	<div class="t11"><img src="../CSS/团队.png" style="width:100%"></div>
    <div class="t12">达人认证</div>
    <div class="t13"><a ><img src="../CSS/下一页、前进灰色.png" style="width:100%"></a></div>
</div>
<div class="t1 trans6" >
	<a href="tel:18259083427"><div class="t11"><img src="../CSS/emoji.png" style="width:100%"></div>
    <div class="t12">商务合作</div>
    <div class="t13"><img src="../CSS/下一页、前进灰色.png" style="width:100%"></div>
    </a>
</div>
<div id="invite" class="t1 trans7" >
	<a ><div class="t11"><img src="../CSS/中奖记录.png" style="width:100%"></div>
    <div class="t12">有奖邀请</div>
    <div class="t13"><img src="../CSS/下一页、前进灰色.png" style="width:100%"></div>
    </a>
</div>
<div class="t1 trans8" onClick="window.location='set.php'">
	<div class="t11"><img src="../CSS/账套设置-selected.png" style="width:100%"></div>
    <div class="t12">设置</div>
    <div class="t13"><a href="set.php"><img src="../CSS/下一页、前进灰色.png" style="width:100%"></a></div>
</div>
</body>
</html>
<script src="../../js/Jquery/session.js"></script>
<script type="text/javascript">
 $(function(){
	 	var InviteId=$.session.get("PhoneNumber")
$("#invite").attr("onclick","window.location='http://www.gaocimi.cn/MissionH5/weixin/php/sample.php'")
	ReadMsg();
	  ReadMsgForImage();
});

    function ReadMsg(){
  	  $.ajax({
	  url:"../handfile/personalDataHand.php?PhoneNumber="+$.session.get("PhoneNumber"),
	  Type:"GET",
	  dataType:"Json",
	  success:function(data){$.each(data,function(index,comment){
//				 if(comment.UserImage){
//				  var str=comment.UserImage;
//				  var re=new RegExp(" ","g");
//				  var Newstr=str.replace(re,"+");
//				  console.log(Newstr);
//				 }
 //				 $("#changeAvatar > img").attr("src",Newstr );
 				 $("#School").text(comment.SchoolId);
				 if(comment.Gender==0){
					 $("#gender >img").attr("src","../CSS/17女.png")
				 }
				 $("#name").text(comment.NickName);
				 if(comment.AuditState!=1){
					 $("#Number1").css('display','block');
					 $("#AC").attr("onClick","window.location='AC_name.php'");
				 }
				  if(comment.AuditState==1){
					 $("#AC").attr("onClick","#"); 
					 $("#AC_oK").css('display','block');
				 }
		  	  })},
		error:function(){alert("请先登录");window.location="../../lhb/PHP/login.php";}
    })}
	   
  function ReadMsgForImage(){
  	  $.ajax({
	  url:"../handfile/personalDataHandForImage.php?PhoneNumber="+$.session.get("PhoneNumber"),
	  type:"GET",
	  async:"true",
	  dataType:"Json",
	  cache:"true",
	  success:function(data){$.each(data,function(index,comment){
			
				  //console.log(comment.UserImage);
                 var str=comment.UserImage;
			    var re=new RegExp(" ","g");
			    var Newstr=str.replace(re,"+");
			 	  $("#changeAvatar > img").attr("src",Newstr);
		  	  })},
    })}


</script>
