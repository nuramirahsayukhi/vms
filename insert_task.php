<?php
    require 'phpmailer/PHPMailerAutoload.php';

	include_once('dbconnect.php');
	$id = 0;
	$update = false;
	
	if (isset($_POST['add_task'])) {
		$task_name = $_POST['taskname'];
        $date = $_POST['date'];
        $address = $_POST['address'];
 		$district = $_POST['district'];
        $start_time = $_POST['start_time'];
        $desc = $_POST['description'];

		$query = mysqli_query($con, "INSERT INTO tasks (taskname, date, start_time, address, description) VALUES ('$task_name', '$date','$start_time', '$address', '$desc')");
	
		if($query) {
		echo "<script>alert('You have successfully added a new task');</script>";
		$mail = new PHPMailer;
		//$mail->SMTPDebug = 3;
		$mail->isSMTP();// Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true; // Enable SMTP authentication
		$mail->Username = 'nuramirah.sayukhi@gmail.com';                 // SMTP username
		$mail->Password = 'orenanyamputeh199';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom('nuramirah.sayukhi@gmail.com', 'Prihatin Kedah');
		//should send this to all recipients from the district set when adding a new task

		$sql = "SELECT * FROM multiusers WHERE  district='$district'";
		$query_district = mysqli_query($con, $sql);
		
		if(mysqli_num_rows($query_district)>0) {
			// $mail->addReplyTo("nuramirah.sayukhi@gmail.com");
			while($x=mysqli_fetch_assoc($query_district)) {
				$mail->addBCC($x['email']);   
			}
			$mail->isHTML(true);
			$mail->Subject = 'Test Email to Users';
			$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				// echo "<script > document.location ='managetasks.php'; </script>";
				echo 'Message has been sent';
			}
		} else {
			
		}
	
		} 	else {
      		echo "<script>alert('Something Went Wrong. Please try again');</script>";
			echo("Error description: " . mysqli_error($con));
  		}	 
	}
?>