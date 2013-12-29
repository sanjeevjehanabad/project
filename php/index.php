<?php
require_once 'src/Google_Client.php';
require_once 'src/contrib/Google_Oauth2Service.php';
session_start();
$client = new Google_Client();
//setApplicationName("Google Account Login");
$oauth2 = new Google_Oauth2Service($client);
if (isset($_GET['code']))
{
$client->authenticate();
$_SESSION['token'] = $client->getAccessToken();
$redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
$client->setAccessToken($_SESSION['token']);
}

if (isset($_REQUEST['logout'])) {
unset($_SESSION['token']);
unset($_SESSION['google_data']); //Google session data unset
$client->revokeToken();
}

if ($client->getAccessToken())
{
$user = $oauth2->userinfo->get();
$_SESSION['google_data']=$user; // Storing Google User Data in Session
header("location: home.php");
$_SESSION['token'] = $client->getAccessToken();
} else {
$authUrl = $client->createAuthUrl();
}

if(isset($personMarkup)):
print $personMarkup;
endif;

if(isset($authUrl))
print "<a class='login' href='$authUrl'>Google Plus Login </a>";
else
print "<a class='logout' href='index.php?logout'>Logout</a>";
?>