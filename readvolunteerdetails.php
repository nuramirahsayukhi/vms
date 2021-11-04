<?php
include 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Volunteer Details</title>
        <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            color: #566787;
            background: radial-gradient(circle, rgba(119, 255, 157, 1) 0%, rgba(148, 233, 209, 1) 100%);
        }

        .form-container {
            display: flex;
            justify-content: center;
            margin-top: 100px;
        }

        .container {
            max-width: 700px;
            width: 100%;
            background: #fff;
            padding: 25px 30px;
            border-radius: 4px;
        }

        p,
        h2 {
            padding-bottom: 1rem;
        }

        input[type=submit] {
            border: none;
            color: white;
            padding: 16px 32px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;

        }

        a {
            text-decoration: none;
            padding: 5px;
        }
        </style>
    </head>

    <body>

        <?php
            $con = mysqli_connect('localhost', 'root', '', 'vms');
            $vid=$_GET['viewid'];
            $ret=mysqli_query($con,"select * from multiusers where id =$vid");
            $cnt=1;
            while ($row=mysqli_fetch_array($ret)) {
        ?>
        <div class="form-container">
            <div class="container">
                <h2>Volunteer Details</h2>
                <p> <b>Full Name:</b> <?php  echo $row['fullname'];?></p>
                <p> <b>IC No. :</b> <?php  echo $row['icno'];?></p>
                <p> <b>Date of Birth (Y/D/M):</b> <?php  echo $row['dob'];?> </p>
                <p> <b> Gender:</b> <?php  echo $row['gender'];?></p>
                <p> <b>Contact No. :</b> <?php  echo $row['contactno'];?></p>
                <p> <b>Address:</b> <?php  echo $row['address'];?></p>
                <p> <b>Occupation: </b> <?php  echo $row['occupation'];?></p>
                <p> <b>Volunteer Status: </b><?php  echo $row['status'];?></p>
                </p>
                <center>
                    <button>
                        <a href="managevolunteers.php">Back</a>
                    </button>
                </center>
            </div>
        </div>
        <?php 
                $cnt=$cnt+1;
        }?>
    </body>

</html>