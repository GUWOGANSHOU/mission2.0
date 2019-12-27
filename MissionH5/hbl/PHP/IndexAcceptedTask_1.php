<?php
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
	$sql="select *FROM MissionMsg INNER JOIN MissionUser ON MissionMsg.MissionPromulgatorId=MissionUser.PhoneNumber INNER JOIN RechargeRecord ON MissionMsg.WIDout_trade_no=RechargeRecord.AlipayOutTradeNo WHERE MissionMsg.MissionState=0 ";

//$sql="select *from MissionMsg order by MissionMsgId DESC";



    if($result=mysql_query($sql)){
  while($row=mysql_fetch_assoc($result)){
	$data[]=$row;
}}else{
	$data=array();
}

	?>
<!doctype html>
<html>
<head>
<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>待接受任务</title>
<link rel="stylesheet" href="../CSS/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../../lhb/css/style.css">
<script src="../JS/jquery-3.2.0.js"></script>
<script src="../JS/bootstrap.min.js"></script> 
<script src="../../lhb/js/jquery.js"></script>
<script src="../../lhb/js/htmlFontSize.js"></script>
<script src="../dropload-gh-pages/dist/dropload.js"></script>
<script src="../dropload-gh-pages/dist/dropload.min.js"></script>
<link rel="stylesheet" type="text/css" href="../CSS/Index.css">
<link rel="stylesheet" type="text/css" href="../CSS/loading.css">
<link rel="stylesheet" type="text/css" href="../dropload-gh-pages/dist/dropload.css">
<style>
html,body,.page{width:100%; height:100%; overflow: auto; margin:0; padding:0; background:#F3F3F3}
a:link{text-decoration:none}
a:hover{text-decoration:none}
.header{ height:52pt; background:#10C091;}
.dropdown-toggle{font-size:12pt; color:#000; margin-left:20%;}
.c1{background:#FFF; margin-top:6pt; margin-bottom:6pt; border:#666 1px ssolid;width:100%; height:95pt;}
.c2{background:#FFF; margin-top:6pt; margin-bottom:6pt;border-bottom:1pt solid #00BB89;border-right:1pt solid #00BB89; border-top:1pt solid #00BB89;border-left:15pt solid #00BB89; width:100%; height:80pt;}
.c3{background:#FFF; margin-top:6pt;margin-bottom:6pt; border-bottom:1pt solid #7DE1BD;  border-right:1pt solid #7DE1BD; border-top:1pt solid #7DE1BD;border-left:15pt solid #7DE1BD; width:100%; height:80pt;}

.c1{animation: bigger 0.25s 1;-webkit-animation: bigger 0.25s 1; -moz-animation: bigger 0.25s 1;  -o-animation: bigger 0.25s 1;}
.c2{animation: bigger 0.5s 1;-webkit-animation: bigger 0.5s 1; -moz-animation: bigger 0.5s 1;  -o-animation: bigger 0.5s 1;}
.c3{animation: bigger 0.75s 1;-webkit-animation: bigger 0.75s 1; -moz-animation: bigger 0.75s 1;  -o-animation: bigger 0.75s 1;}

@-moz-keyframes bigger{
	0%{transform:scale(0.8)}
	100%{transform:translate(1);}
	}
@-webkit-keyframes bigger{
		0%{transform:scale(0.8)}
	100%{transform:translate(1);}
	}
@-o-keyframes bigger{
		0%{transform:scale(0.8)}
	100%{transform:translate(1);}
	}
@keyframesbigger{
		0%{transform:scale(0.8)}
	100%{transform:translate(1);}
	}


.inde-foot{
    float: left;
    width: 100%;
    height: .97rem;
    position: fixed;
    bottom: 0;
    left: 0;
    background: url("../../lhb/images/foot-bg.gif") repeat-x;
    font-size: .24rem;
    color:#838485;
    line-height: 1.3rem;
}
.inde-foot>.left{
    float: left;
    width: 2rem;
    height: .97rem;
    text-indent: .1rem;
    margin-left: .5rem;
}
.inde-foot>.right{
    float: right;
    width: 2rem;
    height: .97rem;
    text-indent: .1rem;
    margin-right: 1.18rem;
}
.inde-foot>.right>img{
    float: left;
    margin-top: .5rem;
    display: block;
    width: .47rem;
    height: .33rem;
}
.inde-foot>.left>img{
    float: left;
    margin-top: -10px;
    display: block;
    width: .4rem;
    height: .4rem;
}
.PayType{
	width:16pt; height:16pt; float:right; margin-top:7pt; font-size:10pt; color:#000
}
.image{
	 margin-left:5pt;margin-top:7pt;width:50pt; height:50pt; overflow:hidden; border-radius:25pt;
}

</style>
</head>

<body>
  <div id="loading" class="canvas canvas1" style="display: none" >
    <div class="spinner1 spinnerMax">
      <div class="spinner1 spinnerMid">
        <div class="spinner1 spinnerMin"></div>
      </div>
    </div>
  </div>
<div class="header text-center navbar-fixed-top">
	<a href="mine.php" style="float:left; height:36pt; width:25%; margin-top:6pt; overflow:hidden;"><img src="../../lhb/images/geren.png" width="30px" style="margin-top: 10px;margin-left:5px;display: block"></a>
    <h1 style="font-size:18pt; color:#FFF; line-height:30pt ;width:50% ;float: left">待接受任务</h1>
  	
    <a href="../../lhb/PHP/message.php" style="float:right; height:36pt; width:36pt; margin-top:6pt; overflow:hidden"><img src="../../lhb/images/more-o.png" width="30px" style="margin-top: 10px;float: right;margin-right: 10px"></a>
	<div id="Number" style=" display:none;width:26px; height:26px; z-index:9;border:#F00 3px solid; float:right; border-radius:13px; margin-right:-12pt; margin-top:3pt; line-height:18px; color:#F00;  background:#FFF"><strong>2</strong></div>
</div>

    <div class=" navbar" style="height:40pt; width:100%; background:#FFF; position:fixed; top:52pt; border-bottom:1pt solid #999">
        		<div class="dropdown"  style=" width:33.333%; padding-top:8pt; padding-right:4%; height:40pt; border-right:1pt solid #999;float:left">
         		 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">任务类型
                 <div style="width:12pt; float:right; height:12pt; "><img src="../CSS/下拉.png" style="width:100%"></div></a>
                 
          			<ul class="dropdown-menu" style=" margin-top:-10pt;height:80pt; max-height:80pt; overflow:auto;">
           				 <li><a href="#">学习任务</a></li>
                         <li role="separator" class="divider"></li>
           				 <li><a href="#">维修任务</a></li>
                         <li role="separator" class="divider"></li>
            			 <li><a href="#">跑腿任务</a></li>
            			 <li role="separator" class="divider"></li>
            			 <li><a href="#">兼职任务</a></li>
             			 <li role="separator" class="divider"></li>
            		     <li><a href="#">生活任务</a></li>
                         <li role="separator" class="divider"></li>
                         <li><a href="#">艺术任务</a></li>
            			 <li role="separator" class="divider"></li>
                         <li><a href="#">陪同任务</a></li>
            			 <li role="separator" class="divider"></li>
                         <li><a href="#">物品收购</a></li>
            			 <li role="separator" class="divider"></li>
         			 </ul>
       			 </div>
                 
                 <div class="dropdown"  style=" width:33.333%; padding-top:8pt;padding-right:4%; height:40pt;border-right:1pt solid #999; float:left; ">
         		   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">任务赏金
          			<div style="width:12pt; float:right; height:12pt; "><img src="../CSS/下拉.png" style="width:100%"></div></a>
                    <ul class="dropdown-menu" style=" margin-top:-10pt">
           				 <li><a href="#">十元以内</a></li>
                         <li role="separator" class="divider"></li>
           				 <li><a href="#">十元以上</a></li>
                         <li role="separator" class="divider"></li>
         			 </ul>
       			 </div>
                 
                 <div class="dropdown"  style=" width:33.333%; padding-top:8pt;padding-right:4%; height:40pt;  float:right">
         		 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">时间要求
          			<div style="width:12pt; float:right; height:12pt; "><img src="../CSS/下拉.png" style="width:100%"></div></a>
                    <ul class="dropdown-menu" style=" margin-left:-20pt; margin-top:-10pt">
           				 <li><a href="#">普通</a></li>
                         <li role="separator" class="divider"></li>
           				 <li><a href="#">较急</a></li>
                         <li role="separator" class="divider"></li>
                         <li><a href="#">十分紧急</a></li>
                         <li role="separator" class="divider"></li>
         			 </ul>
       			 </div>
	</div>
    
	<div id="blanckbar"  style='width:100%; height:92pt; background:#E5F4EF;'></div>
<?php
	foreach($data as $value){
		if($value['UserImage']){
		$touxiang=str_replace(' ','+',$value['UserImage']);
		}else if(!$value['UserImage']){
			$touxiang="../../lhb/images/avatar.png";
			}
if($value['PayType']==1){
	$a="../CSS/线下支付.png";
	}else if($value['PayType']==2){
		$a="../CSS/钱包黑色.png";
	}else if($value['PayType']==3){
		$a="../CSS/线下支付.png";
	}
	//echo $touxiang;
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
        <div class="tl MissionTitle">'.$value['MissionTitle'].'</div>
        <div style="font-size:8pt; color:#CCC;width:120%">'.$value['MissionTimeDemand']."前交付".'</div></div>
		
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


<footer class="inde-foot">
	<div class="left"><a href="../../lhb/PHP/TaskIssueType1.php"style="color:gray"><img src="../../lhb/images/pintai.png" style="width:23px;">发布任务</a></div>
    <div class="right" onClick="alert('本功能正在加紧上线哦，敬请期待！')"><img src="../../lhb/images/yeban.gif">夜半来聊</div>
</footer>
</body>
</html>
<script src="../../js/Jquery/session.js"></script>
