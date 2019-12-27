
<html>
<head>
<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>身份审核</title>
<link rel="stylesheet" href="../CSS/bootstrap.min.css">
<script src="../JS/jquery-3.2.0.js"></script>
<script src="../JS/bootstrap.min.js"></script> 
<style>
html,body,.page{width:100%; height:100%; overflow: auto; margin:0; padding:0; background:#FFF}

.header{ height:38pt; background:#00BB89;}
.t{ height:200pt; border:#999 1pt solid; width:100%; margin-bottom:10pt}
.image{ height:180pt; width:200pt;border:#999 1pt solid; margin-top:10pt; float:left; overflow:hidden}
.Msg{ float:left; margin-top:80pt; margin-left:-25pt; width:50pt; height:50pt}
.OK{ float:left; margin-top:10pt; margin-left:15pt; width:50pt; height:50pt;}
#Yes{ background:#CCF5AF; border-radius:5pt; width:50pt;}
#No{ margin-top:10pt;  border-radius:5pt; width:50pt;}
</style>
</head>

<body>
<div class="header text-center navbar-fixed-top">
	<!--<a href="personalData.php" style="float:left; height:30pt; width:30pt; margin-top:8pt; overflow:hidden"><img src="../CSS/后退白色.png"  style="width:100%" ></a>-->
  	<h1 style="font-size:15pt; color:#FFF; margin:0 10% ; line-height:38pt">身份审核</h1>
</div>
<div id="blanckbar" style="height:48pt"></div>
<!--<div class="t">
	<div class="image">
    	<img src="" style="width:100%; height:100%">
    </div>
    <div class="OK">
      <button id="Yes" type="submit">通过</button>
      <button id="No" type="submit">不通过</button>
    </div>
     <div class="Msg">
     <div>很多的</div>
      <div>很多的</div>
    </div>
</div>-->


</body>
</html>

<script type="text/javascript">
function InsertNotice_AC(PhoneNumber){  //审核成功
	$.ajax({
	 		 	url:"../handfile/Insert_AC.php",
	  			type:"POST",
	 			dataType:"Json",
				data:{"PhoneNumber":PhoneNumber},
				async:false,
	  			success:function(data){

	 			 },
	 		    error:function(XMLHttpRequest){
		 			 console.log(XMLHttpRequest.readyState)
	 			 },
			})
}
function InsertNotice_AC_no(PhoneNumber){  //审核不成功
	$.ajax({
	 		 	url:"../handfile/insertAC_no.php",
	  			type:"POST",
	 			dataType:"Json",
				data:{"PhoneNumber":PhoneNumber},
				async:false,
	  			success:function(data){
		 
	 			 },
	 		    error:function(XMLHttpRequest){
		 			 console.log(XMLHttpRequest.readyState)
	 			 },
			})
}
function update_1(PhoneNumber){
	$.ajax({
	  url:"../handfile/updateshenhe_1.php",
	  Type:"GET",
	  dataType:"Json",
	  data:{"PhoneNumber":PhoneNumber},
	  success:function(data){
		  console.log(data);
		  InsertNotice_AC(PhoneNumber);
	  },
	  error:function(XMLHttpRequest){
		  console.log(XMLHttpRequest.readyState)
	  },
	})
}
function update_2(PhoneNumber){  //不通过
	$.ajax({
	  url:"../handfile/updateshenhe_2.php",
	  Type:"GET",
	  dataType:"Json",
	  data:{"PhoneNumber":PhoneNumber},
	  success:function(data){
		  console.log(data);
		  InsertNotice_AC_no(PhoneNumber);
	  },
	  error:function(XMLHttpRequest){
		  console.log(XMLHttpRequest.readyState)
	  },
	})
}
function UserMsgGet(){
	$.ajax({
		url:"../handfile/ACshenheHand.php",
		Type:"POST",
		data:"",
		dataType:"Json",
		success:function(data){$.each(data,function(index,comment){
			      
				  var str=comment.StudentCardImage;
				  var re=new RegExp(" ","g");
				  Newstr=str.replace(re,"+");
				  console.log(Newstr);
			
			$("#blanckbar").after(" <div class='t'><input id='email' type='hidden' value='"+comment.Email+"'><div class='image'><img src='"+Newstr+"' style='width:100%; height:100%'></div><div class='OK'><button id='Yes' onClick='update_1("+comment.PhoneNumber+")' type='submit'>通过</button> <button id='No' onClick='update_2("+comment.PhoneNumber+")' type='submit'>不通过</button></div><div class='Msg'><div>"+comment.UserName+"</div> <div>"+comment.PhoneNumber+"</div> </div>");
		
		})}
	})
}
$(function(){
	UserMsgGet();
})
</script>