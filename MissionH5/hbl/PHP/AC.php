<?php 
$PhoneNumber=$_GET['PhoneNumber'];
?>
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
<script type="text/javascript">
// function getFileUrl(sourceId) { 
//var url; 
//if (navigator.userAgent.indexOf("MSIE")>=1) { // IE 
//url = document.getElementById(sourceId).value; 
//} else if(navigator.userAgent.indexOf("Firefox")>0) { // Firefox 
//url = window.URL.createObjectURL(document.getElementById(sourceId).files.item(0)); 
//} else if(navigator.userAgent.indexOf("Chrome")>0) { // Chrome 
//url = window.URL.createObjectURL(document.getElementById(sourceId).files.item(0)); 
//} 
//return url; 
//} 
//
///** 
//* 将本地图片 显示到浏览器上 
//*/ 
//function preImg(sourceId, targetId) { 
//var url = getFileUrl(sourceId); 
//var imgPre = document.getElementById(targetId); 
//imgPre.src = url; 
//} 
$(function() {

        function toFixed2(num) {
            return parseFloat(+num.toFixed(2));
        }
		
        $('#cancleBtn').on('click', function() {
            $("#showEdit").fadeOut();
            $('#showResult').fadeIn();
        });

        $('#confirmBtn').on('click', function() {
            $("#showEdit").fadeOut();

            var $image = $('#report > img');
            var dataURL = $image.cropper("getCroppedCanvas");
            var imgurl = dataURL.toDataURL("image/jpeg", 0.5);
            $("#changeAvatar > img").attr("src", imgurl);
            $("#basetxt").val(imgurl);
            $('#showResult').fadeIn();

        });

        function cutImg() {
            $('#showResult').fadeOut();
            $("#showEdit").fadeIn();
            var $image = $('#report > img');
            $image.cropper({
                aspectRatio: 1 / 1,
                autoCropArea: 0.7,
                strict: true,
                guides: false,
                center: true,
                highlight: false,
                dragCrop: false,
                cropBoxMovable: false,
                cropBoxResizable: false,
                zoom: -0.2,
                checkImageOrigin: true,
                background: false,
                minContainerHeight: 400,
                minContainerWidth: 300
            });
        }

        function doFinish(startTimestamp, sSize, rst) {
            var finishTimestamp = (new Date()).valueOf();
            var elapsedTime = (finishTimestamp - startTimestamp);
            //$('#elapsedTime').text('压缩耗时： ' + elapsedTime + 'ms');

            var sourceSize = toFixed2(sSize / 1024),
                resultSize = toFixed2(rst.base64Len / 1024),
                scale = parseInt(100 - (resultSize / sourceSize * 100));
            $("#report").html('<img src="' + rst.base64 + '" style="width: 100%;height:100%">');
            cutImg();
        }

        $('#image').on('change', function() {
            var startTimestamp = (new Date()).valueOf();
            var that = this;
            lrz(this.files[0], {
                    width: 800,
                    height: 800,
                    quality: 0.7
                })
                .then(function(rst) {
                    //console.log(rst);
                    doFinish(startTimestamp, that.files[0].size, rst);
                    return rst;
                })
                .then(function(rst) {
                    // 这里该上传给后端啦
                    // 伪代码：ajax(rst.base64)..
					
			
                    return rst;
                })
				        });

    });
	
</script>
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
    <div class="t t2" style="margin-top:32pt;">
    	<div  class="tu"></div>
        <div class="zi">上传学生证正面照即可，<br />帮帮承诺不会泄漏您的任何个人信息</div>
    </div>
    <div class="t t3" style="margin-top:64pt;">
    	<div  class="tu"></div>
        <div class="zi">保守秘密无压力，秒速处理认证信息</div>
    </div>

    		<div style="height:50px; width:200px; padding-top:2pt; margin-top:6pt; margin-left:auto; margin-right:auto; margin-bottom:5pt">
    			<form style="height:90%;width:80%; margin-top:5pt;margin-left:50px;">
    			<input  type="text" id="UserName" placeholder="请输入您的真实姓名"     style="border-color: #878787; border-style: solid; border-top-width: 0px;border-right-width: 0px; border-bottom-width: 1px;border-left-width: 0px;width:80%;height:90%;font-size:10px; border-radius:10px;margin-top:40px;">
