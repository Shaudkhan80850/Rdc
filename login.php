<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>

<form method="post">
	<table align="center">  
	<tr>
		<td>Enter Your Email Id</td>
		<td><input type="email" name="email" required=""></td>
	</tr>
	<tr>
		<td>Enter Your Password</td>
		<td><input type="password" name="password" required=""></td>
	</tr>
	<tr>
		<td><input type="submit" name="button" value="LOGIN"></td>
	</tr>
</table>
</form>

<?php 

$conn =mysqli_connect('localhost' ,'root' ,'' ,'test_db');

session_start();

if (isset($_POST['button'])) 
{
	$email =$_POST['email'];
	$password =$_POST['password'];

	$query ="select * from login_tb where email='$email' and password='$password' ";

	$rows =mysqli_query($conn, $query);

	$totalrows =mysqli_num_rows($rows);

	if ($totalrows ==1) 
	{
		$_SESSION['username'] =$email;

		echo "<script>alert('Login Successfuly');
			window.location.href='dashboard.php';
		</script>";
	}
	else
	{
		echo "<script>alert('Inavilid Email And Password Please Try Again..!!');</script>";
	}
}


 ?>
</body>
</html>