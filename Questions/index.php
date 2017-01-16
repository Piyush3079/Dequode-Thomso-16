<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Thomso '16 | Registration Form</title>
	<meta name="author" content="Team Thomso" />
	<link rel="shortcut icon" href="img/logo.png">
	<link rel="stylesheet" type="text/css" href="css/creative.css" />
	<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />-->
	<link rel="stylesheet" type="text/css" href="css/component.css" />
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
	<!--<script src="js/modernizr.custom.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
				<style>
					select:invalid { opacity: .8; }
					</style>
					
	  <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
</head>
<body style=""><br><br><br><br>
			<div class="col-lg-6 col-lg-offset-3 back_div">
				<form class="form" method="post" action="validate.php" id="registration_form" enctype="multipart/form-data">
					<label for="name">Question: </label>
					<input type="text" name="name" class="form-control" id="name" placeholder="Question">
					<label for="email">Answer: </label>
					<input type="text" name="email" class="form-control" id="email" placeholder="Answer"><br>
					<br><br>
					<input type="file" name="fileToUpload" id="file-2" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" multiple />
					<label for="file-2" class="form-control" style="background-color: transparent !important; line-height: 0.2;opacity: 0.8;"><span>Image related to question</span></label>
				<center><input type="submit" class="submit" name="submit" value="Submit"></center>
				</form>
			</div>
</body>
<script src="js/custom-file-input.js"></script>
</html>