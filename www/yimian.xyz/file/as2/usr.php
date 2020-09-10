<?php
include '/mnt/config/dbKeys/as2.php';

           $mydbhost = $db__host;  
            $mydbuser = $db__user;  
            $mydbpass = $db__passwd;  
            $conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);  
            if(! $conn){  
                die("connect error: " . mysqli_error($conn));  
            }  
            mysqli_select_db( $conn, $db__database);  

$sql = "SELECT * FROM as2";
$result = $conn->query($sql);
   while($row = $result->fetch_assoc()) {

	   echo $row['usr'];
	   echo "
";
		
    }
?>
