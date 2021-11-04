<?php
include 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" type="text/css" href="main.css"> -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <title>Manage Volunteers</title>
        <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            color: #566787;
            /* background: #f5f5f5; */
            background: radial-gradient(circle, rgba(119, 255, 157, 1) 0%, rgba(148, 233, 209, 1) 100%);
        }

        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }

        .topnav .icon {
            display: none;
        }

        @media screen and (max-width: 600px) {
            .topnav a:not(:first-child) {
                display: none;
            }

            .topnav a.icon {
                float: right;
                display: block;
            }
        }

        @media screen and (max-width: 600px) {
            .topnav.responsive {
                position: relative;
            }

            .topnav.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }

            .topnav.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }

        .table-responsive {
            margin: 30px 0;
        }

        .table-wrapper {
            margin-top: 80px;
            min-width: 1000px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            font-size: 15px;
            padding-bottom: 10px;
            margin: 0 0 10px;
            min-height: 45px;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .table-title select {
            border-color: #ddd;
            border-width: 0 0 1px 0;
            padding: 3px 10px 3px 5px;
            margin: 0 5px;
        }

        .table-title .show-entries {
            margin-top: 7px;
        }

        form {
            display: inline;
            margin-left: 1rem;
        }

        input[type="submit"] {
            color: white;
            padding: 3px;
        }

        #approve {
            background-color: green;
        }

        #reject {
            background-color: red;
        }
        </style>
    </head>

    <body>
        <div class="topnav" id="myTopnav">
            <!-- <a href="#dashboard">Dashboard</a> -->
            <a href="managevolunteers.php" class="active">Manage Volunteers </a>
            <a href="managetasks.php">Manage Tasks</a>
            <a href="logout.php">Log Out</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="container-xl">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>New Volunteer Applications</b></h2>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>IC No.</th>
                            <th>Contact No.</th>
                            <th>District</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $con = mysqli_connect('localhost', 'root', '', 'vms');
                        $query = "SELECT * FROM multiusers WHERE status = 'pending' ORDER BY id ASC";
                        $ret=mysqli_query($con,$query);
                        $cnt=1;
                        $row=mysqli_num_rows($ret);
                        if($row>0){
                        while ($row=mysqli_fetch_array($ret)) {
                        ?>
                        <!--Fetch the Records -->
                        <tr>
                            <td><?php echo $cnt;?></td>
                            <td><?php  echo $row['fullname'];?></td>
                            <td><?php  echo $row['icno'];?></td>
                            <td><?php  echo $row['contactno'];?></td>
                            <td><?php  echo $row['district'];?></td>
                            <td>
                                <a href="readvolunteerdetails.php?viewid=<?php echo htmlentities ($row['id']);?>"
                                    class="view" title="View Details" data-toggle="tooltip">
                                    <i class="material-icons">&#xE417;</i>
                                </a>
                                <form action="managevolunteers.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['id'];?>" />
                                    <input id="approve" type="submit" name="approve" value="Approve" />
                                    <input id="reject" type="submit" name="reject" value="Reject" />
                                </form>

                            </td>
                        </tr>
                        <?php 
                        $cnt=$cnt+1;
                        } } else {?>
                        <tr>
                            <th style="text-align:center; color:red;" colspan="6">No New Volunteers Application </th>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>



        <?php

        if(isset($_POST['approve'])){
        $id = $_POST['id'];

        $select = "UPDATE multiusers SET status = 'approved' WHERE id = '$id'";
        $result = mysqli_query($con, $select);

        echo '<script type = "text/javascript">';
        echo 'alert("User Approved!");';
        echo 'window.location.href = "managevolunteers.php"';
        echo '</script>';
    }

    if(isset($_POST['deny'])){
        $id = $_POST['id'];
        $select = "DELETE FROM multiusers WHERE id = '$id'";
        $result = mysqli_query($con, $select);

        echo '<script type = "text/javascript">';
        echo 'alert("User Denied!");';
        echo 'window.location.href = "managevolunteers.php"';
        echo '</script>';
        
    }
    ?>
        <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
        </script>
    </body>

</html>