
</div> <!-- close div.container -->
<script type="text/javascript">

$(document).ready(function(){

	// to get the location of the user
	$(function () {
		getLocation();
	});

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
				//window.location.reload(true);
				// $(this).attr('class','btn') ;
			}

		});

	});

	// accept friend
	$('.accept-friend').click(function(){

		var followerid = $(this).attr('name');

		console.log(followerid);
		console.log(leaderid);
		$.ajax({
			url : "accept_friend.php",
			type : "POST" ,
			data : "leaderid="+leaderid+"&followerid="+followerid+"&status="+status,
			success : function () {
				window.location.reload(true);
				// $(this).attr('class','btn') ;
			}

		});

	});

	// decline friend
	$('.decline-friend').click(function(){

		var followerid = $(this).attr('name');

		console.log(followerid);
		console.log(leaderid);
		$.ajax({
			url : "decline_friend.php",
			type : "POST" ,
			data : "leaderid="+leaderid+"&followerid="+followerid+"&status="+status,
			success : function () {
				window.location.reload(true);
				// $(this).attr('class','btn') ;
			}

		});

	});

	// validating notes
	$('#post-note').validate({
		rules : {
			note : {
				required : true ,
				maxlength : 140 ,
				minlength : 1
			}
		},
		messages : {
			note :  {
				minlength : "Message is empty",
				maxlength : "Message exceeds by 140 characters",
			}
		}
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

	$("#com").click(function(){
      $("#HCB_comment_box").toggle(500);
    });

   $("#com2").click(function(){
      $("#HCB_comment_box2").toggle(500);
    });

	$('.clickid').click(function(){
     	var id = $(this).attr('name');
    	$('#'+id).show(400);
    });

	// date time picker on user home page while posting
    $('#datetimepicker1').datetimepicker({
      pickDate: false
    });

    $('#datetimepicker2').datetimepicker({
      pickDate: false
    });

    $('#datefrompicker1').datetimepicker({
      pickTime: false
    });

     $('#datetopicker1').datetimepicker({
      pickTime: false
    });

});

</script>

</body>

</html>

