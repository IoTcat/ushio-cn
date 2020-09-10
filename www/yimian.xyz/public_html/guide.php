<?php
 function GetBrowser(){
       if(!empty($_SERVER['HTTP_USER_AGENT']))
       {
         $br = $_SERVER['HTTP_USER_AGENT'];
          if (preg_match('/MSIE/i',$br)){    
             $br = 'MSIE';
          }
          elseif (preg_match('/Firefox/i',$br)){
             $br = 'Firefox';
          }elseif (preg_match('/Chrome/i',$br)){
             $br = 'Chrome';
          }elseif (preg_match('/Safari/i',$br)){
             $br = 'Safari';
          }elseif (preg_match('/Opera/i',$br)){
             $br = 'Opera';
          }else {
             $br = 'Other';
          }
             return $br;
          }else{
             return "获取浏览器信息失败！";} 
      }
      ////获得访客浏览器语言
      function GetLang()
      {
           if(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
               $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
               $lang = substr($lang,0,5);
                if(preg_match("/zh-cn/i",$lang)){
                   $lang = "简体中文";
                }elseif(preg_match("/zh/i",$lang)){
                   $lang = "繁体中文";
                }else{
                   $lang = "English";
                }
                return $lang; 
           }else{
            return "获取浏览器语言失败！";
            }
      }
       
     //获取客户端操作系统信息包括win10
    function GetOs(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $os = false;
    
        if (preg_match('/win/i', $agent) && strpos($agent, '95'))
        {
            $os = 'Windows 95';
        }
        else if (preg_match('/win 9x/i', $agent) && strpos($agent, '4.90'))
        {
            $os = 'Windows ME';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/98/i', $agent))
        {
            $os = 'Windows 98';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/nt 6.0/i', $agent))
        {
            $os = 'Windows Vista';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/nt 6.1/i', $agent))
        {
            $os = 'Windows 7';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/nt 6.2/i', $agent))
        {
            $os = 'Windows 8';
        }else if(preg_match('/win/i', $agent) && preg_match('/nt 10.0/i', $agent))
        {
            $os = 'Windows 10';#添加win10判断
        }else if (preg_match('/win/i', $agent) && preg_match('/nt 5.1/i', $agent))
        {
            $os = 'Windows XP';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/nt 5/i', $agent))
        {
            $os = 'Windows 2000';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/nt/i', $agent))
        {
            $os = 'Windows NT';
        }
        else if (preg_match('/win/i', $agent) && preg_match('/32/i', $agent))
        {
            $os = 'Windows 32';
        }
        else if (preg_match('/linux/i', $agent))
        {
            $os = 'Linux';
        }
        else if (preg_match('/unix/i', $agent))
        {
            $os = 'Unix';
        }
        else if (preg_match('/sun/i', $agent) && preg_match('/os/i', $agent))
        {
            $os = 'SunOS';
        }
        else if (preg_match('/ibm/i', $agent) && preg_match('/os/i', $agent))
        {
            $os = 'IBM OS/2';
        }
        else if (preg_match('/Mac/i', $agent) && preg_match('/PC/i', $agent))
        {
            $os = 'Macintosh';
        }
        else if (preg_match('/PowerPC/i', $agent))
        {
            $os = 'PowerPC';
        }
        else if (preg_match('/AIX/i', $agent))
        {
            $os = 'AIX';
        }
        else if (preg_match('/HPUX/i', $agent))
        {
            $os = 'HPUX';
        }
        else if (preg_match('/NetBSD/i', $agent))
        {
            $os = 'NetBSD';
        }
        else if (preg_match('/BSD/i', $agent))
        {
            $os = 'BSD';
        }
        else if (preg_match('/OSF1/i', $agent))
        {
            $os = 'OSF1';
        }
        else if (preg_match('/IRIX/i', $agent))
        {
            $os = 'IRIX';
        }
        else if (preg_match('/FreeBSD/i', $agent))
        {
            $os = 'FreeBSD';
        }
        else if (preg_match('/teleport/i', $agent))
        {
            $os = 'teleport';
        }
        else if (preg_match('/flashget/i', $agent))
        {
            $os = 'flashget';
        }
        else if (preg_match('/webzip/i', $agent))
        {
            $os = 'webzip';
        }
        else if (preg_match('/offline/i', $agent))
        {
            $os = 'offline';
        }
        else
        {
            $os = '未知操作系统';
        }
        return $os; 
    }

$fpphp=md5(GetBrowser().GetLang().GetOs());


?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name=author content="Yimian"/>
		<meta name=description content="Designed Studio - Providing web consulting and web design services. Designing your Business for the Web"/>
		<meta name=robots content="index,follow"/>
		<meta name=title content="Questionnaire">

    <script src=" js/1.js" async></script>

    <title>Guide</title>

    <!-- Awwwwards CSS -->
    <link type="text/css" media="screen" rel="stylesheet" href="awwwards.css" />

		<link rel="stylesheet" href=" css/first.css" media="all">
		<!-- <script src="js/baidu/html5shiv.js"></script> -->



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>

    <!-- Animate.css -->
    <link href=" css/animate.css" rel="stylesheet">

    <!-- Pace -->
    <link href=" css/pace.css" rel="stylesheet">

    <!-- ScrollFlow -->
    <link href=" css/eskju.jquery.scrollflow.css" rel="stylesheet">

    <!-- Custom CSS and js -->
    <link href=" css/fullscreen-modals.css" rel="stylesheet">
    <link href=" css/style.css" rel="stylesheet">
    <link href=" css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src=" js/baidu/jquery-1.8.1.min.js"></script>
		<!--<script src="js/baidu/skrollr.min.js"></script> -->
		 <script src=" js/baidu/jquery.iosslider.min.js"></script>
		<script src=" js/baidu/ui.js"></script>
		<script>
			$(document).ready(function(){

				//boot();
				initMainSlider();
				//if (IEVersion()==false || IEVersion()>8) initMainAnimation();

			});
		</script>

		<!--[if IE 8]>
		<link rel="stylesheet" type="text/css" href="css/ie8.css" />
		<![endif]-->

        <!--[if lt IE 9]>
        <script type="text/javascript" src="js/baidu/skrollr.ie.min.js"></script>
        <![endif]-->

		<!--[if lt IE 9]>
			<script type="text/javascript" src="js/baidu/respond.min.js"></script>
		<![endif]-->
	  
	  <script type="text/javascript">
function disp_prompt()
  {
  var key=prompt("Please enter password","")
  if (key!=''&&key!=null)
    {
    window.location.href='setkey.php?key='+key;
    }
  }
</script>
  </head>

  <body data-spy="scroll" data-target=".navbar" data-offset="50">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top blue-bg">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand logo" href="./"><img src=" img/logo_white.png"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse pull-right">
          <ul class="nav navbar-nav">
            <li class="active"><a href="https://www.yimian.xyz">Yimian Page</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <section id="section1" class="region region-1 align-center blue-bg">

		
    	<div class="container">
		    <h1 class="wow zoomIn">Please Select the Content You Want to Visit:</h1>
		    <div class="desc wow zoomIn">
          <h4><a href="https://www.yimian.xyz">Yimian Page</a><h4>
		   <h4><a href="https://video.yimian.xyz">Yimian Video</a><h4>
             <h4><a href="https://cloud.yimian.xyz">Yimian Cloud</a></h4>
          <?php  if(isset($_COOKIE['yimian'])&&$_COOKIE['yimian']==md5('15'.$fpphp)) echo"<h4><a href=\"http://yulu.yimian.xyz\">Yimian Yulu</a></h4>";?>
          <h4><a href="https://blog.yimian.xyz">Yimian Blog</a><h4>
		   <?php  if(isset($_COOKIE['yimian'])&&$_COOKIE['yimian']==md5('15'.$fpphp)) echo"<h4><a href=\"http://dev.yimian.xyz\">Yimian Dev</a><h4>";?>
			<h4><a href="https://vpn.yimian.xyz">Yimian VPN</a><h4>
			<h4><a href="https://call.yimian.xyz">Yimian Call</a><h4>
		   <?php  if(isset($_COOKIE['yimian'])&&$_COOKIE['yimian']==md5('15'.$fpphp)) echo"<h4><a href=\"http://home.yimian.xyz:8080/?action=stream\">Yimian Cam</a><h4>";?>
		   <?php  if(isset($_COOKIE['yimian'])&&$_COOKIE['yimian']==md5('15'.$fpphp)) echo"<h4><a href=\"http://reading.yimian.xyz\">Yimian Reading</a><h4>";?>
			 <h4><a href="https://monitor.yimian.xyz">Yimian Monitor</a><h4>
			<?php  if(isset($_COOKIE['yimian'])&&$_COOKIE['yimian']==md5('15'.$fpphp)) echo"<h4><a href=\"setkey.php?key=0\">Logout Yimian</a><h4>";
				 else echo "<input type=\"button\" onclick=\"disp_prompt()\"
value=\"Login as Yimian\" />";?>
				



    </section>








    <footer class="region blue-bg align-center">

    </footer>




  </body>
</html>
