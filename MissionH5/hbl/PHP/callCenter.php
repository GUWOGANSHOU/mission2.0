<!doctype html>
<html>
<head>
<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>联系客服</title>
<link rel="stylesheet" href="../CSS/bootstrap.min.css">
<script src="../JS/jquery-3.2.0.js"></script>
<script src="../JS/bootstrap.min.js"></script> 
<style>
html,body,.page{width:100%; height:100%; overflow: auto; margin:0; padding:0; background:#E5F4EF}

.header{ height:52pt; background:#10C091;}
.t1{width:100%; max-height:214pt; height:214pt; z-index:-1; overflow:auto; background:#FFF}
input:focus{outline:none; border:none; box-shadow:none}
</style>
<script type="text/javascript">
 function getFileUrl(sourceId) { 
var url; 
if (navigator.userAgent.indexOf("MSIE")>=1) { // IE 
url = document.getElementById(sourceId).value; 
} else if(navigator.userAgent.indexOf("Firefox")>0) { // Firefox 
url = window.URL.createObjectURL(document.getElementById(sourceId).files.item(0)); 
} else if(navigator.userAgent.indexOf("Chrome")>0) { // Chrome 
url = window.URL.createObjectURL(document.getElementById(sourceId).files.item(0)); 
} 
return url; 
} 

/** 
* 将本地图片 显示到浏览器上 
*/ 
function preImg(sourceId, targetId) { 
var url = getFileUrl(sourceId); 
var imgPre = document.getElementById(targetId); 
imgPre.src = url; 
} 
</script>
</head>

<body>
<div class="header text-center navbar-fixed-top">
	<a href="#" style="float:left; height:30pt; width:30pt; margin-top:10pt; overflow:hidden"><img src="../CSS/后退白色.png"  style="width:100%" ></a>
  	<p style=" color:#FFF;width:24pt; height:24pt; float:left; margin-top:14pt; margin-right:0; margin-left:25%"><img src="../CSS/客服咨询绿.png" style="width:100%; float:left"></p>
	<h1 style="font-size:17.6pt; float:left; color:#FFF; margin-top:18pt; margin-left:6%">客服</h1>
</div>
<form style="margin-top:52pt"  >
  <div class="t1 ">
    <textarea style=" font-size:9.6pt; height:106pt; max-height:106pt; overflow:auto;border:none" class="form-control" rows="7" placeholder="描述遇到的问题或你的建议..."></textarea>
    
   <div class="input-group" style="padding:0">
		<div style="float:left;">
    	<input type="button"onclick="path.click()" onchange="preImg(this.id,'imgPre')"; style=" z-index:1;float:left;width:100pt; height:100pt; border:#999 2px solid; margin-left:2pt; background:none;  ">  
		<input type="file" id="path" accept="image/*" onchange="preImg(this.id,'imgPre')";  style=" display:none;">
    	</div>
        <div style=" float:left; color:#10C091; margin-top:80pt; opacity:0.8" >点击上传图片</div>
   </div>
   <div style=" width:100pt; height:100pt;margin-left:2pt; overflow:hidden; margin-top:-100pt">
    <img  src="../CSS/加.png" style="width:100%; z-index:3;">
    
    </div>
    
    <div style=" width:100pt; height:100pt;margin-left:2pt; overflow:hidden; margin-top:-100pt">
    <img id="imgPre" style="width:100%; z-index:5;">
    </div>
    
   </div>


<div style="background:#FFF; height:32pt; max-height:32pt; overflow:hidden; margin-top:12pt">
     <span style="line-height:32pt; font-size:12pt; float:left; color:#333; margin-left:6pt ">在线咨询</span>
      <a href="#" style="float:right; height:18.4pt; width:18.4pt;  overflow:hidden; margin-top:7.2pt"><img src="../CSS/下一页、前进灰色.png" style="width:100%"></a>
</div>
<div style="background:#FFF; height:32pt; max-height:32pt; overflow:hidden; margin-top:12pt">
     <span style="line-height:32pt; font-size:12pt; float:left; color:#333; margin-left:6pt ">电话咨询</span>
      <a href="#" style="float:right; height:18.4pt; width:18.4pt; margin-top:7.2pt"><img src="../CSS/下一页、前进灰色.png" style="width:100%"></a>
</div>
<div style=" width:40%;margin:12pt auto">
		<button type="submit" style="height:32pt; font-size:12.8pt" class="btn btn-info  btn-block" href="#" role="button">提    交</button>
	</div>
</form>
</body>
</html>
