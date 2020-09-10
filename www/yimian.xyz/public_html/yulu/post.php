   <?php  

$name=$_POST['name'];

$start=date('y-m-d',time());
  
                $mydbhost = "114.116.65.152";  
            $mydbuser = "yimian";  
            $mydbpass = 'Lymian0904@112';  
            $conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);  
            if(! $conn){  
                die("connect error: " . mysqli_error($conn));  
            }  
            mysqli_select_db( $conn, 'yimian');  
            $sql="INSERT INTO yulu set name='$name',start='$start'"; 
 
	
	if ($conn->query($sql) === TRUE) {echo "<script>window.location.href='index.php'</script>";
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
           
            mysqli_close($conn);  
        ?>  