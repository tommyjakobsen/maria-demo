<?php

error_reporting(E_ALL);
/**
  * Chaos Class
  * 
  * Class for running random situations like slowness, errors, etc....
  *
  * @param string $type will run method assigned in type
  *    
  *
  * @return string
  */
class chaos{ 

        function slow(){
          $rand_slowness=rand(1,5);
          sleep($rand_slowness);
          $result="Zzzzzz......<br>I slept for $rand_slowness seconds....";
				return $result;
        

        }

        function error(){
          sleep(1);
          exit(1);
          $result="You will never reach this line..."
				return $result;
        

        }




}
