<?php
include_once("inc/facebook.php"); //include facebook SDK
######### Facebook API Configuration ##########
$appId = ''; //Facebook App ID
$appSecret = ''; // Facebook App Secret
$homeurl = '';  //return to home
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => '',
  'secret' => ''

));
$fbuser = $facebook->getUser();
?>