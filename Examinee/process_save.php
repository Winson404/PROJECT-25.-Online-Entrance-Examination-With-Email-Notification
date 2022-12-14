<?php 
	include '../config.php';
	date_default_timezone_set('Asia/Manila');
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../vendor/PHPMailer/src/Exception.php';
	require '../vendor/PHPMailer/src/PHPMailer.php';
	require '../vendor/PHPMailer/src/SMTP.php';


	// SEND CONTACT EMAIL - CONTACT-US.PHP
	if(isset($_POST['sendEmail'])) {

		$name    = mysqli_real_escape_string($conn, $_POST['name']);
		$email	 = mysqli_real_escape_string($conn, $_POST['email']);
		$subject = mysqli_real_escape_string($conn, $_POST['subject']);
		$msg     = mysqli_real_escape_string($conn, $_POST['message']);

	    $message = '<h3>'.$subject.'</h3>
					<p>
						Good day!<br>
						'.$msg.'
					</p>
					<p>
						Name of Sender: '.$name.'<br>
						Email: '.$email.'
					</p>
					<p><b>Note:</b> This is a system generated email please do not reply.</p>';
					//Load composer's autoloader

	    $mail = new PHPMailer(true);                            
	    try {
	        //Server settings
	        $mail->isSMTP();                                     
	        $mail->Host = 'smtp.gmail.com';                      
	        $mail->SMTPAuth = true;                             
	        $mail->Username = 'nhsmedellin@gmail.com';     
			$mail->Password = 'fgzyhjjhjxdikkjp';                
	        $mail->SMTPOptions = array(
	            'ssl' => array(
	            'verify_peer' => false,
	            'verify_peer_name' => false,
	            'allow_self_signed' => true
	            )
	        );                         
	        $mail->SMTPSecure = 'ssl';                           
	        $mail->Port = 465;                                   

	        //Send Email
	        $mail->setFrom('nhsmedellin@gmail.com');
	        
	        //Recipients
	        $mail->addAddress('sonerwin12@gmail.com');              
	        $mail->addReplyTo('sonesrwin12@gmail.com');
	        
	        //Content
	        $mail->isHTML(true);                                  
	        $mail->Subject = $subject;
	        $mail->Body    = $message;

	        $mail->send();
			$_SESSION['success'] = "Email sent successfully!";
			header("Location: contact-us.php");

	    } catch (Exception $e) {
	    	$_SESSION['success'] = "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
			header("Location: contact-us.php");
	    }
    }







    // SAVE SCHEDULE - BOOKEXAMSCHEDULE.PHP
    if(isset($_POST['confirm_booking'])) {
    	$user_Id     = mysqli_real_escape_string($conn, $_POST['user_Id']);
		$schedID     = mysqli_real_escape_string($conn, $_POST['schedID']);
		$date_booked = date('Y-m-d');

		$fetch = mysqli_query($conn, "SELECT * FROM exam_bookings WHERE bookingsUserId='$user_Id' ");
		if(mysqli_num_rows($fetch) > 0) {
			$_SESSION['message'] = "You have already booked a schedule";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: bookExam.php");
		} else {
		  $save = mysqli_query($conn, "INSERT INTO exam_bookings (bookingsUserId, bookingsSchedID, date_booked) VALUES ('$user_Id', '$schedID', '$date_booked')");
	      if($save) {
	      	$_SESSION['message'] = "You have successfully booked your examination schedule.";
	        $_SESSION['text'] = "Saved successfully!";
	        $_SESSION['status'] = "success";
			header("Location: bookExam.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while saving the information.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: bookExam.php");
	      } 
		}
    }
	

?>



