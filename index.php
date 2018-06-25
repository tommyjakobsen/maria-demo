<?php

if(!file_exists('./setup'))
{
  //Go to setup page....
  echo "<meta http-equiv=\"refresh\" content=\"5;url=/setup.php\" />";
}else{
 
  //Show the statistics
  include './db/db_connect.php';
  include './classes/classSql.php';
  $newSql=new mySql();
 $result=$newSql->query("select country.Name as Name, country.Population as Population from country
order by Population DESC
LIMIT 10");
  
echo "<!DOCTYPE HTML>
<html>
<head>
  <script type=\"text/javascript\">
  window.onload = function () {
    var chart = new CanvasJS.Chart(\"chartContainer\", {

      title:{
        text: \"Top 10 Populated Countries in the World\"
      },
      data: [//array of dataSeries
        { //dataSeries object

         /*** Change type \"column\" to \"bar\", \"area\", \"line\" or \"pie\"***/
         type: \"column\",
         dataPoints: [
        ";
        $rowcount=0;
        while($row = $result->fetch_assoc()) {
        $rowcount++;
        if($rowcount < 10)
                {
                echo "{ label: \"$row[Name]\", y: $row[Population] },\n";
                }else{
                echo "{ label: \"$row[Name]\", y: $row[Population] }\n";

                }

        }



echo "        ]
       }
       ]
     });

    chart.render();
  }
  </script>
  <script type=\"text/javascript\" src=\"https://canvasjs.com/assets/script/canvasjs.min.js\"></script>
</head>
<body>
  <div id=\"chartContainer\" style=\"height: 300px; width: 100%;\">
  </div>
</body>
</html>";
}





?>
