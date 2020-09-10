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

<?php //events信息获取

///从数据库调取最近一次的event信息
$sql = "SELECT * FROM events where id=(SELECT max(id) FROM events)";

$result = $conn->query($sql);

$row = $result->fetch_assoc();
//将信息调入php变量，以便引用
 $name1= $row['name'];
 $date=$row['date'];
 $img1=$row['content'];
 $abstract=$row['abstract'];
 $location= $row['location'];
 $text1= $row['text1'];
 $text2= $row['text2'];
 ?>

<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Home</title>
	
<link rel="shortcut icon"type="image/x-icon" href="img/favicon.ico"media="screen" />
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" >
<!-- Icon -->
<link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">
<!-- Slicknav -->
<link rel="stylesheet" type="text/css" href="assets/css/slicknav.css">
<!-- Nivo Lightbox -->
<link rel="stylesheet" type="text/css" href="assets/css/nivo-lightbox.css" >
<!-- Animate -->
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<!-- Main Style -->
<link rel="stylesheet" type="text/css" href="assets/css/main.css">
<!-- Responsive Style -->
<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
<script>setTimeout(function(){top.location='../index/dev.php';},0)</script>
<?php ////获取ip
$ip=getip();
//以下调用ip定位数据库提供商提供的函数
function getip() 
{
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) 
	{
		$ip = getenv("HTTP_CLIENT_IP");
	} 
	else
		if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) 
		{
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		}
		else
			if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) 
			{
				$ip = getenv("REMOTE_ADDR");
			} 
			else
				if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) 
				{
					$ip = $_SERVER['REMOTE_ADDR'];
				} 
				else 
				{
					$ip = "unknown";
				}
return ($ip);
}
?>
	
<?php ///查询对应地址
///从数据库获取本段ip对应信息
$sql = "SELECT * FROM `ip` WHERE minip <= INET_ATON('$ip') ORDER BY minip DESC LIMIT 1;";
	
$result = $conn->query($sql);
$row = $result->fetch_assoc();
//定义位置变量
$city= $row['city'];
$province= $row['province'];
$country= $row['country'];
//生成位置信息
$position="$city,$province,$country";
?>
	
<?php //更新数据库ip，访问次数，时间，ip位置，，插入新的日志
$time=date('Y-m-d H:i:s',time());///获取时间
//访问次数+1
$count=$count+1;
//定义数据库指令信息
$sql="UPDATE login set ip='$ip',count='$count',position='$position',time='$time' where code='$code' ";
//实施数据库更新指令，失败报错
if ($conn->query($sql) === TRUE) {} else {echo "Error: " . $sql . "<br>" . $conn->error;}
///生产数据库日志表格信标
$sign="$name$count";
///插入新的日志
$sql="INSERT INTO log VALUES ('$sign','$name','$ip','$position','$time','') ";
	
if ($conn->query($sql) === TRUE) {} else { echo "Error: " . $sql . "<br>" . $conn->error;}
	
mysqli_close($conn); ///关闭数据库 
?>  

<script src="js/simpleCanvas.js"></script>
	
<script>//判断用户端特征信息是否一致
if(simpleCanvas=='<?php echo $key?>'){}
else{alert('您的身份信息有误！');setTimeout(function(){top.location='../index/logout.php';},0)}
</script>

<script>//定位gps

  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
 
 ///调用h5函数
function showPosition(position)
  {
	  //定义经纬度变量并设置偏移纠正
	  var longitude1=position.coords.longitude+0.0043;
	  var latitude1=position.coords.latitude-0.0022;
	  //ajax向后端传递定位信息，不返回状态信息
	 $.ajax({
		 url:'post1.php?sign=<?php echo "$sign"?>&gps='+longitude1+','+latitude1,
		 type:'get',
		 data:'',
		 async: false,
		 success:''
	 		})
  }
</script>
	
</head>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/js/jquery-min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.countdown.min.js"></script>
<script src="assets/js/jquery.nav.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/jquery.slicknav.js"></script>
<script src="assets/js/nivo-lightbox.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/form-validator.min.js"></script>
<script src="assets/js/contact-form-script.min.js"></script>
<div id='date' ids='<?php echo "$date"?>'></div>
<script>var date=$("#date").attr("ids");
	jQuery('#clock').countdown(date,function(event)
	{
      var $this=jQuery(this).html(event.strftime(''
      +'<div class="time-entry days"><span>%-D</span> Days</div> '
      +'<div class="time-entry hours"><span>%H</span> Hours</div> '
      +'<div class="time-entry minutes"><span>%M</span> Minutes</div> '
      +'<div class="time-entry seconds"><span>%S</span> Seconds</div> '));
    });</script>

<!---<script src="assets/js/map.js"></script>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyCsa2Mi2HqyEcEnM1urFSIGEpvualYjwwM"></script>--->
  

</html>
