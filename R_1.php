<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-lg-6">
			
<form class="form-horizontal" method="post">
  <fieldset>
    <legend>Registration Form</legend>
    <div class="form-group">
      <label for="inputName" class="col-lg-2 control-label">Name :</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="name" id="inputName" placeholder="Enter Your Name" required="">
      </div>
    </div><div class="form-group">
      <label for="inputContact" class="col-lg-2 control-label">Contact Number :</label>
      <div class="col-lg-10">
        <input type="number" class="form-control" name="mobile" id="inputContact" placeholder="Enter Your Contact Number" required="">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email Id:</label>
      <div class="col-lg-10">
        <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Enter Your Email Id" required="">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password :</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Enter Your Password" required="">
        <br>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary" name="button">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
</div>
</div>
</div>

<?php 

$conn =mysqli_connect('localhost','root','','r_db');
if (isset($_POST['button'])) 
{
	$name =$_POST['name'];
	$mobile =$_POST['mobile'];
	$email =$_POST['email'];
	$password =$_POST['password'];


	$query ="insert into registration_tb (name ,mobile ,email ,Password) values('$name' ,'$mobile' ,'$email' ,'$password') ";
	mysqli_query($conn, "insert into login_tb (email,password) values('$email' ,'$password')");
	$run =mysqli_query($conn, $query);

	if ($run) 
	{
		echo "<script>alert('Registration Successfully');
			window.location.href='login.php';
		</script>";
	}
	else
	{
		echo "<script>alert(Registration Failed..!!);</script>";
	}
}

 ?>
</body>
</html>