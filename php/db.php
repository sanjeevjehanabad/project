 <?php
$mysql_hostname = "mysql://$OPENSHIFT_MYSQL_DB_HOST:$OPENSHIFT_MYSQL_DB_PORT/";
$mysql_user = "adminDH7Hs5I";
$mysql_password = "tED15rM1fQld";
$mysql_database = "sanjeevjehanabad";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");
?>