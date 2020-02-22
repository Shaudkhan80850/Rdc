<!DOCTYPE html>
<html>
<head>
	<title>Insert Page</title>
</head>
<body>

<form method="post" enctype="multipart/form-data" name="f">
	<table align="center" border="1">
		<tr>
			<td>Enter Your Name</td>
			<td><input type="text" name="name" required=""></td>
		</tr>
		<tr>
			<td>Enter Your Age</td>
			<td><input type="text" name="age" required=""></td>
		</tr>
		<tr>
			<td>Select Your Gender</td>
			<td><input type="radio" name="gender" value="Male">Male
				<input type="radio" name="gender" value="Female">Female
			</td>
		</tr>
		<tr>
			<td>Enter Your Email Id</td>
			<td><input type="email" name="email" required=""></td>
		</tr>
		<tr>
			<td>Enter Your Password</td>
			<td><input type="password" name="password" required=""></td>
		</tr>
		<tr>
		<td>Enter Your Confirm Password</td>
		<td><input type="password" name="confirmpassword" required=""></td>
	</tr>
		<tr>
			<td>Select Your Profile Photo</td>
			<td><input type="file" name="image" required=""></td>
		</tr>
		<tr>
			<td><input type="submit" name="button" value="INSERT" onclick="return Check()"></td>
		</tr>
	</table>
</form>

<?php 

$conn =mysqli_connect('localhost' ,'root' ,'' ,'test_db');

if (isset($_POST['button'])) 
{
	$name =$_POST['name'];
	$age =$_POST['age'];
	$gender =$_POST['gender'];
	$email =$_POST['email'];
	$password =$_POST['password'];
	// print_r($_FILES['image']);
	$image_name =$_FILES['image']['name'];
	$image_type =$_FILES['image']['type'];
	$image_tmp_name =$_FILES['image']['tmp_name'];
	$image_size =$_FILES['image']['size'];
$folder ="images/";
	$folder =$folder.$image_name;
	$query ="insert into test_tb (name,age,gender,email,password,image_path) values('$name','$age','$gender','$email','$password','$folder') ";

	mysqli_query($conn, "insert into login_tb(email,password) values('$email' ,'$password') ");

	$run =mysqli_query($conn, $query);

	if ($run) 
	{
		move_uploaded_file($image_tmp_name, $folder);
		echo "<script>alert('Data is Inserted...');
			window.location.href='login.php';
		</script>";
	}
	else
	{
		echo "<script>alert('Data is Not Inserted..!!');</script>";
	}
}

 ?>

 <script type="text/javascript">

	function Check() 
	{
		var pass =f.password.value;
		var cpass =f.confirmpassword.value;

		if (pass !=cpass) 
		{
			alert('Password Does Not Matched..!!');
			return false;
		}
		else
		{
			return true;
		}
	}
</script>
</body>
</html>