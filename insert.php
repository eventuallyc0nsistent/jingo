<html>
<body>

	
<?php
$lat=$_POST['lat'];
$log=$_POST['log'];



echo $lat;
echo $log;
$state_name = $_POST['state_name'];
$tag_name=$_POST['tag_name'];
$tag2_name=$_POST['tag2_name'];
$tag3_name=$_POST['tag3_name'];
$location_name=$_POST['location_name'];
$location2_name=$_POST['location2_name'];
$timefrom_name=$_POST['timefrom_name'];
$timeto_name=$_POST['timeto_name'];
$repeatday=$_POST['repeatday'];
$timefrom_name2=$_POST['timefrom_name2'];
$timeto_name2=$_POST['timeto_name2'];
$repeatday2=$_POST['repeatday2'];
$timefrom_name3=$_POST['timefrom_name3'];
$timeto_name3=$_POST['timeto_name3'];
$repeatday3=$_POST['repeatday3'];

// Create connection
$con=mysqli_connect("127.0.0.1","yaojiani","66200535","jingo2");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


if (!$location_name) {
	$location_name="None";
	# code...
}

if (!$tag_name) {
	$tag_name="None";
	# code...
}

mysqli_query($con,"INSERT INTO FILTER (uid, state, Aname , tag, x, y)
VALUES (1,'$_POST[state_name]','$location_name','$tag_name','$_POST[lat]','$_POST[log]')");

if($tag2_name)
mysqli_query($con,"INSERT INTO FILTER (uid, state, Aname , tag, x, y)
VALUES (1,'$_POST[state_name]','$location_name','$_POST[tag2_name]','$_POST[lat]','$_POST[log]')");

if($tag3_name)
mysqli_query($con,"INSERT INTO FILTER (uid, state, Aname , tag, x, y)
VALUES (1,'$_POST[state_name]','$location_name','$_POST[tag3_name]','$_POST[lat]','$_POST[log]')");

if($location2_name)
{
	mysqli_query($con,"INSERT INTO FILTER (uid, state, Aname , tag, x, y)
	VALUES (1,'$_POST[state_name]','$_POST[location2_name]','$tag_name','$_POST[lat]','$_POST[log]')");

	if($tag2_name)
	mysqli_query($con,"INSERT INTO FILTER (uid, state, Aname , tag, x, y)
	VALUES (1,'$_POST[state_name]','$_POST[location2_name]','$_POST[tag2_name]','$_POST[lat]','$_POST[log]')");

	if($tag3_name)
	mysqli_query($con,"INSERT INTO FILTER (uid, state, Aname , tag, x, y)
	VALUES (1,'$_POST[state_name]','$_POST[location2_name]','$_POST[tag3_name]','$_POST[lat]','$_POST[log]')");
	
}

mysqli_query($con,"INSERT INTO SCHEDULE_USER (uid, timefrom, timeto , repeatday)
VALUES (1,'$_POST[timefrom_name]','$_POST[timeto_name]','$_POST[repeatday]')");

if($timefrom_name2)
mysqli_query($con,"INSERT INTO SCHEDULE_USER (uid, timefrom, timeto , repeatday)
VALUES (1,'$_POST[timefrom_name2]','$_POST[timeto_name2]','$_POST[repeatday2]')");

if($timefrom_name3)
mysqli_query($con,"INSERT INTO SCHEDULE_USER (uid, timefrom, timeto , repeatday)
VALUES (1,'$_POST[timefrom_name3]','$_POST[timeto_name3]','$_POST[repeatday3]')");



mysqli_close($con);
?>

</body>
</html>

