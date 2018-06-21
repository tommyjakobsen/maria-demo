<?php
//Fetch openshift variables
$dbhost = getenv('OPENSHIFT_MYSQL_DB_HOST');|
$username = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$password = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
$database=getenv("mariadb");
// Report simple running errors
error_reporting(E_ERROR | E_PARSE);

// Connecting, selecting database
$link = mysql_connect('$dbhost', '$username', '$password')
   or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully';
mysql_select_db('$database') or die('Could not select database');


?>
