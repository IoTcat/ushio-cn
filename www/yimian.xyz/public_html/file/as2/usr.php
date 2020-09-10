<?php

           $mydbhost = "localhost";  
            $mydbuser = "yimian";  
            $mydbpass = 'lymian0904';  
            $conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);  
            if(! $conn){  
                die("connect error: " . mysqli_error($conn));  
            }  
            mysqli_select_db( $conn, 'yimian');  

$sql = "SELECT * FROM as2";
$result = $conn->query($sql);
   while($row = $result->fetch_assoc()) {

	   echo $row['usr'];
	   echo "
";
		
    }
?>