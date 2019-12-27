function UserDataRead(){
	this.UserDataFull=function(){
		var resultUserDataFull;
	$.ajax({
		url:"../PHPAPI/UserDataRead.php",
		type:"POST",
		data:{"case":'UserDataFull'},
		async:false,
		dataType:"Json",
	   success:function(data){resultUserDataFull=data},
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})
	return resultUserDataFull;
	}
		this.UserDataViaAuditState=function(AuditState){
		var UserDataViaAuditState;
	$.ajax({
		url:"../PHPAPI/UserDataRead.php",
		type:"POST",
		data:{"case":'UserDataViaAuditState',"AuditState":AuditState},
		async:false,
		dataType:"Json",
	   success:function(data){UserDataViaAuditState=data},
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})
	return UserDataViaAuditState;
	}
	
	this.UserDataViaPhoneNumber=function(PhoneNumber){
		var resultUserDataViaPhoneNumber
	$.ajax({
		url:"/Mission2.0/PHPAPI/UserDataRead.php",
		type:"POST",
		data:{"PhoneNumber":PhoneNumber,"case":'UserDataViaPhoneNumber'},
		dataType:"Json", 
		async:false,
	   success:function(data){resultUserDataViaPhoneNumber=data;},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})
	return resultUserDataViaPhoneNumber;
	}
}// JavaScript Document