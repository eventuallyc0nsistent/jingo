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

// declaring variables from ajax request
$followerid = $_POST['followerid'];
$leaderid	= $_POST['leaderid'];
$status		= $_POST['status'];

// add friend 
$date = date("Y-m-d H:i:s");

$query = "UPDATE FRIENDSHIP SET status=0 WHERE followeruid=$followerid AND leaderuid=$leaderid";
echo $query;
$mysqli->query($query) or die($mysql->error);


?>