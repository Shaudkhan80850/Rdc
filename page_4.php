<!DOCTYPE html>
<html>
<head>
	<title>Delete Page</title>
</head>
<body>

<?php 

$conn =mysqli_connect('localhost' ,'root' ,'' ,'test_db');

$id =$_GET['id'];

$query ="delete from test_tb where id='$id' ";

$run =mysqli_query($conn, $query);

if ($run) 
{
	echo "<script>alert('Data is Deleted...');
		window.location.href='page_2.php';
	</script>";
}
else
{
	echo "<script>alert('Data is Not Deleted...!!');</script>";
}

 ?>
</body>
</html>