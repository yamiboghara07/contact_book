    <?php

        include "dashboard.php";

        $userid = $_SESSION['userid'];
        $con = mysqli_connect("localhost","root","","contact");
        $sql = "select * from view where user_id=".$userid;
        $res = mysqli_query($con, $sql);


        if(isset($_GET['id'])) 
        {
            $id = $_GET['id'];   

            $delete = "DELETE FROM view WHERE id = $id";
            mysqli_query($con, $delete);

            $select_image = "SELECT image FROM view WHERE id = $id";
            $result = mysqli_query($con, $select_image);
            $row = mysqli_fetch_assoc($result);
            $image_filenames = explode(', ', $row['image']);

            foreach ($image_filenames as $filename) 
            {
                unlink("image/$filename");
            }

            // unlink("image/$image_filename"); 
            header("location:view.php");
        }



    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title></title>
        <style type="text/css">
            
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
            }

            table {
                width: 100%;
                background: black;
                color: white;
                border-collapse: collapse;
            }
            img {
                width: 100px;
                height: 100px;
                object-fit: cover;
            }
             th, td {
                padding: 10px;
                border: 1px solid white;
                text-align: center;
            }
            th {
                background-color: #333;
            }
            .images
            {
                display: flex;
                gap:3px;
                padding: 5px;
            }
            td > a {
                text-decoration: none;
                color: white;
            }


        </style>
    </head>
    <body>
    <h3> </h3>

        <table>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>CONTACT</th>
                <th>PASSWORD</th>
                <th>IMAGE</th>
                <th>DELETE</th>
                <th>EDIT</th>
            </tr>
            <?php while ($data=mysqli_fetch_assoc($res)) { ?>

            <tr style="text-align: center;">
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['contact']; ?></td>
                <td><?php echo $data['password']; ?></td>
                <td class="images">
                    <?php 
                        $images = explode(', ', $data['image']);
                        foreach ($images as $image) 
                        {
                            echo '<img src="image/' . $image . '"><br>';
                        }
                    ?>
                </td>
                <td><a href="view.php?id=<?php echo $data['id']; ?>">DELETE</a></td>
                <td><a href="addcontact.php?id=<?php echo $data['id']; ?>">EDIT</a></td>
            </tr>

            <?php } ?>
        </table>

    </body>
    </html>