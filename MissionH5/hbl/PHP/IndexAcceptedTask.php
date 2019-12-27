<?php
  error_reporting(E_ALL^E_NOTICE^E_WARNING);
  $root='MissionTable';
  $password='Mission';
  $host='localhost';  
  $con=mysql_connect($host,$root,$password);
  $db='MissionTable';
  
  if($con == false){echo "连接失败" ;}else{
  }
  mysql_select_db($db);
  mysql_query('set name utf8');
  ?>     
  <?php
	$sql="select *FROM MissionMsg INNER JOIN MissionUser ON MissionMsg.MissionPromulgatorId=MissionUser.PhoneNumber INNER JOIN RechargeRecord ON MissionMsg.WIDout_trade_no=RechargeRecord.AlipayOutTradeNo where MissionMsg.MissionState!=4 ORDER BY MissionMsg.MissionMsgId DESC  limit 0,40 ";
 
//$sql="select *from MissionMsg order by MissionMsgId DESC";



    if($result=mysql_query($sql)){
  while($row=mysql_fetch_assoc($result)){
	$data[]=$row;
}}else{
	$data=array();
}

	?>
<!doctype html>
<html >
<head>
<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<title> </title>
<link rel="stylesheet" href="../CSS/bootstrap.min.css">
<script src="../JS/jquery-3.2.0.js"></script>

