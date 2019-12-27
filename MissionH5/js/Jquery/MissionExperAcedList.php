<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable">
<title>我的认证</title>

<script src="../../js/Jquery/jquery-3.2.0.js"></script>
<script src="../../js/Jquery/session.js"></script>
<link href="../CSS/MissionExperAcedList.css" rel="stylesheet"  type="text/css">
</head>

<body>
    
    
	<div id="_blanck"></div>
	<div onClick="window.location='MissionExperAdd.php'" id="AddAc">+</div>
</body>  
</html>
<script>
	//
	console.log($.session.get("PhoneNumber"))
	function  MissionExperAcedList(){
	$.ajax({
		url:"../handfile/MissionExpertRead.php",
		type:"POST",
		data:{"UserId":$.session.get("PhoneNumber")},
		dataType:"Json",
	   success:function(data){$.each(data,function(index,comment){
		   var State=comment.MissionExpertState;
		   switch (State)
		   {
			   case '0': State="审核中";break;
			   case '1': State="审核不通过";break;
			   case '2': State="营业中";break;
			   case '3': State="歇业中";break;
     		   default:State="状态错误";
		   }
		   ;$("#_blanck").after("<div id="+comment.Id+" onclick='modify(this.id)'>"+comment.Title+"</div><div class='MissionExpertState' onclick='MissionExpertState("+comment.MissionExpertState+","+comment.Id+")'>"+State+"</div>")})},
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})

	}
	MissionExperAcedList();
	function modify(id){
		window.location="MissionExperAcedListModify.php?Id="+id;
	}
	function MissionExpertState(State,Id){
		switch(State){
			case 2:r=confirm("您是否要歇业？");if(r){UpdateState(3,Id)};break;
			case 3:r=confirm("您是否要营业？");if(r){UpdateState(2,Id)};break;
			default:break;
		}
	}
	function UpdateState(s,Id){
		$.ajax({
			url:"../handfile/MissionExpertUpdate.php",
			dataType:"Text",
			type:"GET",
			data:{"MissionExpertState":s,"UserId":$.session.get("PhoneNumber"),"Id":Id},
			success:function(data){console.log(data);window.location.reload();},
			   error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },
		})
	}
</script>
