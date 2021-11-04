<?php
session_start();
include_once('dbconnect.php');
if(isset($_POST['login'])){
$userid=$_POST['userid'];
$password = $_POST['password'];
$usertype=$_POST['usertype'];
$password = md5($password);

$select2 = mysqli_query($con, "SELECT * FROM multiusers WHERE userid = '$userid' AND password = '$password' AND usertype = '$usertype'");
$row = mysqli_fetch_array($select2);

$check_user=mysqli_num_rows($select2);

            if($check_user==1){
                $status =$row['status'];
                if ($usertype=="admin") {
                echo '<script type  = "text/javascript">';
                echo 'alert("Login Success!");';
                echo 'window.location.href = "managevolunteers.php"';
                echo '</script>';
                } else {
                if($status=="approved"){
                echo '<script type  = "text/javascript">';
                echo 'alert("Login Success!");';
                echo 'window.location.href = "volunteerdashboard.php"';
                echo '</script>';
                } elseif($status=="Pending"){
                echo '<script type  = "text/javascript">';
                echo 'alert("Your account is still pending for approval!");';
                echo 'window.location.href = "login.php"';
                echo '</script>';
                }
            }
        } else {
                echo '<script type  = "text/javascript">';
                echo 'alert("Invalid user ID or password!");';
                echo 'window.location.href = "login.php"';
                echo '</script>';
        }        
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700"
            rel="stylesheet">
        <link rel="stylesheet" href="login.css">
        <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
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

        a {
            color: white;
            font-size: large;
        }

        a:hover {
            color: #fff;
            opacity: 0.5;
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
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-sm bg-dark justify-content-center">
            <ul class="navbar-nav">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>

                    <!-- <li class="nav-item ">
                        <a class="nav-link active" href="aboutus.html">ABOUT US</a>
                    </li> -->
                    <li class="nav-item ">
                        <a class="nav-link active" href="#">CONTACT US</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" href="login.php">LOGIN</a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link active" href="registeruser.php">REGISTER</a>
                    </li>

            </ul>
            </div>
        </nav>

        <div class="form-card">
            <h1>Login</h1>
            <form action="login.php" method="POST">

                <p><input type="text" name="userid" placeholder="User ID" autocomplete="off"></p>
                <p><input type="password" name="password" placeholder="Password"></p>
                <p id='userlabel'>Select user type:
                    <select name="usertype">
                        <option value="admin">admin</option>
                        <option value="volunteer">volunteer</option>
                    </select>
                </p>
                <p class="submit">
                    <input type="submit" name="login" value="Login">
                </p>
            </form>
        </div>
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