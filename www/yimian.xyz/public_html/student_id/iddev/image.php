<?php

header('content-type:image/png');



/*********** recieve request *************/
//receive request with GET
$img=$_GET['img'];

/************END::receive request ***************//***var::$key***/


/************ img decode******************/


$time2=substr(time(),0,6);
$b=substr($img,0,1);
$img=substr($img,1);

for($i=0;$i<$b;$i++){$img=base64_decode($img);$time=substr($img,0,6);$img=substr($img,6);}

if($time2==$time){

}else{exit ("<script>alert('Illegal Visit or img OUT OF TIME!!')</script>");}

/************END:: img decode******************//**var::img ****/




/*************img display***************/


$filename="image/$img.png";

$handle=fopen($filename,'rb+'); 

$res=fread($handle,filesize($filename));

fclose($handle);

echo $res;

/*************END::img display***************/

?>