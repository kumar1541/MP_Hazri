<!DOCTYPE html>

<html>

<head>
<style>
body
{
background-image:url(11.jpg);
 background-repeat:no-repeat;
 background-size:cover;
}
</style>
<link rel="stylesheet" type="text/css" href="css/nv.d3.css" media="all" />
<script src="js/d3.v2.js"></script>
<script src="js/nv.d3.js"></script>


</head>
<body>
			<div class="center">
			<h3 style="text-align:left;"><font color="black"><u>Personal Details</u></font></h3><br>
			
				</div>

				
				<?php 
				include('connection.php');
				?>
<?php
session_start();
// store session data

?>
<?php 
 //$B=$_POST['state'];
 
?>



<?php
$cl=explode(':',$_REQUEST['cl']);
$detail=$cl[0];


$q=mysql_query("SELECT * FROM mps_personal_details1new  WHERE Constituency='$detail'");

$flag='0';

while($row=mysql_fetch_array($q))

{
  //if( $row['Constituency'] == $B )
  {$flag='1';   break;}
  
}

if ($flag=='0')
{?>

<script type="text/javascript">
alert ("No Data corresponding to your entry");
var howLongToWait = 3; //number of seconds to wait
var urlOfRedirectLocation = 'http://projects.iic.ac.in/nic/Lunatics/';
function startRedirect() {
window.location = urlOfRedirectLocation;
}
setTimeout('startRedirect()', howLongToWait * 2);

</script>
<?php }
?>
<?php    
  
{

      echo "<font size='3'><b>Member Name </b></font>---".$name=$row['name'];
      echo "<br>";
	echo "<font size='3'><b>State</b></font>---".$b=$row['state']."<br>";
	echo "<font size='3'><b>Constituency</b></font>---".$b=$row['constituency']."<br>";
        echo "<font size='3'><b>Party</b></font>---".$b=$row['party']."<br>";
        echo "<font size='3'><b>Residential Address</b></font>---".$b=$row['permanent_address']."<br>";
	echo "<font size='3'><b>Official Address</b></font>---".$b=$row['present_address']."<br>";
        echo "<font size='3'><b>Contact</b></font>---".$b=$row['contact']."<br>";
	echo "<font size='3'><b>Email</b></font>---".$b=$row['email_address']."<br>";
      


}
	
echo "<br>";
echo "<br>";
?>
<html>
<div class="center">
			<h3 style="text-align:left;"><font color="black"><u>Attendance Status</u></font></h3><br>
			
				</div>

</html>
<?php




$qu=mysql_query("Select * from session_table where Name='$name' ");










$total_price = 0;
$count=0;

while($row1=mysql_fetch_array($qu))
   
 


{       "<tr>";
 
  
	 "<td>" . $row1['session_no'] . "</td>";

	 "<td>" . $row1['no_of_days_present'] . "</td>";
	  "<td>" . $row1['no_of_days_absent'] . "</td>";
	   "<td>" . $row1['percentage'] . "</td>";
         "</tr>"; 


 "</tr>";
  $total_price += $row1['percentage'];
  $count=$count+1;
  }


if($count!=0)
{
echo "<font size='3'><b>Overall Percentage of Attendance:</b>";

$z=$total_price/$count;

$formatted_number = round($z,2);

echo $formatted_number;
echo "%";
}
 "<br>";
  "<br>";
   
 "</table>";




$qu=mysql_query("Select * from session_table where Name='$name' ");
$data=array();
$series=new stdClass();
$series->key='$name';
$series->values=array();
if ($qu && mysql_num_rows($qu) > 0) 
{

while($row1=mysql_fetch_array($qu)){
   
 $_temp=new stdClass();
$_temp->label=$row1['session_no'];
$_temp->value=str_replace("%","",$row1['percentage']);
$series->values[]=$_temp;


}
$data[]=$series;
}
$a= json_encode($data);
?>
<style>

#chart svg {
  height: 500px;
}

</style>


<div id="chart">
  <svg></svg>
</div>
<script>
var data=<?php print $a; ?>;
nv.addGraph(function() {
  var chart = nv.models.discreteBarChart()
  .margin({bottom:100, left:100, top:50})
      .x(function(d) { return d.label })
      .y(function(d) { return d.value })
      .staggerLabels(true)
      .tooltips(false)
      .showValues(true);
	  chart.xAxis
        .axisLabel('session no.');
chart.yAxis
        .axisLabel('Attendance percentage.');
  d3.select('#chart svg')
      .datum(data)
    .transition().duration(500)
      .call(chart);

  nv.utils.windowResize(chart.update);

  return chart;
});
</script>

</body>
</html>