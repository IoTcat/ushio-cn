<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<style type="text/css">body {zoom:0.8;}</style>  
    <title>用户注册</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="网站关键词">
    <meta name="Description" content="网站介绍">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/iconfont.css">
    <link rel="stylesheet" href="../css/reg.css">
	<?php header("content-type:text/html;charset=utf-8"); ?>
	
<?php $name=$_GET['name']; ?>  
	
</head>
<body>
    <div id="ajax-hook"></div>
    <div class="wrap">
        <div class="wpn">
            <div class="form-data pos">
                <a href=""><img src="../img/logo.png" class="head-logo"></a>
                <!--<p class="tel-warn hide"><i class="icon-warn"></i></p>-->
                <form action="reg4.php?name=<?php echo "$name"?>" method="POST">
                    <p class="p-input pos">
                      请留下您的联系方式，以便及时与您联系！
                    </p>
                    <p class="p-input pos" id="sendcode">
                   	  <label for="tel">您的手机号码</label>
                      <input type="text" id="tel" autocomplete="off" name="tel">
                      <span class="tel-warn tel-err hide"><em></em><i class="icon-warn"></i>
                    </p>
                    
					 <button class="lang-btn" type="submit">我已了解，下一步</button>
					</form>
				
                <p class="right">Powered by Steel15© 2018</p>
            </div>
        </div>
    </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/agree.js"></script>
    <script src="../js/reg.js"></script>
</body>
</html>