
 var ajax=new Ajax('duanxin/validatecode.php?username='+mobile+'&mobile='+mobile,'msg')

  $("#getcode").on("click",function(){
	    var mobile=$("#mobile").val();
		if(mobile!=""){
        ajax.url='duanxin/validatecode.php?username='+mobile+'&mobile='+mobile;
		//ajax.postmsg();
       $("#getcode").css("background","#CCC")
	var i=60
	var timer=setInterval(function(){
		if(i>0){ i=i-1;$("#getcode").text(i+"s");}
		else{$("#getcode").css("background","#6CF").text("获取验证码");
		clearInterval(timer);}
		},1000)
		
		}else{alert("请先输入手机号码");}
	  })       
	  
	function checkform(){
		if($("#mobile").val()==""){
			alert("请输入手机号！")
			return false}
	   else if($("#mobile").val().length!=11)
	   {
		alert("请正确输入11位手机号码！");
	    return false ;
	  }
	   else if($("#codenumber").val()==""){
			alert("请输入验证码！")
			return false
			}
		else 
       if($("#codenumber").val().length!=6)
		{
			alert("请正确输入六位验证码！");
			return false;
			}
		else if($("#codenumber").val()!=$("#codenumber2").val()){
			alert("对不起您输入的验证码有误");
			return false;
			}
			return true
		}
	 // JavaScript Document