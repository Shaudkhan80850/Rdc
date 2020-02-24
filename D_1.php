<?php 

session_start();

if (isset($_SESSION['email'])) 
{
	echo "Welcome ".$_SESSION['email'];
}
else
{
	header('location:login.php');
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<?php 

$conn =mysqli_connect('localhost','root','','r_db');

$query ="select * from registration_tb";

$rows =mysqli_query($conn, $query);

$totalrow =mysqli_num_rows($rows);

if ($totalrow !=0) 
{

?>
<div class="container">
<div class="row">
<div class="col-lg-6">

<form class="form-horizontal" method="post">
  <fieldset>
    <legend>Login Form</legend>
    <table class="table">
    <thead>
    	<th>ID</th>
    	<th>NAME</th>
    	<th>CONTACT</th>
    	<th>EMAIL ID</th>
    	<th>PASSWORD</th>
    	<th>ACTION</th>
    </thead>
   		
<?php 
	while ($data =mysqli_fetch_array($rows)) 
	{
		echo "
		<tbody>
    	<tr>
    		<td>".$data[0]."</td>
    		<td>".$data[1]."</td>
    		<td>".$data[2]."</td>
    		<td>".$data[3]."</td>
    		<td>".$data[4]."</td>
    		<td><button class='btn btn-default'><a href='page_2.php?id=$data[0]'>Edit</a></button>
    			<button class='btn btn-danger'><a href='page_3.php?id=$data[0]' onclick=' return Confirmation();'>Delete</a></button>
    		</td>
    	</tr>
    </tbody>";	
	}
}

 ?>

</fieldset>
</table>
</form>
</div>
</div>
</div>

<button><a href="logout.php">Logout</a></button>

<script type="text/javascript">
	function Confirmation() 
	{
		return confirm('Are You Sure to Delete Data ...??');
	}
</script>
 </body>
</html>