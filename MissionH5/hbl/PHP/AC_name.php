<!doctype html>
<html>
<head>
<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>我要认证</title>
<link rel="stylesheet" href="../CSS/bootstrap.min.css">
<script src="../JS/jquery-3.2.0.js"></script>
<script src="../JS/bootstrap.min.js"></script> 
<link rel="stylesheet" type="text/css" href="../via/css/cropper.min.css">
    <link rel="stylesheet" type="text/css" href="../via/css/mui.min.css">
    <script type="text/javascript" src="../via/js/jquery-1.11.1.min.js"></script>
     <script type="text/javascript" src="../via/js/lrz6.mobile.min.js"></script> 
    <script type="text/javascript" src="../via/dist/lrz.all.bundle.js"></script>
    <script type="text/javascript" src="../via/js/cropper.min.js"></script>
	<script type="text/javascript" src="../../js/Jquery/session.js"></script>
<style>
html,body,.page{width:100%; height:100%; overflow: auto; margin:0; padding:0; background:#F5F5F5}

.header{ height:40pt; background:#10C091;}
.t{width:90%; margin:0 auto; font-size:14pt;}
.tu{ width:6pt; height:6pt; margin-top:0;   background:#F00; float:left}
.zi{ float:left; margin-top:-5pt;margin-left:4pt; color:#999; font-size:10pt}

.t2,.input-group{animation: bigger 1s 1;-webkit-animation: bigger 1s 1; -moz-animation: bigger 1s 1;  -o-animation: bigger 1s 1;}
.t3{animation: bigger 1.5s 1;-webkit-animation: bigger 1.5s 1; -moz-animation: bigger 1.5s 1;  -o-animation: bigger 1.5s 1;}
.t1{animation: bigger 0.5s 1;-webkit-animation: bigger 0.5s 1; -moz-animation: bigger 0.5s 1;  -o-animation: bigger 0.5s 1;}

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
.jia{animation: bigger1 1s 1;-webkit-animation: bigger1 1s 1; -moz-animation: bigger1 1s 1;  -o-animation: bigger1 1s 1;}
	
@-moz-keyframes bigger1{
	0%{transform:scale(0.8); opacity:1}
	100%{transform:translate(1);; opacity:0}
	}
@-webkit-keyframes bigger1{
	0%{transform:scale(0.8); opacity:1}
	100%{transform:translate(1);; opacity:0}
	}
@-o-keyframes bigger1{
	0%{transform:scale(0.8); opacity:1}
	100%{transform:translate(1);; opacity:0}
	}
@keyframesbigger1{
	0%{transform:scale(0.8); opacity:1}
	100%{transform:translate(1);; opacity:0}
	}
	
</style>

</head>

<body>
<div class="header text-center navbar-fixed-top">
	<a  href="../../lhb/PHP/login.php"style="float:left; height:30pt; width:30pt; margin-top:5pt; overflow:hidden"><img src="../CSS/后退白色.png"  style="width:100%" ></a>
	<h1 style="font-size:17pt; color:#FFF; margin:0 10% ; line-height:40pt">我要认证</h1>
</div>
<div style="width:95%; height:420pt; padding-top:14pt;  margin:62pt auto; background:#FFF;">
	<div class="t t1">
    	<div  class="tu"></div>
        <div class="zi">为确保平台的安全可靠性，<br />用户需要进行身份认证哦</div>
    </div>

    <div class="t t3" style="margin-top:64pt;">
    	<div  class="tu"></div>
        <div class="zi">保守秘密无压力，秒速处理认证信息</div>
    </div>

    		<div style="height:50px; width:200px; padding-top:2pt; margin-top:6pt; margin-left:auto; margin-right:auto; margin-bottom:5pt">
    			<form style="height:90%;width:80%; margin-top:5pt;margin-left:50px;">
    			<input  type="text" id="UserName" placeholder="请输入您的真实姓名"     style="border-color: #878787; border-style: solid; border-top-width: 0px;border-right-width: 0px; border-bottom-width: 1px;border-left-width: 0px;width:80%;height:90%;font-size:10px; border-radius:10px;margin-top:40px;">

                </form>
    			<img style="display:inline; width:25pt; height:25pt" src="../../../img/pencil.PNG">
    		</div>
<button type="submit"   id="sahngchuan" style=" font-size:12.8pt; margin-top:85pt" class="btn btn-success  btn-block" role="button">确定</button>      
<input type="hidden" value="" id="PhoneNumber">
</div>
</body>
</html>
<script>

 
 $("#sahngchuan").click(function(){
	 if(!$("#UserName").val()){alert("请输入真实姓名")}
			//else if(!$("#Email").val()){alert("请输入邮箱")}
			else {UpdateName();}
})

 function UpdateName(){
	 $.ajax({
	  url:"../handfile/InsertUserName.php?PhoneNumber="+$.session.get("PhoneNumber")+"&UserName="+$("#UserName").val(),
	  type:"GET",
	  dataType:"Json",
	  success:function(data){
		 console.log($("#UserName").val());
		 update_1($.session.get("PhoneNumber"));
	  },
	  error:function(XMLHttpRequest){
		  console.log(XMLHttpRequest.readyState)
	  },
	})} 
function update_1(PhoneNumber){
	$.ajax({
	  url:"../handfile/updateshenhe_1.php",
	  Type:"GET",
	  dataType:"Json",
	  data:{"PhoneNumber":PhoneNumber},
	  success:function(data){
		  console.log(data);
		  window.location="IndexAcceptedTask.php";
	  },
	  error:function(XMLHttpRequest){
		  console.log(XMLHttpRequest.readyState)
	  },
	})
}
</script>