<script src="../JS/bootstrap.min.js"></script>
<script src="../../lhb/js/htmlFontSize.js"></script>
<script src="../JS/index.js"></script>
<script src="../../js/Jquery/session.js"></script>
<link rel="stylesheet" type="text/css" href="../CSS/loading.css">
<link rel="stylesheet" type="text/css" href="../CSS/Index.css">
<style>
.c1{background:#FFF; margin-top:6pt; margin-bottom:6pt; border:#666 1px ssolid;width:100%; height:95pt;}

</style>
</head>

<body class="trans" >
<!-- <div id="loading"  style="display: none">
 <div id="center">
  <div id="loadingcontent"   class="canvas canvas1"  >
    <div class="spinner1 spinnerMax">
      <div class="spinner1 spinnerMid">
      </div>
    </div>
  </div>
	 </div>
</div>-->

<div id="IndexAcceptedTaskPage">
<div  onClick="" class="header text-center navbar-fixed-top ">
	<a href="mine.php" style="float:left; height:28pt; width:35px; margin-top:4pt; overflow:hidden;"><img src="../../lhb/images/geren.png"  style=" height:100%; width:100%;margin-top: 10px;margin-left:5px;display: block"></a>
    <div id="Number1" style=" display:none;  width:23px; height:23px; z-index:9;border:#F00 3px solid; float:left; border-radius:13px; margin-right:-54pt; margin-top:3pt; line-height:18px; color:#FFF;  background:#F00"><strong>1</strong></div>
	<center><h1 style=" margin: auto;margin-top: 20px; text-align: center;font-size:16pt; color:#FFF; line-height:14pt ;width:50% ;display: block">任务池</h1></center>
  	
    <a href="../../lhb/PHP/message.php" style="float:right; height:36pt; width:36pt; margin-top:-25pt; overflow:hidden"><img  src="../../lhb/images/more-o.png" width="30px" style="margin-top: 10px;float: right;margin-right: 10px"></a>
	<div id="Number" style=" display:none; width:23px; height:23px; z-index:9;border:#F00 3px solid; float:right; border-radius:13px; margin-right:-12pt; margin-top:-20pt; line-height:18px; color:#FFF;  background:#F00"><strong>2</strong></div>
</div>


	<div style="height: 50px;width: 100%;"></div>

 <?php
	foreach($data as $value){
		if($value['UserImage']){
		$touxiang=str_replace(' ','+',$value['UserImage']);
		}else if(!$value['UserImage']){
			$touxiang="../../lhb/images/avatar.png";
			}
if($value['PayType']==1){
	$a="../CSS/支付宝黑色.png";
	}else if($value['PayType']==2){
		$a="../CSS/钱包黑色.png";
	}else if($value['PayType']==3){
		$a="../CSS/线下支付.png";
	}
	//echo $touxiang;
//		if($value['MissionState']==3){$State='|订单已经完结';}else
//			if($value['MissionState']==2||$value['MissionState']==1){$State='|订单已经被接';}
		switch($value['MissionState']){
			case 0:$State='|未接单';break;
			case 1:$State='|订单已经被接';break;  
			case 2:$State='|订单已经被接';break;
			case 3:$State='|订单已经完结';break; 
			case 4:$State='|订单已经撤销';break;
		}
		if($value['MissionTitle']==" 快递代取"){
			$value['MissionDescribe']='接单后见快件详情';
		}
		echo '<section style="width:98%; margin:0 auto">
  <div class="c1" onclick="fn( '.$value['MissionMsgId'].')">
    <div class="c1content" >
      <div class="grab" ></div>
      <div class="grabtop">
        <img src="../CSS/较急.png" style="width:100%; height:100%"></div>
      <div class="image" >
        <img src='.$touxiang.' style="width:100%; height:100%"></div>
    </div>
    <div class="detail">
      <div class="detailtop" >
        <div class="tl MissionTitle">'.$value['MissionTitle'].'<span style="color:green">'.$State.'</span>'.'</div>
        <div style="font-size:8pt; color:#CCC;width:120%">'.$value['MissionPromulgatorTime']."发布".'</div></div>
		
      <div class="MissionReward">￥'.$value['MissionReward'].'</div>
      <div class="PayType" >
        <img src="'.$a.'" style="width:100%; height:100%">
	  </div>
	  
    </div>
    <div class="MissionDescribe" >
      <div class="MissionDescribeContent" >'.$value['MissionDescribe'].'</div></div>
    <div style="float:right; width:76%; height:18pt">
      <div class="Pos">
        <img src="../CSS/定位.png" style="width:100%; height:100%"></div>
      <div class="PosContent" >'.$value['MissionPos'].'</div></div>
  </div>
</section>';}
	?>
   <div class="t1 trans4" style="display:none">  
    <div class="t13"><button id="NAME" style="background:url(../CSS/%E4%B8%8B%E4%B8%80%E9%A1%B5%E3%80%81%E5%89%8D%E8%BF%9B%E7%81%B0%E8%89%B2.png) center; background-size: cover; border:none; width:20pt; height:20pt" type="button" data-toggle="modal" data-target=".bs-example-modal-lg5"></button></div>	
</div>
<div class="modal fade bs-example-modal-lg5" style=" margin-top:180pt" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header" style="height:41pt">
    <button type="button"  id="Email_close" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" >&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">为了安全，还请小主输入真实姓名！</h4>
    </div>
    <div class="modal-body" >
    
    <input  type="text" name="email" class="form-control" id="name" placeholder="请输入真实姓名">
    <button  onClick="UpdateName()" id="UpdateName" style=" margin-top:3pt; margin-left:80%" type="submit" class="btn btn-default">确定</button>
    
    </div>
   </div>
  </div>
 </div>
 
<input type="hidden" id="PhoneNumber" value="">
<footer class="inde-foot">
	<div class="left" style="margin-left: 0">
	<img src="../../xzf/image/任务平台绿色.png" style="width:22px;height: 22px">
	<a id="fabu"  href="" style="color:rgb(16,192,145);width:100%;display: block;text-align: center">点击发布任务</a>
  </div>
   
    <div class="middle" style="">
    <img src="../../xzf/image/达人灰色.png" onClick="window.location='../../xzf/PHP/MissionExpertList.php'" style="width:24px;"> 
    <a id="MissionExpert"  href='../../xzf/PHP/MissionExpertList.php' style="color:gray;width:100%;display: block;text-align: center;margin-top: -3px">任务达人</a>
    </div>
    
    <div class="right" style="">
    <img id="kuaidi"   src="../../xzf/image/超级快递 灰色.png" onclick="window.location='../../../Mission2.0/tasknew/jbtask.php'" style="width:28px;">
    <a  style="color:gray;width:100%;display: block;text-align: center;margin-top:-7px" href='../../../Mission2.0/tasknew/jbtask.php' >超级快递</a>
    </div>
	</div>
</footer>
</body>
	<div id="PageMissionExpertList"  style="height:40pt"></div>
</html>

<script>
//function ReadMsg_lunbo(){
//  	  $.ajax({
//	  url:"../handfile/MsgDataHand.php",
//	  Type:"GET",
//	  dataType:"Json",
//	  async:false,
//	  success:function(data){
//		  $.each(data,function(index,comment){
//			  console.log(data)
//				var phone=comment.MissionPromulgatorId;
//	  		    var UserId=phone.replace(/(\d{3})\d{4}(\d{4})/,'$1****$2');
//				
//				var Missiondescribe_lunbo = '任务：'+comment.MissionTitle;
//				var MissionPromulgatorTime_lunbo = comment.MissionPromulgatorTime;
//				var MissionReward_lunbo = '￥'+comment.MissionReward
//				//请求数据填充到dataArr
//				dataArr.push({
//					Missiondescribe_lunbo:Missiondescribe_lunbo,
//					MissionPromulgatorTime_lunbo:MissionPromulgatorTime_lunbo,
//					MissionReward_lunbo:MissionReward_lunbo
//				})
//		  	  })
//			  },
//	 error: function(XMLHttpRequest, textStatus, errorThrown) {
//            console.log(XMLHttpRequest.status);
//            console.log(XMLHttpRequest.readyState);
//            console.log(textStatus);
//        },
//
//    })
//}
//
//	var renderSuccess = false;
//	
//	var dataArr = [];
//
//	function render(){
//		
//		dataArr = [];
//	
//		ReadMsg_lunbo();
//		ReadMsg_lunbo();
//		ReadMsg_lunbo();
//		console.log(dataArr)
//		if(dataArr.length == 0){
//			console.log('出错啦')
//			return false
//		}else{
//			renderSuccess = true;
//			dataArr.forEach(function(a,index){
//				
//				document.querySelectorAll('.Missiondescribe_lunbo')[index].value = a.Missiondescribe_lunbo;
//				document.querySelectorAll('.MissionPromulgatorTime_lunbo')[index].value = a.MissionPromulgatorTime_lunbo;
//				document.querySelectorAll('.MissionReward_lunbo')[index].value = a.MissionReward_lunbo
//			})
//		}
//	}
//	//滚动
//	function slide(){
//		render();
//		if(renderSuccess){
//			var slideW = -parseFloat($('.marqueeBox').css('width'))*2/3;
//			$('.marqueeBox').animate({left:slideW+'px'},8000,'linear',function(){
//				$(this).css({left:0});
//				slide();
//			});
//		}else{
//			console.log(renderSuccess)
//		}
//	}
//	$(document).ready(function(){
//		//slide()
//	})

</script>	 
	 