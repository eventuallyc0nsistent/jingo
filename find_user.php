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
$followerid = $uid ; 
$status = 2 ; // hard value if sending friend request set status to 2

// $find_user who still doesn't have a friend request sent and is in the USER table
$find_user = $_POST['find-user'];
$query = "SELECT U.uid,U.username,U.firstname,U.lastname FROM USER U WHERE U.username LIKE '%".$find_user."%' AND U.uid NOT IN ( SELECT leaderuid FROM FRIENDSHIP WHERE status = '".$status."') AND U.uid != '".$uid."'";
// echo $query;
$result2 = $mysqli->query($query);

?>

<?php if($_SESSION['loggedin']) { ?>



<div class="span3 well">
	<div class="row">
		<div class="span1"><a href="http://critterapp.pagodabox.com/others/admin" class="thumbnail"><img src="http://critterapp.pagodabox.com/img/user.jpg" alt=""></a></div>
		<div class="span2">
			<p><a href="#">@<?php echo $username ; ?></a></p>
          	<p><strong><?php echo $firstname.' '.$lastname ?></strong></p>
		</div>
		<div class="span3 mt10">
			<span class=" badge badge-warning"><?php echo $row3['ncount'] ;?> notes</span> <span class=" badge badge-info">15 followers</span>
		</div>
		
	</div>
</div>

<div class="span6 well">
	<h2>You might want to add ?</h2>



	<?php if($result2->num_rows >= 1 ) { while( $row = $result2->fetch_array(MYSQLI_ASSOC))  { ?>
	
	<div class="row">
		<div class="span1"><a href="http://critterapp.pagodabox.com/others/admin" class="thumbnail"><img src="http://critterapp.pagodabox.com/img/user.jpg" alt=""></a></div>
		<div class="span5">
			<p><?php echo $row['firstname'].' '.$row['lastname'] ; ?> <a href="#">@<?php echo $row['username'] ; ?></a> </p>
			<p>
				<a class="btn add-friend" name="<?php echo $row['uid'] ; ?>">Add Friend</a>
			</p>
		</div>
	</div>
	<hr>
	<?php } } else { echo "<h6> Sorry no matches founds ! Try a different query or you're friends already</h6>" ;}?>
</div>

<!-- set variables to send via ajax add_friend() -->
<script type="text/javascript">
	var followerid 	= <?php echo $followerid ?>;
	var status 		= <?php echo $status ?>;
</script>

<?php } else { 

	header('Location:create_new_user.php') ; 

} ?>

<?php require_once 'footer.php' ; ?>