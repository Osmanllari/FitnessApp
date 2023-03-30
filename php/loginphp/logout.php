<?php
// include('../../calendar/quickstart.php');
session_start();

if(isset($_SESSION['user_id']))
{
	unset($_SESSION['access_token']); 
	unset($_SESSION['user_id']);  
	unset($_SESSION['userData']);    
	session_destroy();

}

//Reset OAuth access token   
if($client != null) {
	$client = new Google_Client();

	$client->revokeToken();    
	$client->revokeToken($accesstoken);
}

$location = dirname(dirname(__FILE__));
$filename = dirname($location) . '\calendar\token.json';

if(is_file($filename)) {
	unlink($filename);
}

header("Location: ../../login.php");
die;

?>