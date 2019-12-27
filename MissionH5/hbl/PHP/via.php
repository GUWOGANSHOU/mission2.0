<!doctype html>
<html>
<head>
<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>上传头像</title>
<link rel="stylesheet" href="../CSS/bootstrap.min.css">
<script src="../JS/jquery-3.2.0.js"></script>
<script src="../JS/bootstrap.min.js"></script> 
<link rel="stylesheet" type="text/css" href="../via/css/cropper.min.css">
    <link rel="stylesheet" type="text/css" href="../via/css/mui.min.css">
<!--    <script type="text/javascript" src="../via/js/jquery-1.11.1.min.js"></script>-->
     <script type="text/javascript" src="../via/js/lrz6.mobile.min.js"></script> 
    <script type="text/javascript" src="../via/dist/lrz.all.bundle.js"></script>
    <script type="text/javascript" src="../via/js/cropper.min.js"></script>
    <script type="text/javascript">
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
                minContainerHeight: 100,
                minContainerWidth: 100
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
                    width: 500,
                    height: 500,
                    quality: 0.6
                })
                .then(function(rst) {
               
					
					
                    doFinish(startTimestamp, that.files[0].size, rst);
					
                    return rst;
					
                })
                .then(function(rst) {
                    // 这里该上传给后端啦
                    // 伪代码：ajax(rst.base64)..
			
 					 return rst;		
                })
                .then(function(rst) {
                    // 如果您需要，一直then下去都行
                    // 因为是Promise对象，可以很方便组织代码 \(^o^)/~

					
                })
                .catch(function(err) {
                    // 万一出错了，这里可以捕捉到错误信息
                    // 而且以上的then都不会执行

                    alert(err);
                })
                .always(function() {
                    // 不管是成功失败，这里都会执行
                });
        });


    });


    </script>


<style>
html,body,.page{width:100%; height:100%; overflow: auto; margin:0; padding:0; background:#FFF}

.header{ height:48pt; background:#00BB89;}

</style>


</head>

<body>
<div class="header text-center navbar-fixed-top">
	<a href="personalData.php" style="float:left; height:30pt; width:30pt; margin-top:8pt; overflow:hidden"><img src="../CSS/后退白色.png"  style="width:100%" ></a>
  	<h1 style="font-size:17pt; color:#FFF; margin:0 10% ; line-height:48pt">选取头像</h1>
</div>

   <div id="showResult" style="margin-top:58pt">

        <div id="changeAvatar" style=" z-index:3; margin:0 auto; margin-top:92pt; border-radius:90pt;-moz-border-radius:90pt; -webkit-border-radius:90pt; -o-border-radius:6pt; ">
            <img src="../../lhb/images/avatar.png" onclick="image.click()" style="width: 100pt; height:100pt; overflow:hidden; border-radius:95pt;-moz-border-radius:95pt; -webkit-border-radius:95pt; -o-border-radius:90pt; margin-top: 0;margin: 0 auto;display:block;">
        </div>
        
        <div style="width: 110pt; height:110pt; margin:0 auto; margin-top:-105pt">
        	<input id="image1"  type="button"  onclick="image.click()"  style=" z-index:6; width:110pt; height:110pt; border:#999 2px solid; border-radius:100pt;-moz-border-radius:100pt; -webkit-border-radius:100pt; -o-border-radius:6pt;  background:none ; ">  
            <input id="image"  type="file" accept="image/*" style="display:none" >
            

        </div>
    </div>

    <div id="showEdit" style="display: none;width:100%;height: 100%;position: absolute;top:48pt;left: 0;z-index: 9;">
        <div style="width:100%;position: absolute;top:10px;left:0px;">
            <button class="mui-btn" data-mui-style="fab" id='cancleBtn' style="margin-left: 10px;">取消</button>
            <button class="mui-btn" data-mui-style="fab" data-mui-color="primary" id='confirmBtn' style="float:right;margin-right: 10px;">确定</button>
        </div>
        <div id="report">
          
        </div>
        
    </div>
 <button id="sahngchuan" type="submit" style="  width:30%; font-size:12.8pt; margin-left:37%; margin-top:15pt" class="btn btn-success  btn-block" href="#" role="button">上传</button>
<input id="PhoneNumber" type="hidden">
<textarea name="txt" rows="10" id="basetxt" style=" display:none;width:100%; border-radius:5px" onclick="this.checked = true" placeholder="base64码" ></textarea>



</body>
</html>
<script src="../../js/Jquery/session.js"></script>
<script >
 function Cut_data(){
	        var imgurl=$("#basetxt").val();
			var phone=$.session.get("PhoneNumber");
			$.post('../handfile/viaHand.php', { UserImage: imgurl,PhoneNumber:phone}, function (text, status) { alert("上传成功") });
			
 }
 
 $("#sahngchuan").click(function(){Cut_data();})
$(document).ready(function() {
    if(!$.session.get("PhoneNumber")){
			window.location.href="../../lhb/PHP/login.php";
		}
});
$(function(){
	ReadMsg();
})

    function ReadMsg(){
  	  $.ajax({
	  url:"../handfile/personalDataHandForImage.php?PhoneNumber="+$.session.get("PhoneNumber"),
	  Type:"GET",
	  dataType:"Json",
	  success:function(data){$.each(data,function(index,comment){
		  		
		         $("#PhoneNumber").val($.session.get("PhoneNumber"));
				 if(comment.UserImage){
				  var str=comment.UserImage;
				  var re=new RegExp(" ","g");
				  var Newstr=str.replace(re,"+");
				 
 				 $("#changeAvatar > img").attr("src",Newstr );
				 }
				  
		  	  })},
    })}
</script>
