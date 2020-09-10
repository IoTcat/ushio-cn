<?php header("content-type:text/html;charset=utf-8"); //设置编码?>

<?php

$code=$_GET['code'];///获取用户特征

$code= base64_encode($code);///加密

if($_GET['agree']=1) ///设置cookie时间15天
{
	$expire=time()+60*60*24*15;
	setcookie("login", "15", $expire);
	setcookie("login", "15", $expire,"/");
	setcookie("login", "15", $expire,"/fee/");
	setcookie("login", "15", $expire,"/game/");
	setcookie("login", "15", $expire,"/class/");
	setcookie("login", "15", $expire,"/page/");
	setcookie("code", "$code", $expire);
	setcookie("code", "$code", $expire,"/fee/");
	setcookie("code", "$code", $expire,"/game/");
	setcookie("code", "$code", $expire,"/class/");
	setcookie("code", "$code", $expire,"/page/");
}

if($_GET['agree']=0)///设置cookie 至浏览器关闭
{
	setcookie("login", "15");
	setcookie("login", "15","/");
	setcookie("login", "15","/fee/");
	setcookie("login", "15","/class/");
	setcookie("login", "15","/game/");
	setcookie("login", "15","/page/");
	setcookie("code", "$code");
	setcookie("code", "$code","/fee/");
	setcookie("code", "$code","/class/");
	setcookie("code", "$code","/game/");
	setcookie("code", "$code","/page/");
}
?>

<!doctype html>
<html>
<head>
	
<meta charset="utf-8">
<title>正在加载..</title>
	
<script type="text/javascript">setTimeout(function(){top.location='index.php';},0)</script>
	
</head>
	
<body>
	
</body>
</html>