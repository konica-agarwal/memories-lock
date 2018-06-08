<!doctype html>
<html>
<head>

<link href="memorylock.css" rel="stylesheet">
<meta charset="utf-8">
<title>Untitled Document</title>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
<script type="text/javascript">
	function validate_form(){
		
	var x =	document.forms['form']['fname'].value;
		if(x == ""){
			alert("name must be filled out");
			return false;
		}
	var x = document.forms['form']['email'].value;
		if(x==""){
			alert("email must be filled out");
			return false;
	}
	var x = document.forms["form"]["pwd"].value;
		if(x==""){
			alert("password must be filled out");
			return false;
		}
	}
	</script>
	
	
</head>

<body>

	<?php
	$fname= $lname= $email= $pwd= $tel= $dob= "";
 if(isset($_POST['submit'])){
   $fname=input($_POST["fname"]); 
	$lname=input($_POST["lname"]);
	$email=input($_POST["email"]);
	$pwd=input($_POST["pwd"]);
	$tel=input($_POST["tel"]); 
   $dob=input($_POST["dob"]); 
	}

function input($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return($data);
	}
?>


<div>
<h1>MEMORIES LOCK</h1>
</div>
<div>
<h2 class="reg" >REGISTER HERE</h2>
</div>
<div class="container ">
<img src="images/camera.jpeg" class="camera" >
<form class="form1" method="post" name="form" onsubmit="return validate_form()">
<pre>Name*         <input type="text" name="fname" ><br></pre>
<pre>Last Name     <input type="text" name="lname"><br></pre>
<pre>User Name*    <input type="email" name="email" ><br></pre>
<pre>Password*     <input type="password" name="pwd" ><br></pre>
<pre>phone number  <input type="number" name="tel" ><br></pre>
<pre>Date of Birth <input type="date" name="dob"></pre>
 <a href="home.php"><input type="submit" name="submit" class="logi sub"></a>
</form>
</div>
 


 <?php
	if(isset($_POST['submit'])){
	$servername="localhost";
		$usname="root";
	$pass="";
	$db="data";
	$conn=new Mysqli($servername,$usname,$pass,$db);
	if($conn->connect_error){
		die("connection not established".$conn->connect_error);
	}
	    $stmt=$conn->prepare("INSERT INTO myguest (first_name,last_name,email,password,contact_no,dob) VALUES(?,?,?,?,?,?)");
	    $stmt->bind_param("ssssii",$first_name,$last_name,$email,$password,$contact_no,$dob);
	    $first_name=$fname;
        $last_name=$lname;
		$email=$email;
		$password=$pwd;
		$contact_no=$tel;
		$dob=$dob;
		$stmt->execute();
		alert("new records created sucessfully");
		$stmt->close();
		$conn->close();
	}
?>


</body>
</html>
