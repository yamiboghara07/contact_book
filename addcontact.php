
<?php 
	include "dashboard.php" ;

	$con=mysqli_connect("localhost","root","","contact");
	// session_start();

	if (isset($_GET['id'])) {
    
	    $id = $_GET['id'];
	    $rec = "SELECT * FROM view WHERE id=".$id;
	    $res = mysqli_query($con, $rec);
	    $info = mysqli_fetch_assoc($res);
	}

	if(isset($_POST['submit'])) {
		$userid=$_SESSION['userid'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$contact=$_POST['contact'];
		$password=$_POST['password'];
	
		$image_names = array();
        foreach ($_FILES['image']['tmp_name'] as $key => $tmp_name) 
        {
	        $path = 'image/' . $_FILES['image']['name'][$key];
        	if(!empty($tmp_name)) 
        	{
	            $image_name = $_FILES['image']['name'][$key];
	            $tmp = $_FILES['image']['tmp_name'][$key];
	            $path = 'image/' . $image_name;
	            move_uploaded_file($tmp, $path);
	            $image_names[] = $image_name;
	        }else
	        {
	        	$image_names[] = $info['image'];
	        }
        }
    
	    $image = implode(', ', $image_names);

	     if (isset($_GET['id'])) {
	    	$sql = "UPDATE `view` SET name='$name', email='$email', contact='$contact', password='$password',image='$image' WHERE id =" . $_GET['id'];
	    } else {
	    	$sql = "INSERT INTO view (user_id,  name , email , contact  , password , image) VALUES ('$userid', '$name','$email','$contact' , '$password' , '$image')";
	    }
   		mysqli_query($con, $sql);
    	// header("location:view.php");
	}

	$con_data = "SELECT * FROM view WHERE `user_id`= " .$_SESSION['userid'];

	$data=mysqli_query($con,$con_data);

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h3>welcome , <?php echo $_SESSION['userid']; ?></h3>


	<form method="post" enctype="multipart/form-data">
		<table border="1">
			<tr>
				<td>Name</td>
				<td><input type="text" name="name"  value="<?php echo @$info['name'] ?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" value="<?php echo @$info['email'] ?>"></td>
			</tr>
			<tr>
				<td>Contact</td>
				<td><input type="number" name="contact" value="<?php echo @$info['contact'] ?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" value="<?php echo @$info['password']; ?>"></td>
			</tr>
			<tr>
				<td>Image</td>
				<td>
					<input type="file" name="image[]" multiple>
					<?php if(!empty($info['image'])): ?>
                        <span><?php echo $info['image']; ?></span>
                    <?php endif; ?>
				</td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="Add Contact"></td>
			</tr>

		</table>
	</form>
