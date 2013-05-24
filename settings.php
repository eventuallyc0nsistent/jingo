<?php require_once('header.php'); 

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

// get user details for setting profile
$query2 = "SELECT firstname  , lastname  , email  , username FROM USER where uid = '".$uid."'" ;
$result2 = $mysqli->query($query);
$row2 = $result2->fetch_array();

if ($_POST) {

	$firstname  = $_POST['firstname'];
	$lastname   = $_POST['lastname'];
	$email		= $_POST['email'];
	$password	= md5($_POST['signup_password']);
	$username	= $_POST['username'];	

	$_SESSION['username'] = $username ;
	
	$query4 = "UPDATE USER SET firstname ='".$firstname."',lastname ='".$lastname."', email='".$email."',password='".$password."', username='".$username."' WHERE uid='".$uid."'";

	$mysqli->query($query4);

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
		
	</div>
</div>

<div class="span6 well">

<form id="user-settings" class="form-horizontal" action='settings.php' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">User Settings</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Username</label>
      <div class="controls">
        <input type="text" id="username" name="username" value="<?php echo $row2['username'] ; ?>" class="input-xlarge">
      </div>
    </div>
     <div class="control-group">
      <!-- First Name -->
      <label class="control-label"  for="firstname">First Name</label>
      <div class="controls">
        <input type="text" id="firstname" name="firstname" value="<?php echo $row2['firstname'] ; ?>" class="input-xlarge">
      </div>
    </div>
     <div class="control-group">
      <!-- Last Name -->
      <label class="control-label"  for="lastname">Last Name</label>
      <div class="controls">
        <input type="text" id="lastname" name="lastname" value="<?php echo $row2['lastname'] ; ?>" class="input-xlarge">
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" value="<?php echo $row2['email'] ; ?>" class="input-xlarge">
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="user-settings-password" name="password" placeholder="" class="input-xlarge">
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="confirm_password">Password (Confirm)</label>
      <div class="controls">
        <input type="password" id="confirm_password" name="confirm_password" placeholder="" class="input-xlarge">
      </div>
    </div>
 
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

<?php require_once('footer.php') ; ?>