<!--				<input  type='email' id="Email" placeholder="请输入您的邮箱"     style="border-color: #878787; border-style: solid; border-top-width: 0px;border-right-width: 0px; border-bottom-width: 1px;border-left-width: 0px;width:80%;height:90%;font-size:10px; border-radius:10px;margin-top:10px;">
-->
                </form>
    			<img style="display:inline; width:25pt; height:25pt" src="../../../img/pencil.PNG">
    		</div>
        
            <div id="showResult" style=" margin:15pt auto; margin-bottom:45pt">
				<div class="jia" id="changeAvatar" style="  width:200pt; height:140pt;margin-left:15%;z-index:3; margin-top:65pt">
   				 <img  onclick="image.click()" src="../CSS/加.png"style="width:100%; height:100%; z-index:3; border-radius:6pt;-moz-border-radius:6pt; -webkit-border-radius:6pt; -o-border-radius:6pt;">
   			    </div>
                
                <div style=" margin-top:-170pt">
					<input type="button"  onclick="image.click()"  onchange="preImg(this.id,'imgPre')"; style="z-index:6;  float:left;width:200pt; height:140pt; border:#999 2px solid; border-radius:6pt;-moz-border-radius:6pt; -webkit-border-radius:6pt; -o-border-radius:6pt; margin-left:15%; margin-top:32pt; background:none ; ">  
					<input type="file" id="image"accept="image/*" capture="camera"  style=" display:none">
				</div>
    		</div>
    		 <!--  <div style=" width:200pt; height:140pt;margin-left:2pt; border-radius:6pt; overflow:hidden; margin-top:-140pt">
    			  <img id="imgPre" style=" background:none;width:100%; height:100%;z-index:5;">
    		   </div>-->
             <div id="showEdit" style="display: none;width:100%;height: 100%;position: absolute;top:48pt;left: 0;z-index: 9;">
        		<div style="width:100%;position: absolute;top:10px;left:0px;">
            		<button class="mui-btn" data-mui-style="fab" id='cancleBtn' style="margin-left: 10px;">取消</button>
            		<button class="mui-btn" data-mui-style="fab" data-mui-color="primary" id='confirmBtn' style="float:right;margin-right: 10px;">确定</button>
        		</div>
       			<div id="report">
          			<img src="image/mei.jpg" style=" width: 300px;height:300px; "> 
        		</div>
        
   			 </div>
             <br />
            <div style="height:32pt; width:80pt; margin:135pt auto;margin-top: -40px"> 
            <button type="submit"   id="sahngchuan" style=" font-size:12.8pt; margin-top:85pt" class="btn btn-success  btn-block" role="button">确定</button>
			 <button type="submit"  onClick="window.location='../../lhb/PHP/login.php'" style=" font-size:12.8pt; margin-top:10pt" class="btn  btn-default  btn-block" role="button">跳过</button>
            <textarea name="txt" rows="10" id="basetxt" style=" display:none;width:100%; border-radius:5px" onclick="this.checked = true" placeholder="base64码" ></textarea>
            </div>
<input type="hidden" value="<?php echo $PhoneNumber; ?>" id="PhoneNumber">
</div>
</body>
</html>
<script>
function Cut_data(){
	        var imgurl=$("#basetxt").val();
			var phone=$("#PhoneNumber").val();
			$.post('../handfile/ACHand.php', { StudentCardImage: imgurl,PhoneNumber:phone}, function (text, status) { alert("上传成功");Email() });
			
 }
 
 $("#sahngchuan").click(function(){
	 if(!$("#UserName").val()){alert("请输入真实姓名")}
			else if(!$("#basetxt").val()){alert("请上传学生证正面！")}
			//else if(!$("#Email").val()){alert("请输入邮箱")}
			else {UpdateName();}
})
$(document).ready(function() {
    if(!"<?php echo $PhoneNumber; ?>"){
			window.location.href="../../lhb/PHP/login.php";
		}
});
//function UpdateEmailMsg(){
//	 $.ajax({
//	  url:"../handfile/personalDataInsertEmail.php?PhoneNumber="+$("#PhoneNumber").val()+"&Email="+$("#Email").val(),
//	  Type:"GET",
//	  dataType:"Json",
//	  success:function(data){
//		  
//		  
//	  },
//	  error:function(XMLHttpRequest){
//		  console.log(XMLHttpRequest.readyState)
//	  },
//	})}  
 function UpdateName(){
	 $.ajax({
	  url:"../handfile/InsertUserName.php?PhoneNumber="+$("#PhoneNumber").val()+"&UserName="+$("#UserName").val(),
	  type:"GET",
	  dataType:"Json",
	  success:function(data){
		  console.log($("#UserName").val());
		 // UpdateEmailMsg();
		  Cut_data();
	  },
	  error:function(XMLHttpRequest){
		  console.log(XMLHttpRequest.readyState)
	  },
	})} 
function Email(){
	$.ajax({
		url:"../../phpmailer/index.php",
		type:"GET",
		data:{"Email":'516108843@qq.com',"Note":"有人提交了认证审核，及时审核！"},
		dataType:"Text",
	   success:function(data){console.log(data);window.location.href="../../lhb/PHP/login.php"},
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})

}	//认证通知
</script>