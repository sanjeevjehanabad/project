 <?php
$mysql_hostname = "mysql://127.5.212.2:3306/";
$mysql_user = "adminDH7Hs5I";
$mysql_password = "tED15rM1fQld";
$mysql_database = "sanjeevjehanabad";
define( "DB_SERVER",    getenv('OPENSHIFT_MYSQL_DB_HOST') );
 
define( "DB_USER",      getenv('OPENSHIFT_MYSQL_DB_USERNAME') );
 
define( "DB_PASSWORD",  getenv('OPENSHIFT_MYSQL_DB_PASSWORD') );
 
define( "DB_DATABASE",  getenv('OPENSHIFT_APP_NAME') );
 
 
mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die(mysql_error());
mysql_select_db(DB_DATABASE) or die(mysql_error());

?>