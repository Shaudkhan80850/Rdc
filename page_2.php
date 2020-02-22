<!DOCTYPE html>
<html>
<head>
	<title>Veiw Page</title>
</head>
<body>

<?php 

$conn =mysqli_connect('localhost' ,'root' ,'' ,'test_db');

$query ="select * from test_tb";

$rows =mysqli_query($conn, $query);

$totalrows =mysqli_num_rows($rows);

if ($totalrows !=0) 
{
	// echo "Rows Are Available";
?>

	<table align="center" border="1">
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th>AGE</th>
			<th>GENDER</th>
			<th>EMAIL ID</th>
			<th>PASSWORD</th>
			<th>PROFILE</th>
			<th>UPDATE</th>
			<th>DELETE</th>
		</tr>
	<!-- </table> -->

<?php

	while ($data =mysqli_fetch_array($rows) ) 
	{
		echo "<tr>
			<th>".$data[0]."</th>
			<td>".$data[1]."</td>
			<td>".$data[2]."</td>
			<td>".$data[3]."</td>
			<td>".$data[4]."</td>
			<td>".$data[5]."</td>
			<td><img src='$data[6]' width='100' height='100'></td>
			<td><a href='page_3.php?id=$data[0]'>Edit</a></td>
			<td><a href='page_4.php?id=$data[0]' onclick='return Confirmation()'>Delete</a></td>
		</tr>";
	}
}
else
{
	echo "Rows Are Not Available...!!";
}



 ?>
</table>

<script type="text/javascript">
	function Confirmation() 
	{
		return confirm('Are You Sure to Delete Data...??');
	}
</script>
</body>
</html>