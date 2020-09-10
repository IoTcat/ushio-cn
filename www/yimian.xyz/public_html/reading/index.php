<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>正在追的书和番</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	
	<div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                       书与番
                    </a>
                </li>
                <li>
                    <a href="index.php"><i class="fa fa-fw fa-home"></i> 正在阅读的书和番</a>
                </li>
                <li>
                    <a href="history.php"><i class="fa fa-fw fa-folder"></i> 历史的记忆</a>
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
                        <h1 class="page-header">正在享用的书与番</h1>  <p class="lead">
                        <?php
           $mydbhost = "114.116.65.152";  
            $mydbuser = "yimian";  
            $mydbpass = 'Lymian0904@112';  
            $conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);  
            if(! $conn){  
                die("connect error: " . mysqli_error($conn));  
            }  
            mysqli_select_db( $conn, 'yimian');  
 
$sql = "SELECT * FROM reading where val=0 order by start desc";
$result = $conn->query($sql);

 
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
		echo "<a href=";
		$url="change.php?name=" . $row['name'];
		$str='"';
		echo "$str";
		echo "$url";
		echo "$str";
		echo ">";
				
        echo "《 " . $row['name'].  " 》 </br>";
		echo "</a>";
		echo "</p>";
		echo "<p>";
		
    }
} else {
    echo "0 结果";
}
$conn->close();
?></p>
						
						<p class="lead"></br>添加新的书或番：</p>
		<form action="post.php" method="POST">		
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