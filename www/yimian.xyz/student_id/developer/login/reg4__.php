
<?php //用户基础信息获取
$servername = "localhost";
$username = "steel";
$password = "151515";
$dbname = "steel";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 


 $name=$_GET['name'];

$sql = "SELECT code FROM login where name='$name'";
$result = $conn->query($sql);
	$row = $result->fetch_assoc();
 $code= $row['code'];

	$conn->close();
		  ?>
<?php
header("content-type:text/html;charset=utf-8");         //设置编码
 
?>
<?php 	///设置cookie为1天

/*$expire=time()+60*60*24;
setcookie("login", "15", $expire,"/index/");
setcookie("login", "15", $expire,"/");
setcookie("login", "15", $expire,"/fee/");
setcookie("login", "15", $expire,"/game/");
setcookie("login", "15", $expire,"/class/");
setcookie("login", "15", $expire,"/page/");
setcookie("code", "$code", $expire,"/index/");
setcookie("code", "$code", $expire,"/fee/");
setcookie("code", "$code", $expire,"/game/");
setcookie("code", "$code", $expire,"/class/");
setcookie("code", "$code", $expire,"/page/");*/?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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

	
<?php 
	$city2=$_POST['city2'];$city1=$_POST['city1'];?>  
	<?php  
  
 
            $mydbhost = "localhost";  
            $mydbuser = "steel";  
            $mydbpass = '151515';  
            $conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);  
            if(! $conn){  
                die("connect error: " . mysqli_error($conn));  
            }  
            mysqli_select_db( $conn, 'steel');  


$name=$_GET['name'];
	
 $sql="UPDATE login set home='$city2',home2='$city1',reg=1 where name='$name' ";

if ($conn->query($sql) === TRUE) {
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
            mysqli_close($conn);  
        ?>  
</head>
<body>
    <div id="ajax-hook"></div>
    <div class="wrap">
        <div class="wpn">
            <div class="form-data pos">
                <a href=""><img src="../img/logo.png" class="head-logo"></a>
                <!--<p class="tel-warn hide"><i class="icon-warn"></i></p>-->
				<script src="js/simpleCanvas.js"></script>  
				<?php $code= base64_encode($code); ?>
				
				<?php echo "<script>var key = '$code'+simpleCanvas;</script>"?>
				
				<script>function check(){document.getElementById("code").value = key;}</script>
				
                <form name="form1" action="../index/cookie.php" method="get" onSubmit="check();" >
                    <p class="p-input pos">
                      那是最后一步！
                    </p>
                    <p class="p-input pos" id="sendcode">
                   	 开启你的steel之旅吧！
                    </p>
					<input type="hidden" name="agree" value="0"/>
					<input type="hidden" id="code" name="code" value=""/>
                    
					 <button class="lang-btn" type="submit">开始</button>
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