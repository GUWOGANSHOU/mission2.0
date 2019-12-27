
<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8">
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
		<title>支付宝支付</title>
		<link rel="stylesheet" type="text/css" href="../css/Normalize.css" />
		<link rel="stylesheet" type="text/css" href="../css/style1.css" />
	</head>
	<body>
		<div class="top_bar">
			<a onclick='history.go(-1)'><img class="top_bar_skip" src="../images/ski_back.jpg" /></a><a class="top_bar_txt">支付宝支付</a>
		</div>
		 <form name=alipayment action='' method=post target="_blank">
		<div class="zf_box">
			<dl class="inpu_box">
				<dd><span>商户订单号：</span><input type="text" id="WIDout_trade_no" name="WIDout_trade_no" value="" /></dd>
				<dd><span>订单名称：</span><input type="text" id="WIDsubject" name="WIDsubject" value="" /></dd>
				<dd class="no_bor"><span>付款金额：</span><input type="text"id="WIDtotal_amount" name="WIDtotal_amount"d="" value="" /></dd>
				<textarea id="WIDbody" name="WIDbody" class="txt_js" name="100" rows="2" cols="">商品描述：</textarea>
				<img class="i_left" src="../images/i_ri.jpg"/>
				<img class="i_right" src="../images/i_le.jpg"/>
				
			</dl>
		</div>
		<div class="btn_box">
			<a href="../../hbl/PHP/IndexAcceptedTask.php" class="btn_tj">确定提交</a>
			<p>我已同意此操作</p>
		</div>
		
		</form>
	</body>

</html>