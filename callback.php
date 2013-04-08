<?php

require_once('header.php') ; 
require_once('include/4sq-async/4sq-inc.php') ;

$settoken=$_GET['code'];

//Start session and make some magic…
session_start();
$foursquareObj = new EpiFoursquare($clientId, $clientSecret);
$token = $foursquareObj->getAccessToken($settoken, $redirectUrl);
$foursquareObj->setAccessToken($token["access_token"]);


try {
	//Lets test it making a check in at Mt Rushmore…
	$params["venueId"]="3000225";  //We get this number from foursquare, its the id for each registered place.
	$params["shout"]="Testing the Foursquare API";  //And we make a shout, just for fun
	$params["broadcast"]="public";   //Who can see the post?
	$myvar=$foursquareObj->post('/checkins/add',$params);  //We make the call to the foursquareObj and send our params.



	//Making a call to the API
	$result = $foursquareObj->get('/venues/explore', array('near'=>'Chicago, IL'));
  	echo "<pre>" ;
  	print_r(json_decode($result->responseText));

} catch (Exception $e) {
	echo "<pre>";
	print_r("Error: ".$e) ;
	}


?>
<?php require_once('footer.php') ; ?>