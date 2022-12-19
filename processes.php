<?php 
	include 'config.php';

	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/PHPMailer/src/Exception.php';
    require 'vendor/PHPMailer/src/PHPMailer.php';
    require 'vendor/PHPMailer/src/SMTP.php';

	// users LOGIN
	if(isset($_POST['login'])) {
		$email    = $_POST['email'];
		$password = md5($_POST['password']);

		$check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
		if(mysqli_num_rows($check)===1) {

			$row = mysqli_fetch_array($check);
			$position = $row['user_type'];
			if($position == 'Admin') {
				$_SESSION['admin_Id'] = $row['user_Id'];
				header("Location: Admin/dashboard.php");
			} else {
				$_SESSION['examinee_Id'] = $row['user_Id'];
				header("Location: Examinee/profile.php");
			}
		} else {
			$_SESSION['message'] = "Incorrect password.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: login.php");
		}
	}



	// SAVE EXAMINEE - REGISTER.PHP
	if(isset($_POST['create_examinee'])) {
		$category	        = mysqli_real_escape_string($conn, $_POST['category']);
		$interestedAt       = mysqli_real_escape_string($conn, $_POST['interestedAt']);
		$firstname          = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename         = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname           = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix             = mysqli_real_escape_string($conn, $_POST['suffix']);
		$gender             = mysqli_real_escape_string($conn, $_POST['gender']);
		$email              = mysqli_real_escape_string($conn, $_POST['email']);
		$contact            = mysqli_real_escape_string($conn, $_POST['contact']);
		$dob                = mysqli_real_escape_string($conn, $_POST['dob']);
		$age                = mysqli_real_escape_string($conn, $_POST['age']);
		$civilstatus        = mysqli_real_escape_string($conn, $_POST['civilstatus']);
		$religion           = mysqli_real_escape_string($conn, $_POST['religion']);
		$nationality        = mysqli_real_escape_string($conn, $_POST['nationality']);
		$address            = mysqli_real_escape_string($conn, $_POST['address']);
		$parentName         = mysqli_real_escape_string($conn, $_POST['parentName']);
		$parentContact      = mysqli_real_escape_string($conn, $_POST['parentContact']);
		$parentEmail        = mysqli_real_escape_string($conn, $_POST['parentEmail']);
		$password           = mysqli_real_escape_string($conn, md5($_POST['password']));
		$schoolLastAttended = mysqli_real_escape_string($conn, $_POST['schoolLastAttended']);
		$file               = basename($_FILES["fileToUpload"]["name"]);
		$date_added         = date('Y-m-d');


		$check_username = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
		if(mysqli_num_rows($check_username)>0) {
	      $_SESSION['message'] = "Email already exists.";
	      $_SESSION['text'] = "Please try again.";
	      $_SESSION['status'] = "error";
		  header("Location: register.php");
		} else {

			// Check if image file is a actual image or fake image
			    $sign_target_dir = "images-receipt/";
			    $sign_target_file = $sign_target_dir . basename($_FILES["fileToUpload"]["name"]);
			    $sign_uploadOk = 1;
			    $sign_imageFileType = strtolower(pathinfo($sign_target_file,PATHINFO_EXTENSION));

			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check == false) {
				    $_SESSION['message']  = "File is not an image.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: register.php");
			    	$uploadOk = 0;
			    } 

				// Check file size // 500KB max size
				elseif ($_FILES["fileToUpload"]["size"] > 500000) {
				  	$_SESSION['message']  = "File must be up to 500KB in size.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: register.php");
			    	$uploadOk = 0;
				}

			    // Allow certain file formats
			    elseif($sign_imageFileType != "jpg" && $sign_imageFileType != "png" && $sign_imageFileType != "jpeg" && $sign_imageFileType != "gif" ) {
				    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: register.php");
				    $sign_uploadOk = 0;
			    }

			    // Check if $sign_uploadOk is set to 0 by an error
			    elseif ($sign_uploadOk == 0) {
				    $_SESSION['message'] = "Your file was not uploaded.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: register.php");

			    // if everything is ok, try to upload file
			    } else {

		    		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $sign_target_file)) {
						   $save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, gender, civilstatus, religion, nationality, dob, age, address, parentsName, parentsContact, parentsEmail, email, contact, school, examineeCategory, interestedAt, password, receiptImage, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$civilstatus', '$religion', '$nationality', '$dob', '$age', '$address', '$parentName', '$parentContact', '$parentEmail', '$email', '$contact', '$schoolLastAttended', '$category', '$interestedAt', '$password', '$file', '$date_added')");
					      if($save) {

				      	  $subject = 'Email verification';
				          $message = '<p>Good day sir/maam <b>'.$firstname.' '.$middlename.' '.$lastname.' '.$suffix.'</b>, this is to inform you that you have successfully registered to the system, SPS Online Entrance examination using your email.</p>
				          <p><b>NOTE:</b> This is a system generated email. Please do not reply.</p> ';

				      

						    

				          $mail = new PHPMailer(true);                            
				          try {
					            //Server settings
					            $mail->isSMTP();                                     
					            $mail->Host = 'smtp.gmail.com';                      
					            $mail->SMTPAuth = true;                             
					            $mail->Username = 'goodsamaritan2k20@gmail.com';     
					            $mail->Password = 'duxkxivrezeuguqe';              
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
					            $mail->setFrom('goodsamaritan2k20@gmail.com');

					            //Recipients
					            $mail->addAddress($email);              
					            $mail->addReplyTo('goodsamaritan2k20@gmail.com');

					            //Content
					            $mail->isHTML(true);                                  
					            $mail->Subject = $subject;
					            $mail->Body    = $message;

					            $mail->send();
					            $_SESSION['message'] = "Registration successful. Please login.";
						        $_SESSION['text'] = "Registered successfully!";
						        $_SESSION['status'] = "success";
								header("Location: login.php");
							} catch (Exception $e) {
								$_SESSION['message'] = "Data has been saved but email not sent.";
						        $_SESSION['text'] = "Please try again.";
						        $_SESSION['status'] = "error";
								header("Location: register.php");
							}
					      	
					      } else {
					        $_SESSION['message'] = "Something went wrong while saving the information.";
					        $_SESSION['text'] = "Please try again";
					        $_SESSION['status'] = "error";
							header("Location: register.php");
					      }
		    		} else {
						$_SESSION['message'] = "There was an error uploading your digital signature.";
		            	$_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: register.php");
		    		}
			    }


		 
		}
	}










	

?>
