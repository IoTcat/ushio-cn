<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<style type="text/css">body {zoom:0.8;}</style>  
    <title>用户注册</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="网站关键词">
    <meta name="Description" content="网站介绍">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/iconfont.css">
    <link rel="stylesheet" href="../css/reg.css">
	<style type="text/css">
select{width:120px;font-size:14px;line-height:25px;}
</style>

	<?php header("content-type:text/html;charset=utf-8"); ?>
	
<?php $name=$_GET['name']; ?>  
	<?php  
  
 
            $mydbhost = "localhost";  
            $mydbuser = "steel";  
            $mydbpass = '151515';  
            $conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);  
            if(! $conn){  
                die("connect error: " . mysqli_error($conn));  
            }  
            mysqli_select_db( $conn, 'steel');  


$qq=$_POST['qq'];
	
 $sql="UPDATE login set qq='$qq' where name='$name' ";

if ($conn->query($sql) === TRUE) {
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
            mysqli_close($conn);  
        ?>  

    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <link rel="stylesheet" href="css/ydui.css?rev=@@hash"/>
    <link rel="stylesheet" href="css/demo.css"/>
    <script src="js/ydui.flexible.js"></script>
</head>
<body>
    <div id="ajax-hook"></div>
    <div class="wrap">
        <div class="wpn">
            <div class="form-data pos">
                <a href=""><img src="../img/logo.png" class="head-logo"></a>
                <!--<p class="tel-warn hide"><i class="icon-warn"></i></p>-->
                <form action="reg4__.php?name=<?php echo "$name"?>" method="POST">
                    <p class="p-input pos">
                      请选择您的两个常住城市，以便同学们与您联系！
                    </p>




        <div class="m-cell">
            <div class="cell-item">
                <div class="cell-left">常住城市：</div>
                <div class="cell-right cell-arrow">
                    <input type="text" class="cell-input" readonly id="J_Address" value="" placeholder="请选择城市" name="city1">
                </div>
            </div>
        </div>


        <div class="m-cell">
            <div class="cell-item">
                <div class="cell-left">常驻城市：</div>
                <div class="cell-right cell-arrow">
                    <input type="text" class="cell-input" readonly id="J_Address2" value="中国 山东省 泰安市 泰山区" placeholder="请选择城市" name="city2">
                </div>
            </div>
        </div>





					 <button class="lang-btn" type="submit">下一步</button>
					</form>
				
                <p class="right">Powered by Steel15&copy; 2018</p>
				                <p class="right">Powered by Steel15&copy; 2018</p>
				                <p class="right">Powered by Steel15&copy; 2018</p>
				                <p class="right">Powered by Steel15&copy; 2018</p>

            </div>
        </div>
    </div>
	    <div class="wrap">
			<div class="wpn"></div></div>
    <script src="../js/jquery.js"></script>
    <script src="../js/agree.js"></script>
    <script src="../js/reg.js"></script>
	<script type="text/javascript" src="jquery-1.4.4.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/ydui.citys.js" charset="utf-8"></script>
<script src="js/ydui.js"></script>
<script>
    /**
     * 默认调用
     */
    !function () {
        var $target = $('#J_Address');

        $target.citySelect();

        $target.on('click', function (event) {
            event.stopPropagation();
            $target.citySelect('open');
        });

        $target.on('done.ydui.cityselect', function (ret) {
        	console.log(ret)
            $(this).val(ret.country + ' ' + ret.provance + ' ' + ret.city + ' ' + ret.area);
        });
    }();
    /**
     * 设置默认值
     */
    !function () {
        var $target = $('#J_Address2');

        $target.citySelect({
        	country: '中国',
            provance: '山东省',
            city: '泰安市',
            area: '泰山区',
            id: '1-15-143-1412'
        });

        $target.on('click', function (event) {
            event.stopPropagation();
            $target.citySelect('open');
        });

        $target.on('done.ydui.cityselect', function (ret) {
        	console.log(ret);
            $(this).val(ret.country + ' ' + ret.provance + ' ' + ret.city + ' ' + ret.area);
        });
    }();
</script>
</body>
</html>