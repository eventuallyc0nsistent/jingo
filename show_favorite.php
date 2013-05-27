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

// get all favorite notes from the current user
$query_fav = "SELECT nid,notetext,hyperlink,Utime,Nlike,Nfav FROM NOTE WHERE uid = '".$uid."' AND Nfav = 1 ORDER BY nid DESC;";
// echo $query_fav;exit();
$result_fav  =  $mysqli->query($query_fav);

require_once('time_ago.php')

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
<h2>Favorite notes</h2><hr>
<?php  if($result_fav->num_rows >= 1 ) {  while( $row = $result_fav->fetch_array())	{ ?>
<div class="row">
	
		<div class="span1"><a href="#" class="thumbnail"><img src="http://critterapp.pagodabox.com/img/user.jpg" alt=""></a></div>
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

	          		<a href="#" class="like-button" name="<?php echo $row['nid'] ;?>"><span class="icon-heart"></span> <?php echo $row['Nlike']?> Like</a>
	          		<a id="com" href="#"><span class="icon-comment"></span> Comment</a>
	          		<a href="#" class="fav-button" name="<?php echo $row['nid'] ;?>">
	          			<?php if($row['Nfav'] == 1 ) { 
	          				echo "<span class='icon-star icon-white'></span> Favorited" ;
	          			}else {
	          				echo "<span class='icon-star'></span> Favorite" ;
	          			}?>
	          		</a>

				</div>
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