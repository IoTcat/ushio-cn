<?php

header("Content-type: text/html; charset=utf-8"); 
$fp=$_POST['fingerprint'];



$i=0;

while(1)
{
	
$fp= base64_decode("$fp");
$i++;
if (strrpos("$fp","5BfPh4")==true){break;}

}


$fp=str_replace("5BfPh4","","$fp");

echo $fp;
$fp= base64_decode("$fp");
$fp=str_replace("%00","","$fp");
$fp=str_replace("�","","$fp");
echo $fp;
$fp1=substr("$fp",0,6);
$fp2=substr("$fp",7,3);
$fp3=substr("$fp",11);


$fp="$fp1$fp2$fp3";
echo $fp;




?>