<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
$server_name = "localhost";
	$user = "root";
	$pass = "";
	$db_name = "data";
	$conn = new Mysqli($server_name,$user,$pass,$db_name);
	if($conn->connect_error){
		die("connection failed" . $conn->connect_error);
	} 
	
	?>
</body>
</html>