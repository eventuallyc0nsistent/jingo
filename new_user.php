<?php

require_once('header.php');

if($_POST) {
	$firstname  = $_POST['firstname'];
	$lastname   = $_POST['lastname'];
	$email		= $_POST['email'];
	$password	= $_POST['password'];

	$query = "INSERT INTO  USER ( firstname  , lastname  , email  , password ) VALUES ( '".$firstname."',  '".$lastname."', '". $email."', '".$password."');" ;

	$result = $mysqli->query($query) or die(mysql_errno());
	if($result)
			{
				header("Location: userhome.php");
			}
	else {
		echo "User cannot be added this way";
	}

}



require_once('footer.php');
?>