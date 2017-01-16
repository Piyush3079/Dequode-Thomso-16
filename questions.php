<?php 
include('db.php');
session_start();
if(isset($_POST['submit']))
{
	$value_number =$_SESSION['value_number_yash'];
	$emailid = $_SESSION['username'];
	$get_answer=strtolower(test_input($_POST['answer']));
	$get_answer=preg_replace('/[^A-Za-z0-9\-]/','',$get_answer);
	$get_answer=str_replace(' ','-',$get_answer);
	$get_answer=str_replace('-','',$get_answer);
	/*echo $get_answer;*/
	

$result=mysqli_query($mysqli,"SELECT answer FROM quiz WHERE id='$value_number'");
$set_answer = mysqli_fetch_array($result);
/*echo $set_answer['answer'];*/
if($get_answer==$set_answer['answer']){
	/*echo $get_answer." is correct answer ";*/
	
	$value_number_new = $value_number + 1;
	/*echo $value_number_new;*/
	$update = "UPDATE users SET number='$value_number_new' WHERE username='$emailid'";
	$result2 = mysqli_query($mysqli, $update);
	 /* header("Location: questions.php"); */
}
else{
	 echo "<script>alert('Sorry! Incorrect answer') </script>";
	/*echo "<script> location.replace('questions.php') </script>"; */
	
}
}
	function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="THOMSO is the annual youth festival of Indian Institute of Technology Roorkee recognized as one of the greatest and the grandest youth festivals of India.">
	<meta name="keywords" content="IITR, iit roorkee, roorkee, thomso, iit, cultural fest of roorkee, uttarakhand, university of roorkee, roorkee college of engineering, "/>
    <title>Thomso'16 - Song of the Wildflower</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="icon" href="img/logo_favicon.png" type="image/x-icon" />
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<!-- <link rel="stylesheet" type="text/css" href="css/demo.css" /> -->
	<!-- <link href="css/main.css" rel="stylesheet"> -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> -->
	<!--<link rel="stylesheet" href="css/animate.min.css" type="text/css">-->
	<!--<link rel="stylesheet" href="css/fresco.css" type="text/css">-->
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/vendor.min.js"></script>
	<script type="text/javascript" src="js/jquery.alphanum.js"></script>
	  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
	  <script type="text/javascript" src="js/form.js"></script>
	<meta property="og:url" content="http://www.thomso.in" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Thomso'16 - Song of the Wildflower" />
	<meta property="og:description" content="THOMSO is the annual youth festival of Indian Institute of Technology Roorkee recognized as one of the greatest and the grandest youth festivals of India." />
	<meta property="og:image" content="http://thomso.in/thomso.png" />
</head>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-81447612-1', 'auto');
  ga('send', 'pageview');

</script>

<body id="page-top" class="page2">
<?php 

