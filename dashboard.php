  <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1000px;}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 1000px;
    }
    
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }

  </style>
</head>
<body>

<?php 

session_start(); 

if(isset($_SESSION['username']))
{
  echo "Welcome ".$_SESSION['username'];
}
else
{
  header('location:login.php');
}

?>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <a href="adminpenal.php"><h4 class="active">ADMIN PANNEL<img src="images/avatar.png"></h4></a>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="page_1.php">ADD DATA</a></li>
        <li class="active"><a href="page_2.php">VEIW DATA</a></li>
         <li class="active"><a href="logout.php">LOGOUT</a></li>
               
      </ul><br>
      </div>
    </div>
    
