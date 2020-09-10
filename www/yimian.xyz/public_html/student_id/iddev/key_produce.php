<?php //identified key producer; database: iddev/iddev/iddev


header('Content-Type:application/json');//json announced
header('Access-Control-Allow-Origin:*');//allow crossdomain visit



/*********** recieve request *************/

//receive request with POST
$fingerprint=$_POST['fingerprint'];

/************END::receive request ***************//***var::$fingerprint***/





/************* message decode **************/
$fp=$fingerprint;

//base64 decode till find the index
$i=0;
while(1)
{
$fp= base64_decode("$fp");
$i++;
if (strrpos("$fp","5BfPh4")==true){break;}

}
//split the index
$fp=str_replace("5BfPh4","","$fp");

//sub_base64 decode
$fp= base64_decode("$fp");
$fp=str_replace("%00","","$fp");

//sperate time info form messgae
$time8_=intval(substr("$fp",6,1));
$time9_=intval(substr("$fp",10,1));

//get time_stamp
$time=time();
$time8=intval(substr("$time",7,1));
$time9=intval(substr("$time",8,1));

//judge whether time out
if($time8==$time8_)
{
	if($time9==($time9_+1)||$time9==$time9_){}
	else {exit (json_encode(array('state' => '3331', 'tip' => 'success','id' =>'232', 'key' => '233')));}
}
else
{
	if($time8==($tiem8_+1))
	{
		if($time9_==9){}else{exit (json_encode(array('state' => '3332', 'tip' => 'success','id' =>'232', 'key' => '233')));};
	}
	else
	{
		exit (json_encode(array('state' => '3333', 'tip' => 'success','id' =>'232', 'key' => '233')));
	}
}

//sort out the true message
$fp1=substr("$fp",0,6);
$fp2=substr("$fp",7,3);
$fp3=substr("$fp",11);
$fp="$fp1$fp2$fp3";
//split useless message
$fp = preg_replace('/[^\w]+/','',$fp);


$fingerprint=$fp;

/*************END:: message decode **************/




/************anti sql insert ******************/

function getpost($arr){

$arr=str_replace("\"","sql_insert","$arr");
$arr=str_replace("'","sql_insert","$arr");
 
 return $arr;
}


$fingerprint=getpost($fingerprint);

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


$sql = "SELECT * FROM idkey where fingerprint='$fingerprint'";
$result = $conn->query($sql);

//prevent illegal visit
if ($result->num_rows > 0) {}else{exit (array('state' => '17', 'tip' =>'Illegal Visit or There is Another Device ONLINE!!'));}

$row = $result->fetch_assoc();
///var new $
$id=$row['id'];



/************END::database**************//***var:: $id***/




/*********** key produce **************/

$time=time();

$key="$fingerprint$time$id";
$a=rand(2,15);
for($i=0;$i<$a;$i++){$key=md5("rand(2,7)$key");}
$key=substr(md5($key), 8, 8);



/***********END::key produce***************/




/**********update database with new key*************/



$sql1="UPDATE idkey set time=$time,keyy='$key' where id='$id' ";


if($conn->query($sql1)=== TRUE){}else{exit (json_encode(array('state' => '14', 'tip' =>'Fail to update database!')));}

/**********END::update database with new key*************/


$conn->close();//close database



/********* combine key and url**********/

$key="https://yimian.xyz/student_id/iddev/qr/key_config.php?key=$key";

/*********END:: combine key and url**********/



echo json_encode(array('state' => '666', 'tip' => 'success','id' =>$id, 'key' => $key));


?>
