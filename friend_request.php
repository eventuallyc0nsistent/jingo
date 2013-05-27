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

// add friend 
$leaderuid = $uid ; 

//get friend requests
$query_friend_req = "
						SELECT DISTINCT U.uid, U.username,U.firstname,U.lastname 
						FROM USER U, FRIENDSHIP F 
						WHERE U.uid IN ( SELECT F.followeruid FROM FRIENDSHIP F WHERE F.leaderuid = $uid AND F.status = 2)
					" ;
// echo $query_friend_req;
$result_fr  =  $mysqli->query($query_friend_req);


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
			<a href="set_filters.php"><span class="badge badge-inverse">filters</span></a>
		</div>
		
		
	</div>
</div>

<div class="span6 well">
<h2>Friend Requests</h2>
<?php  if($result_fr->num_rows >= 1 ) {  while( $row_fr = $result_fr->fetch_array())	{ ?>
<div class="row">
	
		<div class="span1"><a href="#" class="thumbnail"><img src="http://critterapp.pagodabox.com/img/user.jpg" alt=""></a></div>
			<div class="span5">
				<p><?php echo $row_fr['firstname'].' '.$row_fr['lastname'] ; ?> <a href="#">@<?php echo $row_fr['username'] ; ?></a> </p>
				<p>
		     		<a class="btn accept-friend" name="<?php echo $row_fr['uid'] ; ?>">Accept</a>
		     		<a class="btn decline-friend" name="<?php echo $row_fr['uid'] ; ?>">Decline</a>
			    </p>
			</div>

</div>
<hr>
<?php } } else { 

	echo "<h5>No friends to be added .... Why not find for new friends instead ?</h5>";

}  ?>
</div>

<script type="text/javascript">
	var leaderid 	= <?php echo $leaderuid ?>;
</script>

<? } else { 

	header('Location:create_new_user.php') ; 

} ?>

<?php require_once 'footer.php' ;?>