 <?php
$mysql_hostname = "mysql://127.5.212.2:3306/";
$mysql_user = "adminDH7Hs5I";
$mysql_password = "tED15rM1fQld";
$mysql_database = "sanjeevjehanabad";

define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT')); 
define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
define('DB_NAME',getenv('OPENSHIFT_GEAR_NAME'));
define( "DB_DATABASE",getenv('OPENSHIFT_APP_NAME') );

$dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT;
$dbh = new PDO($dsn, DB_USER, DB_PASS) or die("Could not connect database");
mysql_select_db(DB_DATABASE) or die("Could not select database");

?>