<?php  
require_once('header.php'); 

$username = $_SESSION['username'];

$query = "SELECT * FROM USER WHERE username = '".$username."'";
$result = $mysqli->query($query);

// fetch associative array of the result
$row = $result->fetch_array();

$firstname = $row['firstname'];
$lastname = $row['lastname'];
echo $row['uid'] ;


?>

<script>
$(document).ready(function(){

   $("#com").click(function(){
      $("#HCB_comment_box").toggle(500);
    });
 });
</script>

<script>
$(document).ready(function(){

   $("#com2").click(function(){
      $("#HCB_comment_box2").toggle(500);
    });
 });
</script>

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
	<div class="row">
		<div class="span1"><a href="http://critterapp.pagodabox.com/others/admin" class="thumbnail"><img src="http://critterapp.pagodabox.com/img/user.jpg" alt=""></a></div>
		<div class="span5">
			<p>Username <a href="#">@leader_username</a></p>
          	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          	<div>
          		<a href="#"><span class="icon-heart"></span> Like</a>
          		<a id="com" href="#"><span class="icon-comment"></span> Comment</a>
			</div>
			<!-- begin htmlcommentbox.com -->
 <div style="display:none" id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">HTML Comment Box</a> is loading comments...</div>
 <link rel="stylesheet" type="text/css" href="//www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css?v=0" />
 <script type="text/javascript" id="hcb"> /*<!--*/
  if(!window.hcb_user){hcb_user={};}
   (function(){var s=document.createElement("script"), 
   	l=(""+window.location || hcb_user.PAGE), h="//www.htmlcommentbox.com";
   	s.setAttribute("type","text/javascript");
   	s.setAttribute("src", h+"/jread?page="+encodeURIComponent(l).replace("+","%2B")+"&opts=16862&num=10");
   	if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ 
   	</script>
<!-- end htmlcommentbox.com -->
   
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
          		<a id="com2" href="#"><span class="icon-comment"></span> Comment</a>
			</div>
			<!-- begin htmlcommentbox.com -->
<!-- begin htmlcommentbox.com -->
 <div style="display:none" id="HCB_comment_box2"><a href="http://www.htmlcommentbox.com">HTML Comment Box</a> is loading comments...</div>
 <link rel="stylesheet" type="text/css" href="//www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css?v=0" />
 <script type="text/javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={};} (function(){var s=document.createElement("script"), l=(""+window.location || hcb_user.PAGE), h="//www.htmlcommentbox.com";s.setAttribute("type","text/javascript");s.setAttribute("src", h+"/jread?page="+encodeURIComponent(l).replace("+","%2B")+"&opts=16862&num=10");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
<!-- end htmlcommentbox.com -->
		</div>
	</div>
</div>



<?php require_once('footer.php'); ?>