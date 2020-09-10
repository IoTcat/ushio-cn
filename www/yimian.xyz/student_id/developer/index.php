<?php ///判断是否已登录
	if(isset($_COOKIE["login"])){echo "<script>setTimeout(function(){top.location='index/index.php';},0)</script>";
	exit;}
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<style type="text/css">body {zoom:0.8;}</style>
    <title>用户登录</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="网站关键词">
    <meta name="Description" content="网站介绍">
	
	<link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/iconfont.css">
    <link rel="stylesheet" href="./css/reg.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css" /><!--CSS RESET-->	
	
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
			
			<form action="login/login.php" method="post">
				
            <div class="form1">
                <p class="p-input pos">
                    <label for="num">用户名</label>
                    <input type="text" id="num" name="username1">
                </p>
                <p class="p-input pos">
                    <label for="pass">请输入密码</label>
                    <input type="password" style="display:none"/>
                    <input type="password" id="pass" autocomplete="new-password" name="password1">
				    <div class="reg_checkboxline pos">
                    	<span class="z"><i class="icon-ok-sign boxcol" nullmsg="请同意!"></i></span>
                    	<input type="hidden" name="agree" value="1">
                    	<div class="Validform_checktip"></div>
                    	<p>15天内免登录</p>
                   </div>
            </div>
         
            <div class="r-forget cl">
                <a href="login/reg.html" class="z">首次登录请点击这里注册</a>
                <a href="login/getpass.html" class="y">忘记密码</a>
            </div>
            <button class="lang-btn off log-btn" type="submit"> 登录</button>
				
			</form>
			
            <div class="r-forget cl">
               <p class="z"></p>
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