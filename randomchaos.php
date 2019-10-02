<?php

echo "<html><head><title>Random Chaos</title></head><body>";
include './db/db_connect.php';
include './classes/classChaos.php';


$newChaos=new chaos();

$chaosArray=array("slow", "error", "methodnotexist");
$rand_key=array_rand($chaosArray, 1);

$chaosval=$chaosArray[$rand_key];

echo "Choice: $chaosval\n";

$result=$newChaos->$chaosval();


echo "</body></html>";


?>