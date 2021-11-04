<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assign Tasks</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }

        body {
            color: #566787;
            /* background: #f5f5f5; */
            background: radial-gradient(circle, rgba(119, 255, 157, 1) 0%, rgba(148, 233, 209, 1) 100%);
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

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child {
            width: 130px;
        }

        table.table td a {
            color: #a0a5b1;
            display: inline-block;
            margin: 0 5px;
        }

        table.table td a.view {
            color: #03A9F4;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }


        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
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

        button {
            display: inline;
        }
        </style>
    </head>

    <body>
        <form action=""></form>
        <div class="topnav" id="myTopnav">
            <a href="#dashboard">Dashboard</a>
            <a href="managevolunteers.php">Manage Volunteers </a>
            <a href="managetasks.php" class="active">Manage Tasks</a>
            <a href="#myprofile">My Profile</a>
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
                            <h2>Volunteers List</b></h2>
                        </div>
                        <!-- <div class="col-sm-7" align="right">
                            <a href="addtask.html" class="btn btn-success"><i class="material-icons">&#xE147;</i>
                                <span style="padding: 5px;">Add New Task</span></a>

                        </div> -->
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Full Name</th>
                            <th>Contact No</th>
                            <th>Address</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $con = mysqli_connect('localhost', 'root', '', 'vms');
                        $ret=mysqli_query($con,"SELECT *   FROM multiusers WHERE usertype = 'volunteer' AND status = 'approved' ORDER BY id ASC");
                        $cnt=1;
                        $row=mysqli_num_rows($ret);
                        if($row>0){
                        while ($row=mysqli_fetch_array($ret)) {
                        ?>
                        <!--Fetch the Records -->
                        <tr>
                            <td><?php echo $cnt;?></td>
                            <td><?php  echo $row['fullname'];?></td>
                            <td><?php  echo $row['contactno'];?></td>
                            <td><?php  echo $row['address'];?></td>

                            <td>
                                <form action="assigntask.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['id'];?>" />
                                    <input type="submit" name="assign_task" value="SELECT" />
                                </form>
                            </td>

                        </tr>
                        <?php 
                        $cnt=$cnt+1;
                        } } else {?>
                        <tr>
                            <th style="text-align:center; color:red;" colspan="6">No Available Volunteers </th>
                        </tr>
                        <?php } ?>
                        <?php 
                        if(isset($_POST['assign_task'])){
                            $id = $_POST['id'];
                            // $select = "UPDATE tasks SET assigned_to = $id  WHERE htmlentities ($row['id']);";
                            $result = mysqli_query($con, $select);

                            echo '<script type = "text/javascript">';
                            echo 'alert("Succesfully assigned the task!");';
                            echo 'window.location.href = "managetasks.php"';
                            echo '</script>';
        
                        }
                        ?>
                    </tbody>
                </table>
    </body>
    </div>
    </div>

</html>