<?php




/*********** recieve request *************/
//receive request with GET
$key=$_GET['key'];

/************END::receive request ***************//***var::$key***/


/************anti sql insert ******************/

function getpost($arr){

$arr=str_replace("\"","sql_insert","$arr");
$arr=str_replace("'","sql_insert","$arr");
 
 return $arr;
}


$key=getpost($key);

/************END::anti sql insert ******************/



/*********** database **************/

//connect to the database
$servername = "localhost";
$username = "iddev";
$password1 = "iddev";
$dbname = "iddev";

$conn = new mysqli($servername, $username, $password1, $dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Fail to connect database " . $conn->connect_error);
} 


/*part1::get id with key from idkey*/

$sql = "SELECT * FROM idkey where keyy='$key'";
$result = $conn->query($sql);

//prevent illegal visit
if ($result->num_rows > 0) {}else{exit ("<script>alert('Illegal Visit or Key Out of Time!!')</script>");}

$row = $result->fetch_assoc();
///var new $
$id=$row['id'];
$time=$row['time'];
$image=$row['img'];

$time2=time();

if(($time2-$time)>6000){exit ("<script>alert('Key Out Of Time!')");}

/*part2::get info with id from xjtlu*/

$sql1 = "SELECT * FROM xjtlu where id='$id'";
$result = $conn->query($sql1);

//prevent illegal visit
if ($result->num_rows > 0) {}else{exit ("<script>alert('Error When Process Student Info!')</script>");}

$row = $result->fetch_assoc();
///var new $
 $name= $row['name'];



/************END::database**************//***var:: $id, $name, $image***/

$conn->close();//close database


?>

<html>
<head>	
	
<meta name="viewport" content="width=device-width, initial-scale=1">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="keywords" content="Preface Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
	  <script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>

</head>

<body>
			<div id="home" class="header">
				<div class="container">
				<!-- top-hedader -->
				<div class="top-header">
					<!-- /logo -->
					<!--top-nav---->
					<div class="top-nav">
					<div class="navigation">
					<div class="logo">
						<h1><a href="https://www.xjtlu.edu.cn"><img alt="" src="images/logo.png" style="display: inline-block;" /></a></h1>
					</div>

					<div class="clearfix"></div>
				</div>
				<!-- /top-hedader -->
				</div>
			<div class="banner-info">
				<div class="col-md-7 header-right">
					<h1>Hi !</h1>
					<h6>I'm a XJTLU student.</h6>
					<ul class="address">
					
					<li>
							<ul class="address-text">
								<li><b>NAME</b></li>
								<li><?php echo $name;?></li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>ID Number</b></li>
								<li><?php echo $id;?></li>
							</ul>
						</li>

						
					</ul>
				</div>
				<div class="col-md-5 header-left">
					<img src="<?php echo $image;?>" height="270" width="192" alt="">
				</div>
				<div class="clearfix"> </div>
						
		      </div>
			</div>
		</div>
	</div>





	

</body>




</html>