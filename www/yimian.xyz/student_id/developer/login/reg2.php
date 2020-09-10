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
	
	<?php session_start();
$str_number = trim($_POST['password1']);

if($_POST['password2']==$str_number){

}else{$name=$_POST['name'];
	

echo "<script>alert('两次输入密码不一致!');setTimeout(function(){top.location='reg1_.php?id=1515&name=$name';},1000);</script>";  
	exit;
} ?>
<?php  
  
 
            $mydbhost = "localhost";  
            $mydbuser = "steel";  
            $mydbpass = '151515';  
            $conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);  
            if(! $conn){  
                die("connect error: " . mysqli_error($conn));  
            }  
            mysqli_select_db( $conn, 'steel');  


$username=$_POST['username'];
$password=$_POST['password1'];
$name=$_POST['name'];
	
 $sql="UPDATE login set username='$username' where name='$name' ";

if ($conn->query($sql) === TRUE) {
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
            mysqli_close($conn);  
        ?>  
	<?php  
  
 
            $mydbhost = "localhost";  
            $mydbuser = "steel";  
            $mydbpass = '151515';  
            $conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);  
            if(! $conn){  
                die("connect error: " . mysqli_error($conn));  
            }  
            mysqli_select_db( $conn, 'steel');  


$username=$_POST['username'];
$password=$_POST['password1'];
$password=md5($password);
$name=$_POST['name'];
	
 $sql="UPDATE login set password='$password' where name='$name' ";

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
	
                <form action="reg3.php?name=<?php echo "$name"?>" method="POST">
                    <p class="p-input pos">
                       将为您创建专属邮箱: <?php echo "$username"?>@steel15.com<br/>
						邮箱密码与您的账号密码一致。
                    </p>
                    <p class="p-input pos" id="sendcode">
                   		您的申请已提交，系统将会在48小事内为您开通邮箱！
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
				<script>
    $.ajax({
        type: "POST",
        url: "../phpmailer/mail.php",
        data: "type=用户邮箱开通请求&name=姓名：<?php echo $name?>&email=用户名：<?php echo $username?>&subject=请求开通邮箱&message=邮箱信息：\n账号：<?php echo $username?>@steel15.com\nmd5密码：<?php echo $password?>",
        success :function(text){
            if (text = "success"){
                
            } else {
                alert('send failed'+text)
            }
        }
    })</script>
</body>
</html>