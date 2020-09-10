<?php header("content-type:text/html;charset=utf-8") //设置php编码?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>站点登录页面 Steel</title>
	
<style>
html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,font,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td{margin:0;padding:0;border:0;outline:0;font-size:100%;vertical-align:baseline;background:transparent}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}:focus{outline:0}ins{text-decoration:none}del{text-decoration:line-through}table{border-collapse:collapse;border-spacing:0}.z{float:left}.y{float:right}.tz{text-align:left}.ty{text-align:right}.clear{clear:both;display:block;overflow:hidden;visibility:hidden;width:0;height:0;font-size:0}.clearfix:before,.clearfix:after{content:'\0020';display:block;overflow:hidden;visibility:hidden;width:0;height:0}.clearfix:after{clear:both}.clearfix,.zoom{zoom:1}
body,td,input,textarea,select,button{color:#333; font:12px/18px "\5FAE\8F6F\96C5\9ED1",Helvetica,Arial,Verdana,"\5B8B\4F53";}
a {color:#505050; text-decoration:none;}
a:hover {color: #FF5500; text-decoration: underline;}
.header-wraper {height:37px; line-height:37px; background:url(http://z.admin5.com/static/images/nav-bg.png) repeat-x left top; border-bottom:1px solid #ccc; overflow:hidden;}
.header, .content, .footer {width:860px; margin:0 auto;}
.header .logo {float:left; height:37px; width:113px; background:url(http://z.admin5.com/static/images/logo.png) no-repeat left center;}
.header .logo a {text-indent:-999em; height:37px; width:113px; display:block;}
.header .copy {float:left; margin-left:30px; line-height:37px; color:#999;}
.header .menu {float:right; margin-left:80px;}
.header .menu li {float:left; line-height:37px; width:120px;}
.header .menu li a {display:block; text-align:center;}
.header .menu li a:hover {color:#000; text-decoration:none; background:url(http://z.admin5.com/static/images/nav-active-bg.png) repeat-x left top;}
.content .message {border:1px solid #c6e4f3; background:#d9edf7 url(http://z.admin5.com/static/images/default-bg.png) no-repeat 30px center; padding-left:260px; margin-top:100px; border-radius:8px; color:#3a87ad; padding-bottom:30px;}
.content .message h1 {line-height:2em; font-size:26px; margin-top:10px;}
.content .message ul {margin-top:10px;}
.content .message ul li {line-height:2em;}
.content .message p{margin-top:20px;}

.sec {padding-left:2em;}
</style>

<script src="js/simpleCanvas.js"></script>
	
</head>

<body>
		
<?php
$servername = "localhost";
$username = "steel";
$password = "151515";
$dbname = "steel";
 ///连接数据库
$conn = new mysqli($servername, $username, $password, $dbname);
// 连接检查
if ($conn->connect_error) {die("连接失败: " . $conn->connect_error);} 
///调入相关变量
$user=$_POST['username1'];
$sql = "SELECT * FROM login where username='$user'";
//数据库信息调入数组
$result = $conn->query($sql);
 //判断是否存在信息
if ($result->num_rows > 0) 
{
    // 输出数据
	$row = $result->fetch_assoc();
	$code1= $row["password"];
	$password= $_POST['password1'];
	$password= md5($password);///md5加密
	
	if($code1==$password)///检验密码是否正确
	{
		echo "登录成功！";
		$agree=$_POST['agree'];
		$code= $row["code"];
		$code= base64_encode($code);///加密用户特征信息
		
		echo "<script>var key = '$code'+simpleCanvas;document.write(key);</script>";
		echo "<script>setTimeout(function(){top.location='../index/cookie.php?		agree=$agree&code='+key;},0)</script>";
	}
	
	else {echo "<script>alert('密码错误!');history.back();</script>";}
     
} 

else //尝试索引手机号
{
	$sql = "SELECT * FROM login where tel='$user'";//调入数据库信息
	//引入数组
	$result = $conn->query($sql);
 	//检查数组是否为空
	if ($result->num_rows > 0) 
	{
		$row = $result->fetch_assoc();
		$code1= $row["password"];
		$password= $_POST['password1'];
		$password= md5($password);
		
		if($code1==$password)//判断密码是否正确
		{
			echo "登录成功！";
			$agree=$_POST['agree'];
			$code= $row["code"];
			$code= base64_encode($code);///加密用户特征信息
		
			echo "<script>var key = '$code'+simpleCanvas;document.write(key);</script>";
			echo "<script>setTimeout(function(){top.location='../index/cookie.php?agree=$agree&code='+key;},0)</script>";
		}
		
		else {echo "<script>alert('密码错误!');history.back();</script>";}

	}
	
else{echo "<script>alert('用户名错误!');history.back();</script>";}
	
}

$conn->close();///关闭数据库
?>
	

<script src="http://z.admin5.com/site.js"></script> 
<script src="http://z.admin5.com/server.js"></script>

</body>
</html>