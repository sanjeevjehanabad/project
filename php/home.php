 <?php

session_start();
include('db.php'); //Database Connection.
if (!isset($_SESSION['google_data'])) {
// Redirection to application home page. 
header("location: index.php");
}

else
{

//echo print_r($userdata);
$userdata=$_SESSION['google_data'];
$email =$userdata['email'];
$googleid =$userdata['id'];
$fullName =$userdata['name'];
$firstName=$userdata['given_name'];
$lastName=$userdata['family_name'];
$gplusURL=$userdata['link'];
//$avatar=$userdata['picture'];
$gender=$userdata['gender'];
//$dob=$userdata['birthday'];
//Execture query
$sql=mysql_query("INSERT INTO users(email,fullname,firstname,lastname,google_id,gender,gpluslink) values('$email','$fullName','$firstName','$lastName','$googleid','$gender','$gplusURL')");

echo "Name: $fullName";
echo "Gplus Id:  $gplusURL";
echo "EMAIL: $email";


print "<a class='logout' href='index.php?logout'>Logout</a> ";


}



?>

<h3>IMPORT YOUR GMAIL CONTACT CLICK THE IMAGE BELOW</h3>
<?php include('GmailConnect.php'); ?>