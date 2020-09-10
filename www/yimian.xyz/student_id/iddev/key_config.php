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

if(($time2-$time)>60){exit ("Key Out Of Time!");}

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

echo "$id;$name;$image";


?>