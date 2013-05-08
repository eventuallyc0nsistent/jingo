<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="include/css/bootstrap.css">
	<script type="text/javascript" src="include/js/jquery-2.0.0.min.js"></script>
	<script type="text/javascript" src="include/js/bootstrap.js"></script>
	<script type="text/javascript" src="include/js/geolocate.js"></script>-
	<script type="text/javascript" src="include/js/jquery.form.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>


	<title>Jingo</title>

	<script type="text/javascript">
		
		var x=document.getElementById("demo");
	
	</script>

</head>
<body>
	<div class="container">
<?php

$database_name = 'jingo';
$user = 'root';
$password = 'root' ;


$mysqli = new mysqli("localhost", $user, $password, $database_name);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>

