//$(document).ajaxStart(function() {
//    $("#loading").slideToggle(1)
//});
//$(document).ajaxStop(function() {
//    $("#loading").slideToggle(1)
//});	
$(document).ready(function() {
    $.session.set('PhoneNumber', localStorage.getItem("PhoneNumber"));
    var $PhoneNumberX = $.session.get("PhoneNumber");
    $("#fabu").attr("href", "../../index.php?PhoneNumber=" + $.session.get('PhoneNumber'));
    var timer = null;
 //   MissionMsgGet();
  //  Numbers();
   MissionUserGet();
	console.log($.session.get("PhoneNumber"))

}) 


function MissionMsgGet() { 
    var urlPay;
    $.ajax({
        url: "../handfile/IndexHandle.php",
		type:"GET",
        dataType: "Json",
        success: function(data) {  
			
            $.each(data,
            function(index, comment) {
    	 data1=data;
                var delpos = deliverpos(comment.WIDout_trade_no);
                var posttl = comment.MissionTitle;
                var re = ReadMsg(comment.MissionPromulgatorId);
                ////console.log(comment.WIDout_trade_no);
                var PayType = PayTypeGet(comment.WIDout_trade_no);
                if (PayType == 1) {
                    urlPay = "../CSS/支付宝黑色.png"
                } else if (PayType == 2) {
                    urlPay = "../CSS/钱包黑色.png"
                } else if (PayType == 3) {
                    urlPay = "../CSS/线下支付.png"
                };
                ////console.log(urlPay);
                if (posttl == "快递代取") {comment.MissionPos=delpos + "号楼"}
                
                    $("#blanckbar").after( '<section style="width:98%; margin:0 auto">\
  <div class="c1" onclick="fn( ' + comment.MissionMsgId + ')">\
    <div class="c1content" >\
      <div class="grab" ></div>\
      <div class="grabtop">\
        <img src="../CSS/较急.png" style="width:100%; height:100%"></div>\
      <div class="image" >\
        <img src=' + re + ' style="width:100%; height:100%"></div>\
    </div>\
    <div class="detail">\
      <div class="detailtop" >\
        <div class="tl MissionTitle">' + comment.MissionTitle + '</div>\
        <div style="font-size:8pt; color:#CCC;width:120%">' + comment.MissionTimeDemand + "前交付" + '</div></div>\
      <div class="MissionReward">￥' + comment.MissionReward + '</div>\
      <div class="PayType" >\
        <img src=' + urlPay + ' style="width:100%; height:100%"></div>\
    </div>\
    <div class="MissionDescribe" >\
      <div class="MissionDescribeContent" >' + comment.MissionDescribe + '</div></div>\
    <div style="float:right; width:76%; height:18pt">\
      <div class="Pos">\
        <img src="../CSS/定位.png" style="width:100%; height:100%"></div>\
      <div class="PosContent" >' + comment.MissionPos + '</div></div>\
  </div>\
</section>');
                

            })
        }
    })

}
function MissionUserGet() {  
  
    $.ajax({
        url: "../handfile/MissionUser_Get.php",
        type: "GET",

        data: {
            "PhoneNumber": $.session.get("PhoneNumber")
        },
        dataType: "Json",
        success: function(data) {
            $.each(data,
            function(index, comment) {
                $.session.set("UserName", comment.UserName);
    
      
                if (comment.OpenId) {
					$("#kuaidi").attr("href",'../../../Mission2.0/tasknew/jbtask.php')
                    $("#fabu").attr("href", "../../lhb/PHP/TaskIssueType.php")
                } else {
                    $("#fabu").attr("href", "../../index.php?PhoneNumber=" + $.session.get("PhoneNumber"))
                };
 
                if (comment.AuditState != 1) {   
                    $("#fabu").removeAttr('href');  
                    $("#fabu").click(function() {
                        alert('您必须认证并通过审核才可以使用此功能')
                    });
                    $("#Number1").css('display', 'block');
                    $("#kuaidi").removeAttr('href');
                    $("#kuaidi").click(function() {
                        alert('您必须认证并通过审核才可以使用此功能')
                    });
                } else {

}
            }

            )
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
	 {
            console.log(XMLHttpRequest.status);
            console.log(XMLHttpRequest.readyState);
            console.log(textStatus);
          alert("请先登录");
          window.location = "../../lhb/PHP/login.php";
        }
    })
}
function PayTypeGet(WIDout_trade_no) {
    var PayType;
    $.ajax({
        url: "../handfile/selectPayType.php?AlipayOutTradeNo=" + WIDout_trade_no,
        type: "GET",
        dataType: "Json",

        success: function(data) {
            $.each(data,
            function(index, comment) {
                PayType = comment.PayType;
                ////console.log(comment.AlipayOutTradeNo);
            })
        }
    }) 
	return PayType;
};
function deliverpos(WIDout_trade_no) {
    var building;
    $.ajax({
        url: "../../lhb/handfile/ExpressageHandlhb.php",
        type: "GET",
        data: {
            "AlipayOutTradeNo": WIDout_trade_no
        },
        dataType: "Json",

        success: function(data) {

            building = data[2];

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.status);
            console.log(XMLHttpRequest.readyState);
            console.log(textStatus);
        },

    })

    return building;
};
function Numbers() {
    $.ajax({
        url: "../../lhb/handfile/notifthandleNum.php?UserId=" + $.session.get("PhoneNumber"),
        type: "GET",
        dataType: "Json",
        success: function(data) {
            if (data == 0) {
                $("#Number").css('display', 'none');
            } else {
                $("#Number").css('display', 'block');
                $("#Number >strong").text(data);
            }
        },
        error: function(data) {
            $("#Number").css('display', 'none');
        }
    })
}

function fn(MissionMsgId) {
    window.location = '../../lhb/PHP/TaskAccept.php?MissionMsgId=' + MissionMsgId + "&UserId=" + $.session.get("PhoneNumber")
}

function ReadMsg(id) {
    var Newstr;
    $.ajax({
        url: "../handfile/personalDataHandForImage.php?PhoneNumber=" + id,
        type: "GET",
        dataType: "Json",

        success: function(data) {
            $.each(data,
            function(index, comment) {

                if (comment.UserImage == 0) {
                    Newstr = "../../lhb/images/avatar.png"
                } else {
                    if (comment.UserImage) {
                        var str = comment.UserImage;
                        var re = new RegExp(" ", "g");
                        Newstr = str.replace(re, "+");
                        //				  //////console.log(Newstr);
                    }
                }

            })
        },
    })

    return Newstr;
}