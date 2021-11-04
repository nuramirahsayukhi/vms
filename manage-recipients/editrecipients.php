<?php 
//Database Connection
include('dbconnect.php');
if(isset($_POST['edit_recipient']))
  {
  	$eid=$_GET['editid'];
	//Getting Post Values
    
    $contactno=$_POST['contactno'];
    $occupation=$_POST['occupation'];
    $monthlyincome=$_POST['monthlyincome'];
    $address=$_POST['address'];
    $otheraid=$_POST['otheraid'];
    //Query for data updation
     $query=mysqli_query($con, "UPDATE  recipients SET contactno='$contactno',occupation='$occupation', monthlyincome='$monthlyincome', address='$address', otheraidreceived='$otheraid' where id='$eid'");
     
    if ($query) {
    echo "<script>alert('You have successfully update the data');</script>";
    echo "<script type='text/javascript'> document.location ='managerecipients.php'; </script>";
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
        <title>Edit Recipient Details</title>
        <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(0, 255, 127, 1) 0%, rgba(0, 212, 255, 1) 100%);
            height: 100vh;
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

        input,
        textarea,
        select {
            margin-top: 10px;
            margin-bottom: 5px;
        }

        h1,
        p {
            margin-bottom: 10px;
        }

        h1 {
            font-size: 1.2em;
        }

        form .submit-btn {
            height: 35px;
            margin: 20px 0;
        }

        form .submit-btn input {
            background-color: green;
            height: 100%;
            width: 100%;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
        }
        </style>
    </head>

    <body>
        <div class="form-container">

            <div class="container">
                <form method="post">
                    <?php
                $con = mysqli_connect('localhost', 'root', '', 'vms');
                $vid=$_GET['editid'];
                $ret=mysqli_query($con,"select * from recipients where id =$vid");
                $cnt=1;
                while ($row=mysqli_fetch_array($ret)) {
                
                ?>
                    <h1>Recipient Details</h1>
                    <p>Please enter all recipient details:</p>
                    <!-- <label for="fullname">Full Name</label> <br>
                    <input type="text" name="fullname"> <br> -->
                    <!-- <label for="icno">Identity Card No</label> <br>
                    <input type="number" name="icno" id=""><br> -->
                    <label for="contactno">Contact Number</label> <br>
                    <input type="number" name="contactno" id="" value="<?php  echo $row['contactno'];?>"> <br>
                    <label for="occupation">Occupation</label> <br>
                    <input type="text" name="occupation" id="" value="<?php  echo $row['occupation'];?>"> <br>
                    <label for="monthlyincome">Monthly Income</label> <br>
                    <input type="text" name="monthlyincome" id="" value="<?php  echo $row['monthlyincome'];?>"> <br>
                    <label for="address">Address</label> <br>
                    <textarea name="address" cols="50" rows="3" value="<?php  echo $row['address'];?>">
                            </textarea> <br>

                    <label for="otheraid">Other Aids Received</label> <br>
                    <input type="text" name="otheraid" id="" value="<?php  echo $row['otheraidreceived'];?>">
                    <div class="submit-btn">
                        <input type="submit" name="edit_recipient" value="SUBMIT">
                    </div>
                </form>
            </div>
        </div>
        <?php 
        $cnt=$cnt+1;
        }?>
    </body>

</html>