<?php require_once 'header.php' ;

$query = "SELECT * FROM USER WHERE username = '".$username."'";
$result = $mysqli->query($query);

// fetch associative array of the result
$row = $result->fetch_array();

$firstname = $row['firstname'];
$lastname = $row['lastname'];
$uid = $row['uid'];

// get the count of notes from the user with uid
$query3 = "SELECT COUNT(nid) AS ncount FROM NOTE WHERE uid='".$uid."'";
$result=$mysqli->query($query3);
$row3 = $result->fetch_array();

?>

<?php if($_SESSION['loggedin']) { ?>



<div class="span3 well">
	<div class="row">
		<div class="span1"><a href="#" class="thumbnail"><img src="include/img/users/user.jpg" alt=""></a></div>
		<div class="span2">
			<p><a href="#">@<?php echo $username ; ?></a></p>
          	<p><strong><?php echo $firstname.' '.$lastname ?></strong></p>
		</div>
		<div class="span3 mt10">
			<span class=" badge badge-warning"><?php echo $row3['ncount'] ;?> notes</span>
			<span class=" badge badge-info">15 followers</span>
			<a href="set_filters.php"><span class="badge badge-inverse">Settings</span></a>
		</div>
		
		
	</div>
</div>

<?php } else { 

	header('Location:create_new_user.php') ; 

} ?>

<?php require_once 'footer.php' ;?>