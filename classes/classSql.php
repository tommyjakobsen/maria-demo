<?php

error_reporting(E_ALL);
/**
  * mySql Class
  * 
  * Class for running simple sql's against transition database. Used db connection config in pg_connect.php
  *
  * @param string $sql will return array in array with result of sql, where key values are table field names
  *    span multiple lines.
  *
  * @return array
  */
class mySql{ 

        function query($sql){
				//GET home folder
			$homefolder=getenv('APP_DATA');
               $sapi_type = php_sapi_name();

                if(preg_match('/cli/', $sapi_type))
                        {
                        exit(1);
                        }else{
               
                         include "$homefolder/db/db_connect.php";
                       }
             
 
             

	
		

        
       if ($result = $link->query("$sql")) {
   //printf("Select returned %d rows.\n", $result->num_rows);
	$res=$result;
    /* free result set */
    $result->close();
	       $link->close();
            return $res;

            }

        }




}
