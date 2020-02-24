<!DOCTYPE html>
<html>
<head>
	<title>Log Out</title>
</head>
<body>

<?php 

session_start();

session_destroy();

header('location:login.php');

 ?>
</body>
</html>