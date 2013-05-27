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

$query = "UPDATE NOTE SET Nfav=1 WHERE nid=$nid";
echo $query;
$mysqli->query($query) or die($mysql->error);


?>