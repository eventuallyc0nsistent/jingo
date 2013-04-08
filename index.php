<?php 	

require_once('header.php') ; 
require_once('include/4sq-async/4sq-inc.php') ;

//And some code!
session_start();

$foursquareObj = new EpiFoursquare($clientId, $clientSecret);
$results = $foursquareObj->getAuthorizeUrl($redirectUrl);

?>
<div class="hero-unit">
 <h1>Whats our story ?</h1>
 
  <p>Suppose you discover a nice restaurant (by finding it on the web or by walking by it) and you think your friends might like this place. Or you find a nice pair of shoes in a shop window. It would be useful if you could post a note about this place, such that your friends (or maybe everybody) receive the note if they come within 300 yards of this place. Or maybe only if they come within 300 yards during lunch time.</p>
  <p>
    <a href="<?php echo $results ; ?>">
	  <img alt="Foursquare" src="https://playfoursquare.s3.amazonaws.com/press/logo/connect-blue.png">
	 </a>
  </p>
</div>
<?php require_once('footer.php') ; ?>
