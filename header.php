<?php 
session_start(); 
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
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="include/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="include/css/style.css">

	<script type="text/javascript" src="include/js/jquery-2.0.0.min.js"></script>
	<script type="text/javascript" src="include/js/bootstrap.js"></script>

	<script type="text/javascript" src="include/js/geolocate.js"></script>
	<script type="text/javascript" src="include/js/jquery.form.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>


	<title>Jingo</title>

	<script type="text/javascript">
		
		var x=document.getElementById("demo");
	
	</script>

</head>
<body>

<div class="navbar navbar-inverse">
	<div class="navbar-inner" style="border-radius:0;">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="index.php">Jingo</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li><a href="userhome.php"><i class="icon-home icon-white"></i> Home</a></li>
					<li class="divider-vertical"></li>
					<li><a href="create_new_user.php"><i class="icon-file icon-white"></i> Login</a></li>
					<li class="divider-vertical"></li>
					<li><a href="#"><i class="icon-envelope icon-white"></i> Messages</a></li>
					<li class="divider-vertical"></li>
                  	<li><a href="#"><i class="icon-signal icon-white"></i> Stats</a></li>
					<li class="divider-vertical"></li>
					<li><a href="#"><i class="icon-lock icon-white"></i> Profile</a></li>
					<li class="divider-vertical"></li>
				</ul>
				<div class="btn-group pull-right">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i> admin	<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="icon-wrench"></i> Settings</a></li>
						<li class="divider"></li>
						<li><a href="logout.php"><i class="icon-share"></i> Logout</a></li>
					</ul>
				</div>
			</div>
			<!--/.nav-collapse -->
		</div>
		<!--/.container-fluid -->
	</div>
	<!--/.navbar-inner -->
</div>
<!--/.navbar -->


<div class="container">
