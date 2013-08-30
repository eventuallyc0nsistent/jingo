<?php require_once('include/commons/header.php') ; ?>
	<div class ="hero-unit">
			<h1>Create a new user</h1>
			<p>
				Share your location with friends. Let them know what did you like the last time you went to that restaurant that they have been aching to go to.
			</p>

			   <div class="" id="loginModal">
          Username<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3>Have an Account?</h3>
          </div>
          <div class="modal-body">
            <div class="well">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                <li><a href="#create" data-toggle="tab">Create Account</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="login">
                  <form class="form-horizontal" action="login.php" method="POST">
                    <fieldset>
                      <div id="legend">
                        <legend class="">Login</legend>
                      </div>    
                      <div class="control-group">
                        <!-- Username -->
                        <label class="control-label"  for="login_username">Username</label>
                        <div class="controls">
                          <input type="text" id="login_username" name="login_username" placeholder="" class="input-xlarge">
                        </div>
                      </div>
 
                      <div class="control-group">
                        <!-- Password-->
                        <label class="control-label" for="login_password">Password</label>
                        <div class="controls">
                          <input type="password" id="login_password" name="login_password" placeholder="" class="input-xlarge">
                        </div>
                      </div>
 
 
                      <div class="control-group">
                        <!-- Button -->
                        <div class="controls">
                          <button class="btn btn-success">Login</button>
                        </div>
                      </div>
                    </fieldset>
                  </form>                
                </div>
                <div class="tab-pane fade" id="create">
                  <form id="signup" action="new_user.php" method="POST" class="cmxform">

                    <label for="username">Username</label>
                    <input id="username" type="text" value="" name="username" class="input-xlarge">

                    <label for="firstname">First Name</label>
                    <input id="firstname" type="text" value="" name="firstname" class="input-xlarge">

                    <label for="lastname">Last Name</label>
                    <input id="lastname" type="text" value="" name="lastname" class="input-xlarge">

                    <label for="email">Email</label>
                    <input id="email" type="email" value="" name="email" class="input-xlarge">

                    <label for="signup_password">Password</label>
                    <input id="signup_password" type="password" name="signup_password" class="input-xlarge">

                    <label for="confirm_password">Password again</label>
                    <input id="confirm_password" type="password" name="confirm_password" class="input-xlarge">

                    <div>
                      <input type="submit" class="btn btn-primary"/>
                    </div>

                  </form>
                </div>
            </div>
          </div>
        </div>
      </div>
	</div>
<?php require_once('include/commons/footer.php') ; ?>