<!DOCTYPE html>
<html lang="zh-CN">
<head>

<?php //删除cookie
setcookie("login", "", time()-3600,"/");
setcookie("login", "", time()-3600,"/fee/");
setcookie("login", "", time()-3600,"/class/");
setcookie("login", "", time()-3600,"/game/");
setcookie("login", "", time()-3600,"/page/");
setcookie("login", "", time()-3600);
setcookie("code", "", time()-3600);
setcookie("code", "", time()-3600,"/fee/");
setcookie("code", "", time()-3600,"/class/");
setcookie("code", "", time()-3600,"/page/");
setcookie("code", "", time()-3600,"/game/");
echo "<script>setTimeout(function(){top.location='../index.php';},0)</script>";
?>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<style type="text/css">body {zoom:0.8;}</style>  
    <title>用户退出</title>
    <meta name="Keywords" content="网站关键词">
    <meta name="Description" content="网站介绍">
	
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/iconfont.css">
    <link rel="stylesheet" href="./css/reg.css">
	<link rel="stylesheet" type="text/css" href="../game/css/normalize.css" /><!--CSS RESET-->
	
	<style>
	html, body {
		height: 100%;
		width: 100%;
		margin: 0;
		overflow: hidden;
	}
	#site-landing {
		position:relative;
		height: 100%;
		width: 100%;
	   background-image: linear-gradient(to top, #30cfd0 0%, #330867 100%);
	}
  </style>
</head>
<body>
<div id="site-landing"></div>
<div class="wrap">
    <div class="wpn">
        <div class="form-data pos">
            <a href=""><img alt="Steel15" src="./img/logo.png" class="head-logo"></a>
            <div class="change-login"></div>
			<form action="login/login.php" method="post">
            	<div class="form1">
               		<p class="p-input pos">
                  	 退出成功
					</p>
            	</div>
            </div>
			<p class="right">Powered by Steel15© 2018</p>
        </div>
    </div>
</div>
<script src="./js/jquery.js"></script>
<script src="./js/agree.js"></script>
<script src="./js/login.js"></script>
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/polygonizr.min.js"></script>
<script type="text/javascript">
$('#site-landing').polygonizr();
</script>
</body>
</html>