<?php
require_once 'src/Google_Client.php';
require_once 'src/contrib/Google_PlusService.php';
session_start();
$client = new Google_Client();
$client->setApplicationName("9lessons Google+ Login Application");
$client->setScopes(array('https://www.googleapis.com/auth/plus.me'));
$plus = new Google_PlusService($client);
if (isset($_REQUEST['logout']))
{
unset($_SESSION['access_token']);
}

if (isset($_GET['code']))
{
$client->authenticate();
$_SESSION['access_token'] = $client->getAccessToken();
header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
}

if (isset($_SESSION['access_token']))
{
$client->setAccessToken($_SESSION['access_token']);
}

if ($client->getAccessToken())
{
$me = $plus->people->get('me');
$_SESSION['access_token'] = $client->getAccessToken();
}
else
$authUrl = $client->createAuthUrl();

if(isset($me))
{
$_SESSION['gplusdata']=$me;
header("location: home.php");
}

if(isset($authUrl))
print "<a class='login' href='$authUrl'>Google Plus Login </a>";
else
print "<a class='logout' href='index.php?logout'>Logout</a>";
?>