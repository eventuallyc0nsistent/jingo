<?php 
session_start(); 
$database_name = 'jingo2';
$user = 'yaojiani';
$password = '66200535' ;


$mysqli = new mysqli("127.0.0.1", $user, $password, $database_name);

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
	<link rel="stylesheet" type="text/css" href="include/css/datetimepicker.css">

	<script type="text/javascript" src="include/js/jquery-2.0.0.min.js"></script>
	<script type="text/javascript" src="include/js/bootstrap.js"></script>

	<script type="text/javascript" src="include/js/geolocate.js"></script>
	<script type="text/javascript" src="include/js/jquery.form.js"></script>
	<script type="text/javascript" src="include/js/datetimepicker.js"></script>
	<!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> -->


	<title>Jingo</title>

	<script type="text/javascript">
		
		var x=document.getElementById("demo");
	
	</script>

</head>
<body>

<?php 

if($_SESSION['loggedin']) { 

	$username = $_SESSION['username']; 

?>
<div class="navbar navbar-inverse">
	<div class="navbar-inner" style="border-radius:0;">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="userhome.php">Jingo</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li><a href="userhome.php"><i class="icon-home icon-white"></i> Home</a></li>
					<li class="divider-vertical"></li>
					<li><a href="#"><i class="icon-envelope icon-white"></i> Messages</a></li>
					<li class="divider-vertical"></li>
                  	<li><a href="#"><i class="icon-signal icon-white"></i> Stats</a></li>
					<li class="divider-vertical"></li>
					<li><a href="#"><i class="icon-lock icon-white"></i> Profile</a></li>
					<li class="divider-vertical"></li>
				</ul>
				<div class="btn-group pull-right">
					<form style="margin:0" class="form-search pull-left" action="find_user.php" id="find-user" method="POST">
						<div class="input-append" style="margin:0 15px"><input type="text" id="" name="find-user"><span class="add-on"><i class="icon-search"></i></span></div>
					</form>
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#" style="border-radius:4px">
						<i class="icon-user"></i><?php echo $username ; ?><span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="settings.php"><i class="icon-wrench"></i> Settings</a></li>
						<li class="divider"></li>
						<li><a href="logout.php"><i class="icon-off"></i> Logout</a></li>
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
<?php } ?>

<div class="container">
