<?php 
	session_start();
	$conn = mysqli_connect("localhost","root","","sps");
	if(!$conn) {
		exit();
	}
?>