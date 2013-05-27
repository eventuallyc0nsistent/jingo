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

// nid
$nid = $_POST['nid'];

// add friend 
$date = date("Y-m-d H:i:s");

$query = "UPDATE NOTE SET Nlike=Nlike +1 WHERE nid=$nid";
echo $query;
$mysqli->query($query) or die($mysql->error);


?>