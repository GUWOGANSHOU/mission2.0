<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<title>无标题文档</title>
<script src="../../js/Jquery/jquery-3.2.0.js"></script>
<script src="../../js/Jquery/jquery.mobile-1.4.5.min.js"></script>
<style>
body{
	margin:0;
	padding:0;
	}
#MissionPromulgatorId_lunbo{
	border:none;
	line-height:35px;
	font-size:17px;
	background-color:#14BF62;
	text-overflow:ellipsis;
	width:14%;
	}
#lunboo{
	display:flex;
	background-color:#14BF62; 
	height: 35px;
}
#lunboo input{
	box-sizing: border-box;
	text-align: center;
	color:#000000;
}
img{
	width:10%; 
	background-color:#14BF62; 
	z-index: 2;
}
.fixed{
	position: relative;
	display: flex;
	width: 90%;
	background-color:#14BF62;
	overflow: hidden;
}
.marqueeBox{
	position: absolute;
	z-index: 0;
	display: flex;
	margin: 0;
	padding: 0;
	height: 100%;
	list-style: none;
}
.marquee{
	width: 337px;
	height: 100%;
}

</style>
</head>
<body>
<div id="lunboo">
	<img src="../../lhb/images/sound.png">
	<div class="fixed">
		<ul class="marqueeBox">
			<li class="marquee">
				<input class="Missiondescribe_lunbo" value="" type="text" style="background-color:#14BF62; border:none;text-overflow:ellipsis;width:38%;height:35px; line-height:35px;font-size:16px;" disabled >
				<input class="MissionPromulgatorTime_lunbo" value="" type="text" style="background-color:#14BF62; border:none;text-overflow:ellipsis; width:41%; height:35px; line-height:35px;font-size:16px;" disabled="disabled">
				<input class="MissionReward_lunbo" value="" type="text" style="background-color:#14BF62; border:none;text-overflow:ellipsis; width:14%;height:35px; line-height:35px;font-size:16px;"  disabled> 
			</li>
			<li class="marquee">
				<input class="Missiondescribe_lunbo" value="" type="text" style="background-color:#14BF62; border:none;text-overflow:ellipsis;width:38%;height:35px; line-height:35px;font-size:16px;" disabled>
				<input class="MissionPromulgatorTime_lunbo" value="" type="text" style="background-color:#14BF62; border:none;text-overflow:ellipsis; width:41%; height:35px; line-height:35px;font-size:16px;" disabled="disabled">
				<input class="MissionReward_lunbo" value="" type="text" style="background-color:#14BF62; border:none;text-overflow:ellipsis; width:14%;height:35px; line-height:35px;font-size:16px;"  disabled> 
			</li>
			<li class="marquee">
				<input class="Missiondescribe_lunbo" value="" type="text" style="background-color:#14BF62; border:none;text-overflow:ellipsis;width:38%;height:35px; line-height:35px;font-size:16px;" disabled=>
				<input class="MissionPromulgatorTime_lunbo" value="" type="text" style="background-color:#14BF62; border:none;text-overflow:ellipsis; width:41%; height:35px; line-height:35px;font-size:16px;" disabled=>
				<input class="MissionReward_lunbo" value="" type="text" style="background-color:#14BF62; border:none;text-overflow:ellipsis; width:14%;height:35px; line-height:35px;font-size:16px;"  disabled=> 
			</li>
		</ul>
	</div>
</div>
</body>
</html>


<script>
function ReadMsg_lunbo(){
  	  $.ajax({
	  url:"../handfile/MsgDataHand.php",
	  Type:"GET",
	  dataType:"Json",
	  async:false,
	  success:function(data){
		  $.each(data,function(index,comment){
			  console.log(data)
				var phone=comment.MissionPromulgatorId;
	  		    var UserId=phone.replace(/(\d{3})\d{4}(\d{4})/,'$1****$2');
				
				var Missiondescribe_lunbo = '任务：'+comment.MissionTitle;
				var MissionPromulgatorTime_lunbo = comment.MissionPromulgatorTime;
				var MissionReward_lunbo = '￥'+comment.MissionReward
				//请求数据填充到dataArr
				dataArr.push({
					Missiondescribe_lunbo:Missiondescribe_lunbo,
					MissionPromulgatorTime_lunbo:MissionPromulgatorTime_lunbo,
					MissionReward_lunbo:MissionReward_lunbo
				})
		  	  })
			  },
	 error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.status);
            console.log(XMLHttpRequest.readyState);
            console.log(textStatus);
        },

    })
}
	//定义一个全局变量来判断是否请求数据并填充成功
	var renderSuccess = false;
	//定义一个全局变量来接收获取到的数据
	var dataArr = [];
	//填充数据到input标签
	function render(){
		//每次填充都重置数组，为了避免数据累积
		dataArr = [];
		//先请求3次数据
		ReadMsg_lunbo();
		ReadMsg_lunbo();
		ReadMsg_lunbo();
		console.log(dataArr)
		if(dataArr.length == 0){
			console.log('出错啦')
			return false
		}else{
			renderSuccess = true;
			dataArr.forEach(function(a,index){
				
				document.querySelectorAll('.Missiondescribe_lunbo')[index].value = a.Missiondescribe_lunbo;
				document.querySelectorAll('.MissionPromulgatorTime_lunbo')[index].value = a.MissionPromulgatorTime_lunbo;
				document.querySelectorAll('.MissionReward_lunbo')[index].value = a.MissionReward_lunbo
			})
		}
	}
	//滚动
	function slide(){
		render();//每次滚动前都先嵌入数据
		//判断数据是否请求成功，避免空数据无限滚动
		if(renderSuccess){
			var slideW = -parseFloat($('.marqueeBox').css('width'))*2/3;
			$('.marqueeBox').animate({left:slideW+'px'},8000,'linear',function(){
				$(this).css({left:0});
				slide();//递归回调
			});
		}else{
			console.log(renderSuccess)
		}
	}
	//页面加载完立即调用滚动函数
	$(document).ready(function(){
		slide()
	})

</script>	 
	 