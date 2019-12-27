

	   function GetPhone(){
		  $.ajax({
		  url:"../handfile/personalDataHand.php?PhoneNumber="+$("#Mobile").val(),
		  type:"GET",
		  dataType:"Json",
		  success:function(data){
			  alert("您好，您已经领取过代金券了哟")
		  },
		  error:function(data){
			  GetCode();
			  CountDown();//倒计时
		  } 
		})
	  }

	  function InsertMsg(){
		  $.ajax({
		  url:"../handfile/bindhandle.php",
		  Type:"GET",
		  dataType:"Json",
		  data:{"PhoneNumber":$("#Mobile").val(),"Password":$("#mis").val()},
		  success:function(data){
			  console.log($("#Mobile").val());
			  InsertWalletId();
			  RechargeRecordInsert(GetDateNow());
			  window.location="../../hbl/PHP/AC.php?PhoneNumber="+$("#Mobile").val();
			  },
		  error:function(XMLHttpRequest,textStatus,errorThrown){
			  		console.log(XMLHttpRequest.status);
			  		console.log(XMLHttpRequest.readyState);
					console.log(textStatus);
			  }
	  })
	  }

      function RechargeRecordInsert(GetDateNowPar){ 
	$.ajax({
		url:"../../MHAPI/RechargeRecordInsertST.php",
		type:"POST",
		data:{"UserId":$("#Mobile").val(),"Reason":1,"PayType":2,"WIDout_trade_no":GetDateNowPar,"PayTime":getNowDate(),"WIDtotal_amount":9,"WIDbody":"成功领取九元超级打印代金券","WIDsubject":"免费活动"},
		dataType:"Json",
	    success:function(data){console.log(GetDateNowPar),WalletAccountHandleST(GetDateNowPar)},
		 error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	}) 

	  }
//邀请交易记录插入;
function WalletAccountHandleST(GetDateNowPar){  
	$.ajax({
		type:"POST",
		url:"../../MHAPI/WalletAccountHandleST.php",
		data:{"WIDout_trade_no":GetDateNowPar,"UserId":$("#Mobile").val()},
		dataType:"Text",
	    success:function(data){
		  console.log(data);
			alert("操作成功！");
			window.location.reload();
		   },
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})
	
	}//赏金插入
	  function InsertWalletId(){
		  $.ajax({
		  url:"../handfile/insertWalletId.php",
		  Type:"GET",
		  dataType:"Json",
		  data:{"WalletId":$("#Mobile").val()},
		  success:function(data){
			  console.log($("#Mobile").val());
			  
			  //window.location="../../hbl/PHP/AC.php";
			  },
		  error:function(XMLHttpRequest,textStatus,errorThrown){
			  		console.log(XMLHttpRequest.status);
			  		console.log(XMLHttpRequest.readyState);
					console.log(textStatus);
			  }
	  })
	  }
	  function InsertMsgOK(){
		  if($("#Code").val()==""){alert("请输入验证码！")}
		 else if($("#Code").val()==$("#CodeHidden").val()){
			  if($("#mis").val()==""){
				  alert("请设置密码！")
				  }
//			  else if($("#mis").val()==password){
//				  alert("请输入新密码哦")	
//			  }
			  else {InsertMsg();}
		  }
			
		else if($("#Code").val()!=$("#CodeHidden").val()) {alert("验证码错误！")}
	  }

		  $("#Mobile").on("blur",function(){if($("#Mobile").val().length!=11){
			  $("#Mobile").focus(); $("#Mobile").attr("placeholder","请输入手机号！")

		  }})
		  
		  $("#mis").on("blur",function(){
		  var reg =/^[a-zA-Z][a-zA-Z0-9_]*$/; 
	      if(!reg.test($("#mis").val())){
            alert("密码只能由数字和字母组成");
       }  if( $("#mis").val().length<6){
		   alert("密码至少6位");
	   }  if( $("#mis").val().length>16){
		   alert("密码最多16位");
	   }
		  })
	      
		  
 function GetQueryString(name) {
   var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)","i");
   var r = window.location.search.substr(1).match(reg);
   if (r!=null) return (r[2]); return null;
}  //js URLGET
	function GetDateNow() {
		var vNow = new Date();
		var sNow = "";
		sNow += String(vNow.getFullYear());
		sNow += String(vNow.getMonth() + 1);
		sNow += String(vNow.getDate());
		sNow += String(vNow.getHours());
		sNow += String(vNow.getMinutes());
		sNow += String(vNow.getSeconds());
		sNow += String(vNow.getMilliseconds());
		return sNow;

	}//订单号生成
function getNowDate() {
 var date = new Date();
 var sign1 = "-";
 var sign2 = ":";
 var year = date.getFullYear() // 年
 var month = date.getMonth() + 1; // 月
 var day  = date.getDate(); // 日
 var hour = date.getHours(); // 时
 var minutes = date.getMinutes(); // 分
 var seconds = date.getSeconds() //秒
 var weekArr = ['星期一', '星期二', '星期三', '星期四', '星期五', '星期六', '星期天'];
 var week = weekArr[date.getDay()];
 // 给一位数数据前面加 “0”
 if (month >= 1 && month <= 9) {
  month = "0" + month;
 }
 if (day >= 0 && day <= 9) {
  day = "0" + day;
 }
 if (hour >= 0 && hour <= 9) {
  hour = "0" + hour;
 }
 if (minutes >= 0 && minutes <= 9) {
  minutes = "0" + minutes;
 }
 if (seconds >= 0 && seconds <= 9) {
  seconds = "0" + seconds;
 }
 var currentdate = year + sign1 + month + sign1 + day + " " + hour + sign2 + minutes + sign2 + seconds + " ";
 return currentdate;
}//获得日期时间

