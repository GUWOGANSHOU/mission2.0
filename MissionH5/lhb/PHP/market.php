<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<script src="../../js/Jquery/jquery-3.2.0.js"></script>
<script src="../../js/Jquery/session.js"></script>
<script src="../js/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
     <script type="text/javascript" src="../../hbl/via/js/lrz6.mobile.min.js"></script> 
    <script type="text/javascript" src="../../hbl/via/dist/lrz.all.bundle.js"></script>
    <script type="text/javascript" src="../../hbl/via/js/cropper.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../hbl/via/css/cropper.min.css">
    <link rel="stylesheet" type="text/css" href="../../hbl/via/css/mui.min.css">


<link href="../CSS/MissionExperAdd.css" rel="stylesheet"  type="text/css">
<title></title>
	<style>
		body{
			height: 100%;
			width: 100%;
			background-color:#FCFCFC;
			
			}
		#PopPannel{
			height: 180px;
			width: 90%;
			background: white;
			margin: auto;
			position:absolute;
			left: 5%;
			top: 30%;
			animation: translation 0.5s;
			-webit-animation: translation 0.5s;
			display: none;
			z-index: 90;
		}
		#floatlayer{
			height: 100%;
			width: 100%;
			background: rgba(0,0,0,0.3);
			position: fixed;
			z-index: 89;
			display: none;
		}
		#Ok{
			display: block;
			margin: auto;	
}
		#msg{
			width: 100%;
			text-align: center;
		}
		#confirm{
			width: 90%;
			height: 30px;
			background: #45D19F;
			display: block;
			text-align: center;
			line-height: 30px;
			margin: auto;
			margin-top: 50px	
		}

		@keyframes translation{
			0%{top: 25%;opacity: 0.5;}
			100%{top:30%;opacity: 1;}
		}
		@-webkit-keyframes translation{
			0%{top: 25%;opacity: 0.5;}
			100%{top:30%;opacity: 1;}
		}
			@keyframes hide{
			0%{top: 30%;opacity: 1;}
			99%{top:25%;opacity: 0;}
			100%{display: none}
		}
		@-webkit-keyframes hide{
			0%{top: 30%;opacity: 1;}
			99%{top:25%;opacity: 0;}
			100%{display: none}
		}

.rtt-hea{
    float: left;
    width: 100%;
    height: 4.5rem;
    background: #10c092;
    line-height: 1.12rem;
    color:#ffffff;
    text-align: center;
    font-size: .366rem;
    position: relative;
	margin-bottom:.7rem;
}
.rtt-hea img{
    position: absolute;
    top: .8rem;
    left: .3rem;
    float: left;
    width: 4.6rem;
    height: 4.6rem;
}
.hh{
	font-size:25px;
	margin-top:6%;
	color:#FFF
	}
#Title{
	display:block;
	width:90%;
	margin-bottom:0.3rem auto;
	margin-left:3%;
	border:none;
	height:4rem;
	font-size:1.5rem;
	border-radius:.4rem;
	
	}
#Content{
	display:block;
	width:90%;
	margin:0 auto;
	border:none;
	margin-left:3%;
	font-size:1.5rem;
	border-radius:.4rem;
	}
#AveragePrice{
	display:block;
	width:80%;
	margin:2rem auto;
	border:#999 1px solid;
	height:5.5rem;
	font-size:1.5rem;
	border-radius:.4rem
	}
.in4{
	display:block;
	width:80%;
	margin:0 auto;
	border:0;
	}
	#values{
		border:none;
		
		}
#button{
	width:80%;
	height:3.8rem;
	line-height: 3.8rem;
	background-color:#45D19F;
	text-align:center;
	margin:2rem auto;
	border-radius:.3rem;
	top: 250px;
	position: relative;
	}
input::-webkit-input-placeholder {
	font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif
}
 input:-moz-placeholder {
  font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif
  }
  input::-moz-placeholder {
  font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif
}
 input::-ms-input-placeholder {
   font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif
 }
	</style>
    <script>
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

<body bgcolor="#EDEDED">
	<div id="floatlayer"></div>
	<div id="PopPannel">
		<img width="60px"  height="60px"  src="../image/IMG_5182.PNG" id="Ok" />
		<p id="msg">提交成功，审核结果将通过短信通知</p>
		<a id="confirm" href="#" >确定</a>
	</div>
	<header class="rtt-hea">
    <a onclick='history.go(-1)'><img width="30px" style="width: 30px;height: 30px" src="../../lhb/images/fanhui.gif"><p class="hh">闲置发布</p></a>
</header>

