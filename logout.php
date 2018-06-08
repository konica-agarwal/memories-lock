<?php
session_start();
unset($_SESSION['email']);
session_destroy();
header("location:memorylock.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>