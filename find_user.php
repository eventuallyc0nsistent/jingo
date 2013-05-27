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
$find_user = explode('in', $_POST['find-user']);
$search_keyword = trim($find_user[0]);
$search_category = trim($find_user[1]);

// SELECT all distinct uid and their info except the one searching
if ($search_category == 'users') { 
	
	$query = "
				SELECT DISTINCT U.uid, U.firstname , U.lastname , U.username
				FROM USER U 
				where U.uid != ".$uid."
				AND U.username LIKE '%".$search_keyword."%'
			 " ;
	// echo $query ; exit;

} elseif($search_category == 'notes') {
	$query = " 
				SELECT notetext,hyperlink,Utime,Nlike 
				FROM NOTE 
				WHERE notetext LIKE '%".$search_keyword."%' 
				ORDER BY nid DESC; 
			" ;
	// echo $query ; exit;

} else {
	// searching for tags
	$query = "
			 	SELECT notetext , Utime , Nlike , hyperlink
			 	FROM NOTE
			 	WHERE FIND_IN_SET('".$search_keyword."', hyperlink)
			";
	// echo $query ; exit;
}
//echo $query;
$result2 = $mysqli->query($query);

require_once('time_ago.php');

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

<div class="span6 well">
	<h4>You searched for '<?php echo $search_keyword?>' in <?php echo $search_category ?></h4>
	<br/>
	<?php if($result2->num_rows >= 1 ) { 

				while( $row = $result2->fetch_array(MYSQLI_ASSOC))  

					{ 
							if($search_category == 'users') { 

	?>

	<div class="row">
		<div class="span1"><a href="#" class="thumbnail"><img src="http://critterapp.pagodabox.com/img/user.jpg" alt=""></a></div>
		<div class="span5">
			<p><?php echo $row['firstname'].' '.$row['lastname'] ; ?> <a href="#">@<?php echo $row['username'] ; ?></a> </p>
		</div>
	</div>
	<hr>
	<?php 	}  elseif ($search_category == 'notes') { ?>
	<div class="row">
		<div class="span1">
			<a href="#" class="thumbnail">
				<img src="include/img/users/user.jpg" alt="">
			</a>
		</div>
		<div class="span5">
			<p><?php echo $firstname.' '.$lastname ; ?> <a href="#">@<?php echo $username ; ?></a> 
			<span class="pull-right"><small><?php echo time_ago(strtotime($row['Utime']));?></small></span>
			</p>
          	<p><?php echo stripslashes($row['notetext']) ; ?></p>
          	<p>
          		<?php 
          			$tags = explode(',', $row['hyperlink']);
          			foreach ($tags as $key) {
          				echo "<a href='#'>".$key."</a> ";
          			}
          		?>
          	</p>
          	<div>

          		<a href="#"><span class="icon-heart"></span> Like</a>
          		<a id="com" href="#"><span class="icon-comment"></span> Comment</a>

			</div>   
		</div>
	</div>
	<hr>
	 <?php 	} elseif($search_category == 'tags') {?> 

	<div class="row">
		<div class="span1">
			<a href="#" class="thumbnail">
				<img src="include/img/users/user.jpg" alt="">
			</a>
		</div>
		<div class="span5">
			<p><?php echo $firstname.' '.$lastname ; ?> <a href="#">@<?php echo $username ; ?></a> 
			<span class="pull-right"><small><?php echo time_ago(strtotime($row['Utime']));?></small></span>
			</p>
          	<p><?php echo stripslashes($row['notetext']) ; ?></p>
          	<p>
          		<?php 
          			$tags = explode(',', $row['hyperlink']);
          			foreach ($tags as $key) {
          				echo "<a href='#'>".$key."</a> ";
          			}
          		?>
          	</p>
          	<div>

          		<a href="#"><span class="icon-heart"></span> Like</a>
          		<a id="com" href="#"><span class="icon-comment"></span> Comment</a>

			</div>   
		</div>
	</div>
	<hr>
	 <?php }else { 

	 					echo "<h6> Sorry no matches founds ! Try a different query or you're friends already</h6>" ;
	 				} 
	 	} }
	 ?>
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