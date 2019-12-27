


<!doctype html>
<html>
<head>
<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>个人资料</title>
<link rel="stylesheet" href="../CSS/bootstrap.min.css">
<script src="../JS/jquery-3.2.0.js"></script>
<script src="../JS/bootstrap.min.js"></script> 
<style>
html,body,.page{width:100%; height:100%; overflow: auto; margin:0; padding:0; background:#F0F0F0}

.header{ height:48pt; background:#10C091;}
.t1{background:#FFF; width:100%; height:41pt; border-bottom:1px #CCCCCC solid; padding-left:10pt; padding-right:10pt}
.t2{background:#FFF; width:100%; height:72pt; border-bottom:1px #CCCCCC solid; padding-left:10pt; padding-right:10pt}

.t21{width:60pt; height:60pt; float:left; font-size:12pt; margin-top:2%}
.t22{width:40%; height:55pt; float:left; margin-top:4%; margin-left:10pt}
.t23{width:20pt; height:20pt; margin-top:9%; float:right}


.t11{width:30pt; height:20pt; float:left; margin-top:2%}
.t12{ width:100pt; line-height:20pt; float:left; font-size:12pt; margin-left:10pt; margin-top:3.5% }
.t13{width:20pt; height:20pt; margin-top:3.5%; float:right}ni
	
.trans{ animation: translation 0.5s;-webit-animation: translation 0.5s;position: relative}
.trans2{ animation: translation 0.7s;-webit-animation: translation 0.7s;position: relative}
.trans3{ animation: translation 0.9s;-webit-animation: translation 0.9s;position: relative}
.trans4{ animation: translation 1.1s;-webit-animation: translation 1.1s;position: relative}
.trans5{ animation: translation 1.3s;-webit-animation: translation 1.3s;position: relative}
.trans6{ animation: translation 1.5s;-webit-animation: translation 1.5s;position: relative}
.trans7{ animation: translation 1.7s;-webit-animation: translation 1.7s;position: relative}
.trans8{ animation: translation 1.9s;-webit-animation: translation 1.9s;position: relative}	
.trans9{ animation: translation 1.9s;-webit-animation: translation 1.9s;position: relative}	

	@keyframes translation{
		0% {left: -600px}
		100% {left: 0px}
	}
	@-webkit-keyframes translation{
		0% {left: -600px}
		100% {left: 0px}
	}	
</style>

<script type="text/javascript">
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})


</script>


</head>

<body>
<div class="header text-center navbar-fixed-top">
	<a href="mine.php" style="float:left; height:30pt; width:30pt; margin-top:8pt; overflow:hidden"><img src="../CSS/后退白色.png"  style="width:100%" ></a>
  	<h1 style="font-size:17pt; color:#FFF; margin:0 10% ; line-height:48pt">个人资料</h1>
</div>

<div class="t2" style=" margin-top:48pt">
    <div  style="width:35%; line-height:72pt; font-size:12pt; float:left; padding-left:10pt">头像</div>
	<div class="t23" style="float:right"><a href="via.php"><img src="../CSS/下一页、前进灰色.png" style="width:100%"></a></div>
    <div class="t21" id="report" style="float:right; width:60pt; height:60pt; overflow:hidden"><img id="touxiang" src="../../lhb/images/avatar.png" style=" border-radius:30pt;width:100%; height:100%"></div>
    
</div>

<div class="t1 trans">
    <div class="t12">昵称</div>
    
    <div class="t13"><button style="background:url(../CSS/%E4%B8%8B%E4%B8%80%E9%A1%B5%E3%80%81%E5%89%8D%E8%BF%9B%E7%81%B0%E8%89%B2.png) center; background-size: cover; border:none; width:20pt; height:20pt" type="button" data-toggle="modal" data-target=".bs-example-modal-lg"></button></div>
	<div class="t12 " id="NickName" style="color:#999; float:right; text-align:right">未设置，点击设置</div>
    
</div>
<div class="modal fade bs-example-modal-lg" style=" margin-top:180pt" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header" style="height:41pt">
    <button type="button"  id="NickName_close" class="close"  data-dismiss="modal" aria-label="Close"><span aria-hidden="true" >&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">修改昵称</h4>
    </div>
    <div class="modal-body" >
      
      		<input name="Nickname" id="Nickname" type="text" class="form-control" value="qw" placeholder="请输入昵称">
     		<button   onClick="UpdateNickNameMsg()" style="  margin-left:80%"type="submit" class="btn btn-default">确定</button>
      
    </div>
   </div>
  </div>
</div>   
<div class="t1 trans2"   style=" margin-top:15pt">
    <div class="t12"  >真实姓名</div>
   
	<div class="t12" id="realname" style="color:#999; padding-right:8pt; float:right; text-align:right">xxxx</div>
</div>
<div class="t1 trans3">
    <div class="t12">手机号</div>
    <div class="t12" id="phonenumber" style="color:#999;padding-right:8pt; float:right; text-align:right">xxxxx</div>
</div>
<div class="t1 trans4">
    <div class="t12" style="width:50pt">邮箱</div>
  
    <div class="t13"><button style="background:url(../CSS/%E4%B8%8B%E4%B8%80%E9%A1%B5%E3%80%81%E5%89%8D%E8%BF%9B%E7%81%B0%E8%89%B2.png) center; background-size: cover; border:none; width:20pt; height:20pt" type="button" data-toggle="modal" data-target=".bs-example-modal-lg5"></button></div>
    <div class="t12 " id="Email" style=" width:150pt;color:#999; float:right; text-align:right">未设置，点击设置</div>
	
</div>
<div class="modal fade bs-example-modal-lg5" style=" margin-top:180pt" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header" style="height:41pt">
    <button type="button"  id="Email_close" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" >&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">邮箱地址</h4>
    </div>
    <div class="modal-body" >
    
    <input  type="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
    <button  onClick="" id="UpdateEmailMsgBt" style=" margin-top:3pt; margin-left:80%" type="submit" class="btn btn-default">确定</button>
    
    </div>
   </div>
  </div>
 </div>
<div class="t1 trans5">
    <div class="t12">性别</div>
   
    <div class="t13"><button style="background:url(../CSS/%E4%B8%8B%E4%B8%80%E9%A1%B5%E3%80%81%E5%89%8D%E8%BF%9B%E7%81%B0%E8%89%B2.png) center; background-size: cover; border:none; width:20pt; height:20pt" type="button" data-toggle="modal" data-target=".bs-example-modal-lg1"></button></div>
	<div class="t12 "  id="Gender"style="color:#999; float:right; text-align:right">xx</div>
    
</div>

<div class="modal fade bs-example-modal-lg1" style=" margin-top:180pt" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header" style="height:41pt">
    <button type="button"  id="Gender_close" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" >&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">修改性别</h4>
    </div>
    <div class="modal-body" style="height:120pt">
     
    	<select id="sex" class="form-control">
  				<option value="1">男</option>
                <option value="0">女</option>
				</select>
         <button class="btn btn-default" onClick="UpdateGenderMsg()"  style=" margin-top:5pt; margin-left:80%"type="submit">确定</button>
      
    </div>
   </div>
  </div>
</div>
<div class="t1 trans9">
    <div class="t12">宿舍号</div>
   
    <div class="t13"><button style="background:url(../CSS/%E4%B8%8B%E4%B8%80%E9%A1%B5%E3%80%81%E5%89%8D%E8%BF%9B%E7%81%B0%E8%89%B2.png) center; background-size: cover; border:none; width:20pt; height:20pt" type="button" data-toggle="modal" data-target=".bs-example-modal-lg9"></button></div>
	<div class="t12 "  id="Address"style="color:#999; float:right; text-align:right">你还没有填写哦！</div>
    
</div>
<div class="modal fade bs-example-modal-lg9" style=" margin-top:180pt" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header" style="height:41pt">
    <button type="button"  id="Address_close" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" >&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">宿舍号</h4>
    </div>
    <div class="modal-body" >
    
    <input  type="text" class="form-control" id="address" placeholder="例如：17#210">
    <button  onClick="UpdateAddress()" id="" style=" margin-top:3pt; margin-left:80%" type="submit" class="btn btn-default">确定</button>
    
    </div>
   </div>
  </div>
 </div>
 
<div class="t1 trans6" style=" margin-top:15pt">
    <div class="t12" style="width:50pt">学校</div>
    
    <div class="t13"><button style="background:url(../CSS/%E4%B8%8B%E4%B8%80%E9%A1%B5%E3%80%81%E5%89%8D%E8%BF%9B%E7%81%B0%E8%89%B2.png) center; background-size: cover; border:none; width:20pt; height:20pt" type="button" data-toggle="modal" data-target=".bs-example-modal-lg2"></button></div>
	<div class="t12 " id="School" style="color:#999; float:right; text-align:right">福州大学</div>
</div>

<div class="modal fade bs-example-modal-lg2" style=" margin-top:180pt" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="height:41pt">
    	<button type="button"  id="School_close" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" >&times;</span></button>
   		 <h4 class="modal-title" id="myModalLabel">所在学校</h4>
      </div>
      <div class="modal-body">
     		 
             	<select id="SchoolId" class="form-control">
  				<option value="福州大学">福州大学</option>
                <option value="福建工程学院">福建工程学院</option>
                <option value="江夏学院">江夏学院</option>
                <option value="福建师范大学">福建师范大学</option>
                  <option value="医科大学">医科大学</option>
				</select>
                <button  onClick="UpdateSchoolMsg()" class="btn btn-default"  style=" margin-top:5pt; margin-left:80%"type="submit" >确定</button>
             
      </div>
    </div>
  </div>
</div>

<div class="t1 trans7">
    <div class="t12" style="width:50pt">学院</div>
    <div class="t13"><button style="background:url(../CSS/%E4%B8%8B%E4%B8%80%E9%A1%B5%E3%80%81%E5%89%8D%E8%BF%9B%E7%81%B0%E8%89%B2.png) center; background-size: cover; border:none; width:20pt; height:20pt" type="button" data-toggle="modal" data-target=".bs-example-modal-lg3"></button></div>
	<div class="t12 " id="Academy" style="width:150pt;color:#999; float:right; text-align:right">未设置，点击设置</div>
</div>

<div class="modal fade bs-example-modal-lg3" style=" margin-top:180pt" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="height:41pt">
    	<button type="button"  id="Academy_close" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" >&times;</span></button>
   		 <h4 class="modal-title" id="myModalLabel">所在学院</h4>
      </div>
      <div class="modal-body">
     		 
             	<select id="academy" class="form-control">
  				<option value="物理与信息工程学院" >物信学院</option>
  				<option value="电气工程与自动化学院" >电气工程与自动化学院</option>
  				<option value="经济与管理学院" >经管学院</option>
                <option  value="土木学院">土木学院</option>
                <option value="人文学院" >人文学院</option>
                <option value="外国语学院" >外国语学院</option>
                <option value="生工学院" >生工学院</option>
                <option  value="环资学院">环资学院</option>
                <option  value="人文社会科学学院">人文社会科学学院</option>
                <option  value="数计学院">数计学院</option>
                <option  value="石油化工学院">石油化工学院</option>
                <option  value="材料学院">材料学院</option>
				</select>
                 <button onClick="UpdateAcademyMsg()" class="btn btn-default"  style=" margin-top:5pt; margin-left:80%" type="submit" >确定</button>
           
      </div>
    </div>
  </div>
</div>
<div class="t1 trans8" style="margin-bottom:15pt">
    <div class="t12">入学年份</div>
    <div class="t13"><button style="background:url(../CSS/%E4%B8%8B%E4%B8%80%E9%A1%B5%E3%80%81%E5%89%8D%E8%BF%9B%E7%81%B0%E8%89%B2.png) center; background-size: cover; border:none; width:20pt; height:20pt" type="button" data-toggle="modal" data-target=".bs-example-modal-lg4"></button></div>
	<div class="t12 " id="Year" style="color:#999; float:right; text-align:right">2014年</div>

</div>

<div class="modal fade bs-example-modal-lg4" style=" margin-top:180pt" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="height:41pt">
    	<button id="year_close" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" >&times;</span></button>
   		 <h4 class="modal-title" id="myModalLabel">入学年份</h4>
      </div>
      <div class="modal-body">
     		 
             	<select id="year" class="form-control">
  				<option value="2014年">2014年</option>
                <option value="2015年">2015年</option>
                <option value="2016年">2016年</option>
                <option value="2017年">2017年</option>
				</select>
                 <button  onClick="UpdateYearMsg()"  style=" margin-top:5pt; margin-left:80%"type="submit" class="btn btn-default">确定</button>
             
      </div>
    </div>
  </div>
</div>

</body>
</html>
<script src="../../js/Jquery/session.js"></script>
<script type="text/javascript" >

$(document).ready(function() {
    if(!$.session.get("PhoneNumber")){
			window.location.href="../../lhb/PHP/login.php";
		}
});
ReadMsg();
ReadMsgForImage();

    function ReadMsg(){
  	  $.ajax({
	  url:"../handfile/personalDataHand.php?PhoneNumber="+$.session.get("PhoneNumber"),
	  type:"GET",
	  async:"true",
	  dataType:"Json",
	  cache:"true",
	  success:function(data){$.each(data,function(index,comment){
				  $("#realname").text(comment.UserName);
				  $("#NickName").text(comment.NickName);
				  $("#phonenumber").text(comment.PhoneNumber);
				  $("#Email").text(comment.Email);
				  
				  if(comment.Gender==1){
				  $("#Gender").text("男")}
				  else{$("#Gender").text("女")};
				  
				  $("#School").text(comment.SchoolId);
				  $("#Academy").text(comment.Academy);
				  $("#Year").text(comment.Year);
                  $("#Address").text(comment.Address);
				  
		  	  })},
    })}
  function ReadMsgForImage(){
  	  $.ajax({
	  url:"../handfile/personalDataHandForImage.php?PhoneNumber="+$.session.get("PhoneNumber"),
	  type:"GET",
	  async:"true",
	  dataType:"Json",
	  cache:"true",
	  success:function(data){$.each(data,function(index,comment){
			
				  //console.log(comment.UserImage);
                 var str=comment.UserImage;
			  var re=new RegExp(" ","g");
			  var Newstr=str.replace(re,"+");
////				  console.log(Newstr);
 		 $("#touxiang").attr("src",Newstr)
				  
		  	  })},
    })}
 
 function UpdateNickNameMsg(){
	 $.ajax({
	  url:"../handfile/personalDataInsertNickName.php?PhoneNumber="+$.session.get("PhoneNumber")+"&NickName="+$("#Nickname").val(),
	  Type:"GET",
	  dataType:"Json",
	  success:function(data){
		  console.log(data);
		  alert("修改成功");
		  	   ReadMsg();
		  $("#NickName_close").click();
	  },
	  error:function(XMLHttpRequest){
		  console.log(XMLHttpRequest.readyState)
	  },
	})}  
   function UpdateAddress(){
	 $.ajax({
	  url:"../handfile/personalDataInsertAddress.php",
	  type:"POST",
	  data:{"PhoneNumber":$.session.get("PhoneNumber"),"Address":$("#address").val()},
	  dataType:"Json",
	  success:function(data){
		  console.log(data);
		  alert("修改成功");
		  	   ReadMsg();
		  $("#Address_close").click();
	  },
	  error:function(XMLHttpRequest){
		  console.log(XMLHttpRequest.readyState)
	  },
	})}  
   
  function UpdateEmailMsg(){
	 $.ajax({
	  url:"../handfile/personalDataInsertEmail.php?PhoneNumber="+$.session.get("PhoneNumber")+"&Email="+$("#exampleInputEmail2").val(),
	  Type:"GET",
	  dataType:"Json",
	  success:function(data){
		  console.log(data);
		  alert("修改成功");	
		  	   ReadMsg();
		  $("#Email_close").click();
	  },
	  error:function(XMLHttpRequest){
		  console.log(XMLHttpRequest.readyState)
	  },
	})}  
function UpdateGenderMsg(){
	 $.ajax({
	  url:"../handfile/personalDataInsertSex.php?PhoneNumber="+$("#phonenumber").html()+"&Gender="+$("#sex option:selected").val(),
	  Type:"GET",
	  dataType:"Json",
	  success:function(data){
		  console.log(data);
		  alert("修改成功");
		   ReadMsg();
		  $("#Gender_close").click();
	  },
	  error:function(XMLHttpRequest){
		  console.log(XMLHttpRequest.readyState)
	  },
	})}  
	
function UpdateSchoolMsg(){
	 $.ajax({
	  url:"../handfile/personalDataInsertSchool.php?PhoneNumber="+$("#phonenumber").text()+"&SchoolId="+$("#SchoolId  option:selected").val(),
	  Type:"GET",
	  dataType:"Json",
	  success:function(data){
		  console.log(data);
		  alert("修改成功");
		  ReadMsg();
		  $("#School_close").click();
	  },
	  error:function(XMLHttpRequest){
		  console.log(XMLHttpRequest.readyState)
	  },
	})} 
function UpdateAcademyMsg(){
	 $.ajax({
	  url:"../handfile/personalDataInsertAcademy.php?PhoneNumber="+$("#phonenumber").text()+"&Academy="+$("#academy option:selected").val(),
	  Type:"GET",
	  dataType:"Json",
	  success:function(data){
		  console.log(data);
		  alert("修改成功");
		   ReadMsg();
		  $("#Academy_close").click();
	  },
	  error:function(XMLHttpRequest){
		  console.log(XMLHttpRequest.readyState)
	  },
	})} 
	
function UpdateYearMsg(){
	 $.ajax({
	  url:"../handfile/personalDataInsertYear.php?PhoneNumber="+$("#phonenumber").text()+"&Year="+$("#year option:selected").val(),
	  Type:"GET",
	  dataType:"Json",
	  success:function(data){
		  console.log(data);
		  alert("修改成功");
		  ReadMsg();
		  $("#year_close").click();
	  },
	  error:function(XMLHttpRequest){
		  console.log(XMLHttpRequest.readyState)
	  },
	})}
</script>
<script>
window.onload=function EmailValidate(){
  var oTxt=document.getElementById('exampleInputEmail2');
  var oBtn=document.getElementById('UpdateEmailMsgBt');

  oBtn.onclick=function(){
    var email=oTxt.value.replace(/^\s+|\s+$/g,"").toLowerCase();//去除前后空格并转小写
    var reg=/^[a-z0-9](\w|\.|-)*@([a-z0-9]+-?[a-z0-9]+\.){1,3}[a-z]{2,4}$/i;

    if (email.match(reg)==null) {
      alert("请输入有效的邮箱地址");
    }
    else{
      UpdateEmailMsg();
    };
  }
}

</script>