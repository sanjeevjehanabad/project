<?php
include_once 'GmailOath.php';
include_once 'configfile.php';
session_start();
$oauth =new GmailOath($consumer_key, $consumer_secret, $argarray, $debug, $callback);
$getcontact_access=new GmailGetContacts();
$request_token=$oauth->rfc3986_decode($_GET['oauth_token']);
$request_token_secret=$oauth->rfc3986_decode($_SESSION['oauth_token_secret']);
$oauth_verifier= $oauth->rfc3986_decode($_GET['oauth_verifier']);
$contact_access = $getcontact_access->get_access_token($oauth,$request_token, $request_token_secret,$oauth_verifier, false, true, true);
$access_token=$oauth->rfc3986_decode($contact_access['oauth_token']);
$access_token_secret=$oauth->rfc3986_decode($contact_access['oauth_token_secret']);
$contacts= $getcontact_access->GetContacts($oauth, $access_token, $access_token_secret, false, true,$emails_count);

//Email Contacts
/*foreach($contacts as $k => $a)
{
$final = end($contacts[$k]);
$phone1 = end($a['gd$phoneNumber'][0]);
foreach($final as $email)
{
echo "<div style='background-color:#CCCCCC'>";
echo $email['address'] .$phone1."<br />";
echo "</div>";
}*/
/*
  echo "<pre>";                //print array to console
    {print_r($contacts);}
  echo "</pre>";
  */
$length = count($contacts);
for ($i = 0; $i < $length; $i++) {
  echo "<pre>";                //print array to console
    {
	print_r(end($contacts[$i]['title']));
	echo "  ";
	print_r($contacts[$i]['gd$email'][0]['address']);
	echo "  ";
	print_r(end($contacts[$i]['gd$phoneNumber'][0]));}
  echo "</pre>";
}  

?>
<?php
print "<a class='logout' href='home.php'>Home</a>";
?>