
</div> <!-- close div.container -->

<?php mysql_close(); // close db connectivity ?>
<script type="text/javascript">

$(document).ready(function(){

	// checkif the browser has geolocation or HTML5
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

	// submit find-user form on ENTER key
	$("#find-user input").keydown(function(e){
		if(e.keydown==13) {
			event.preventDefault();
			$("#find-user.php").submit();
		}
	});

	//add a friend 
	$('.add-friend').click(function(){

		var leaderid = $(this).attr('name');

		console.log(followerid);
		console.log(leaderid);
		$.ajax({
			url : "add_friend.php",
			type : "POST" ,
			data : "leaderid="+leaderid+"&followerid="+followerid+"&status="+status,
			success : function () {
				window.location.reload(true);
			}

		});

	});
	
	// validating using jQuery plugin for form validation
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

	$("#user-settings").validate({
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
				equalTo:"#user-settings-password"
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

