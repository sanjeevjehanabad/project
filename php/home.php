<?php
session_start();
if (!isset($_SESSION['gplusdata']))
{
// Redirection to home page
header("location: index.php");
}
else
{
$me=$_SESSION['gplusdata'];
//echo "<img src='$me['image']['url']; ' />";
echo "Name: $me[displayName]; ";
echo "Gplus Id:  $me[id]";
echo "Male: $me[gender]";
//echo "Relationship: $me[relationshipStatus]";
//echo "Location: $me[placesLived][0][value]";
//echo "Tagline: $me[tagline]";
print "<a class='logout' href='index.php?logout'>Logout</a> ";
}
?>