if(isset($_SESSION['username'])) {
    $emailid = $_SESSION['username'];
    //echo($word);
	$sql = "SELECT number FROM users WHERE username='$emailid'";
	$result = mysqli_query($mysqli, $sql);
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			$value_number = $row["number"];
			/* echo $value_number; */
			$_SESSION['value_number_yash'] = $value_number; 
		}
	} else {
		echo "<script>alert('Username is not present') </script>";
	echo "<script> location.replace('index.php') </script>";
	}
	$get_question = "SELECT * FROM quiz WHERE id='$value_number'";
	$result1 = mysqli_query($mysqli, $get_question);
	if (mysqli_num_rows($result1) > 0) {
    // output data of each row
		while($row = mysqli_fetch_assoc($result1)) {
			echo '<div class="container-fluid">
					<div class="row logos">
						<div class="col-lg-10 col-lg-offset-1">
							<div class="col-lg-2">
								<img src="img/fella.png" class="img-responsive">
							</div>
							<div class="col-lg-4 col-lg-offset-2">
                            <center><h1 style="color:white;">DeQuode</h1>
                              <p style="color:white;">Unravel the Enigma!</p></center>
							</div>
							<div class="col-lg-2 col-lg-offset-2">
								<img src="img/white_thomso.png" class="img-responsive">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-10 col-lg-offset-1">
							<div class="col-lg-3 main" style="width: 22.5% !important">
								<h2 class="rules">Rules</h2>
									<ul>
										<li>The answers are case sensitive : all answers are in lowercase alphabets with no spaces, no special characters, no uppercase alphabets and no numeric characters.</li>
										<li>If the answer has any numbers they must be spelled in lowercase alphabets, for example, if the answer to Level...</li>
										<li>There can be hints anywhere on the web page (check the source code as well). No...</li>
									</ul>
									<div class="col-sm-6 col-sm-offset-3 instruct"  data-toggle="modal" data-target="#myModal"><center><a >Rulebook</a></center></div>
							</div>
					<div class="col-lg-6 main middle">
						<h2 class="rules">LEVEL '. ($row["id"] - 1) .'</h2>
						<p class="question">'. $row["question"] .'</p>';
			echo '<div class="col-lg-10 col-lg-offset-1 image internal_scroll"><img src="//'.$row["image"].'" class="img-responsive" /></div>';
			echo '<div class="answer">
						<form method="post" action="" class="form" class="registration_form">
						<div class="col-lg-9">
							<input type="text" name="answer" placeholder="Answer" class="input_answer" id="name"/>
						</div>
						<div class="col-lg-3">
							<input type="submit"  class="submit instruct1" name="submit" value="Submit"/>
						</div>
						</form>
				  </div>
				<div class="logout" style="position:absolute;bottom:13vh;"><a href="logout.php?logout">Logout from Dequode</a></div></div>';
		}
	} else {
		echo '<div class="container-fluid">
					<div class="row logos">
						<div class="col-lg-10 col-lg-offset-1">
							<div class="col-lg-2">
								<img src="img/fella.png" class="img-responsive">
							</div>
							<div class="col-lg-4 col-lg-offset-2">
                            <center><h1 style="color:white;">DeQuode</h1>
                              <p style="color:white;">Unravel the Enigma!</p></center>
							</div>
							<div class="col-lg-2 col-lg-offset-2">
								<img src="img/white_thomso.png" class="img-responsive">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-10 col-lg-offset-1">
							<div class="col-lg-3 main" style="width: 22.5% !important">
								<h2 class="rules">Rules</h2>
								<ul>
									<li>The answers are case sensitive : all answers are in lowercase alphabets with no spaces, no...</li>
									<li>If the answer has any numbers they must be spelled in lowercase alphabets, for example, if...</li>
								</ul>
								<div class="col-sm-6 col-sm-offset-3 instruct"  data-toggle="modal" data-target="#myModal"><center><a >Rulebook</a></center></div>
							</div>
						<div class="col-lg-6 main middle">
							<h1>Congratulations! You have completed all the questions</h1>
							<div class="logout" style="width:100%;text-align:center;position:absolute;bottom:15vh;"><a href="logout.php?logout" style="font-size:20px;">Logout from Dequode</a></div>
						</div>';
		/*echo "<script type='text/javascript' src='http://code.jquery.com/jquery-3.0.0.min.js'></script>";
		echo "<script>$('.form').addClass('hidden')</script>";*/
	}
} else {
    echo "<script>alert('Please Login First') </script>";
	echo "<script> location.replace('index.php') </script>";
}
?>

<!--<form method="post" action="member1.php" class="form">
enter your answer here:<input type="text" name="answer" placeholder="answer">
<input type="submit" name="submit" value="submit">
</form>-->

<?php
echo '<div class="col-lg-3 main internal_scroll" style="width: 22.5% !important">
					<h2 class="rules">Leaderboard</h2>
					';
$yash = "SELECT username, number FROM users ORDER BY number DESC LIMIT 20";
$yash1 = mysqli_query($mysqli, $yash);
$i = 1;
while($row = mysqli_fetch_assoc($yash1)) {
			$score = $row['number'] - 1;
			echo '<div class="col-lg-12 order" style="padding-left: 0px !important;">
			<div class="col-lg-1" style="text-align: left;padding-left: 0px !important;margin-top: 10px;">' . $i . '</div>';
			echo '<div class="col-lg-7" style="margin-top: 10px;">' .$row['username'] . '</div>';
			echo '<div class="col-lg-2 col-lg-offset-1" style="margin-top: 10px;">' .$score . '</div></div>';
			$i++;
		}
	echo '
				</div>
			</div>
		</div>
	</div>';
?>
<!-- Modal -->
						  <div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">
							
							  <!-- Modal content-->
							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">Instructions</h4>
								</div>
								<div class="modal-body">
								  <ul>
									<li>The answers are case sensitive : all answers are in lowercase alphabets with no spaces, no special characters, no uppercase alphabets and no numeric characters.</li>
									<li>If the answer has any numbers they must be spelled in lowercase alphabets, for example, if the answer to Level 0 is "Thomso '16", submit the answer as 'thomsoonesix'</li>
								  <li>There can be hints anywhere on the web page (check the source code as well). No hint is useless. If a hint is there, then it must have some significance.</li>
								  <li>Most levels will require some amount of lateral thinking combined with some help from Google.</li>
								  <li>There is no restriction on the number of attempts for a problem.</li>
								  <li>Do try your best, and be a little patient as far as hints are concerned.</li>
								  <li>Hints will be posted on our Fb page. Follow :<a href="https://www.facebook.com/unraveltheenigma/" target="_blank">https://www.facebook.com/unraveltheenigma/</a></li>
								  <li>Reveiling answers or creating multiple accounts leads to disqualification or permanent ban.</li> 
								  
								  </ul>
								</div>
								<div class="modal-footer">
								  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							  </div>
							  
							</div>
						  </div>
</body>
	
</html>
