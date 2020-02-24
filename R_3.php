<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<?php 

$conn =mysqli_connect('localhost','root','','r_db');

$id =$_GET['id'];

$query ="delete from registration_tb where id='$id' ";

$run =mysqli_query($conn, $query);

if ($run) 
	{
		echo "<script>alert('Data Deleted Successfully');
			window.location.href='dashboard.php';
		</script>";
	}
	else
	{
		echo "<script>alert('Data Deletion Failed..!!');</script>";
	}

 ?>

</body>
</html>