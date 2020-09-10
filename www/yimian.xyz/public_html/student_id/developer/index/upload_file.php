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


<?php //上传文件
if ($_FILES["file"]["error"] > 0)
{
    echo "错误：" . $_FILES["file"]["error"] . "<br>";
}
else
{
    echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
    echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
    echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
}
?>

<?php //移动文件至指定文件夹
if(isset($_FILES['file']) && !$_FILES['file']['error']) // 文件存在且不报错  
{ 
    $fileName = $_FILES['file']['name'];       // 获取文件  
    $fileExtension = pathinfo($fileName);       // 获取文件路径信息  
    $destinationPath = "C:\zhujibao\domains\steel15.club\public_html\pan\public\ ";  // 目标文件夹 
    $newFileName = $destinationPath. $_FILES["file"]["name"];  // 完整的url  
	
    move_uploaded_file($_FILES['file']['tmp_name'], $newFileName); //开始移动
	
	echo "<script>alert('上传成功！');setTimeout(function(){top.location='pan.php';},0)</script>";
}  
?>


<script src="js/simpleCanvas.js"></script>
	
<script>//判断用户端特征信息是否一致
if(simpleCanvas=='<?php echo $key?>'){}
else{alert('您的身份信息有误！');setTimeout(function(){top.location='../index/logout.php';},0)}
</script>
