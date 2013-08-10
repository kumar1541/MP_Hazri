<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        margin: 0;
        padding: 0;
        height: 98%;
	width: 100%;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBABGScJQIfCPdEHscp_YPmr79uAtdYU-k&sensor=false&region=IN"></script>
    <script>
var map;
function initialize() {
  var mapOptions = {
    zoom: 4,
    center: new google.maps.LatLng(25, 80),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);


var mark_zero = new Array();
var mark_twenty = new Array();
var mark_forty = new Array();
var mark_sixty = new Array();
var mark_eighty = new Array();

 



function codeLatLong(lat, lng, constituency, percentage) {
	mylatlong = new google.maps.LatLng(lat, lng)
	switch(percentage)
	{
	case "zero":
	     var marker = new google.maps.Marker({
        position: mylatlong ,
        map: map,
        title: constituency,
        //icon: 'MarkerA.png',
	zIndex: -999999
	});
	
	mark_zero.push(marker)
	marker.setVisible(false);
	//console.log(mark_zero);
	break;
	
	
	case "twenty":
	     var marker = new google.maps.Marker({
        position: mylatlong ,
        map: map,
        title: constituency,
        //icon: 'MarkerC.png'
	});
	
	mark_twenty.push(marker)
	marker.setVisible(false);
	break;
	
	case "forty":
	     var marker = new google.maps.Marker({
        position: mylatlong ,
        map: map,
        title: constituency,
        //icon: 'MarkerA.png',
	//zIndex: -999999
	});
	
	mark_forty.push(marker)
	marker.setVisible(false);
	//console.log(mark_forty);
	break;
	
	case "sixty":
	     var marker = new google.maps.Marker({
        position: mylatlong ,
        map: map,
        title: constituency,
        //icon: 'MarkerA.png',
	//zIndex: -999999
	});
	
	mark_sixty.push(marker)
	marker.setVisible(false);
	//console.log(mark_sixty);
	break;
	
	case "eighty":
	     var marker = new google.maps.Marker({
        position: mylatlong ,
        map: map,
        title: constituency,
        //icon: 'MarkerA.png',
	//zIndex: -999999
	});
	
	mark_eighty.push(marker)
	marker.setVisible(false);
	//console.log(mark_eighty);
	break;
}
}

 <?php
	$host = mysqli_connect("localhost", "", "", "test");
	$zero = mysqli_query($host, "SELECT DISTINCT name FROM session_table13 WHERE percentage BETWEEN 0 AND 20");
	$twenty = mysqli_query($host, "SELECT DISTINCT name FROM session_table13 WHERE percentage BETWEEN 20 AND 40");
	$forty = mysqli_query($host, "SELECT DISTINCT name FROM session_table13 WHERE percentage BETWEEN 40 AND 60");
	$sixty = mysqli_query($host, "SELECT DISTINCT name FROM session_table13 WHERE percentage BETWEEN 60 AND 80");
	$eighty = mysqli_query($host, "SELECT DISTINCT name FROM session_table13 WHERE percentage BETWEEN 80 AND 100");
	//$twenty = mysqli_query($host, "SELECT DISTINCT name FROM session_table WHERE percentage BETWEEN 20 AND 40");
	
	while($row = mysqli_fetch_array($zero))
	
	{
		$constituency = mysqli_query($host, "SELECT constituency FROM abcd WHERE name='$row[name]'");
		$row = mysqli_fetch_array($constituency);
			 // echo $row['constituency'];
		$latlong = mysqli_query($host, "SELECT * FROM district_data1 WHERE constituency='$row[constituency]'");
        $latlongrow = mysqli_fetch_array($latlong);
		//echo $latlongrow['Latitude'];
		//echo $latlongrow['Longitude'];
		//echo $row['constituency'];
		if($row["constituency"]!=''){
		?>
		
		codeLatLong(<?php echo $latlongrow['Latitude'] . ", " . $latlongrow['Longitude'];?>, '<?php echo $row['constituency']; ?>', 'zero');
		
		<?php
		}
		}
		
	while($row = mysqli_fetch_array($twenty))
	
	{
		$constituency = mysqli_query($host, "SELECT constituency FROM abcd WHERE name='$row[name]'");
		$row = mysqli_fetch_array($constituency);
		$latlong = mysqli_query($host, "SELECT * FROM district_data1 WHERE constituency='$row[constituency]'");
        $latlongrow = mysqli_fetch_array($latlong);
		
		if($row["constituency"]!=''){
		?>
		
		codeLatLong(<?php echo $latlongrow['Latitude'] . ", " . $latlongrow['Longitude'];?>, '<?php echo $row['constituency']; ?>', 'twenty');
		
		<?php
		}
		}
		
		while($row = mysqli_fetch_array($forty))
	
	{
		$constituency = mysqli_query($host, "SELECT constituency FROM abcd WHERE name='$row[name]'");
		$row = mysqli_fetch_array($constituency);
			 // echo $row['constituency'];
		$latlong = mysqli_query($host, "SELECT * FROM district_data1 WHERE constituency='$row[constituency]'");
        $latlongrow = mysqli_fetch_array($latlong);
		//echo $latlongrow['Latitude'];
		//echo $latlongrow['Longitude'];
		//echo $row['constituency'];
		if($row["constituency"]!=''){
		?>
		
		codeLatLong(<?php echo $latlongrow['Latitude'] . ", " . $latlongrow['Longitude'];?>, '<?php echo $row['constituency']; ?>', 'forty');
		
		<?php
		}
		}
		
		while($row = mysqli_fetch_array($sixty))
	
	{
		$constituency = mysqli_query($host, "SELECT constituency FROM abcd WHERE name='$row[name]'");
		$row = mysqli_fetch_array($constituency);
			 // echo $row['constituency'];
		$latlong = mysqli_query($host, "SELECT * FROM district_data1 WHERE constituency='$row[constituency]'");
        $latlongrow = mysqli_fetch_array($latlong);
		//echo $latlongrow['Latitude'];
		//echo $latlongrow['Longitude'];
		//echo $row['constituency'];
		if($row["constituency"]!=''){
		?>
		
		codeLatLong(<?php echo $latlongrow['Latitude'] . ", " . $latlongrow['Longitude'];?>, '<?php echo $row['constituency']; ?>', 'sixty');
		
		<?php
		}
		}
		
		while($row = mysqli_fetch_array($eighty))
	
	{
		$constituency = mysqli_query($host, "SELECT constituency FROM abcd WHERE name='$row[name]'");
		$row = mysqli_fetch_array($constituency);
			 // echo $row['constituency'];
		$latlong = mysqli_query($host, "SELECT * FROM district_data1 WHERE constituency='$row[constituency]'");
        $latlongrow = mysqli_fetch_array($latlong);
		//echo $latlongrow['Latitude'];
		//echo $latlongrow['Longitude'];
		//echo $row['constituency'];
		$const=$row['constituency'];
		
		$qtr=mysqli_fetch_array($qt);
		
		$qtv=$qtr['name'].", ".$qtr['constituency'].", ".$qtr['contact'];
		echo $qtv;
		
		if($row["constituency"]!=''){
		?>
		
		codeLatLong(<?php echo $latlongrow['Latitude'] . ", " . $latlongrow['Longitude'];?>, '<?php echo $qtv; ?>', 'eighty');
		
		<?php
		}
		}
		?>




document.getElementById('zero').onchange=Hide_zero;
document.getElementById('twenty').onchange=Hide_twenty;
document.getElementById('forty').onchange=Hide_forty;
document.getElementById('sixty').onchange=Hide_sixty;
document.getElementById('eighty').onchange=Hide_eighty;
//document.getElementById('twenty').onchange=Hide_twenty;


var j;


// -------------   Marker Hiding Functions Start---------------------//
function Hide_zero(e) {
	    if(this.checked){	
		for(j=0;j<mark_zero.length;j++)
		mark_zero[j].setVisible(true);
    } else {
	for(j=0;j<mark_zero.length;j++)
    	mark_zero[j].setVisible(false);
	}
}

function Hide_twenty(e) {
	    if(this.checked){	
		for(j=0;j<mark_twenty.length;j++)
		mark_twenty[j].setVisible(true);
    } else {
	for(j=0;j<mark_twenty.length;j++)
    	mark_twenty[j].setVisible(false);
	}
}

function Hide_forty(e) {
	    if(this.checked){	
		for(j=0;j<mark_forty.length;j++)
		mark_forty[j].setVisible(true);
    } else {
	for(j=0;j<mark_forty.length;j++)
    	mark_forty[j].setVisible(false);
	}
}

function Hide_sixty(e) {
	    if(this.checked){	
		for(j=0;j<mark_sixty.length;j++)
		mark_sixty[j].setVisible(true);
    } else {
	for(j=0;j<mark_sixty.length;j++)
    	mark_sixty[j].setVisible(false);
	}
}

function Hide_eighty(e) {
	    if(this.checked){	
		for(j=0;j<mark_eighty.length;j++)
		mark_eighty[j].setVisible(true);
    } else {
	for(j=0;j<mark_eighty.length;j++)
    	mark_eighty[j].setVisible(false);
	}
}












}
google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
	<div id="map-canvas"></div>
	 <div>
	<input type="checkbox" id="zero" checked="checked">(0-20)%</input>
	<input type="checkbox" id="twenty">(20-40)%</input>
	<input type="checkbox" id="forty">(40-60)%</input>
	<input type="checkbox" id="sixty">(60-80)%</input>
	<input type="checkbox" id="eighty">(80-100)%</input>
	</div>  
	 
	
  </body>
</html>