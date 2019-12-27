
<html>
<head>
<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>用户交易记录</title>
<link rel="stylesheet" href="../CSS/bootstrap.min.css">
<script src="../JS/jquery-3.2.0.js"></script>
<script src="../JS/bootstrap.min.js"></script> 
<!--	<link rel="stylesheet" type="text/css" href="../css/loading.css">
-->
<style>
html,body,.page{width:100%; height:100%; overflow: auto; margin:0; padding:0; background:#FFF}

.header{ height:38pt; background:#00BB89;}
.t{ height:70pt; border:#999 1pt solid; width:100%; margin-bottom:10pt}
.image{ height:50pt; width:200pt;border:#999 1pt solid; margin-top:10pt; float:left; overflow:hidden}
.Msg{ float:left; margin-top:80pt; margin-left:-25pt; width:50pt; height:30pt}
.OK{ float:left; margin-top:10pt; margin-left:15pt; width:50pt; height:30pt;}
#Yes{ background:#CCF5AF; border-radius:5pt; width:50pt;}
#No{ margin-top:10pt;  border-radius:5pt; width:50pt;}

/*.spinner5 {
  animation: spinnerFive 1s linear infinite;
  border: solid 1.5em #4DB6AC;
  border-right: solid 1.5em transparent;
  border-left: solid 1.5em transparent;
  border-radius: 100%;
  width: 0;
  height: 0;
}

@keyframes spinnerFive {
  0% {
    transform: rotate(0deg);
  }
  50% {
    transform: rotate(60deg)
  }
  100% {
    transform: rotate(360deg);
  }
}
/* Spinner 5 ends here */*/


</style>
</head>

<body>
<!--<div style="width:100%; height:100%; margin:0 auto">
  <div id="loading"  style=" margin-left:40%;display:none; width:65pt; height:65pt"class="canvas canvas5">
    <div class="spinner5"></div>   
  </div>
</div>-->
<div class="header text-center navbar-fixed-top">
<!--	<a href="Check_Withdraw.php" style="float:left; height:20pt; width:20pt; margin-top:9pt; overflow:hidden"><img src="../CSS/后退白色.png"  style="width:100%" ></a>
-->  	<h1 style="font-size:15pt; color:#FFF; margin:0 10% ; line-height:38pt">用户交易记录</h1>
<a  href="Check_Withdraw.php">提现审核</a>
</div>
<div  style="height:48pt"></div>
<input type="text" id="tel" value="">

<div id="blanckbar" style="height:48pt"></div>

</body>
</html>
<script type="text/javascript">
$(document).ajaxStart(function(){$("#loading").slideToggle(1)});
	$(document).ajaxStop(function(){$("#loading").slideToggle(1)});
	
	$("#tel").keydown(function(){
		
		if($("#tel").val()!=$("#id").val()){
			 $("a").remove();
			}
	})
	$("#tel").keyup(function(){
		GetWallet1();
		
	})
	
function GetWallet(){
	
	$.ajax({
		url:"../handfile/Check_WalletHand.php",
		type:"GET",
		async: false,
		data:{},
		dataType:"Json",
	   success:function(data){$.each(data,function(index,comment){
		   
		
		  $("#blanckbar").after("<a href='../../lhb/PHP/transaction.php?UserId="+comment.UserId+"' id='"+comment.UserId+"'><div class='t'><div class='image'><div id='id'>用户Id:"+comment.UserId+"</div><div>用户名称:"+ReadMsg(comment.UserId)+"</div></div></div></a>")
	   
	   })},
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})
    
}

function GetWallet1(){
	
	$.ajax({
		url:"../handfile/Check_WalletHand1.php?UserId="+$("#tel").val(),
		type:"GET",
		data:{},
		async:"false",
		dataType:"Json",
	   success:function(data){$.each(data,function(index,comment){
		   $("#blanckbar").after("<a href='../../lhb/PHP/transaction.php?UserId="+comment.UserId+"' id='"+comment.UserId+"'><div class='t'><div class='image'><div id='id'>用户Id:"+comment.UserId+"</div><div>用户名称:"+ReadMsg(comment.UserId)+"</div></div></div></a>")
	   
	   })},
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})
    
}

    function ReadMsg(id){
	  var name;	
  	  $.ajax({
	  url:"../handfile/personalDataHand.php?PhoneNumber="+id,
	  type:"GET",
	  async:false,
	  dataType:"Json",
	  
	  success:function(data){$.each(data,function(index,comment){
		  
				 name=comment.UserName;
  			 console.log(comment.UserName);
				
		  	  })},
    })
	 return name;
	}
$(function(){
	//GetWallet();
	
})
</script>