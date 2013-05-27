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

// get the follower count
$query_follower_count = "SELECT COUNT(followeruid) as fcount FROM FRIENDSHIP WHERE leaderuid = '".$uid."'";
$result_follower_count = $mysqli->query($query_follower_count);
$row_follower_count = $result_follower_count->fetch_array();
// echo $result_follower_count;exit;

// Posting Filter
if($_POST) {

	$state = $_POST['state'];
	$address = $_POST['address'];

	$tag_name= $_POST['tag_name'];
	$tag_name2= $_POST['tag_name2'];
	$tag_name3= $_POST['tag_name3']; 

	$lat = $_POST['lat'];
	$lon = $_POST['lon'];

	$radius = $_POST['radius'];
	$x1 = $lat + $radius * 0.869 / 60 ;
	$y1 = $lon + $radius * 0.869 / 60 ;

	$query_filter = "
					 INSERT INTO FILTER (`uid`, `state`, `Aname`, `tag`, `x`, `y`) 
					 VALUES ('$uid', '$state', '$address', '$tag_name,$tag_name2,$tag_name3', '$lat', '$lon')
					" ;
	$mysqli->query($query_filter) ;

	// Insert Into address too
	$query_address = "
					INSERT INTO ADDRESS (`Aname`, `x`, `y`, `x1`, `y1`) 
					 VALUES ('$address', '$lat', '$lon', $x1, $y1)
					";

	$mysqli->query($query_address) ;

}

?>

<?php if($_SESSION['loggedin']) { ?>

<style type="text/css">

#mapCanvas {
    width: 285px;
    height: 200px;
    float: left;
 }
#infoPanel {
float: left;
margin-left: 10px;
}
#infoPanel div {
margin-bottom: 5px;
}

</style>


<div class="span3 well">
	<div class="row">
		<div class="span1"><a href="#" class="thumbnail"><img src="include/img/users/user.jpg" alt=""></a></div>
		<div class="span2">
			<p><a href="#">@<?php echo $username ; ?></a></p>
          	<p><strong><?php echo $firstname.' '.$lastname ?></strong></p>
		</div>
		<div class="span3 mt10">
			<span class=" badge badge-warning"><?php echo $row3['ncount'] ;?> notes</span>
			<span class=" badge badge-info"><?php echo $row_follower_count['fcount']?> followers</span>
			<a href="set_filters.php"><span class="badge badge-inverse">filters</span></a>
		</div>
		
		
	</div>
</div>

<div class="span6 well">

	<form id="user-settings" class="form-horizontal" action='set_filters.php' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">User Settings</legend>
    </div>
    <div class="control-group">
      <!-- state -->
      <label class="control-label"  for="username">State</label>
      <div class="controls">
        <input type="text" id="state" name="state" class="input-xlarge">
      </div>
    </div>
    <div class="control-group">
    	<label class="control-label"  for="tag">Tag</label>
    	<div class="controls">
        	<input type="text" name="tag_name" class="input-large" value="" maxlength="100" />
        	<span class="clickid btn btn-inverse" name="tag2">Add</span>
        	
        	<div id="tag2" style="display:none;">
        		<br/>
				<input type="text" name="tag_name2" class="input-large" value="" maxlength="100" />
				<span class="clickid btn btn-inverse"  name="tag3">Add</span>
				<br/><br/>
			</div>

			<!-- div#tag3-->
			<div id="tag3" class="clickid" style="display:none;">
				<input type="text" name="tag_name3" class="input-large" value="" maxlength="100" />
			</div>
      	</div>

    </div>

    <!-- Location -->
    <div class="control-group">
    	<label class="control-label"  for="location">Location</label>
    	<div class="controls">
		    <div id="mapCanvas"></div>
			<div id="infoPanel">
			    
			    <div id="info"></div>
			    <div id="markerStatus"><i>Click and drag the marker.</i></div>
			    <label for="latitude">latitude:</label>
			   <input id="lat" type="text" name="lat" value="" maxlength="100" />
			   <label for="longitude">longitude:</label>
			   <input id="lon" type="text" name="lon" value="" maxlength="100" />
			    <label for="longitude">Address :</label>
			    <input id="address" type="text" name="address" value="" maxlength="100"/>
			    <label for="radius">Radius</label>
		      <input type="text" id="radius" name="radius" maxlength="100"/>
			 </div>	      
		</div>
	</div>
    
	<!-- div#schedule -->
	<div class="control-group">
		<label class="control-label"  for="timefrom">Time from :</label>
		<div class="controls">
			<div id="datetimepicker1" class="input-append">
				<input data-format="hh:mm:ss" type="text" class="input-small" name="timefrom" value="" placeholder="00:00:00" maxlength="100">
				<span class="add-on">
					<i data-time-icon="icon-time" data-date-icon="icon-calendar" class="icon-time"></i>
			    </span>
	  		</div>
	  	</div>
	</div>
	  		
	  		
	<div class="control-group">
  		<label class="control-label"  for="timeto">Time to :</label>
  		<div class="controls">
	  		<div id="datetimepicker2" class="input-append">
				<input data-format="hh:mm:ss" type="text" class="input-small" name="timeto" value="" placeholder="00:00:00" maxlength="100">
				<span class="add-on">
					<i data-time-icon="icon-time" data-date-icon="icon-calendar" class="icon-time"></i>
			    </span>
	  		</div>
	  	</div>
	</div>

	<div class="control-group">
  		<label class="control-label"  for="timefrom">Date from :</label>
  		<div class="controls">
	  		<div id="datefrompicker1" class="input-append">
	  			<input data-format="yyyy-MM-dd" name="datefrom" class="input-small" value="" type="text"></input>
		  		<span class="add-on">
			      <i data-time-icon="icon-time" data-date-icon="icon-calendar" class="icon-calendar"></i>
			    </span>
			</div>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label"  for="timefrom">Date to :</label>
		<div class="controls">
	  		<div id="datetopicker1" class="input-append">
	  			<input data-format="yyyy-MM-dd" name="dateto" class="input-small" value="" type="text"></input>
		  		<span class="add-on">
			      <i data-time-icon="icon-time" data-date-icon="icon-calendar" class="icon-calendar"></i>
			    </span>
			</div>
		</div>
	</div>

	<div class="control-group">
  		<label class="control-label"  for="repeatday">Repeat:</label>
		<div class="controls">
			<select name="repeatday">
			  <option value ="Any">Any</option>  <!--any refer to null in the database-->
			  <option value ="Monday">Monday</option>
			  <option value ="Tuesday">Tuesday</option>
			  <option value ="Wednesday">Wednesday</option>
			  <option value ="Thursday">Thursday</option>
			  <option value ="Friday">Friday</option>
			  <option value ="Saturday">Saturday</option>
			  <option value ="Sunday">Sunday</option>
			</select>
		</div>
	</div>
	<!-- end div#schedule -->
    
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <input type="submit" class="btn btn-success"/>
      </div>
    </div>
  </fieldset>
</form>

</div>

<?php } else { 

	header('Location:create_new_user.php') ; 

} ?>

<?php require_once 'footer.php' ;?>