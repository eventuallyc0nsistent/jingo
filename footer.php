
</div> <!-- close div.container -->

<?php mysql_close(); // close db connectivity ?>
<script type="text/javascript">

$(document).ready(function(){

	if(navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(success, error);
	} else {
		alert('Browser not compatible with HTML5');
	}

	// when successfully get the position of the user
	function success(position){
		var	lat = position.coords.latitude;
		var long = position.coords.longitude;
	}

	// ALERT error message when you can getCurrentPositon of user
	function error(msg){
		alert(msg);
	}


	$("#signup").validate({
		rules: {

			username : {
				required : true ,
				minlength : 2
			},
			firstname : {
					required : true,
					minlength : 2
			},
			lastname : {
					required : true,
					minlength : 2
			},
			signup_password : {
				required:true,
				minlength:5
			},
			confirm_password : {
				required:true,
				minlength:5,
				equalTo:"#signup_password"
			},
			email : {
					required : true,
					email : true
			}
		},
		messages: {
			username : "Minimum length 2 characters long",
			firstname:"Please enter a First name",
			lastname:"Please enter a Last name",
			email:{
				required:"Please enter a valid email",
			},
			signup_password :{
				required:"Please provide a password",
				minlength:"Password should be minimum 5 characters long"
			},
			confirm_password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long",
				equalTo:"Passwords don't match"
			},
		}
	});

});

</script>

</body>

</html>