<br/>
<form id="Add" name="Add" >
<input id="Title" name="Title" placeholder="标题或物品名称" />
<div style="height:2px; width:93%; margin:5pt auto; background-color:#A7A3A4; "></div>
<textarea rows="4" id="Content" name="Content" placeholder="介绍下物品或描述下物品的故事" ></textarea>
<div style="height:2px; width:93%; margin:3pt auto; background-color:#A7A3A4; "></div>
 <div style="width:90%; height:30pt;  margin-left:3%;">
 <div style="height:30pt; width:15%;font-size:13.8px;  line-height:30pt; border:#909090 1.5px solid ;font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font-weight:200; color:#000000; border-radius:1.5px; display:inline-block; border-radius:3pt;">一口价:</div>
 <input  id="values" type="text"  style="display:inline-block; height:28pt;width:70%; border-bottom:1px #E4E2E2 solid; margin-bottom:1pt;"/>
 </div>
 <div style="height:2px; width:93%; margin-top:2pt; background-color:#A7A3A4;"></div>
<input id="UserId" type="hidden" name="UserId"/>
<input type="hidden" name="MissionExpertState" value="0"/>
	<div id="button" class="confirmme"><a style="text-decoration: none;color: white;white:" href="#">提交</a></div>
</form> 
 <div id="showResult" style=" margin:15pt auto; position: relative;top:-70pt">
				<div class="jia" id="changeAvatar" style="  width:200pt; height:140pt;margin-left:78pt;z-index:3; margin-top:30pt">
   				 <img  onclick="image.click()" src="../../hbl/CSS/加.png"style=" height:100%; z-index:3; border-radius:6pt;-moz-border-radius:6pt; -webkit-border-radius:6pt; -o-border-radius:6pt;">
   			    </div>
                
                <div style=" margin-top:-170pt">
					<input type="button"  onclick="image.click()"  onchange="preImg(this.id,'imgPre')"; style="z-index:6;  float:left;width:200pt; height:140pt; border:#999 2px solid; border-radius:6pt;-moz-border-radius:6pt; -webkit-border-radius:6pt; -o-border-radius:6pt; margin-left:15%; margin-top:32pt; background:none ; ">  
					<input type="file" id="image"accept="image/*"   style=" display:none">
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
                      <textarea name="txt" rows="10" id="basetxt" style=" display:none; width:100%; border-radius:5px" onclick="this.checked = true" placeholder="base64码" ></textarea>

<input type="hidden" value="" id="Id">
</body> 
</html>
<script>
function Cut_data(Id){
	        var imgurl=$("#basetxt").val();
			var phone=$.session.get("PhoneNumber");
			
			$.post('../handfile/ImageHand1.php', { Image:imgurl,UserId:phone,Id:Id}, function (text, status) { //Email() 
			});
			
 }
	$("#UserId").val($.session.get("PhoneNumber"))
	$("#confirm").on("touchstart",function()
	{
		$("#PopPannel").css("animation","hide 0.5s");
		setTimeout(function(){$("#PopPannel").hide(),$("#floatlayer").hide(),window.location='MissionExperAcedList.php'},200);
	})
	function submitme(){
		$("#PopPannel").css("animation","translation 0.5s").show()
		$("#floatlayer").css("display","block");//弹窗
	} ;
	
	
	/*表单验证*/
	$('.confirmme').on('touchstart',function(){
		/*验证逻辑*/
		var title = document.getElementById('Title');
		var content = document.getElementById('Content');
		var AveragePrice = document.getElementById('AveragePrice'); 
		if(!title.value.trim()){
			alert('请输入认证达人标题');
			title.value = ''
		}else{
			if(!content.value.trim()){
				alert('请输入认证达人内容');
				content.value = ''
			}
			else if(content.value.trim().length>50){
				alert('不能输入多于50字');
				content.value = ''
			}
			else{
				if(!parseFloat(AveragePrice.value)){
					alert('请输入数字');
					AveragePrice.value = ''
				}else if(parseFloat(AveragePrice.value)){
					var n = parseFloat(AveragePrice.value).toFixed(2);
					AveragePrice.value = n;
					/*验证成功请求后台*/
					$.ajax({
						url:"../handfile/MissionExpertAdd.php",
						type:"POST",
						data:$("#Add").serialize(),
						dataType:"Json",
						success:function(data){
							console.log(data);
							$("#Id").val(data);
							Cut_data($("#Id").val());
							submitme();
							},
						error:function(data){}
					})
				}
			}
		}
	});   
	
	
</script>
<script>
$(document).ready(function() {
    $("#button").button();
});
</script>

      
