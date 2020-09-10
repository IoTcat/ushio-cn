<!doctype html>

<?php
include '/mnt/config/dbKeys/as2.php';

$data=$_GET['data'];
$usr=$_GET['usr'];
if($usr=='') exit();

           $mydbhost = $db__host;  
            $mydbuser = $db__user;  
            $mydbpass = $db__passwd;  
            $conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);  
            if(! $conn){  
                die("connect error: " . mysqli_error($conn));  
            }  
            mysqli_select_db( $conn, $db__database);  

$sql = "SELECT * FROM as2 where usr='$usr'";
$result = $conn->query($sql);

 
if ($result->num_rows < 1)
{

            $sql="insert INTO as2 set usr='$usr'"; 
 
	
	if ($conn->query($sql) === TRUE) {} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
            mysqli_close($conn);  


$myfile = fopen("data/$usr.as2", "a") or die("Unable to open file!");

fwrite($myfile, $data);

fclose($myfile);
?>
<html>
<head>
<meta charset="utf-8">
<title>data</title>
</head>

<body>
</body>
</html>
