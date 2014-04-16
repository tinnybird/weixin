<?php
header("Content-type: text/html; charset=utf-8");
if (get_magic_quotes_gpc()) {
	function stripslashes_deep($value){
		$value = is_array($value) ? array_map('stripslashes_deep', $value) : stripslashes($value); 
		return $value; 
	}
	$_POST = array_map('stripslashes_deep', $_POST);
	$_GET = array_map('stripslashes_deep', $_GET);
	$_COOKIE = array_map('stripslashes_deep', $_COOKIE); 
}
function htmlspecialchars_all($value){	//同时编码双引号和单引号
	return htmlspecialchars($value,ENT_QUOTES);
}
define('APP_DEBUG',true);
define('APP_NAME', 'weixin');
define('CONF_PATH','./conf/');
define('RUNTIME_PATH','./runtime/');
define('TMPL_PATH','./tpl/');
define('HTML_PATH','./data/html/');
define('APP_PATH','./app/');
define('CORE','./app/_Core');
define('OTHER_RES_URL', 'http://dmywl.aliapp.com/');
require(CORE.'/weixin.php');
require("conf/config.php");
?>