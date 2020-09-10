<?php //验证是否登录
header("content-type:text/html;charset=utf-8"); ///规定php字符集为utf-8

if(!isset($_COOKIE['login']))///从cookie读取login值，判断是否存在
{
	echo "<script>setTimeout(function(){top.location='../index/logout.php';},0)</script>";
}

if($_COOKIE["login"]==15){}//判断login是否为15，否则服务器中断网页加载并提示500错误
//提取cookie中用户特征信息
$code=$_COOKIE['code'];
//用户特征信息解密，并分解为code（数据库端调用的用户特征）与key（用户设备特征信息，用于判断cookie是否被移植）
$key=base64_decode($code);
$code= base64_decode(substr($key,0,8));
$key= substr($key,8,8);
?>

<?php //用户基础信息获取
$servername = "localhost";
$username = "steel";
$password = "151515";
$dbname = "steel";
 
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("连接失败: " . $conn->connect_error);
} 
///根据code用户特征调取指定用户信息
$sql = "SELECT * FROM login where code=$code";

$result = $conn->query($sql);
///禁止非法访问
if ($result->num_rows > 0) {}else{echo "<script>alert('非法访问！');setTimeout(function(){top.location='../index/logout.php';},0)</script>";}

$row = $result->fetch_assoc();
///将用户信息导入php变量，以方便下文引用
 $name= $row['name'];
 $user=$row['username'];
 $count=$row['count'];
 $tel=$row['tel'];
 $qq= $row['qq'];
 $ip= $row['ip'];
 $dev=$row['dev'];
 $position= $row['position'];
?>

<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>开发者</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">

	<script>//判断用户端特征信息是否一致
if(simpleCanvas=='<?php echo $key?>'){}
else{alert('您的身份信息有误！');setTimeout(function(){top.location='../index/logout.php';},0)}
</script>
</head>
<body>
	
	<div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                       开发者
                    </a>
                </li>
                <li>
                    <a href="dev.php"><i class="fa fa-fw fa-home"></i> 待处理bug</a>
                </li>
                <li>
                    <a href="dev_post.php"><i class="fa fa-fw fa-folder"></i> 已处理bug</a>
                </li>
                <li>
                    <a href="../index/index.php"><i class="fa fa-fw fa-folder"></i> 返回主页</a>
                </li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
          </button>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
					</br></br></br></br></br></br>
                        <h1 class="page-header"><?php 
echo $name5=$_GET['name'];?></h1>  <p class="lead" style="word-break:break-all" >发布于：
                        <?php
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
 
$sql = "SELECT * FROM bug where name='$name5'";
$result = $conn->query($sql);

 
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) 
	{
		$detail=$row['detail'];
		$starttime=$row['starttime'];
		$hosttime=$row['hosttime'];
    }
} else {
    echo "0 结果";
}

echo $starttime;
echo "</br>领养于：";
echo $hosttime;
echo "</br>";
echo "</br>详细信息：";
echo "</br>";
echo $detail;
echo "</br>";
echo "</br>";
$conn->close();
?></p>
						

			<form action="dev_finish2.php" method="POST">		
			<input type="hidden" name="name5" value="<?php echo $name5?>"/>
			<button type="submit" >我已完成</button>
			</form>		
                     
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
		  var trigger = $('.hamburger'),
		      overlay = $('.overlay'),
		     isClosed = false;

		    trigger.click(function () {
		      hamburger_cross();      
		    });

		    function hamburger_cross() {

		      if (isClosed == true) {          
		        overlay.hide();
		        trigger.removeClass('is-open');
		        trigger.addClass('is-closed');
		        isClosed = false;
		      } else {   
		        overlay.show();
		        trigger.removeClass('is-closed');
		        trigger.addClass('is-open');
		        isClosed = true;
		      }
		  }
		  
		  $('[data-toggle="offcanvas"]').click(function () {
		        $('#wrapper').toggleClass('toggled');
		  });  
		});
	</script>
</body>
</html>