<?php  

	$con=mysqli_connect("localhost","root","","contact");

	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];	
		$contact=$_POST['contact'];
		$image = $_FILES['image']['name'];
		$path = "image/" .$image;
	    move_uploaded_file($_FILES['image']['tmp_name'],$path);

        $sql = "INSERT INTO c_book (name , email , password , contact , image) VALUES ('$name','$email', '$password', '$contact' , '$image')";

   			mysqli_query($con, $sql);	
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
			width: 700px;
			background: white;
			padding: 20px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.1); 
		}
		.user
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
            border-radius: 5px;
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
<body>

	<form method="post" enctype="multipart/form-data">
		<table class="t_data">
			<h1 class="user">User Registration</h1>
			<tr>
				<td><input placeholder="Name" type="text" name="name"></td>
			</tr>
			<tr>
				<td><input placeholder="Email" type="email" name="email"></td>
			</tr>
			<tr>
				<td><input placeholder="Contact" type="number" name="contact"></td>
			</tr>
			<tr>
				<td><input placeholder="Password" type="password" name="password"></td>
			</tr>
			<tr>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<td class="submit"><input type="submit" name="submit" value="submit"></td>
			</tr>

			<tr>
				<td class="page">
					<a href="index.php">Login</a>
				</td>
			</tr>
		</table>
	</form>

</body>
</html>	