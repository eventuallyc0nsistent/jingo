<?php 
require_once('header.php');

$username = $_POST['login_username'];
$password = md5($_POST['login_password']);

$query = "SELECT * FROM USER WHERE username='".$username."' AND password = '".$password."'";
$result = $mysqli->query($query);

if($result->num_rows == 1){
	$_SESSION['username'] = $username;
	header('Location: userhome.php') ;

} else {
	header('Location:create_new_user.php');
}


require_once('footer.php');
?>