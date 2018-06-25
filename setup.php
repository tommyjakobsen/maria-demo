<?php


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
shell_exec("curl https://downloads.mysql.com/docs/world.sql.gz --output $structure/$sqlfile");

$file_name="$structure/$sqlfile";

$buffer_size = 4096; // read 4kb at a time
$out_file_name = str_replace('.gz', '', $file_name);

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
$sql=preg_replace('/(,\n.*CONSTRAINT.*)|(\n.*world.*)|(--.*)|(\n\/\*.*)/i', '', file_get_contents("$out_file_name"));

//Since the sql get's to big, I need to split it up to chuncks
//Running one sql pr. creation of table and insert into that table
$sql_part="";
$part_count=0;
foreach(explode("\n", $sql) as $line) {
    if(preg_match('/CREATE TABLE/i', $line))
        {
        if($part_count > 0)
                {
                //DEBUG
                //echo "$sql_part\n\n--------------------------------------------\n\n";
                $result=$newSql->query("$sql_part");
                }
        //DEBUG
        //echo "\n$line\n";
        $part_count++;
        $sql_part="$line\n";
        }else{
        $sql_part.="$line\n";
        }
}
print_r($result);
?>
