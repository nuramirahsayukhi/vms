<!DOCTYPE html>
<?php

$servername = "localhost";
$username="root";
$password="";
$dbname="vms";

try{

    $conn = mysqli_connect($servername, $username,$password,$dbname);
    // echo("successful in connection");
} catch(MySQLi_Sql_Exception $ex){
    echo("error in connection");
}

if(isset($_POST['register_user'])){
        $fullname= ucwords($_POST['fullname']);
        $userid=$_POST['userid'];
        $email=$_POST['email'];
        $password = $_POST['password'];
        $icno = $_POST['icno'];
        //appending the phone code with contact no
        $phonecode = "+6";
        $contactno = $phonecode .= $_POST['contactno'];
        
        $address= $_POST['address'];
        $district= $_POST['district'];
        // $dob=$_POST['dob'];
        $dob = date('Y-m-d', strtotime($_POST['dob']));

        
        $gender=$_POST['gender'];
        $occupation=$_POST['occupation'];
        $usertype = "Volunteer";
        $status = "Pending";
       
        //encrypt password 
        $password = md5($password);
        
        $register_query = "INSERT INTO multiusers (fullname, userid, email, password, icno, contactno, address, district, dob, gender, occupation, usertype, status) VALUES ('$fullname','$userid','$email', '$password','$icno','$contactno','$address', '$district' , '$dob','$gender','$occupation','$usertype', '$status')";

        try {
        $register_result = mysqli_query($conn, $register_query);
        if($register_result){
            if(mysqli_affected_rows($conn)>0){
            echo "<script>alert('You have successfully registered. Please wait for you account to be approved.');</script>";
    	    echo "<script > document.location ='login.php'; </script>";
            // echo("registration successful");
            } else{
            echo("error in registration");
            }
        }

        } catch(Exception $ex){
            echo("error".$ex->getMessage());

        }
}

?>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Volunteer Registration - VMS</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
        @import '~mdb-ui-kit/css/mdb.min.css';


        .gradient-custom {
            /* fallback for old browsers */
            background: #f093fb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: radial-gradient(circle, rgba(119, 255, 157, 1) 0%, rgba(148, 233, 209, 1) 100%);
            /* background: -webkit-linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1)); */

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            /* background: linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1)) */
        }

        .card-registration .select-input.form-control[readonly]:not([disabled]) {
            font-size: 1rem;
            line-height: 2.15;
            padding-left: .75em;
            padding-right: .75em;
        }

        .card-registration .select-arrow {
            top: 13px;
        }

        a {
            color: white;
            font-size: large;
        }

        a:hover {
            color: #fff;
            opacity: 0.5;
        }

        .form-label {
            font-weight: 500;
        }

        span {
            color: red;
        }
        </style>
    </head>

    <body>

        <section class="gradient-custom">
            <nav class="navbar navbar-expand-sm bg-dark justify-content-center">
                <ul class="navbar-nav">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <li class="nav-item ">
                            <a class="nav-link" href="index.php">HOME</a>
                        </li>

                        <!-- <li class="nav-item ">
                            <a class="nav-link active" href="#">ABOUT US</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active" href="#">CONTACT US</a>
                        </li> -->
                        <li class="nav-item ">
                            <a class="nav-link active" href="login.php">LOGIN</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active" href="registeruser.php">REGISTER</a>
                        </li>
                </ul>
                </div>
            </nav>
            <div class="container py-5 h-100">

                <div class="row justify-content-center align-items-center h-100">

                    <div class="col-12 col-lg-9 col-xl-7">
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5" style="text-align:center;">Volunteer Registration
                                    Form
                                </h3>
                                <form method="post" action="registeruser.php">

                                    <div class="row">
                                        <div class="col-md-6 mb-4">

                                            <div class="form-outline">
                                                <label class="form-label" for="fullname">Full Name<span>*</span>
                                                </label>
                                                <input type="text" name="fullname" class="form-control form-control-sm"
                                                    required />

                                            </div>

                                        </div>

                                        <div class="col-md-6 mb-4">

                                            <div class="form-outline">
                                                <label class="form-label" for="userid">User ID<span>*</span></label>
                                                <input type="text" name="userid" class="form-control form-control-sm"
                                                    required />

                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                                <label class="form-label" for="password">Password<span>*</span></label>
                                                <input type="password" name="password"
                                                    class="form-control form-control-sm" required />
                                            </div>

                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                                <label class="form-label" for="password">Confirm
                                                    Password<span>*</span></label>
                                                <input type="password" name="confirmpassword" disabled
                                                    class="form-control form-control-sm" required />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">

                                            <div class="form-outline">
                                                <label class="form-label" for="userid">Email<span>*</span></label>
                                                <input type="email" name="email" class="form-control form-control-sm"
                                                    required />

                                            </div>

                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                                <label class="form-label" for="dob">Date of Birth</label>
                                                <input type="date" name="dob" class="form-control form-control-sm"
                                                    required />
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-6 mb-4 pb-2">

                                            

                                        </div> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">

                                            <div class="form-outline">
                                                <label class="form-label" for="icno">IC / Passport
                                                    Number<span>*</span></label>
                                                <input type="number" name="icno" class="form-control form-control-sm"
                                                    required />

                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">

                                            <div class="form-outline">
                                                <label class="form-label" for="contactno">Contact
                                                    Number<span>*</span></label>
                                                <input type="tel" id="contactno" name="contactno"
                                                    class="form-control form-control-sm" required />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                                <label class="form-label" for="address">Address</label>
                                                <textarea class="form-control" name="address"
                                                    id=" exampleFormControlTextarea1" rows="2"></textarea>
                                                <!-- <input type="text" id="address" name="address"
                                                    class="form-control form-control-lg" required /> -->

                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                                <label class="form-label" for="district">District<span>*</span></label>
                                                <br>
                                                <select name="district">
                                                    <option value="Baling">Baling</option>
                                                    <option value="Bandar Baharu">Bandar Baharu</option>
                                                    <option value="Kota Setar">Kota Setar</option>
                                                    <option value="Kuala Muda">Kuala Muda</option>
                                                    <option value="Kubang Pasu">Kubang Pasu</option>
                                                    <option value="Kulim">Kulim</option>
                                                    <option value="Langkawi">Langkawi</option>
                                                    <option value="Padang Terap">Padang Terap</option>
                                                    <option value="Pendang">Pendang</option>
                                                    <option value="Pokok Sena">Pokok Sena</option>
                                                    <option value="Sik">Sik</option>
                                                    <option value="Yan">Yan</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">
                                            <label class="form-label" for="dob">Gender</label> <br>
                                            <select name="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                                <label class="form-label" for="occupation">Occupation</label>
                                                <!-- <input type="text" name="occupation"
                                                    class="form-control form-control-sm" required /> -->
                                                <select name="occupation" id="">
                                                    <option value="Government Employer">Government Employer</option>
                                                    <option value="Private Employer">Private Employer</option>
                                                    <option value="Unemployed">Unemployed</option>
                                                    <option value="Others">Others</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">
                                            <label class="form-label" for="contributiontype">Type of Preffered
                                                Contribution</label> <br>
                                            <select name="contributiontype" disabled="true">
                                                <option value="male">Food Bank Distribution</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-4 pt-2">
                                        <input style="width:100%;background-color:#4CAF50;"
                                            class="btn btn-primary btn-lg" type="submit" name="register_user"
                                            value="REGISTER" />
                                    </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>

</html>