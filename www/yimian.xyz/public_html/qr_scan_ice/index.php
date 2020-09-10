<?php


header('Content-Type:application/json');//json announced
header('Access-Control-Allow-Origin:*');//allow crossdomain visit








$usr=$_GET['usr'];
$pswd=$_GET['pswd'];
$url=base64_encode($_GET['url']);

if(strpos($_GET['url'],"https://ice.xjtlu.edu.cn/mod/attendance/attendance.php") === false){$msgg="ERROR";}

else
	
{


$myfile = fopen("cache/cache.txt", "w") or die("Unable to open file!");
$txt = "username=$usr&password=$pswd|$url";
fwrite($myfile, $txt);
fclose($myfile);

while(1)
{
usleep(800000);

$rtrn=file_get_contents("return.txt");

if(!(strpos($rtrn,"<title>Notice</title>") === false)){$msgg="IP";break;}
if(!(strpos($rtrn,"<title>ICE @ XJTLU: Log in to the site</title>") === false)){$msgg="LOGIN";break;}
if(!(strpos($rtrn,"base64error") === false)){$msgg="ERROR";break;}

}


$myfile = fopen("return.txt", "w") or die("Unable to open file!");
$txt = "";
fwrite($myfile, $txt);
fclose($myfile);
}

$raw_success = array('msg' =>$msgg);

echo json_encode($raw_success);
