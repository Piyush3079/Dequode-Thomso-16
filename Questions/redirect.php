<?php
	error_reporting(0);
	@ini_set('display_errors', 0);
	$Err1 = $_GET['Err1'];
	if($Err1){
		echo "ERROR: Please enter a valid email address.";}
	$Err2 = $_GET['Err2'];
	if($Err2){
		echo "ERROR: This email is already registered.";
	}
	$Err4 = $_GET['Err4'];
	if($Err4){
		echo "ERROR: Please browse for a file before clicking the upload button.";
	}
	$Err5 = $_GET['Err5'];
	if($Err5){
		echo "ERROR: Your file was larger than 500 kb in size.";
	}
	$Err6 = $_GET['Err6'];
	if($Err6){
		echo "ERROR: Your image was not .gif, .jpg, jpeg, or .png.";
	}
	$Err7 = $_GET['Err7'];
	if($Err7){
		echo "ERROR: An error occured while processing the file. Try again.";
	}
	$Err8 = $_GET['Err8'];
	if($Err8){
		echo "ERROR: File not uploaded. Try again.";
	}
	$registered = $_GET['registered'];
	if($registered){
		echo "Confirmation link has been send to your registered email.";
	}
	$Err3 = $_GET['Err3'];
	if($Err3){
		echo "ERROR: Unable to send confirmation mail to your registered email.";
	}	$success_ques = $_GET['ques'];	if($success_ques){		echo "Question added successfully....";	}
	
?>