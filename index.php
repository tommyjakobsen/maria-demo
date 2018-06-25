<?php
include './db/db_connect.php';
include './classes/classSql.php';
$newSql=new mySql();
$result=$newSql->query("seelect * from country
order by Population DESC
LIMIT 15");

if(!isset($result->num_rows))
{
  //Go to setup page....
  echo "Database not populated. Creation will start...";
  echo "<meta http-equiv=\"refresh\" content=\"5;url=/setup.php\" />";
}else{
  $OUTPUT="";
  //Show the statistics
  
  
echo "<!DOCTYPE HTML>
<html>
<head>
  <script type=\"text/javascript\">
  window.onload = function () {
    var chart = new CanvasJS.Chart(\"chartContainer\", {

      title:{
        text: \"Top ".$result->num_rows." Populated Countries in the World back in the days\"
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
        if($rowcount < $result->num_rows)
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
