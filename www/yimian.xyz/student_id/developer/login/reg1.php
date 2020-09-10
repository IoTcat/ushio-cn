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
	
	<?php 
	
		$id=$_GET['id'];
	
	if($id=='1515'){}else
	{
	
	session_start();
$str_number = trim($_POST['yanzhengma']);

if($_POST['standard']==$str_number){

}else{
	

echo "<script>alert('验证码错误!');history.back();</script>";  
	exit;
} }
	?>
		<?php 
	
	$id=$_GET['id'];
	if($id=='1515'){}else
	{$servername = "localhost";
$username = "steel";
$password = "151515";
$dbname = "steel";
//判断是否同意协议	
$agree=$_POST['agree'];
	if($agree==0){echo "<script>alert('如果要继续注册，您必须先同意本页中的服务协议！');history.back();</script>";exit;	}

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
 $name=$_POST['name'];
$sql = "SELECT code,reg FROM login where name='$name'";
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {  
		$code= $row["code"];
		if($code==$_POST['code']){
			if($row['reg']==1){echo "<script>alert('您已注册！');self.location='../index.php';</script>";exit;}
		echo "<script>alert('信息验证成功!');</script>";
			
		}
		else {
			echo "<script>alert('您输入的信息有误!');history.back();</script>";
		}
     }
} else {
    echo "<script>alert('没有发现您的记录!请联系钢筋管理员！');history.back();</script>";
}
$conn->close();}
	
?>
</head>
<body>
    <div id="ajax-hook"></div>
    <div class="wrap">
        <div class="wpn">
            <div class="form-data pos">
                <a href=""><img src="../img/logo.png" class="head-logo"></a>
                <!--<p class="tel-warn hide"><i class="icon-warn"></i></p>-->
                <form action="reg2.php" method="POST">
                    <p class="p-input pos">
                        <label for="tel">请设置您的用户名(必须由英文和数字组成）</label>
                        <input type="text" id="tel" autocomplete="off" name="username">
                        <span class="tel-warn tel-err hide"><em></em><i class="icon-warn"></i></span>
                    </p>
                    <p class="p-input pos" id="sendcode">
                        <label for="passport">输入密码</label>
                        <input type="password" style="display: none"/>
                        <input type="password" id="passport" name="password1">
                        <span class="tel-warn pwd-err hide"><em></em><i class="icon-warn" style="margin-left: 5px"></i></span>
                    </p>
                    <p class="p-input pos" id="confirmpwd">
                        <label for="passport2">确认密码</label>
                        <input type="password" style="position:absolute;top:-998px"/>
                        <input type="password" id="passport2" name="password2">
                        <span class="tel-warn confirmpwd-err hide"><em></em><i class="icon-warn" style="margin-left: 5px"></i></span>
                    </p>
					<input type="hidden" name="name" value="<?php echo "$name";?>"/>
					 <button class="lang-btn" type="submit">下一步</button>
					</form>
				            <div class="r-forget cl">
               <p class="z">注：建议设置用户名为"名.姓",如&nbsp;siyuan.tian<br/>&nbsp;&nbsp;&nbsp;&nbsp;用户名不可修改，请谨慎设置！</p>
            </div>
                <p class="right">Powered by Steel15© 2018</p>
            </div>
        </div>
    </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/agree.js"></script>
    <script src="../js/reg.js"></script>
</body>
</html>