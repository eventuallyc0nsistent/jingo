<?php 

//Declare your key, secret key and callback URL variables (Without these, the api wont work at all)

$clientId ="5LENUVBOHJTM5EHQT11GZZYZVVWSRLIIL1WGSRBRF0RMXN2I";
$clientSecret = "BMGDMIILOH5FHOEY0UHYB2T2CQY1CRNYPQCCSF2ZCXYGG1CS";
$redirectUrl ="http://localhost/jingo/callback.php";

//Include the foursquare-async library:  (Remember, check your paths!)

require_once('EpiCurl.php');
require_once('EpiSequence.php');
require_once('EpiFoursquare.php');

?>