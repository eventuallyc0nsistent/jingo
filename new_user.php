<?php

require_once('header.php');

if($_POST) {
	$firstname  = $_POST['firstname'];
	$lastname   = $_POST['lastname'];
	$email		= $_POST['email'];
	$username	= $_POST['username'];
	$password	= md5($_POST['signup_password']);

	// query to add to DB

	$query = "INSERT INTO  USER ( firstname  , lastname  , email  , password , username ) VALUES ( '".$firstname."',  '".$lastname."', '". $email."', '".$password."','".$username."');" ;
	// echo $query ; exit;
	$result = $mysqli->query($query) or die(mysql_errno());
	if($result)
			{
				// Once the user is added re-direct him to userhome.php
				header("Location: userhome.php");
			}
	else {
		echo "User cannot be added this way";
	}

}

require_once('footer.php');
?>