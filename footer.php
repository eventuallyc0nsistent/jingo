<?php

	mysql_close(); // close db connectivity

?>
	</div>
<script type="text/javascript">

$(document).ready(function(){

	$("#signup").validate({
		rules: {
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