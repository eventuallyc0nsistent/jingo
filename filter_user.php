<html>
<body>
<?php

$state_name = $_GET['state_name'];
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

echo $state_name;
echo $tag_name;



$db=mysql_connect("127.0.0.1","root","66200535");
mysql_select_db("jingo2",$db);
if(!$db) echo "error";

//insert into FILTER
$sql="INSERT INTO FILTER (uid, state, Aname , tag, x, y)
VALUES (1,'sdf','NYU-POLY','NYU-POLY',10.00,12.00)";

/*if($tag2_name)
$sql="INSERT INTO FILTER (uid, state, Aname , tag, x, y)
VALUES (1,'$_POST['state_name']','$_POST['tag2_name']','$_POST['location_name']',10.00,12.00)";
if($tag3_name)
$sql="INSERT INTO FILTER (uid, state, Aname , tag, x, y)
VALUES (1,'$_POST['state_name']','$_POST['tag3_name']','$_POST['location_name']',10.00,12.00)";
if($location2_name)
{
	sql="INSERT INTO FILTER (uid, state, Aname , tag, x, y)
	VALUES (1,'$_POST['state_name']','$_POST['tag_name']','$_POST['location_name2']',10.00,12.00)";
	if($tag2_name)
	$sql="INSERT INTO FILTER (uid, state, Aname , tag, x, y)
	VALUES (1,'$_POST['state_name']','$_POST['tag2_name']','$_POST['location_name2']',10.00,12.00)";
	if($tag3_name)
	$sql="INSERT INTO FILTER (uid, state, Aname , tag, x, y)
	VALUES (1,'$_POST['state_name']','$_POST['tag3_name']','$_POST['location_name2']',10.00,12.00)";
	if($location2_name)
}

//INSERT INTO SCHEDULE_USER
$sql="INSERT INTO SCHEDULE_USER (uid, timefrom, timeto , repeatday)
VALUES (1,'$_POST['timefrom_name']','$_POST['timeto_name']','$_POST['repeatday']')";
if($timefrom_name2)
$sql="INSERT INTO SCHEDULE_USER (uid, timefrom, timeto , repeatday)
VALUES (1,'$_POST['timefrom_name2']','$_POST['timeto_name2']','$_POST['repeatday2']')";
if($timefrom_name3)
$sql="INSERT INTO SCHEDULE_USER (uid, timefrom, timeto , repeatday)
VALUES (1,'$_POST['timefrom_name3']','$_POST['timeto_name3']','$_POST['repeatday3']')";
*/














mysql_close($db);
?>
</body>
</html>
