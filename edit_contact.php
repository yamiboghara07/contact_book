<?php 

	$con = mysqli_connect("localhost","root","","contact");

	session_start();
	if(!isset($_SESSION['userid']))
	{
		header("location:index.php");
	}

	$id = $_SESSION['userid'];
	$sql = "select * from c_book where id=".$id;
	$res = mysqli_query($con,$sql);
	$data = mysqli_fetch_assoc($res);

	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		// Update profile details in the database
		$sql = "update c_book set name='$name', email='$email' where id='$id'";
		mysqli_query($con, $sql);
		header("location:index.php");
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form method="post">
		<table border="2">
			<tr>
				<td>Name:</td>
				<td><input type="name" name="name" value="<?php echo $data['name']; ?>"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="email" name="email" value="<?php echo $data['email']; ?>"></td>
			</tr>
			<tr>
				<td>submit:</td>
				<td><input type="submit" name="submit" value="Save"></td>
			</tr>
		</table>
	</form>


</body>
</html>