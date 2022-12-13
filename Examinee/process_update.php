<?php 
	include '../config.php';


	// UPDATE EXAMINEE INFORMATION - PROFILE.PHP
	if(isset($_POST['update_profile'])) {
		$user_Id	        = mysqli_real_escape_string($conn, $_POST['user_Id']);
		$collegeCourse      = mysqli_real_escape_string($conn, $_POST['collegeCourse']);
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
		$schoolLastAttended = mysqli_real_escape_string($conn, $_POST['schoolLastAttended']);

		$fetch        = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id' ");
		$row          = mysqli_fetch_array($fetch);
		$get_email    = $row['email'];

		if($email == $get_email) {
			$update = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', civilstatus='$civilstatus', religion='$religion', nationality='$nationality', dob='$dob', age='$age', address='$address', parentsName='$parentName', parentsContact='$parentContact', parentsEmail='$parentEmail', email='$email', contact='$contact', school='$schoolLastAttended', interestedCourse='$collegeCourse' WHERE user_Id='$user_Id'");
		    if($update) {
		      $_SESSION['message'] = "You have successfully updated your information!";
		      $_SESSION['text'] = "Updated successfully!";
		      $_SESSION['status'] = "success";
			  header("Location: profile.php");
		    } else {
		      $_SESSION['message'] = "Something went wrong while updating the information.";
		      $_SESSION['text'] = "Please try again.";
		      $_SESSION['status'] = "error";
			  header("Location: profile.php");
		    }
			
	  	} else {
			$exist = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' ");
		  	if(mysqli_num_rows($exist) > 0) {
	  			$_SESSION['message'] = "Email already exists.";
		      	$_SESSION['text'] = "Please try again.";
	  			$_SESSION['status'] = "error";
				header("Location: examinee_add_update.php?page=".$user_Id);
		  	} else {
	  			$update = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', civilstatus='$civilstatus', religion='$religion', nationality='$nationality', dob='$dob', age='$age', address='$address', parentsName='$parentName', parentsContact='$parentContact', parentsEmail='$parentEmail', email='$email', contact='$contact', school='$schoolLastAttended', interestedCourse='$collegeCourse' WHERE user_Id='$user_Id'");
			    if($update) {
			      $_SESSION['message'] = "You have successfully updated your information!";
			      $_SESSION['text'] = "Updated successfully!";
			      $_SESSION['status'] = "success";
				  header("Location: profile.php");
			    } else {
			      $_SESSION['message'] = "Something went wrong while updating the information.";
			      $_SESSION['text'] = "Please try again.";
			      $_SESSION['status'] = "error";
				  header("Location: profile.php");
			    }
		  	}
	  	}
	}



	// CHANGE EXAMINEE PASSWORD - PROFILE.PHP
	if(isset($_POST['update_password_admin'])) {

    	$user_Id    = $_POST['user_Id'];
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

    	$check_old_password = mysqli_query($conn, "SELECT * FROM users WHERE password='$OldPassword' AND user_Id='$user_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
			// COMPARE BOTH NEW AND CONFIRM PASSWORD
    		if($password != $cpassword) {
				$_SESSION['message']  = "Password does not matched. Please try again";
            	$_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: profile.php");
    		} else {
    			$update_password = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id' ");
    			if($update_password) {
                	$_SESSION['message'] = "Password has been changed.";
		            $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: profile.php");
                } else {
                    $_SESSION['message'] = "Something went wrong while changing the password.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: profile.php");
                }
    		}
    	} else {
			$_SESSION['message']  = "Old password is incorrect.";
            $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: profile.php");
    	}

    }




  	// UPDATE EXAMINEE PROFILE - PROFILE.PHP
	if(isset($_POST['update_profile_admin'])) {

		$user_Id    = $_POST['user_Id'];
		$file       = basename($_FILES["fileToUpload"]["name"]);

		  // Check if image file is a actual image or fake image
	    $target_dir = "../images-users/";
	    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	    $uploadOk = 1;
	    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check == false) {
		    $_SESSION['message']  = "Selected file is not an image.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");
	    	$uploadOk = 0;
	    } 

		// Check file size // 500KB max size
		elseif ($_FILES["fileToUpload"]["size"] > 500000) {
		  	$_SESSION['message']  = "File must be up to 500KB in size.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");
	    	$uploadOk = 0;
		}

	    // Allow certain file formats
	    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
		    $_SESSION['message']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");
	    	$uploadOk = 0;
	    }

	    // Check if $uploadOk is set to 0 by an error
	    elseif ($uploadOk == 0) {
		    $_SESSION['message']  = "Your file was not uploaded.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");

	    // if everything is ok, try to upload file
	    } else {

	        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	          	$save = mysqli_query($conn, "UPDATE users SET image='$file' WHERE user_Id='$user_Id'");
	     
	            if($save) {
	            	$_SESSION['message'] = "Profile picture has been updated!";
		            $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: profile.php");
	            } else {
		            $_SESSION['message'] = "Something went wrong while updating the information.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: profile.php");
	            }
	        } else {
	            $_SESSION['message'] = "There was an error uploading your file.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: profile.php");
	        }

		}
	}






?>
