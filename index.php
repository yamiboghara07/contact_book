<?php 

		$con=mysqli_connect("localhost","root","","contact");
		session_start();

		if(isset($_POST['submit'])) 	
		{
			$email=$_POST['email'];
			$password=$_POST['password'];

			$sql = "SELECT * FROM `c_book` WHERE `email`='$email' AND `password`='$password'";
			$res = mysqli_query($con,$sql);
			$cnt = mysqli_num_rows($res);
			if($cnt==1)
			{
				$data=mysqli_fetch_assoc($res);
				$_SESSION['userid']=$data['id'];
				// $_SESSION['username']=$data['name'];

				header("location:dashboard.php");
			}else
			{
				$msg = "email and password are wrong";
			}
	}	

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

		body
		{
			font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
		}
		.t_data
		{
			width: 400px;
			background: white;
			padding: 20px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.1); 
		}

		.login
		{
			margin-top: 0;
			font-size: 30px;
			text-align: center;
		}
		input
		{
			width: 100%;
			padding: 10px;
			margin-bottom: 10px;
			border: 1px solid #ccc;
			box-sizing: border-box; 
		}
		.submit input
		{
			  background: #0056b3;
			  font-size: 15px;
			  color: white;
		}
		.page > a
		{
			display: block;
            text-align: center;
            text-decoration: none;
            color: #007bff;
		}		

	</style>
</head>
<body class="body">

	<form method="post" class="form">
		<table class="t_data">
			<h1 class="login">Login</h1>
			<tr>
				<td><input type="email" name="email"></td>
			</tr>
			<tr>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td class="submit"><input type="submit" name="submit" value="submit"></td>
			</tr>
			<tr>
				<td class="page"><a href="register.php">Register for new page</a></td>
			</tr>
		</table>
	</form>

</body>
</html>