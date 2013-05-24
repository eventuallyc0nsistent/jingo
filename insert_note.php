<html>
<body>

	
<?php


$tag_name= $_POST['tag_name'];
$tag_name2= $_POST['tag_name2'];
$tag_name3= $_POST['tag_name3'];
$notes= $_POST['notes'];
$timefrom_name= $_POST['timefrom_name'];
$timefrom_name2= $_POST['timefrom_name2'];



echo $tag_name;


// Create connection
$con=mysqli_connect("127.0.0.1","yaojiani","66200535","jingo2");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


mysqli_query($con,"INSERT INTO NOTE (uid,notetext,x,y,x1,y1)
VALUES (1,'$_POST[notes]',80.00,85.00,100.00,120.00)");

$result = mysqli_query($con,"SELECT nid FROM NOTE order by Utime desc limit 1");

while($row = mysqli_fetch_array($result))
  {
   $nid=$row['nid'];
    }
//every note has a tag='None' in order to display notes when users don't filter on tags.	
mysqli_query($con,"INSERT INTO NOTE_TAG (nid,tag)
VALUES ('$nid','None')");

//When users don't set schedule for their notes we set them in default way.
if(!$timefrom_name)
mysqli_query($con,"INSERT INTO SCHEDULE_DATE (nid,timefrom,timeto, datefrom, dateto)
VALUES ('$nid','00:00:00','24:00:00','2013-05-07','2015-05-07')");

if($tag_name)
mysqli_query($con,"INSERT INTO NOTE_TAG (nid,tag)
VALUES ('$nid','$_POST[tag_name]')");

if($tag_name2)
mysqli_query($con,"INSERT INTO NOTE_TAG (nid,tag)
VALUES ('$nid','$_POST[tag_name2]')");

if($tag_name3)
mysqli_query($con,"INSERT INTO NOTE_TAG (nid,tag)
VALUES ('$nid','$_POST[tag_name3]')");


if($timefrom_name)
mysqli_query($con,"INSERT INTO SCHEDULE_DATE (nid,timefrom,timeto, datefrom, dateto,repeatday)
VALUES ('$nid','$_POST[timefrom_name]','$_POST[timeto_name]','$_POST[datefrom_name]','$_POST[dateto_name]','$_POST[repeatday]')");

if($timefrom_name2)
mysqli_query($con,"INSERT INTO SCHEDULE_DATE (nid,timefrom,timeto, datefrom, dateto,repeatday)
VALUES ('$nid','$_POST[timefrom_name2]','$_POST[timeto_name2]','$_POST[datefrom_name2]','$_POST[dateto_name2]','$_POST[repeatday2]')");

mysqli_close($con);
?>

</body>
</html>

