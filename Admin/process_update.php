<?php 
	include '../config.php';

	// UPDATE SYSTEM USER - USERS_ADD_UPDATE.PHP
	if(isset($_POST['update_system_user'])) {

		$user_Id    = $_POST['user_Id'];
		$user_type  = mysqli_real_escape_string($conn, $_POST['usertype']);
		$firstname  = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname   = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix     = mysqli_real_escape_string($conn, $_POST['suffix']);
		$contact    = mysqli_real_escape_string($conn, $_POST['contact']);
		$email      = mysqli_real_escape_string($conn, $_POST['email']);
		$gender      = mysqli_real_escape_string($conn, $_POST['gender']);
		$dob         = mysqli_real_escape_string($conn, $_POST['dob']);
		$age         = mysqli_real_escape_string($conn, $_POST['age']);
		$civilstatus = mysqli_real_escape_string($conn, $_POST['civilstatus']);
		$religion    = mysqli_real_escape_string($conn, $_POST['religion']);
		$nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
		$address     = mysqli_real_escape_string($conn, $_POST['address']);
		$password    = mysqli_real_escape_string($conn, md5($_POST['password']));
		$file        = basename($_FILES["fileToUpload"]["name"]);

		$fetch        = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id' ");
		$row          = mysqli_fetch_array($fetch);
		$get_email    = $row['email'];

		if(empty($file)) {

			if($email == $get_email) {
				$save = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', civilstatus='$civilstatus', religion='$religion', nationality='$nationality', dob='$dob', age='$age', address='$address', email='$email', contact='$contact', user_type='$user_type' WHERE user_Id='$user_Id'");
			    if($save) {
			      $_SESSION['message'] = "System user has been updated!";
			      $_SESSION['text'] = "Updated successfully!";
			      $_SESSION['status'] = "success";
				  header("Location: users_add_update.php?page=".$user_Id);
			    } else {
			      $_SESSION['message'] = "Something went wrong while updating the information.";
			      $_SESSION['text'] = "Please try again.";
			      $_SESSION['status'] = "error";
				  header("Location: users_add_update.php?page=".$user_Id);
			    }
				
		  	} else {
				$exist = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' ");
			  	if(mysqli_num_rows($exist) > 0) {
		  			$_SESSION['message'] = "Email already exists.";
			      	$_SESSION['text'] = "Please try again.";
		  			$_SESSION['status'] = "error";
					header("Location: users_add_update.php?page=".$user_Id);
			  	} else {
		  			$save = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', civilstatus='$civilstatus', religion='$religion', nationality='$nationality', dob='$dob', age='$age', address='$address', email='$email', contact='$contact', user_type='$user_type' WHERE user_Id='$user_Id'");
				    if($save) {
				      $_SESSION['message'] = "System user has been updated!";
				      $_SESSION['text'] = "Updated successfully!";
				      $_SESSION['status'] = "success";
					  header("Location: users_add_update.php?page=".$user_Id);
				    } else {
				      $_SESSION['message'] = "Something went wrong while updating the information.";
				      $_SESSION['text'] = "Please try again.";
				      $_SESSION['status'] = "error";
					  header("Location: users_add_update.php?page=".$user_Id);
				    }
			  	}
		  	}

		} else {

			
			if($email == $get_email) {
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
					header("Location: users_add_update.php?page=".$user_Id);
			    	$uploadOk = 0;
			    } 

				// Check file size // 500KB max size
				elseif ($_FILES["fileToUpload"]["size"] > 500000) {
				  	$_SESSION['message']  = "File must be up to 500KB in size.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: users_add_update.php?page=".$user_Id);
			    	$uploadOk = 0;
				}

			    // Allow certain file formats
			    elseif($sign_imageFileType != "jpg" && $sign_imageFileType != "png" && $sign_imageFileType != "jpeg" && $sign_imageFileType != "gif" ) {
				    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: users_add_update.php?page=".$user_Id);
				    $sign_uploadOk = 0;
			    }

			    // Check if $sign_uploadOk is set to 0 by an error
			    elseif ($sign_uploadOk == 0) {
				    $_SESSION['message'] = "Your file was not uploaded.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: users_add_update.php?page=".$user_Id);

			    // if everything is ok, try to upload file
			    } else {

		    		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $sign_target_file)) {
						  $save = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', civilstatus='$civilstatus', religion='$religion', nationality='$nationality', dob='$dob', age='$age', address='$address', email='$email', contact='$contact', image='$file', user_type='$user_type' WHERE user_Id='$user_Id'");
						    if($save) {
						      $_SESSION['message'] = "System user has been updated!";
						      $_SESSION['text'] = "Updated successfully!";
						      $_SESSION['status'] = "success";
							  header("Location: users_add_update.php?page=".$user_Id);
						    } else {
						      $_SESSION['message'] = "Something went wrong while updating the information.";
						      $_SESSION['text'] = "Please try again.";
						      $_SESSION['status'] = "error";
							  header("Location: users_add_update.php?page=".$user_Id);
						    }
		    		} else {
						$_SESSION['message'] = "There was an error uploading your digital signature.";
		            	$_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: users_add_update.php?page=".$user_Id);
		    		}
			    }
				
		  	} else {
				$exist = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' ");
			  	if(mysqli_num_rows($exist) > 0) {
		  			$_SESSION['message'] = "Email already exists.";
			      	$_SESSION['text'] = "Please try again.";
		  			$_SESSION['status'] = "error";
					header("Location: users_add_update.php?page=".$user_Id);
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
						header("Location: users_add_update.php?page=".$user_Id);
				    	$uploadOk = 0;
				    } 

					// Check file size // 500KB max size
					elseif ($_FILES["fileToUpload"]["size"] > 500000) {
					  	$_SESSION['message']  = "File must be up to 500KB in size.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: users_add_update.php?page=".$user_Id);
				    	$uploadOk = 0;
					}

				    // Allow certain file formats
				    elseif($sign_imageFileType != "jpg" && $sign_imageFileType != "png" && $sign_imageFileType != "jpeg" && $sign_imageFileType != "gif" ) {
					    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: users_add_update.php?page=".$user_Id);
					    $sign_uploadOk = 0;
				    }

				    // Check if $sign_uploadOk is set to 0 by an error
				    elseif ($sign_uploadOk == 0) {
					    $_SESSION['message'] = "Your file was not uploaded.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: users_add_update.php?page=".$user_Id);

				    // if everything is ok, try to upload file
				    } else {

			    		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $sign_target_file)) {
							  $save = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', civilstatus='$civilstatus', religion='$religion', nationality='$nationality', dob='$dob', age='$age', address='$address', email='$email', contact='$contact', image='$file', user_type='$user_type' WHERE user_Id='$user_Id'");
							    if($save) {
							      $_SESSION['message'] = "System user has been updated!";
							      $_SESSION['text'] = "Updated successfully!";
							      $_SESSION['status'] = "success";
								  header("Location: users_add_update.php?page=".$user_Id);
							    } else {
							      $_SESSION['message'] = "Something went wrong while updating the information.";
							      $_SESSION['text'] = "Please try again.";
							      $_SESSION['status'] = "error";
								  header("Location: users_add_update.php?page=".$user_Id);
							    }
			    		} else {
							$_SESSION['message'] = "There was an error uploading your digital signature.";
			            	$_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
							header("Location: users_add_update.php?page=".$user_Id);
			    		}
				    }
			  	}
		  	}
		}
	}



	// CHANGE SYSTEM USER PASSWORD -USERS_ADD_UPDATE.PHP
	if(isset($_POST['password_system_user'])) {

    	$user_Id     = $_POST['user_Id'];
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
				header("Location: users.php");
    		} else {
    			$update_password = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id' ");
    			if($update_password) {
        			$_SESSION['message'] = "Password has been changed.";
	           	    $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: users.php");
                } else {
          			$_SESSION['message'] = "Something went wrong while changing the password.";
            		$_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: users.php");
                }
    		}
    	} else {
			$_SESSION['message']  = "Old password is incorrect.";
            $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: users.php");
    	}

    }



    // UPDATE EXAMINEE - EXAMINEE_ADD_UPDATE.PHP
	if(isset($_POST['update_examinee'])) {
		$user_Id	        = mysqli_real_escape_string($conn, $_POST['user_Id']);
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
		$schoolLastAttended = mysqli_real_escape_string($conn, $_POST['schoolLastAttended']);
		$date_added         = date('Y-m-d');

		$fetch        = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id' ");
		$row          = mysqli_fetch_array($fetch);
		$get_email    = $row['email'];

		if($email == $get_email) {
			$update = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', civilstatus='$civilstatus', religion='$religion', nationality='$nationality', dob='$dob', age='$age', address='$address', parentsName='$parentName', parentsContact='$parentContact', parentsEmail='$parentEmail', email='$email', contact='$contact', school='$schoolLastAttended', examineeCategory='$category', interestedAt='$interestedAt' WHERE user_Id='$user_Id'");
		    if($update) {
		      $_SESSION['message'] = "System user has been updated!";
		      $_SESSION['text'] = "Updated successfully!";
		      $_SESSION['status'] = "success";
			  header("Location: examinee_add_update.php?page=".$user_Id);
		    } else {
		      $_SESSION['message'] = "Something went wrong while updating the information.";
		      $_SESSION['text'] = "Please try again.";
		      $_SESSION['status'] = "error";
			  header("Location: examinee_add_update.php?page=".$user_Id);
		    }
			
	  	} else {
			$exist = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' ");
		  	if(mysqli_num_rows($exist) > 0) {
	  			$_SESSION['message'] = "Email already exists.";
		      	$_SESSION['text'] = "Please try again.";
	  			$_SESSION['status'] = "error";
				header("Location: examinee_add_update.php?page=".$user_Id);
		  	} else {
	  			$update = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', civilstatus='$civilstatus', religion='$religion', nationality='$nationality', dob='$dob', age='$age', address='$address', parentsName='$parentName', parentsContact='$parentContact', parentsEmail='$parentEmail', email='$email', contact='$contact', school='$schoolLastAttended', examineeCategory='$category', interestedAt='$interestedAt' WHERE user_Id='$user_Id'");
			    if($update) {
			      $_SESSION['message'] = "System user has been updated!";
			      $_SESSION['text'] = "Updated successfully!";
			      $_SESSION['status'] = "success";
				  header("Location: examinee_add_update.php?page=".$user_Id);
			    } else {
			      $_SESSION['message'] = "Something went wrong while updating the information.";
			      $_SESSION['text'] = "Please try again.";
			      $_SESSION['status'] = "error";
				  header("Location: examinee_add_update.php?page=".$user_Id);
			    }
		  	}
	  	}
	}



	// CHANGE SYSTEM USER PASSWORD - EXAMINEE_ADD_UPDATE.PHP
	if(isset($_POST['password_examinee'])) {

    	$user_Id     = $_POST['user_Id'];
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
				header("Location: examinee.php");
    		} else {
    			$update_password = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id' ");
    			if($update_password) {
        			$_SESSION['message'] = "Password has been changed.";
	           	    $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: examinee.php");
                } else {
          			$_SESSION['message'] = "Something went wrong while changing the password.";
            		$_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: examinee.php");
                }
    		}
    	} else {
			$_SESSION['message']  = "Old password is incorrect.";
            $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: examinee.php");
    	}

    }



	// UPDATE ADMIN INFORMATION - PROFILE.PHP
	if(isset($_POST['update_profile'])) {

		$user_Id     = $_POST['user_Id'];
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

		$fetch       = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id' ");
		$row         = mysqli_fetch_array($fetch);
		$get_email   = $row['email'];

		if($email == $get_email) {
			$save = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', email='$email', contact='$contact', gender='$gender', dob='$dob', age='$age', civilstatus='$civilstatus', religion='$religion', nationality='$nationality', address='$address' WHERE user_Id='$user_Id'");
		    if($save) {
		          $_SESSION['message']  = "Your information has been updated!";
		          $_SESSION['text'] = "Updated successfully!";
		          $_SESSION['status'] = "success";
				  header("Location: profile.php");                          
		    } else {
	            $_SESSION['message'] = "Something went wrong while saving the information.";
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
				header("Location: profile.php");
		  	} else {
  				$save = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', email='$email', contact='$contact', gender='$gender', dob='$dob', age='$age', civilstatus='$civilstatus', religion='$religion', nationality='$nationality', address='$address' WHERE user_Id='$user_Id'");
			    if($save) {
			          $_SESSION['message']  = "Your information has been updated!";
			          $_SESSION['text'] = "Updated successfully!";
			          $_SESSION['status'] = "success";
					  header("Location: profile.php");                          
			    } else {
		            $_SESSION['message'] = "Something went wrong while saving the information.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: profile.php");
			    }
		  	}
	  }

		
	}




	// CHANGE ADMIN PASSWORD - PROFILE.PHP
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




  	// UPDATE ADMIN PROFILE - PROFILE.PHP
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





	// UPDATE CUSTOMIZATION - CUSTOMIZE_UPDATE_DELETE.PHP
	if(isset($_POST['update_customization'])) {
		$customID = $_POST['customID'];
		$file     = basename($_FILES["fileToUpload"]["name"]);
		
		$exist = mysqli_query($conn, "SELECT * FROM customization WHERE customID='$customID'");	
		$row = mysqli_fetch_array($exist);
		if($file == $row['picture']) {
			$_SESSION['message'] = "Image is still the same.";
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
			    $_SESSION['message']  = "Signature file is not an image.";
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
					$update = mysqli_query($conn, "UPDATE customization SET picture='$file' WHERE customID='$customID' ");
					if($update) {
			        	$_SESSION['message'] = "Image customization has been updated!";
			            $_SESSION['text'] = "Updated successfully!";
				        $_SESSION['status'] = "success";
						header("Location: customize.php");
			        } else {
			            $_SESSION['message'] = "Something went wrong while updating the information.";
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




	// SET ACTIVE - CUSTOMIZE_UPDATE_DELETE.PHP
	if(isset($_POST['setActive_customization'])) {

		$customID = $_POST['customID'];

		$exist = mysqli_query($conn, "SELECT * FROM customization WHERE status='Active' ");
		
		if(mysqli_num_rows($exist) > 0) {
			$update = mysqli_query($conn, "UPDATE customization SET status='Inactive'");
			if($update) {
				$update2 = mysqli_query($conn, "UPDATE customization SET status='Active' WHERE customID='$customID'");
	        	if($update2) {
	        		$_SESSION['message'] = "Image is now Active.";
		            $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: customize.php");
				} else {
					$_SESSION['message'] = "Something went wrong while settings the image as Active.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: customize.php");
				}
	        } else {
	            $_SESSION['message'] = "Something went wrong while settings the image as Active.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: customize.php");
	        }  
		} else {
			$update2 = mysqli_query($conn, "UPDATE customization SET status='Active' WHERE customID='$customID'");
	    	if($update2) {
	    		$_SESSION['message'] = "Image is now Active.";
	            $_SESSION['text'] = "Updated successfully!";
		        $_SESSION['status'] = "success";
				header("Location: customize.php");
			} else {
				$_SESSION['message'] = "Something went wrong while settings the image as Active.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: customize.php");
			}
		}
		
	}




    // UPDATE SCHEDULE - SCHEDULE_ADD_UPDATE.PHP
    if(isset($_POST['update_schedule'])) {
    	$schedID   = mysqli_real_escape_string($conn, $_POST['schedID']);
    	$date      = mysqli_real_escape_string($conn, $_POST['date']);
		$timestart = mysqli_real_escape_string($conn, $_POST['timestart']);
		$timeend   = mysqli_real_escape_string($conn, $_POST['timeend']);

		$fetch = mysqli_query($conn, "SELECT * FROM schedule WHERE schedID='$schedID' ");
		$row = mysqli_fetch_array($fetch);
		$a = $row['schedDate'];
		$b = $row['schedTimeStart'];
		$c = $row['schedTimeEnd'];

		if($date == $a AND $timestart == $b AND $timeend == $c) {
			  $update = mysqli_query($conn, "UPDATE schedule SET schedDate='$date', schedTimeStart='$timestart', schedTimeEnd='$timeend' WHERE schedID='$schedID' ");
		      if($update) {
		      	$_SESSION['message'] = "Schedule has been updated.";
		        $_SESSION['text'] = "Saved successfully!";
		        $_SESSION['status'] = "success";
				header("Location: schedule.php?page=".$schedID);
		      } else {
		        $_SESSION['message'] = "Something went wrong while saving the information.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: schedule.php?page=".$schedID);
		      }
		} else {

			$fetch = mysqli_query($conn, "SELECT * FROM schedule WHERE schedDate='$date' AND schedTimeStart='$timestart' AND schedTimeEnd='$timeend' ");
			if(mysqli_num_rows($fetch) > 0) {
				$_SESSION['message'] = "This schedule already exists.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: schedule.php?page=".$schedID);
			} else {
				  $update = mysqli_query($conn, "UPDATE schedule SET schedDate='$date', schedTimeStart='$timestart', schedTimeEnd='$timeend' WHERE schedID='$schedID' ");
			      if($update) {
			      	$_SESSION['message'] = "Schedule has been updated.";
			        $_SESSION['text'] = "Saved successfully!";
			        $_SESSION['status'] = "success";
					header("Location: schedule.php?page=".$schedID);
			      } else {
			        $_SESSION['message'] = "Something went wrong while saving the information.";
			        $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: schedule.php?page=".$schedID);
			      }
			}

		}

		
    }





    // UPDATE SCHEDULE - SCHEDULE_ADD_UPDATE.PHP
    if(isset($_POST['update_bookingSchedule'])) {
    	$bookingsId  = mysqli_real_escape_string($conn, $_POST['bookingsId']);
    	$examinee    = mysqli_real_escape_string($conn, $_POST['examinee']);
		$dateSched   = mysqli_real_escape_string($conn, $_POST['dateSched']);

		$fetch = mysqli_query($conn, "SELECT * FROM exam_bookings WHERE bookingsId='$bookingsId' ");
		$row = mysqli_fetch_array($fetch);
		$user_Id = $row['bookingsUserId'];

		if($examinee == $user_Id) {
			  $update = mysqli_query($conn, "UPDATE exam_bookings SET bookingsUserId='$examinee', bookingsSchedID='$dateSched', date_booked='$date_booked' WHERE bookingsId='$bookingsId' ");
		      if($update) {
		      	$_SESSION['message'] = "Booking schedule has been updated.";
		        $_SESSION['text'] = "Saved successfully!";
		        $_SESSION['status'] = "success";
				header("Location: sched_ExamTakers_add_update.php?page=".$bookingsId);
		      } else {
		        $_SESSION['message'] = "Something went wrong while saving the information.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: sched_ExamTakers_add_update.php?page=".$bookingsId);
		      } 
		} else {
			$fetch = mysqli_query($conn, "SELECT * FROM exam_bookings WHERE bookingsUserId='$examinee' ");
			if(mysqli_num_rows($fetch) > 0) {
				$_SESSION['message'] = "Examinee has already been given a schedule.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: sched_ExamTakers_add_update.php?page=".$bookingsId);
			} else {
				 $update = mysqli_query($conn, "UPDATE exam_bookings SET bookingsUserId='$examinee', bookingsSchedID='$dateSched', date_booked='$date_booked' WHERE bookingsId='$bookingsId' ");
			      if($update) {
			      	$_SESSION['message'] = "Booking schedule has been updated.";
			        $_SESSION['text'] = "Saved successfully!";
			        $_SESSION['status'] = "success";
					header("Location: sched_ExamTakers_add_update.php?page=".$bookingsId);
			      } else {
			        $_SESSION['message'] = "Something went wrong while saving the information.";
			        $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: sched_ExamTakers_add_update.php?page=".$bookingsId);
			      } 
			}

		}
		
    }




    // CONFIRM BOOKING SCHEDULE - SCHED_EXAMTAKERS_DELETE.PHP
	if(isset($_POST['confirm_booking'])) {
		$Id = $_POST['examBookId'];

		$confirm = mysqli_query($conn, "UPDATE exam_bookings SET bookingsStatus='Confirmed' WHERE bookingsId='$Id' ");
		 if($confirm) {
	      	$_SESSION['message'] = "Booking schedule has been confirmed!";
	        $_SESSION['text'] = "Confirmation successful!";
	        $_SESSION['status'] = "success";
			header("Location: sched_ExamTakers.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: sched_ExamTakers.php");
	      }
	}




?>
