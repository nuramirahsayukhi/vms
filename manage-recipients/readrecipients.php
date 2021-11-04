<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recipient Details</title>
        <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            color: #566787;
            /* background: #f5f5f5; */
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
        </style>
    </head>

    <body>
        <?php
            $con = mysqli_connect('localhost', 'root', '', 'vms');
            $vid=$_GET['viewid'];
            $ret=mysqli_query($con,"select * from recipients where id =$vid");
            $cnt=1;
            while ($row=mysqli_fetch_array($ret)) {
        ?>
        <div class="form-container">
            <div class="container">
                <h2>Recipient Details</h2>
                <p> <b>Full Name:</b> <?php  echo $row['fullname'];?></p>
                <p> <b>IC No. :</b> <?php  echo $row['icno'];?></p>
                <p> <b>Contact No. :</b> <?php  echo $row['contactno'];?></p>
                <p> <b>Address:</b> <?php  echo $row['address'];?></p>
                <p> <b>Occupation: </b> <?php  echo $row['occupation'];?></p>
            </div>
        </div>
        <?php 
                $cnt=$cnt+1;
        }?>

    </body>

</html>