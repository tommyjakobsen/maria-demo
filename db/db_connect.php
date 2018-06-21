<?php

$dbhost=getenv('MARIADB_SERVICE_HOST');
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$database=getenv("MYSQL_DATABASE");
if($dbhost == "")
        {

        echo "<font color=red> No DB or environment variables created in this openshift project....</font>";
         echo "Need:<br><b>MYSQL_DB_HOST<\b><br><b>MYSQL_USERNAME<\b><br><b>MYSQL_PASSWORD<\b><br><b>MYSQL_DATABASE<\b>";
        exit(1);
        }

$link = mysqli_connect("$dbhost", "$username", "$password", "$database");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The $database database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;


?>
