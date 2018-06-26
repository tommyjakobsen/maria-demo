<?php
include './db/db_connect.php';
include './classes/classSql.php';
$newSql=new mySql();
 if(isset($_GET["type"]))
      {
      $type=$_GET["type"];
      }else{
       //default type is sort by population
      $type="Population";
      }
      

//Don't need a case, but adding it if I want different functionality inside in the future
switch ($type) {
    case "Population":
        $result=$newSql->query("select * from country
        order by $type DESC
        LIMIT 15");
        break;
    case "LifeExpectancy":
        $result=$newSql->query("select * from country
        order by $type DESC
        LIMIT 15");
        break;
    case "SurfaceArea":
        $result=$newSql->query("select * from country
        order by $type DESC
        LIMIT 15");
        break;
}



if(!isset($result->num_rows))
{
  //Go to setup page....
  echo "<font color=red>Database not populated. Creation will start...</font>";
  echo "<meta http-equiv=\"refresh\" content=\"2;url=/setup.php\" />";
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
        text: \"Top ".$result->num_rows." $type for Countries in the World back in the days\"
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
                echo "{ label: \"$row[Name]\", y: $row[$type] },\n";
                }else{
                echo "{ label: \"$row[Name]\", y: $row[$type] }\n";

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
<body>";
echo "<center><FORM action='./index.php' method=GET>";
$counter=0;
echo "<select name='type' onchange='this.form.submit()'>";
 echo "<option value='' selected>Select report...</option>";
echo "<option value='Population'>Population</option>";
echo "<option value='LifeExpectancy'>LifeExpectancy</option>";
echo "<option value='SurfaceArea'>SurfaceArea</option>";
echo "</select>";
echo "</form>";
echo "<br></center>";
echo "<div id=\"chartContainer\" style=\"height: 300px; width: 100%;\">
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
