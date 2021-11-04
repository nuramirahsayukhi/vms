<?php
include_once('dbconnect.php');


	/*-- we included connection files--*/
	

	/*--- we created a variables to display the error message on design page ------*/
	$error = "";

	if (isset($_POST["add_new_record"]))
	{
		$file_tmp = $_FILES["fileImg"]["tmp_name"];
		$file_name = $_FILES["fileImg"]["name"];

		
        $noOfVolunteers = $_POST['noOfVolunteers'];
        $district = $_POST['district'];
        $distributionAmount = $_POST['distributed_amount'];
		//image directory where actual image will be store
		$file_path = "name_list_img/".$file_name;	

	
		if(file_exists($file_path)){
			$error = "Sorry,The <b>".$file_name."</b> image already exist.";
		} else {
                $query = mysqli_query($con, "INSERT INTO distributionrecord (no_of_volunteers, district, distribution_amount, name_list_img) VALUES ('$noOfVolunteers', '$district','$distributionAmount', '$file_path')");
				// $result = mysqli_connect($host, $uname, $pwd) or die("Connection error: ". mysqli_error());
				// mysqli_select_db($result, $db_name) or die("Could not Connect to Database: ". mysqli_error());
				// mysqli_query($result,"INSERT INTO distribution(img_name,img_path)
				// VALUES('$image_name','$file_path')") or die ("image not inserted". mysqli_error());
				move_uploaded_file($file_tmp,$file_path);
				$error = "<p align=center>File ".$_FILES["fileImg"]["name"].""."<br />Image saved into Table.";
			}
		}
	
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add New Record</title>
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

        .content form .record-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }

        form .record-details .input-box {
            margin-bottom: 15px;
            width: calc(100% / 2 - 20px);
        }

        form .input-box span.details {
            display: flex;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .record-details .input-box input {
            height: 45px;
            width: 100%;
            outline: none;
            font-size: 16px;
            border-radius: 5px;
            padding-left: 15px;
            /* border: 1px solid #ccc; */
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .record-details .input-box input:focus,
        .record-details .input-box input:valid {
            border-color: #9b59b6;
        }

        /* 
        form input[type="radio"] {
            display: none;
        } */

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



        @media(max-width: 584px) {
            .container {
                max-width: 100%;
            }

            form .record-details .input-box {
                margin-bottom: 15px;
                width: 100%;
            }

            form .category {
                width: 100%;
            }

            .content form .record-details {
                max-height: 300px;
                overflow-y: scroll;
            }

            .record-details::-webkit-scrollbar {
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
                <h3 style="font-size: 20px;margin-bottom: 15px;">Distribution Record Details</h3>
            </div>
            <div class="content">
                <form method="POST" action="addnewrecord.php" enctype="multipart/form-data">
                    <div class="record-details ">
                        <div class="input-box">
                            <span class="details ">No. of volunteers involved</span>
                            <input type="number" name="noOfVolunteers" required>
                        </div>
                        <!-- <div class="input-box">
                            <span class="date">Task Date</span>
                            <input type="text" name="date" placeholder="Enter task date " required>
                        </div> -->
                        <div class="input-box">
                            <span class="details ">District</span>
                            <select name="district" id="">
                                <option value="Baling">Baling</option>
                                <option value="Bandar Baharu">Bandar Baharu</option>
                                <option value="Kota Setar">Kota Setar</option>
                                <option value="Kuala Muda">Kuala Muda</option>
                                <option value="Kulim">Kulim</option>
                                <option value="Langkawi">Langkawi</option>
                                <option value="Padang Terap">Padang Terap</option>
                                <option value="Pendang">Pendang</option>
                                <option value="Pokok Sena">Pokok Sena</option>
                                <option value="Sik">Sik</option>
                                <option value="Yan">Yan</option>
                            </select>
                        </div>


                        <div class="input-box">
                            <span class="details">Total Amount of Distribution (RM) </span>
                            <input type="text" name="distributed_amount" required>
                        </div>

                        <div class="input-box">
                            <span class="details">List of Recipients</span>
                            <input type="file" name="fileImg" class="file_input" />
                        </div>

                    </div>
                    <div class="button">
                        <input type="submit" name="add_new_record" value="SUBMIT">
                    </div>
                </form>
            </div>

        </div>

    </body>

</html>