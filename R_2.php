<!DOCTYPE html>
<html>
<head>
	<title>Update Form</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<?php 

$conn =mysqli_connect('localhost','root','','r_db');

$id =$_GET['id'];

$query ="select * from registration_tb where id='$id' ";

$row =mysqli_query($conn, $query);

$data =mysqli_fetch_array($row);

 ?>

<div class="container">
	<div class="row">
		<div class="col-lg-6">
			
<form class="form-horizontal" method="post">
	<input type="hidden" name="id" value="<?php echo $data[0]; ?>">
  <fieldset>
    <legend>Updation Form</legend>
    <div class="form-group">
      <label for="inputName" class="col-lg-2 control-label">Name :</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="name" id="inputName" placeholder="Enter Your Name" required="" value="<?php echo $data[1]; ?>">
      </div>
    </div><div class="form-group">
      <label for="inputContact" class="col-lg-2 control-label">Contact Number :</label>
      <div class="col-lg-10">
        <input type="number" class="form-control" name="mobile" id="inputContact" placeholder="Enter Your Contact Number" required="" value="<?php echo $data[2]; ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email Id:</label>
      <div class="col-lg-10">
        <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Enter Your Email Id" required="" value="<?php echo $data[3]; ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password :</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Enter Your Password" required="" value="<?php echo $data[4]; ?>">
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
	$id =$_POST['id'];
	$name =$_POST['name'];
	$mobile =$_POST['mobile'];
	$email =$_POST['email'];
	$password =$_POST['password'];

	$query ="update registration_tb set name='$name',mobile='$mobile',email='$email',password='$password' where id ='$id' ";

	$run =mysqli_query($conn ,$query);

	if ($run) 
	{
		echo "<script>alert('Data Updation Successfully');
			window.location.href='dashboard.php';
		</script>";
	}
	else
	{
		echo "<script>alert('Data Updation Failed..!!');</script>";
	}

}

 ?>

</body>
</html>