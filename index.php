<?php
include_once("config.php");
include_once("includes/functions.php");
/*session_start();*/
//destroy facebook session if user clicks reset
if(!$fbuser){
	$fbuser = null;
	$loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$homeurl,'scope'=>$fbPermissions));
	$output = '<body id="page-top" class="page1">
					<div><div class="container-fluid">
					<div class="row" style="">
						<div class="col-sm-6 screen-only">
							<img src="img/dequode.png" class="img-responsive dequode" style=""/>
						</div>
						<div class="col-sm-6 color_fella screen-only" style="">
							<div class="col-sm-4 col-sm-offset-8 logo_thomso" style="">
								<img src="img/white_thomso.png" class="img-responsive"/>
							</div>
						</div>
						<div class="col-sm-4 col-sm-offset-4 card" style="min-height: 57vh;">
							<center><img src="img/fella_logo.png" class="img-responsive" style="width: 14vh;"/></center>
							<center class="presents" style="">presents</center>
							<center><div class="dequode_w">DeQuode</div></center>
							<center><div class="dequode_content">We are now live</div></center>
							<center><div class="dequode_cont">Show your talent and unravel the enigma!</div></center>
							
						</div>
						<!--<div class="col-sm-2 col-sm-offset-5 instruct"  data-toggle="modal" data-target="#myModal"><center><a >Instructions</a></center></div>-->
						<a  href="'.$loginUrl.'"><div class="col-sm-2 col-sm-offset-5 instruct"><center><img src="img/fb.png" class="img-responsive" style="width: 8%;margin-right: 4vh;display: inline-block !important;"/>Proceed with facebook</center></div></a>
					</div>
				</div></div>
</body>'; 	
}else{
	$user_profile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
	$user = new Users();
	$user_data = $user->checkUser('facebook',$user_profile['id'],$user_profile['first_name'],$user_profile['last_name'],$user_profile['email'],$user_profile['gender'],$user_profile['locale'],$user_profile['picture']['data']['url']);
	if(!empty($user_data)){
		$output = '<body id="page-top" class="page2">
					<div><div class="container-fluid">
						<div class="row logos">
							<div class="col-lg-10 col-lg-offset-1">
								<div class="col-lg-2">
									<img src="img/fella.png" class="img-responsive">
								</div>
								<div class="col-lg-2 col-lg-offset-8">
									<img src="img/white_thomso.png" class="img-responsive">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-10 col-lg-offset-1">
								<div class="col-lg-6 col-lg-offset-3 main" style="height:57vh !important;">
									<h2 class="rules">Profile Details</h2>';
		$output .= '<div class="col-lg-12 image internal_scroll"">
						<center><div class="image1"><img src="//graph.facebook.com/'.$user_data['oauth_uid'].'/picture?type=large" class="img-responsive"></div></center>';
        /*$output .= '<br/>Facebook ID : ' . $user_data['oauth_uid'];*/
		$_SESSION['fb_id'] = $user_data['oauth_uid'];
		$fbid1 = $_SESSION['fb_id'];
        $output .= '<center><p>Name : ' . $user_data['fname'].' '.$user_data['lname'].'</p></center>';
        /*$output .= '<br/>Email : ' . $user_data['email'];*/
        $output .= '<center><p>Gender : ' . $user_data['gender'].'</p></center></div>';
        /*$output .= '<br/>Locale : ' . $user_data['locale'];
        $output .= '<br/>You are login with : Facebook';*/
        $output .= '<div class="answer">
						<form method="POST" action="username.php" class="form" id="registration_form">
							<div class="col-lg-9">';
		$output .= '<input type="text" name="username" placeholder="Username" class="input_answer" id="name1" maxlength=16 required/>
						</div>
						<div class="col-lg-3">';
		$output .= '<input type="submit" class="submit instruct1" name="submit" value="Submit">
						</div>
						</form></div></div></div></div></div></div>
</body>';
		/* $output .= '<div class="logout"><a href="logout.php?logout">Logout from Dequode</a></div></center></div></div>';  */
		include('db.php');
	/*$qr1 = mysqli_query($mysqli,"SELECT username FROM users WHERE oauth_uid = '$fbid1'") or die("MySQL Error." . mysqli_error($mysqli));*/
	$sql1 = "SELECT username FROM users  WHERE oauth_uid = '$fbid1'";
	$result1 = $conn->query($sql1);
	$row = $result1->fetch_assoc();
	/*echo $row["username"];*/
	if($result1->num_rows > 0 && $row["username"] != NULL){
		
		$_SESSION['username'] = $row["username"];
		/*header('Location: questions.php' );*/
		 /*exit(header("Location: questions.php"));*/
		 echo "<script> location.replace('questions.php') </script>";
	}
	else{
		
	}
	}else{
		$output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
	}
}
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
	<link rel="stylesheet" href="css/style1.css" type="text/css">
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
	<meta property="og:url" content="http://www.thomso.in/dequode" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Thomso'16 - Song of the Wildflower" />
	<meta property="og:description" content="THOMSO is the annual youth festival of Indian Institute of Technology Roorkee recognized as one of the greatest and the grandest youth festivals of India." />
	<meta property="og:image" content="http://thomso.in/dequode/thomso.png" />
</head>
<script type="text/javascript">
	<!--
	if (screen.width <= 699) {
	document.location = "mobile.html";
	}
	//-->
	</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-81447612-1', 'auto');
  ga('send', 'pageview');

</script>


<?php echo $output; ?>


</html>