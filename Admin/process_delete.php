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



	



	// DELETE CATEGORY - CATEGORY_UPDATE_DELETE.PHP
	if(isset($_POST['delete_category'])) {
		$category_Id = $_POST['category_Id'];

		$delete = mysqli_query($conn, "DELETE FROM category WHERE cat_Id='$category_Id'");
		 if($delete) {
	      	$_SESSION['message'] = "Category has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: category.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: category.php");
	      }
	}


	// DELETE QUESTION BY CATEGORY - CATEGORY_ADD_QUESTION_DELETE.PHP
	if(isset($_POST['delete_question'])) {
		$quest_Id = $_POST['quest_Id'];

	 	$fetch = mysqli_query($conn, "SELECT * FROM questions WHERE quest_Id='$quest_Id'");
	 	if(mysqli_num_rows($fetch) > 0) {
	 		$row = mysqli_fetch_array($fetch);
	 		$quest_cat_Id = $row['quest_category_Id'];
	 		$cat = mysqli_query($conn, "SELECT * FROM category WHERE cat_Id='$quest_cat_Id'");
	 		if(mysqli_num_rows($cat) > 0) {
	 			$row2 = mysqli_fetch_array($cat);
	 			$added_questions = $row2['questions_added']-1;
	 			
 			 	$delete = mysqli_query($conn, "DELETE FROM questions WHERE quest_Id='$quest_Id'");
 				if($delete) {
 					$update = mysqli_query($conn, "UPDATE category SET questions_added='$added_questions' WHERE cat_Id='$quest_cat_Id'");
 			 		if($update) {
	 					$_SESSION['message'] = "Question has been deleted!";
				        $_SESSION['text'] = "Deleted successfully!";
				        $_SESSION['status'] = "success";
						header('Location: category_add_question.php?cat_Id='.$quest_cat_Id.'');
					} else {
				        $_SESSION['message'] = "Something went wrong while deleting the record";
				        $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header('Location: category_add_question.php?cat_Id='.$quest_cat_Id.'');
				    }
 				} else {
			        $_SESSION['message'] = "Something went wrong while deleting the record.";
			        $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header('Location: category_add_question.php?cat_Id='.$quest_cat_Id.'');
			    }
	 		} else {
	 			$_SESSION['message'] = "Category not found.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header('Location: category_add_question.php?cat_Id='.$quest_cat_Id.'');
	 		}
	 	} else {
	 		$_SESSION['message'] = "Question not found.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header('Location: category_add_question.php?cat_Id='.$quest_cat_Id.'');
	 	}
	}






	// DELETE QUESTION - QUESTIONS_DELETE.PHP
	if(isset($_POST['delete_quest'])) {
		$quest_Id = $_POST['quest_Id'];

	 	$fetch = mysqli_query($conn, "SELECT * FROM questions WHERE quest_Id='$quest_Id'");
	 	if(mysqli_num_rows($fetch) > 0) {
	 		$row = mysqli_fetch_array($fetch);
	 		$quest_cat_Id = $row['quest_category_Id'];
	 		$cat = mysqli_query($conn, "SELECT * FROM category WHERE cat_Id='$quest_cat_Id'");
	 		if(mysqli_num_rows($cat) > 0) {
	 			$row2 = mysqli_fetch_array($cat);
	 			$added_questions = $row2['questions_added']-1;
	 			
 			 	$delete = mysqli_query($conn, "DELETE FROM questions WHERE quest_Id='$quest_Id'");
 				if($delete) {
 					$update = mysqli_query($conn, "UPDATE category SET questions_added='$added_questions' WHERE cat_Id='$quest_cat_Id'");
 			 		if($update) {
	 					$_SESSION['message'] = "Question has been deleted!";
				        $_SESSION['text'] = "Deleted successfully!";
				        $_SESSION['status'] = "success";
						header('Location: questions.php');
					} else {
				        $_SESSION['message'] = "Something went wrong while deleting the record";
				        $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header('Location: questions.php');
				    }
 				} else {
			        $_SESSION['message'] = "Something went wrong while deleting the record.";
			        $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header('Location: questions.php');
			    }
	 		} else {
	 			$_SESSION['message'] = "Category not found.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header('Location: questions.php');
	 		}
	 	} else {
	 		$_SESSION['message'] = "Question not found.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header('Location: questions.php');
	 	}
	}
	



?>




