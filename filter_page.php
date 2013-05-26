 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
<title>jingo</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<?php
$lat2=$_POST['lat2'];
$log2=$_POST['log2'];

?>
<script>
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
  else{x.innerHTML="Geolocation is not supported by this browser.";}
  }

function showPosition(position)
  {
  var lat=position.coords.latitude;
  var log=position.coords.longitude;
  document.getElementById("lat").value=lat;
  document.getElementById("log").value=log;
  document.getElementById("lat2").value=lat;
  document.getElementById("log2").value=log;
 
 }
  
</script>

<script>
$(document).ready(function(){

   $("#btn1").click(function(){
      $("#tag2").show(500);
    });
 });
</script>

<script>
$(document).ready(function(){

   $("#btn2").click(function(){
      $("#tag3").show(500);
    });
 });
</script>

<script>
$(document).ready(function(){

   $("#btn3").click(function(){
      $("#location2").show(500);
    });
 });
</script>

<script>
$(document).ready(function(){

   $("#btn4").click(function(){
      $("#sch2").show(500);
    });
 });
</script>

<script>
$(document).ready(function(){

   $("#btn5").click(function(){
      $("#sch3").show(500);
    });
 });
</script>

<script>
$(document).ready(function(){

   $("#1").click(function(){
      $("#self_location").show(500);
    });
 });
</script>

<script>
$(document).ready(function(){

   $("#2").click(function(){
    $("#fake_location").show(500);
    });
 });
</script>

<script>
$(document).ready(function(){

   $("#fake_loc_btn").click(function(){
     window.location ="clickgeo.html"
    });
 });
</script>

</head>


<body>
	
	
<div id="container">

 

<form action="insert.php" method="post">
<fieldset>
<legend>USER FILTERS</legend>
<div>

<label for="locationtype">Type of Location:</label><br>
  <select name="locationtype">
    <option id="1" value ="real">Real location</option>   <!--any refer to null in the database-->
    <option id="2" value ="fake">Fake location</option>
    
  </select>
</div>

<div id="self_location" style="display:none">
<label for="latitude">latitude:</label><br>
<input id="lat" type="text" name="lat" value="" maxlength="100" /><br>
<label for="longitude">longitude:</label><br>
<input id="log" type="text" name="log" value="" maxlength="100" />
<input id="self_loc_btn"class="add" value="search" type="button" onclick="getLocation()"  />
</div>

 <div id="fake_location" style="display:none">
<label for="latitude">latitude:</label><br>
<input id="lat2" type="text" name="lat" value="<?php echo $lat2; ?>" maxlength="100" /><br>
<label for="longitude">longitude:</label><br>
<input id="log2" type="text" name="log" value="<?php echo $log2; ?>" maxlength="100" />
<input id="fake_loc_btn"class="add" value="search" type="button"  />
</div>
<label for="state">state:</label><br>
<input type="text" name="state_name" value="" placeholder="None" maxlength="100" /><br>
<div>
<label for="tag">tag:</label><br>
<input type="text" name="tag_name" value="" placeholder="Any" maxlength="100" /><!--every note should have tag=any-->
<input id="btn1"class="add" value="add" type="button"  />
</div>
<div id="tag2" style="display:none;">
<label for="tag2">tag2:</label><br>
<input type="text" name="tag2_name" value="" maxlength="100" />
<input id="btn2"class="add" value="add" type="button"  />
</div>
<div  id="tag3" style="display:none;">
<label for="tag3">tag3:</label><br>
<input type="text" name="tag3_name" value="" maxlength="100" /><br>
</div>
<div>
<label for="location">location:</label><br>
<input type="text" name="location_name" value="" placeholder="Any" maxlength="100" />
<input id="btn3"class="add" value="add" type="button"  />
</div>
<div id="location2" style="display:none;">
<label for="location">location2:</label><br>
<input type="text" name="location2_name" value="" maxlength="100" /><br>
</div>




</div>
<hr />



 

<div>
	<p>Schedule</p>

	<div id="datetimepicker1" class="input-append">
	<label for="timefrom">start time:</label><br>
	<input data-format="hh:mm:ss" type="text" name="timefrom_name" value="" placeholder="00:00:00" maxlength="100" />
	<span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span>
  </div>
  <script type="text/javascript">
  $(function() {
    $('#datetimepicker1').datetimepicker({
      pickDate: false
    });
  });
