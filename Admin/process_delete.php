<?php 
	include '../config.php';

	// DELETE USER - USERS_DELETE.PHP
	if(isset($_POST['delete_system_user'])) {
		$user_Id = $_POST['user_Id'];

		$delete = mysqli_query($conn, "DELETE FROM users WHERE user_Id='$user_Id'");
		if($delete) {
	      	$_SESSION['message'] = "System User has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: users.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: users.php");
	      }
	}



	// DELETE EXAMINEE - EXAMINEE_DELETE.PHP
	if(isset($_POST['delete_Examinee'])) {
		$user_Id = $_POST['user_Id'];

		$delete = mysqli_query($conn, "DELETE FROM users WHERE user_Id='$user_Id'");
		if($delete) {
	      	$_SESSION['message'] = "Examinee record has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: examinee.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: examinee.php");
	      }
	}



	// DELETE CUSTOMIZATION - CUSTOMIZE_UPDATE_DELETE.PHP
	if(isset($_POST['delete_customization'])) {
		$customID = $_POST['customID'];

		$delete = mysqli_query($conn, "DELETE FROM customization WHERE customID='$customID'");
		 if($delete) {
	      	$_SESSION['message'] = "Cutomization image has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: customize.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: customize.php");
	      }
	}




	// DELETE SCHEDULE - SCHEDULE_DELETE.PHP
	if(isset($_POST['delete_schedule'])) {
		$schedID = $_POST['schedID'];

		$delete = mysqli_query($conn, "DELETE FROM schedule WHERE schedID='$schedID'");
		 if($delete) {
	      	$_SESSION['message'] = "Schedule has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: schedule.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: schedule.php");
	      }
	}





	// DELETE BOOKING SCHEDULE - SCHED_EXAMTAKERS_DELETE.PHP
	if(isset($_POST['delete_booking'])) {
		$Id = $_POST['examBookId'];

		$del = mysqli_query($conn, "DELETE FROM exam_bookings WHERE bookingsId='$Id' ");
		 if($del) {
	      	$_SESSION['message'] = "Booking schedule has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
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




