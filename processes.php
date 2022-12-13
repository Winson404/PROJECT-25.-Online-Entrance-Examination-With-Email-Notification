<?php 
	include 'config.php';

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
		$date_added         = date('Y-m-d');


		$check_username = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
		if(mysqli_num_rows($check_username)>0) {
	      $_SESSION['message'] = "Email already exists.";
	      $_SESSION['text'] = "Please try again.";
	      $_SESSION['status'] = "error";
		  	header("Location: register.php");
		} else {
		  $save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, gender, civilstatus, religion, nationality, dob, age, address, parentsName, parentsContact, parentsEmail, email, contact, school, examineeCategory, interestedAt, password, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$civilstatus', '$religion', '$nationality', '$dob', '$age', '$address', '$parentName', '$parentContact', '$parentEmail', '$email', '$contact', '$schoolLastAttended', '$category', '$interestedAt', '$password', '$date_added')");
	      if($save) {
	      	$_SESSION['message'] = "Registration successful. Please login.";
	        $_SESSION['text'] = "Registered successfully!";
	        $_SESSION['status'] = "success";
					header("Location: login.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while saving the information.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
					header("Location: register.php");
	      }
		}
	}
	

?>
