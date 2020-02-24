<?php 

$conn =mysqli_connect('localhost','root','','r_db');

session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div class="container">
<div class="row">
<div class="col-lg-6">

<form class="form-horizontal" method="post">
  <fieldset>
    <legend>Login Form</legend>
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

if (isset($_POST['button'])) 
{
	$email =$_POST['email'];
	$password =$_POST['password'];

$query ="select * from login_tb where email ='$email' and password ='$password' ";

$rows =mysqli_query($conn, $query);

$totalrows =mysqli_num_rows($rows);

if ($totalrows ==1) 
{
	$_SESSION['email'] =$email ;
	echo "<script>alert('Welcome to Dashboard');
		window.location.href='dashboard.php';
	</script>";
}
else
{
	echo "<script>alert('Email and Password is Incorrect Please Try Again...!!');</script>";
}

}

 ?>

</body>
</html>