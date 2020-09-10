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

<?php  
$name5=$_POST['name5'];

$endtime=date('Y-m-d H:i:s',time());


            $sql="UPDATE bug set endtime='$endtime' where name='$name5'"; 

$filename="../system/dev.txt";
$handle=fopen($filename,"a+");
$str1=iconv( "UTF-8", "gb2312//IGNORE" , "$endtime $name 修复了".$name5."的bug");
$str=fwrite($handle,"$str1
");
fclose($handle);
	
	if ($conn->query($sql) === TRUE) {echo "<script>alert('记录已提交！世界因你而更美好！');window.location.href='dev.php'</script>";
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
           
            mysqli_close($conn);  
        ?>  