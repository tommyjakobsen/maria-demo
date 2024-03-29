<?php
if (ob_get_level() == 0) ob_start();
echo "Downloading database World example...<br>";
 ob_flush();
flush();

$templine="";
$structure = './setup';
$sqlfile="world.sql.gz";
if (is_dir($structure)){

echo "<font color=red>Setup has already run...!</font>";
exit(0);
}
// To create the nested structure, the $recursive parameter
// to mkdir() must be specified.

if (!mkdir($structure, 0777, true)) {
    die('Failed to create folders...');
}
//lazy at this point. should of course used php-curl
shell_exec("curl https://downloads.mysql.com/docs/world-db.tar.gz --output $structure/$sqlfile");

$file_name="$structure/$sqlfile";

$buffer_size = 4096; // read 4kb at a time
$out_file_name = str_replace('.gz', '', $file_name);

echo "Decompressing file....<br>";
 ob_flush();
flush();
// Open our files (in binary mode)
$file = gzopen($file_name, 'rb');
$out_file = fopen($out_file_name, 'wb');

// Keep repeating until the end of the input file
while (!gzeof($file)) {
    // Read buffer-size bytes
    // Both fwrite and gzread and binary-safe
    fwrite($out_file, gzread($file, $buffer_size));
}

// Files are done, close files
fclose($out_file);
gzclose($file);

//Deleting the gz-file
unlink("$structure/$sqlfile");

//Running SQL to populate the db
//require_once './db/db_connect.php';

include "./classes/classSql.php";

$newSql=new mySql();

//Removing the constraints, since they don't work in mariadb (have not had time to fix them yet)
//$sql=preg_replace('/(,\n.*CONSTRAINT.*)|(\n.*world.*)|(--.*)|(\n\/\*.*)/i', '', file_get_contents("$out_file_name"));
echo "Parsing the SQL-file and creating tables<br>";
 ob_flush();
flush();
$fp = fopen($out_file_name, 'r');
// Loop through each line
while (($line = fgets($fp)) !== false) {
        // Skip it if it's a comment
        if (substr($line, 0, 2) == '--' || $line == '')
                continue;
        // Add this line to the current segment
        $templine .= $line;
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';') {
                // Perform the query
                $newSql->query($templine);
                // Reset temp variable to empty
                $templine = '';
        }
}
echo "Removing files";
//remove file
unlink($out_file_name);
//remove folder
//rmdir("$structure");
//not removing the folder to use it for checking if setup has been executed
echo "<font color=green>Done....<br>";
echo "<meta http-equiv=\"refresh\" content=\"5;url=/index.php\" />";

?>
