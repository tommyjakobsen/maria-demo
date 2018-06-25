<?php

if(!file_exists('./setup'))
{
  //Go to setup page....
  echo "<meta http-equiv=\"refresh\" content=\"5;url=/setup.php\" />";
}else{
  $OUTPUT="";
  //Show the statistics
  include './db/db_connect.php';
  include './classes/classSql.php';
  $newSql=new mySql();
 $result=$newSql->query("select * from country
order by Population DESC
LIMIT 10");
  
echo "<!DOCTYPE HTML>
<html>
<head>
  <script type=\"text/javascript\">
  window.onload = function () {
    var chart = new CanvasJS.Chart(\"chartContainer\", {

      title:{
        text: \"Top 10 Populated Countries in the World back in the days\"
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
$OUTPUT.="<tr><td>$row[Name]</td><td>$row[Continent]</td><td>$row[Population]</td><td>$row[LifeExpectancy]</td><td>$row[GovernmentForm]</td><td>$row[HeadOfState]</td></tr>\n";
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
  ";
  echo "<table width=100% border=1 cellspacing=0>";
  echo "<tr><th color='#abcdef'>Name</th><th color='#abcdef'>Continent</th><th color='#abcdef'>Population</th><th color='#abcdef'>Life Exp.</th><th color='#abcdef'>Government Form</th><th color='#abcdef'>Head of State</th></tr>\n";
  echo "$OUTPUT";
  echo "</table>";
  echo "
</body>
</html>";
}





?>
