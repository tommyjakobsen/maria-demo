<?php
//Fetch openshift variables
$user=getenv("mariauser");
$password=getenv("mariapassword");
$dbhost=getenv("mariahost");
$database=getenv("mariadb");
// Report simple running errors
error_reporting(E_ERROR | E_PARSE);

// Connecting, selecting database
$link = mysql_connect('localhost', '$username', '$password')
   or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully';
mysql_select_db('$database') or die('Could not select database');