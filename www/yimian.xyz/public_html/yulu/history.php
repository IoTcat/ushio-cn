<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>历史的沧桑</title>
	<link rel="stylesheet" type="text/css" href="../yulu/css/bootstrap.css">
	<link rel="stylesheet" href="../yulu/css/style.css">

</head>
<body>
	
	<div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                       语录
                    </a>
                </li>
                <li>
                    <a href="../yulu/index.php"><i class="fa fa-fw fa-home"></i> 语录</a>
                </li>
                <li>
                    <a href="../yulu/history.php"><i class="fa fa-fw fa-folder"></i> 历史的记忆</a>
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
                        <h1 class="page-header">收藏语录</h1>  <p class="lead">
                        <?php
           $mydbhost = "114.116.65.152";  
            $mydbuser = "yimian";  
            $mydbpass = 'Lymian0904@112';  
            $conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);  
            if(! $conn){  
                die("connect error: " . mysqli_error($conn));  
            }  
            mysqli_select_db( $conn, 'yimian');  
 
$sql = "SELECT * FROM yulu where val=1 order by end asc";
$result = $conn->query($sql);

 
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {

				
        echo " " . $row['name'].  "  </br>";
		echo "</a>";
		echo "</p>";
		echo "注于：";
		echo  $row['end'];
		echo "<p></br>";
		
    }
} else {
    echo "0 结果";
}
$conn->close();
?></p>
						
						<p class="lead"></br>添加新语录：</p>
		<form action="../yulu/post.php" method="POST">		
		<input type="text" name="name" />
			<button type="submit" value="添加">添加</button>
			</form>		
                     
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
	
	<script src="../yulu/js/jquery.min.js"></script>
	<script src="../yulu/js/bootstrap.min.js"></script>
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