<?php  
require_once('header.php'); 

$username = $_SESSION['username'];

$query = "SELECT * FROM USER WHERE username = '".$username."'";
$result = $mysqli->query($query);

// fetch associative array of the result
$row = $result->fetch_array();

$firstname = $row['firstname'];
$lastname = $row['lastname'];


?>



<div class="span3 well">
	<div class="row">
		<div class="span1"><a href="http://critterapp.pagodabox.com/others/admin" class="thumbnail"><img src="http://critterapp.pagodabox.com/img/user.jpg" alt=""></a></div>
		<div class="span2">
			<p><a href="#">@<?php echo $username ; ?></a></p>
          	<p><strong><?php echo $firstname.' '.$lastname ?></strong></p>
		</div>
		<div class="span3 mt10">
			<span class=" badge badge-warning">8 notes</span> <span class=" badge badge-info">15 followers</span>
		</div>
		<div class="span4 mt10">
		    <form accept-charset="UTF-8" action="" method="POST">
		        <textarea class="span3" id="new_message" name="new_message"
		        placeholder="Type in your message" rows="3"></textarea>
		        <h6>320 characters remaining</h6>
		        <button class="btn btn-info" type="submit">Post Note</button>
		    </form>
		</div>
	</div>
</div>

<div class="span6 well">
	<h2>Notes</h2>
	<hr>
	<div class="row">
		<div class="span1"><a href="http://critterapp.pagodabox.com/others/admin" class="thumbnail"><img src="http://critterapp.pagodabox.com/img/user.jpg" alt=""></a></div>
		<div class="span5">
			<p>Username <a href="#">@leader_username</a></p>
          	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          	<div>
          		<a href="#"><span class="icon-heart"></span> Like</a>
          		<a href="#"><span class="icon-comment"></span> Comment</a>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="span1"><a href="http://critterapp.pagodabox.com/others/admin" class="thumbnail"><img src="http://critterapp.pagodabox.com/img/user.jpg" alt=""></a></div>
		<div class="span5">
			<p>Username <a href="#">@leader_username</a></p>
          	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          	<div>
          		<a href="#"><span class="icon-heart"></span> Like</a>
          		<a href="#"><span class="icon-comment"></span> Comment</a>
			</div>
		</div>
	</div>
</div>


<?php require_once('footer.php'); ?>