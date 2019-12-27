function OrderNote(openid,Title){
	this.openid=openid;
	this.Title=Title;
	this.NoteSend=function(){
		$.ajax({
		url:"http://www.gaocimi.cn/MissionH5/weixin/php/OrderNote.php",
		type:"GET",
		data:{"openid":this.openid,"Title":this.Title},
		dataType:"Text",
	   success:function(data){console.log(data)},
		   error: function(XMLHttpRequest, textStatus, errorThrown) {
 console.log(XMLHttpRequest.status);
 console.log (XMLHttpRequest.readyState);
 console.log (textStatus);
   },

	})
	}
}
