<?php 
	include '../config.php';
	date_default_timezone_set('Asia/Manila');
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../vendor/PHPMailer/src/Exception.php';
	require '../vendor/PHPMailer/src/PHPMailer.php';
	require '../vendor/PHPMailer/src/SMTP.php';


	// SAVE SYSTEM USER - USERS_ADD_UPDATE.PHP
	if(isset($_POST['create_system_user'])) {
	
		$user_type	 = mysqli_real_escape_string($conn, $_POST['usertype']);
		$firstname   = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename  = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname    = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix      = mysqli_real_escape_string($conn, $_POST['suffix']);
		$contact     = mysqli_real_escape_string($conn, $_POST['contact']);
		$email       = mysqli_real_escape_string($conn, $_POST['email']);
		$gender      = mysqli_real_escape_string($conn, $_POST['gender']);
		$dob         = mysqli_real_escape_string($conn, $_POST['dob']);
		$age         = mysqli_real_escape_string($conn, $_POST['age']);
		$civilstatus = mysqli_real_escape_string($conn, $_POST['civilstatus']);
		$religion    = mysqli_real_escape_string($conn, $_POST['religion']);
		$nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
		$address     = mysqli_real_escape_string($conn, $_POST['address']);
		$password    = mysqli_real_escape_string($conn, md5($_POST['password']));
		$file        = basename($_FILES["fileToUpload"]["name"]);
		$date_added  = date('Y-m-d');

		if(empty($file)) {
			$check_username = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
			if(mysqli_num_rows($check_username)>0) {
		      $_SESSION['message'] = "Email already exists.";
		      $_SESSION['text'] = "Please try again.";
		      $_SESSION['status'] = "error";
			  header("Location: users_add_update.php?page=create");
			} else {
			  $save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, gender, civilstatus, religion, nationality, dob, age, address, email, contact, password, user_type, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$civilstatus', '$religion', '$nationality', '$dob', '$age', '$address', '$email', '$contact', '$password', '$user_type', '$date_added')");
		      if($save) {
		      	$_SESSION['message'] = "System user has been saved!";
		        $_SESSION['text'] = "Saved successfully!";
		        $_SESSION['status'] = "success";
				header("Location: users_add_update.php?page=create");
		      } else {
		        $_SESSION['message'] = "Something went wrong while saving the information.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: users_add_update.php?page=create");
		      }
			}
		} else {

				// Check if image file is a actual image or fake image
			    $sign_target_dir = "../images-users/";
			    $sign_target_file = $sign_target_dir . basename($_FILES["fileToUpload"]["name"]);
			    $sign_uploadOk = 1;
			    $sign_imageFileType = strtolower(pathinfo($sign_target_file,PATHINFO_EXTENSION));

			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check == false) {
				    $_SESSION['message']  = "File is not an image.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: users_add_update.php?page=create");
			    	$uploadOk = 0;
			    } 

				// Check file size // 500KB max size
				elseif ($_FILES["fileToUpload"]["size"] > 500000) {
				  	$_SESSION['message']  = "File must be up to 500KB in size.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: users_add_update.php?page=create");
			    	$uploadOk = 0;
				}

			    // Allow certain file formats
			    elseif($sign_imageFileType != "jpg" && $sign_imageFileType != "png" && $sign_imageFileType != "jpeg" && $sign_imageFileType != "gif" ) {
				    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: users_add_update.php?page=create");
				    $sign_uploadOk = 0;
			    }

			    // Check if $sign_uploadOk is set to 0 by an error
			    elseif ($sign_uploadOk == 0) {
				    $_SESSION['message'] = "Your file was not uploaded.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: users_add_update.php?page=create");

			    // if everything is ok, try to upload file
			    } else {

		    		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $sign_target_file)) {
						  $save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, gender, civilstatus, religion, nationality, dob, age, address, email, contact, password, image, user_type, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$civilstatus', '$religion', '$nationality', '$dob', '$age', '$address', '$email', '$contact', '$password', '$file', '$user_type', '$date_added')");
					      if($save) {
					      	$_SESSION['message'] = "System user has been saved!";
					        $_SESSION['text'] = "Saved successfully!";
					        $_SESSION['status'] = "success";
							header("Location: users_add_update.php?page=create");
					      } else {
					        $_SESSION['message'] = "Something went wrong while saving the information.";
					        $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
							header("Location: users_add_update.php?page=create");
					      } 
		    		} else {
						$_SESSION['message'] = "There was an error uploading your digital signature.";
		            	$_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: users_add_update.php?page=create");
		    		}
			    }

		}

	}




	// SAVE EXAMINEE - EXAMINEE_ADD_UPDATE.PHP
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
		$date_added         = date('Y-m-d');


		$check_username = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
		if(mysqli_num_rows($check_username)>0) {
	      $_SESSION['message'] = "Email already exists.";
	      $_SESSION['text'] = "Please try again.";
	      $_SESSION['status'] = "error";
		  header("Location: examinee_add_update.php?page=create");
		} else {
		  $save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, gender, civilstatus, religion, nationality, dob, age, address, parentsName, parentsContact, parentsEmail, email, contact, school, examineeCategory, interestedAt, password, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$civilstatus', '$religion', '$nationality', '$dob', '$age', '$address', '$parentName', '$parentContact', '$parentEmail', '$email', '$contact', '$schoolLastAttended', '$category', '$interestedAt', '$password', '$date_added')");
	      if($save) {
	      	$_SESSION['message'] = "New examinee has been saved!";
	        $_SESSION['text'] = "Saved successfully!";
	        $_SESSION['status'] = "success";
			header("Location: examinee_add_update.php?page=create");
	      } else {
	        $_SESSION['message'] = "Something went wrong while saving the information.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: examinee_add_update.php?page=create");
	      }
		}
	}





	// SAVE CUSTOMIZATION - CUSTOMIZATION_ADD.PHP
	if(isset($_POST['create_customization'])) {
		$file            = basename($_FILES["fileToUpload"]["name"]);
		$date_registered = date('Y-m-d');

		$count = mysqli_query($conn, "SELECT COUNT(customID) AS countID FROM customization");
		$row = mysqli_fetch_array($count);
		if($row['countID'] == 6) {
			$_SESSION['message'] = "Maximum number of customization have been reached.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: customize.php");
		} else {
			$exist = mysqli_query($conn, "SELECT * FROM customization WHERE picture='$file'");
			if(mysqli_num_rows($exist) > 0) {
				$_SESSION['message'] = "Image already exists in the database.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: customize.php");
			} else {
				// Check if image file is a actual image or fake image
			    $sign_target_dir = "../images-customization/";
			    $sign_target_file = $sign_target_dir . basename($_FILES["fileToUpload"]["name"]);
			    $sign_uploadOk = 1;
			    $sign_imageFileType = strtolower(pathinfo($sign_target_file,PATHINFO_EXTENSION));

			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check == false) {
				    $_SESSION['message']  = "File is not an image.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: customize.php");
			    	$uploadOk = 0;
			    } 

				// Check file size // 500KB max size
				elseif ($_FILES["fileToUpload"]["size"] > 500000) {
				  	$_SESSION['message']  = "File must be up to 500KB in size.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: customize.php");
			    	$uploadOk = 0;
				}

			    // Allow certain file formats
			    elseif($sign_imageFileType != "jpg" && $sign_imageFileType != "png" && $sign_imageFileType != "jpeg" && $sign_imageFileType != "gif" ) {
				    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: customize.php");
				    $sign_uploadOk = 0;
			    }

			    // Check if $sign_uploadOk is set to 0 by an error
			    elseif ($sign_uploadOk == 0) {
				    $_SESSION['message'] = "Your file was not uploaded.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: customize.php");

			    // if everything is ok, try to upload file
			    } else {

		    		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $sign_target_file)) {
						  $save = mysqli_query($conn, "INSERT INTO customization (picture, date_added) VALUES ('$file', '$date_registered')");
					      if($save) {
					      	$_SESSION['message'] = "Image has been saved.";
					        $_SESSION['text'] = "Saved successfully!";
					        $_SESSION['status'] = "success";
							header("Location: customize.php");
					      } else {
					        $_SESSION['message'] = "Something went wrong while saving the information.";
					        $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
							header("Location: customize.php");
					      }  
		    		} else {
						$_SESSION['message'] = "There was an error uploading your digital signature.";
		            	$_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: customize.php");
		    		}
			    }
			}
		}	
		
	}



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






	

?>



