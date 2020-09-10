<?php

include 'ICS.php';

header('Content-Type: text/calendar; charset=utf-8');
header('Content-Disposition: attachment; filename=invite.ics');

$servername = "localhost";
$username = "steel";
$password = "151515";
$dbname = "steel";
 
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
$sql = "SELECT name,date,abstract,location,content,text1,text2 FROM events where id=(SELECT max(id) FROM events)";
$result = $conn->query($sql);
	$row = $result->fetch_assoc();
 $name1= $row['name'];
 $date=$row['date'];
 $img1=$row['content'];
 $abstract=$row['abstract'];
 $location= $row['location'];
 $text1= $row['text1'];
 $text2= $row['text2'];
	$conn->close();
		

$ics = new ICS(array(
  'location' => $location,
  'description' => $abstract,
  'dtstart' => $date,
  'dtend' => $date,
  'summary' => $name1,
  'url' => 'https://www.steel15.com'
));

echo $ics->to_string();