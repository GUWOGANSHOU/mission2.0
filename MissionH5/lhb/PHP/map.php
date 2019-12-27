<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
<title></title>
<style>
	body,html{
		height:100%;
		width: 100%;
	}
	*{
		margin:0;
		padding: 0;
	}
	</style>
</head>

<body>
<iframe id="test" src="https://m.amap.com/picker/?keywords=学生公寓,教学楼,公交站&key=f7f62893ebca999965900af284d4d0d5" height="100%" width="100%" style=" box-shadow: none; border:none;" frameborder="0" ></iframe> 
</body>
</html>
<script>
	 (function(){
    var iframe = document.getElementById('test').contentWindow;
    document.getElementById('test').onload = function(){
      iframe.postMessage('hello','https://m.amap.com/picker/');
    };
    window.addEventListener("message", function(e){
		window.location="TaskIssue.php?UserId=<?php echo $_GET['UserId'];?>&name="+e.data.name;
    }, false);
}())
</script>