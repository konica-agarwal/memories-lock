
<?php
include_once('connect.php');
session_start();
if(isset($_SESSION['email'])){
	 $userid=$_SESSION['email']
		
?>

<?php
		 if(isset($_POST['submit'])){
$target_dir = "uploads/"; //uploading picture
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$imagename=$_FILES["fileToUpload"]["name"];
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	    //uploading picture name in database
	$sql=mysqli_query($conn,"UPDATE myguest SET image='$imagename' WHERE email='$userid'");	
		
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
		 }
?>
<?php 
	 echo("<span class='welcome'> welcome '".$userid."'</span>");
	//displaying image
	$sql1="SELECT * FROM myguest where email='$userid'"; 
	$res=mysqli_query($conn,$sql1);
	$row=mysqli_fetch_array($res);
//print_r($row);
	?>
		
<script>
		function myfun(){
	var x=document.getElementById("demo");
	if(x.style.display==="none"){
		x.style.display="block";
	}
	else{
		x.style.display="none";
	}
	}



</script>

<?php
	//multiple images upload
	
	$var="SELECT id FROM myguest where email='".$userid."' ";//run query
	$qry=mysqli_query($conn,$var);
	//$id_res=mysqli_fetch_assoc($qry);
    if ($qry->num_rows > 0) {
	while($ro = $qry->fetch_assoc())
	{
	$id_res=$ro['id'];
	
	if(isset($_POST['submits'])){
		 
			  if(count($_FILES['files']['name']) > 0){
        //Loop through each file
        for($i=0; $i<count($_FILES['files']['name']); $i++) {
$target_dir = "uploads/"; //uploading picture
$target_file = $target_dir . basename($_FILES["files"]["name"][$i]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$imagename=$_FILES["files"]["name"][$i];
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["files"]["tmp_name"][$i]);
    if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
if ($_FILES["files"]["size"][$i] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else {
    if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], $target_file)) {
	    //uploading picture name in database
 //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	
		
$sql=mysqli_query($conn,"INSERT INTO image(imag_location,userid) VALUES('uploads/$imagename','$id_res')");	
    
	} 
	
		else {
        echo "Sorry, there was an error uploading your file.";
    }
}
		 }
			  
			  }
	}}
		 }
	?>
<html>
<head>
<link href="memorylock.css" type="text/css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<div >
<a href="logout.php"><button class="regi right sub">logout</button></a>
	</div>
<img src="uploads/<?php echo $row['image']; ?>" / height="100px" width="100px" onClick="myfun()" > 
<div id="demo">
<form action="#" method="post" enctype="multipart/form-data">

    <input type="file"  name="fileToUpload" id="fileToUpload" class="hide">
    <input type="submit" value="Upload DP" name="submit" class="regi" sub>
   
</form>
 </div>
 <div>
 <form action="#" method="post" enctype="multipart/form-data">
<input type="file"  name="files[]" id="files"  multiple data-multiple-caption="{count} files selected" class="hide">

<input type="submit" value="Upload" name="submits" class="regi sub margin_left">

 </div>
 
 <?php 
	//displaying multiple image
	$sql1="SELECT * FROM image where userid='".$id_res."'"; 
	$res1=mysqli_query($conn,$sql1);
while(	$row=mysqli_fetch_assoc($res1)) {

	echo  '<img src="'.$row["imag_location"].'" class="multi_img "  > ';
}
//print_r($row);
			
	?>
	<script>
		//enlarging image
        $(".multi_img").click(function(){
		$(this).toggleClass("enlarged");	
		});
		

		//including footer
		$(function(){
		$("#include_html").load("footer.html");
		  });
		
	</script>
		<div id="include_html">
</body>
</html>
<?php
}
	?>
