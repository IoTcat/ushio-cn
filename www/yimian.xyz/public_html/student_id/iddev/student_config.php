<?php //student login,database info: iddev/iddev/iddev


header('Content-Type:application/json');//json announced
header('Access-Control-Allow-Origin:*');//allow crossdomain visit






//receive info with POST
$msg=$_POST['msg'];



/************* message decode **************/
$fp=$msg;

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
/*$fp = preg_replace('/[^\w]+/','',$fp);
*/

$msg=$fp;

/*************END:: message decode **************/



/*********** get basic info *************/


//sort out info
$msg_arr = explode("_", $msg );

$usr=$msg_arr[0];
$password=$msg_arr[1];
$fingerprint=$msg_arr[2];


//change usr to lower word
$usr=strtolower($usr);

//encode password with md5
$password=md5($password);

if($usr == null||$password == null||$fingerprint == null){exit (json_encode(array('state' => '10', 'tip' =>'Empty in usr or password or fingerprint!')));}
/************END::get basic info ***************//***var::$usr, $password, $fingerprint***/




/************anti sql insert ******************/

function getpost($arr){

$arr=str_replace("\"","sql_insert","$arr");
$arr=str_replace("'","sql_insert","$arr");
 
 return $arr;
}

$usr=getpost($usr);
$password=getpost($password);
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

$sql = "SELECT * FROM xjtlu where usr='$usr'";
$result = $conn->query($sql);

//prevent illegal visit
if ($result->num_rows > 0) {}else{exit (json_encode(array('state' => '17', 'tip' =>'No User Found in Database!')));}

$row = $result->fetch_assoc();
///var new $
 $name= $row['name'];
 $id=$row['id'];
 $image_url=$row['image'];
 $password_=$row['password'];
 $ename=$row['ename'];

/*part::img encode*/

$time2=substr(time(),0,6);
$image="$image_url";
$b=rand(2,5);
for($i=0;$i<$b;$i++){$image=base64_encode("$time2$image");}
$image="https://yimian.xyz/student_id/iddev/image.php?img=$b$image";

/************END::database**************//***var::$name,$ename, $id, $image, $password_***/





/**********judge login************/

if ($password==$password_){}else{exit (json_encode(array('state' => '21', 'tip' =>'password is wrong!')));}

/**********END::judge login************/




/**********insert device info*************/

$time=time();

$key_temp=md5(base64_encode(time()));
$sql0="DELETE FROM idkey Where fingerprint='$fingerprint'";
$sql1="DELETE FROM idkey Where id=$id";
$sql2="INSERT INTO idkey VALUES ($id,$time,'$fingerprint','$key_temp','$image') ";

$conn->query($sql0);
if($conn->query($sql1)&& $conn->query($sql2)=== TRUE){}else{exit (json_encode(array('state' => '14', 'tip' => 'Fail to insert iddev!')));}

/**********END::insert device info*************/




$conn->close();//close database



$raw_success = array('state' => '666', 'tip' => 'success','name' => $name, 'ename' => $ename, 'id' => $id, 'image' => $image);

echo json_encode($raw_success);




?>
