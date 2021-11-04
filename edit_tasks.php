<?php
include_once('dbconnect.php');
if(isset($_POST['edit_task']))
  {
  	$eid=$_GET['editid'];
	//Getting Post Values
    
    $taskname=$_POST['taskname'];
    $date=$_POST['date'];
    $start_time=$_POST['start_time'];
    $address=$_POST['address'];
    $desc=$_POST['description'];
    //Query for data updation
     $query=mysqli_query($con, "UPDATE  tasks SET taskname='$taskname',date='$date', start_time='$start_time', address='$address', description='$desc' where id='$eid'");
     
    if ($query) {
    echo "<script>alert('You have successfully update the data');</script>";
    echo "<script type='text/javascript'> document.location ='managetasks.php'; </script>";
    } else {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Task Details</title>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            /* background: linear-gradient(135deg, #71b7e6, #9b59b6); */
            background: radial-gradient(circle, rgba(119, 255, 157, 1) 0%, rgba(148, 233, 209, 1) 100%);
        }

        .container {
            max-width: 700px;
            width: 100%;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        }

        .container .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;
        }

        .container .title::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 30px;
            border-radius: 5px;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        .content form .user-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }

        form .user-details .input-box {
            margin-bottom: 15px;
            width: calc(100% / 2 - 20px);
        }

        form .input-box span.details {
            display: flex;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .user-details .input-box input {
            height: 45px;
            width: 100%;
            outline: none;
            font-size: 16px;
            border-radius: 5px;
            padding-left: 15px;
            border: 1px solid #ccc;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .user-details .input-box input:focus,
        .user-details .input-box input:valid {
            border-color: #9b59b6;
        }

        form .category {
            display: flex;
            width: 80%;
            margin: 14px 0;
            justify-content: space-between;
        }

        form .category label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        form .category label .dot {
            height: 18px;
            width: 18px;
            border-radius: 50%;
            margin-right: 10px;
            background: #d9d9d9;
            border: 5px solid transparent;
            transition: all 0.3s ease;
        }

        #dot-1:checked~.category label .one,
        #dot-2:checked~.category label .two,
        #dot-3:checked~.category label .three {
            background: #9b59b6;
            border-color: #d9d9d9;
        }

        form input[type="radio"] {
            display: none;
        }

        form .button {
            height: 45px;
            margin: 35px 0
        }

        form .button input {
            height: 100%;
            width: 100%;
            border-radius: 5px;
            border: none;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: green;
            margin-top: 2.5rem;
        }

        /* form .button input:hover {
    transform: scale(0.99);
    background: linear-gradient(-135deg, #71b7e6, #9b59b6);
} */

        @media(max-width: 584px) {
            .container {
                max-width: 100%;
            }

            form .user-details .input-box {
                margin-bottom: 15px;
                width: 100%;
            }

            form .category {
                width: 100%;
            }

            .content form .user-details {
                max-height: 300px;
                overflow-y: scroll;
            }

            .user-details::-webkit-scrollbar {
                width: 5px;
            }
        }

        @media(max-width: 459px) {
            .container .content .category {
                flex-direction: column;
            }
        }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="title">
                <h3 style="font-size: 20px;margin-bottom: 15px;">Task Details</h3>
            </div>
            <div class="content">
                <form method="POST">
                    <?php
                    $con = mysqli_connect('localhost', 'root', '', 'vms');
                    $vid=$_GET['editid'];
                    $ret=mysqli_query($con,"select * from tasks where id =$vid");
                    $cnt=1;
                    while ($row=mysqli_fetch_array($ret)) {
                
                    ?>
                    <div class="user-details ">
                        <div class="input-box">
                            <span class="details ">Task Name</span>
                            <input type="text" name="taskname" value="<?php  echo $row['taskname'];?>" required>
                        </div>
                        <div class=" input-box">
                            <span class="date">Task Date</span>
                            <input type="text" name="date" value="<?php  echo $row['date'];?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details ">Start Time</span>
                            <input type="text" name="start_time" value="<?php  echo $row['start_time'];?>" required>
                        </div>
                        <div class="input-box ">
                            <span class="details ">Address</span>
                            <input type="text" name="address" value="<?php  echo $row['address'];?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Description</span>
                            <input type="text" name="description" value="<?php  echo $row['description'];?>" required>
                        </div>


                    </div>
                    <div class="button">
                        <input type="submit" name="edit_task" value="SUBMIT">
                    </div>
                </form>
                <?php 
                $cnt=$cnt+1;
                }?>
            </div>

        </div>

    </body>

</html>