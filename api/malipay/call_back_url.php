<?php
/* * 
 * 功能：支付宝页面跳转同步通知页面
 * 版本：3.3
 * 日期：2012-07-23
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 *************************页面功能说明*************************
 * 该页面可在本机电脑测试
 * 可放入HTML等美化页面的代码、商户业务逻辑程序代码
 * 该页面可以使用PHP开发工具调试，也可以使用写文本函数logResult，该函数已被默认关闭，见alipay_notify_class.php中的函数verifyReturn
 */
?>
<!DOCTYPE HTML>
<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>支付宝即时到账交易接口</title>
	</head>
<?php
	header('Location: http://'.$_SERVER['HTTP_HOST'].'/index.php?g=Wap&m=Alipay_m_&a=call_back_url&out_trade_no='.$_GET['out_trade_no'].'&request_token='.$_GET['request_token'].'&result='.$_GET['result'].'&trade_no='.$_GET['trade_no'].'&sign='.$_GET['sign'].'&sign_type='.$_GET['sign_type'].'');
?>
    <body>
    </body>
</html>