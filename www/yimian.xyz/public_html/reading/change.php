 <?php  

$name=$_GET['name'];

$end=date('y-m-d',time());
  
                     $mydbhost = "114.116.65.152";  
            $mydbuser = "yimian";  
            $mydbpass = 'Lymian0904@112';  
            $conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);  
            if(! $conn){  
                die("connect error: " . mysqli_error($conn));  
            }  
            mysqli_select_db( $conn, 'yimian');  

            $sql="UPDATE reading set val=1, end='$end' where name='$name'"; 
 
	
	if ($conn->query($sql) === TRUE) {echo "<script>window.location.href='index.php'</script>";
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
           
            mysqli_close($conn);  
        ?>  