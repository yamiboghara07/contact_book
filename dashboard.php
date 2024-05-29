<?php 
	
	$con=mysqli_connect("localhost","root","","contact");
	session_start();

	if(!isset($_SESSION['userid'])) 
	{	
		header("location:index.php");
	}

	$id = $_SESSION['userid'];
	$sql = 'select * from `c_book` where `id`='.$id;
	$res = mysqli_query($con, $sql);
	$data = mysqli_fetch_assoc($res);

?>


<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .dash {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }

        .contact1 {
            display: flex;
            align-items: center;
        }

        .contact1 .image img {
            width: 100px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .contact1 .wel h3 {
            margin: 0;
        }

        .contact1 p {
            margin: 5px 0;
        }

        .c_list 
        {
        	margin-top: 10px;
        }

        .c_list a {

            background-color: #0056b3;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="dash">
    <div class="contact1">
        <div class="image">
            <img src="image/<?php echo $data['image']; ?>" >
        </div>
        <div class="wel">
            <h3>Welcome, <?php echo $_SESSION['userid']; ?></h3>
            <p><?php echo @$data['name'] ?></p>
            <p><?php echo @$data['email'] ?></p>
            <p><?php echo @$data['contact'] ?></p>
        </div>
    </div>
    <div class="c_list">
        <a href="addcontact.php">Add Contact</a>
        <a href="view.php">View Contact</a>
        <a href="edit_contact.php">Edit Profile</a>
        <a href="Logout.php">Logout</a>
    </div>
</div>

</body>
</html>
