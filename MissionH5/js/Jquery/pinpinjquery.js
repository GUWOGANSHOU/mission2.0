$("input").css("font-size","36px");
	var calendar = new datePicker();
calendar.init({
	'trigger': '#time', /*按钮选择器，用于触发弹出插件*/
	'type': 'datetime',/*模式：date日期；datetime日期时间；time时间；ym年月；*/
	'minDate':'1900-1-1',/*最小日期*/
	'maxDate':'2100-12-31',/*最大日期*/
	'onSubmit':function(){/*确认时触发事件*/
		var theSelectData=calendar.value;
	},
	'onClose':function(){/*取消时触发事件*/
	}
});
