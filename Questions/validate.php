<?php
	include("db.php");
	error_reporting(0);
	@ini_set('display_errors', 0);
	$photoErr = " ";
	// Access the $_FILES global variable for this specific file being uploaded
	// and create local PHP variables from the $_FILES array of information
	$fileName = $_FILES["fileToUpload"]["name"]; // The file name
	$fileTmpLoc = $_FILES["fileToUpload"]["tmp_name"]; // File in the PHP tmp folder
	$fileType = $_FILES["fileToUpload"]["type"]; // The type of file it is
	$fileSize = $_FILES["fileToUpload"]["size"]; // File size in bytes
	$fileErrorMsg = $_FILES["fileToUpload"]["error"]; // 0 for false... and 1 for true
	$ext = explode(".", $fileName); // Split file name into an array using the dot
	$fileExt = end($ext); // Now target the last array element to get the file extension
	
	if(isset($_POST['submit']))
	{
		$question = test_input($_POST['name']);
		$answer = test_input($_POST['email']);
		if($fileName){
			$image = "thomso.in/img/quiz/".$fileName;
		}
		else{
			$image = "";
		}
		
		
		
		// END PHP Image Upload Error Handling ----------------------------------------------------
		// Place it into your "uploads" folder mow using the move_uploaded_file() function
		
		$moveResult = move_uploaded_file($fileTmpLoc, "../../img/quiz/$fileName");
		
		// Check to make sure the move result is true before continuing
		if ($moveResult == true) {
			include_once("ak_php_img_lib_1.0.php");
			$target_file = "../../img/quiz/$fileName";
			$resized_file = "../../img/quiz/$fileName";
			
			$wmax = 800;
			$hmax = 800;
			ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
		}
		//unlink($fileTmpLoc);  Remove the uploaded file from the PHP temp folder

		// ----------- End Universal Image Resizing Function -----------
		// Display things to the page so you can see what is happening for testing purposes
		//echo "The file named <strong>$fileName</strong> uploaded successfuly.<br /><br />";
		//echo "It is <strong>$fileSize</strong> bytes in size.<br /><br />";
		//echo "It is an <strong>$fileType</strong> type of file.<br /><br />";
		//echo "The file extension is <strong>$fileExt</strong><br /><br />";
		//echo "The Error Message output for this upload is: $fileErrorMsg";

		//echo $name,$email,$pwd,$mobile,$college,$gender,$age,$accomodation,$event,$event1;
		$sq2 = "INSERT INTO quiz(question, image, answer) 
		VALUES ('$question', '$image', '$answer')";
		$qr2 = mysqli_query($mysqli,$sq2) OR die("ERROR:" .mysqli_error($mysqli));
		//echo "piyush";
			if($qr2){
				$photoErr=true;
				header('location:redirect.php?ques=$photoErr');
			}
	}
	function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;}
?>