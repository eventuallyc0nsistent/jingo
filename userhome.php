<?php  

require_once 'header.php' ; 

$query = "SELECT * FROM USER WHERE username = '".$username."'";
$result = $mysqli->query($query);

// fetch associative array of the result
$row = $result->fetch_array();

$firstname = $row['firstname'];
$lastname = $row['lastname'];
<<<<<<< HEAD
echo $row['uid'] ;
=======
$uid = $row['uid'];
>>>>>>> a55236083cbe77ae56606b8f1f488295e089b49d

// get the count of notes from the user with uid
$query3 = "SELECT COUNT(nid) AS ncount FROM NOTE WHERE uid='".$uid."'";
$result=$mysqli->query($query3);
$row3 = $result->fetch_array();


<<<<<<< HEAD
<script>
$(document).ready(function(){
=======
// when submitting the note through the same page
if($_POST) {
	//print_r($_POST);
	
	$note = addslashes($_POST['note']);

	$range = $_POST['radius'];

	$tag_name= $_POST['tag_name'];
	$tag_name2= $_POST['tag_name2'];
	$tag_name3= $_POST['tag_name3'];

	$radius = $_POST['radius'];

	$timefrom_name= $_POST['timefrom_name'];
	$timefrom_name2= $_POST['timefrom_name2'];
	
	// insert note in DB
	$query = "INSERT INTO NOTE (uid,notetext,x,y,radius,hyperlink)  VALUES ('".$uid."','".$note."',80.00,85.00,'".$radius."','".$tag_name.",".$tag_name2.",".$tag_name3."');";
	//echo $query;
	$mysqli->query($query) or die(mysql_errno());

}

// get all notes from the current user
$query2 = "SELECT notetext,hyperlink,Utime,Nlike FROM NOTE WHERE uid = '".$uid."' ORDER BY nid DESC;";
$result2 = $mysqli->query($query2) or die(mysql_errno());

// results for query 2 

// $notetext = $row2['notetext'];
// $hyperlink = $row2['hyperlink'];
// $note_time = $row2['Utime'];
// $likes = $row2['Nlike'];
>>>>>>> a55236083cbe77ae56606b8f1f488295e089b49d

<<<<<<< HEAD
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
=======
>>>>>>> e8aff4e199e0c7fe612dff1b4ba9b1980669b754

/*-- 
function : time_ago 
source : http://css-tricks.com/snippets/php/time-ago-function/
returns : time in 'x'ago format
--*/
function time_ago($tm,$rcs = 0) {
   $cur_tm = time(); $dif = $cur_tm-$tm;
   $pds = array('second','minute','hour','day','week','month','year','decade');
   $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
   for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);

   $no = floor($no); if($no <> 1) $pds[$v] .='s'; $x=sprintf("%d %s ",$no,$pds[$v]);
   if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= time_ago($_tm);
   return $x;
}

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
		<div class="span4 mt10">
		    <form accept-charset="UTF-8" action="userhome.php" method="POST">
		        <textarea class="span3" id="new_message" name="note"
		        placeholder="Type in your message" rows="3"></textarea>

		        <div class="clear-fix"></div>
		        <span class="clickid badge" name="range">radius</span>
				<span class="clickid badge" name="tag">tag</span>
				<span class="clickid badge" name="schedule">schedule</span>
				<span class="clickid badge" name="me">#me</span>
				<h6>320 characters remaining</h6>

				<div class="span3" style="margin:0">
				<!-- div#range-->
				<div id="range" style="display:none;">
					radius:	<input type="text" name="radius" class="input-small" value="" maxlength="100" />
				</div>

				<!-- div#tag-->
				<div id="tag" style="display:none;">
					tag : <input type="text" name="tag_name" class="input-small" value="" maxlength="100" />
					<span class="clickid btn btn-inverse mb10" name="tag2">Add</span>
				</div>

				<!-- div#tag2-->
				<div id="tag2" style="display:none;">
					tag : <input type="text" name="tag_name2" class="input-small" value="" maxlength="100" />
					<span class="clickid btn btn-inverse mb10"  name="tag3">Add</span>
				</div>

				<!-- div#tag3-->
				<div id="tag3" class="clickid" style="display:none;">
					tag : <input type="text" name="tag_name3" class="input-small" value="" maxlength="100" />
				</div>

				<!-- div#sch -->
				<div id="schedule" class="clickid" style="display:none;">
					<div id="datetimepicker3" class="input-append">
						Start date
						<input data-format="hh:mm:ss" type="text" class="input-small" name="timefrom_name" value="" maxlength="100" />
						<span class="add-on">
					      <i data-time-icon="icon-time" data-date-icon="icon-calendar" class="icon-calendar"></i>
					    </span>
			  		</div>
				</div><!-- end div#sch -->
				 </div><!-- end div.span3-->
			  <button class="btn btn-success" type="submit">Post Note</button>
		    </form>
<<<<<<< HEAD
=======

>>>>>>> e8aff4e199e0c7fe612dff1b4ba9b1980669b754
		</div>
	</div>
</div>

<div class="span6 well">
	<h2>Notes</h2>
<<<<<<< HEAD
=======

<<<<<<< HEAD
>>>>>>> e8aff4e199e0c7fe612dff1b4ba9b1980669b754
=======


	<?php while( $row = $result2->fetch_array(MYSQLI_ASSOC))  { ?>
	
>>>>>>> a55236083cbe77ae56606b8f1f488295e089b49d
	<div class="row">
		<div class="span1"><a href="http://critterapp.pagodabox.com/others/admin" class="thumbnail"><img src="http://critterapp.pagodabox.com/img/user.jpg" alt=""></a></div>
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
<<<<<<< HEAD
          		<a href="#"><span class="icon-heart"></span> Like</a>
          		<a id="com" href="#"><span class="icon-comment"></span> Comment</a>
=======
          		<a href="#"><span class="icon-heart"></span><?php if($row['likes']) {echo $row['likes'] ;} else { echo '0' ; }; ?></a>
          		<a href="#"><span class="icon-comment"></span> Comment</a>
>>>>>>> a55236083cbe77ae56606b8f1f488295e089b49d
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
<<<<<<< HEAD
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
=======
	<?php } ?>
>>>>>>> a55236083cbe77ae56606b8f1f488295e089b49d
</div>

<?php } else { 

	header('Location:create_new_user.php') ; 

} ?>

<script type="text/javascript">
$(document).ready(function(){

	$('.clickid').click(function(){
      var id = $(this).attr('name');
      $('#'+id).show(400);
    });

});

<<<<<<< HEAD

=======
</script>
>>>>>>> a55236083cbe77ae56606b8f1f488295e089b49d
<?php require_once('footer.php'); ?>