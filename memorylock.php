<?php include_once ('connect.php');
if(isset($_POST['submit'])){
$email=$_POST['email'];
$password=$_POST['password'];

//login
$sqlselect= "select * from myguest ";
$result=mysqli_query($conn,$sqlselect);
$flag=0;
while($row=mysqli_fetch_row($result)){
if ($row[3]==$email&&$row[4]==$password){
    $flag=1;
    break;
}
}
if($flag==1){
   session_start();
   $_SESSION["email"]=$email;
	echo($row['first_name']);
   header("location:profile.php");
}
else{
    echo("<span class ='white'>"."invalid login credentials"."</span>");
			
}

}

?><?php
/*session_start();
include('connect.php');
if(isset($_POST['submit'])){
$email=$_POST['email'];
$password=$_POST['password'];
    $result=mysqli_query($conn,'select id from myguest WHERE email="'.$email.'" and password="'.$password.'"');
if(mysqli_num_rows($result)==1){
	$_SESSION["email"]= $email;
	header("location:profile.php");
}
	
		else{
			echo("<span class ='white'>"."invalid login credentials"."</span>");
			//$message="wrong credentials";
			//echo"<script type='text/javascript'>alert'$message'</script>";
		}
	}*/
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
<link href="css/jquery.bxslider.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="memorylock.css">
<meta charset="utf-8">
<title>Memory lock</title>
</head>

<body>
<div class="header">
		<ul class="ulist">
			<li><h1>MEMORIES LOCK</h1></li>
			<li class="right"><a href="register.php"><button class="regi">register</button></a></li>
			<li class="right"><a href="#login"><button class="regi">login</button></a></li>
		</ul>
	</div>
	<div>
	<ul  class="bxslider">
		<li class="clr"><img src="images/25474-Memories-Last-Forever.jpg"/></li>
		<li class="clr"><img src="images/download.jpg"/></li>
		<li class="clr"><img src="images/Access to documents.JPG"/></li>
		<li class="clr"><img src="images/memories-picture-quotes0.jpg"/></li>
	</ul>
	</div>
	<script>
		$('.bxslider').bxSlider({
  auto: true,
  autoControls: true
}); 
		//including footer
		$(function(){
		$("#include_html").load("footer.html");
		  });
		</script>
		<script>
	function register(){
		window.open("http://localhost/practice/register.php");}
	</script>
	<div class="a" >
	<form name="reg" action="#" method="post">
	<fieldset id="login">
	<legend>login credentials</legend>
<pre>User Name <input type="email"    name="email" placeholder="email"><br></pre>
<pre>Password  <input type="password" name="password" placeholder="password"><br></pre>
	<input type="submit"  name="submit" value="login" class="logi sub"><br>
	</fieldset><br>
	</form>
	</div>
	<div id="include_html">
		
	</div>
</body>
</html>