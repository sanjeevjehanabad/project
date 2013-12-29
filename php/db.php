 <?php
$mysql_hostname = "mysql://127.5.212.2:3306/";
$mysql_user = "adminDH7Hs5I";
$mysql_password = "tED15rM1fQld";
$mysql_database = "sanjeevjehanabad";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");
?>