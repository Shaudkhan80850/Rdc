<!DOCTYPE html>
<html>
<head>
	<title>Update Page</title>
</head>
<body>

<?php 

$conn =mysqli_connect('localhost' ,'root' ,'' ,'test_db');

$id =$_GET['id'];

$query ="select * from test_tb where id='$id' ";

$rows =mysqli_query($conn, $query);

$data =mysqli_fetch_array($rows);

 ?>

<form method="post" enctype="multipart/form-data">

	<input type="hidden" name="id" value="<?php echo $data[0]; ?>">

	<table align="center" border="1">
		<tr>
			<td>Enter Your Name</td>
			<td><input type="text" name="name" required="" value="<?php echo $data[1]; ?>"></td>
		</tr>
		<tr>
			<td>Enter Your Age</td>
			<td><input type="text" name="age" required="" value="<?php echo $data[2]; ?>"></td>
		</tr>
		<tr>
			<td>Select Your Gender</td>
			<td>
				<select name="gender">
					<?php 

					if ($data[3]=='Male') 
					{
						echo "<option value=''>--Select--</option>
					<option value='Male' selected='Male'>Male</option>
					<option value='Female'>Female</option>";
					}
					elseif ($data[3]=='Female') 
					{
						echo "<option value=''>--Select--</option>
					<option value='Male'>Male</option>
					<option value='Female' selected='Female'>Female</option>";
					}

					 ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Enter Your Email Id</td>
			<td><input type="email" name="email" required="" value="<?php echo $data[4]; ?>"></td>
		</tr>
		<tr>
			<td>Enter Your Password</td>
			<td><input type="password" name="password" required="" value="<?php echo $data[5]; ?>"></td>
		</tr>
		<tr>
			<td>Select Your Profile Photo</td>
			<td><input type="file" name="image">
				<?php 

					if ($data[6] !='' && $data[6] !=null) 
					{
						echo "<img src='$data[6]' width='85' height='85'>";
					}
				 ?>
			</td>
		</tr>
		<tr>
			<td><input type="submit" name="button" value="UPDATE"></td>
		</tr>
	</table>
</form>

<?php 

if (isset($_POST['button'])) 
{
	$id =$_POST['id'];
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
	if (is_uploaded_file($image_tmp_name)) 
	{
		// echo "File Given";
		
		$query ="update test_tb set name='$name', age='$age' ,gender='$gender',email='$email' ,password='$password' ,image_path='$folder' where id='$id' ";

	$run =mysqli_query($conn, $query);
echo mysqli_error($conn);

	if ($run) 
	{
		move_uploaded_file($image_tmp_name, $folder);
		echo "<script>alert('Data is Updated...');
			window.location.href='page_2.php';
		</script>";
	}
	else
	{
		echo "<script>alert('Data is Not Updated..!!');</script>";
	}

	}
	else
	{
		// echo "File is Not Given..!!";
		$query ="update test_tb set name='$name', age='$age' ,gender='$gender',email='$email' ,password='$password' where id='$id' ";

	$run =mysqli_query($conn, $query);
echo mysqli_error($conn);

	if ($run) 
	{
		move_uploaded_file($image_tmp_name, $folder);
		echo "<script>alert('Data is Updated...');
			window.location.href='page_2.php';
		</script>";
	}
	else
	{
		echo "<script>alert('Data is Not Updated..!!');</script>";
	}
	}
}



 ?>
</body>
</html>