</script>

<script type="text/javascript"
     src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
    </script> 
    <script type="text/javascript"
     src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
    </script>


	<div id="datetimepicker2" class="input-append">
	<label for="timeto">end time:</label><br>
	<input data-format="hh:mm:ss" type="text" name="timeto_name" value="" placeholder="24:00:00" maxlength="100" />
   <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span>
  </div>
  <script type="text/javascript">
  $(function() {
    $('#datetimepicker2').datetimepicker({
      pickDate: false
    });
  });
</script>


	<label for="repeatday">Repeat:</label><br>
	<select name="repeatday" >
	  <option value ="Any" >Any</option>  <!--any refer to null in the database-->
	  <option value ="Monday">Monday</option>
	  <option value ="Tuesday">Tuesday</option>
	  <option value ="Wednesday">Wednesday</option>
	  <option value ="Thursday">Thursday</option>
	  <option value ="Friday">Friday</option>
	  <option value ="Saturday">Saturday</option>
	  <option value ="Sunday">Sunday</option>
	</select>
	<input id="btn4"class="add" value="add" type="button"  />
</div>





<div id="sch2" style="display:none;">
	<p>Schedule2</p>
	<div id="datetimepicker3" class="input-append">
	<label for="timefrom">start time:</label><br>
	<input data-format="hh:mm:ss" type="text" name="timefrom_name2" value="" maxlength="100" />
	<span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span>
  </div>
   <script type="text/javascript">
  $(function() {
    $('#datetimepicker3').datetimepicker({
      pickDate: false
    });
  });
</script>

	<div id="datetimepicker4" class="input-append">
	<label for="timeto">end time:</label><br>
	<input data-format="hh:mm:ss" type="text" name="timeto_name2" value="" maxlength="100" />
	<span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span>
  </div>
   <script type="text/javascript">
  $(function() {
    $('#datetimepicker4').datetimepicker({
      pickDate: false
    });
  });
</script>



	<label for="repeatday">Repeat:</label><br>
	<select name="repeatday2">
	  <option value ="Any">Any</option>  <!--any refer to null in the database-->
	  <option value ="Monday">Monday</option>
	  <option value ="Tuesday">Tuesday</option>
	  <option value ="Wednesday">Wednesday</option>
	  <option value ="Thursday">Thursday</option>
	  <option value ="Friday">Friday</option>
	  <option value ="Saturday">Saturday</option>
	  <option value ="Sunday">Sunday</option>
	</select>
	<input id="btn5"class="add" value="add" type="button"  />
</div>





<div id="sch3" style="display:none;">
	<p>Schedule3</p>
	<div id="datetimepicker5" class="input-append">
	<label for="timefrom">start time:</label><br>
	<input data-format="hh:mm:ss"  type="text" name="timefrom_name3" value="" maxlength="100" />
	<span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span>
  </div>
  <script type="text/javascript">
  $(function() {
    $('#datetimepicker5').datetimepicker({
      pickDate: false
    });
  });
</script>


	<div id="datetimepicker6" class="input-append">
	<label for="timeto">end time:</label><br>
	<input data-format="hh:mm:ss"  type="text" name="timeto_name3" value="" maxlength="100" />
	<span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span>
  </div>
  <script type="text/javascript">
  $(function() {
    $('#datetimepicker6').datetimepicker({
      pickDate: false
    });
  });
</script>


	<label for="repeatday">Repeat:</label><br>
	<select name="repeatday3">
		<option value ="Any">Any</option>   <!--any refer to null in the database-->
	  <option value ="Monday">Monday</option>
	  <option value ="Tuesday">Tuesday</option>
	  <option value ="Wednesday">Wednesday</option>
	  <option value ="Thursday">Thursday</option>
	  <option value ="Friday">Friday</option>
	  <option value ="Saturday">Saturday</option>
	  <option value ="Sunday">Sunday</option>
	</select>
</div>

<div>
<input id="submit" type="submit" value="Submit" />
</div>
</fieldset>
</form>
</div>
</body>
</html>