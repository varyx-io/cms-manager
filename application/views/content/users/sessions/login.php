<!-- Container Fluid starts -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-push-4 col-md-4 col-sm-push-3 col-sm-6 col-sx-12">
<?php echo validation_errors(); ?>
			<!-- Header end -->
			<div class="login-container">
				<div class="login-wrapper animated flipInY">
					<div id="login" class="show">
						<div class="login-header">
							<h4>Sign In To Your Account</h4>
						</div>
						<form action="<?php echo site_url('login'); ?>" method="post">
							<input type="hidden" name="login" value="true"/>
							<div class="form-group has-feedback">
								<label class="control-label" for="userHandle">User Name</label>
								<input type="text" name="user[handle]" class="form-control" id="userHandle" placeholder="User Name" autofocus>
								<i class="fa fa-user text-info form-control-feedback"></i>
							</div>
							<div class="form-group has-feedback">
								<label class="control-label" for="userPassphrase">Password</label>
								<input type="password" name="user[passphrase]" class="form-control" id="userPassphrase" placeholder="*********" >
								<i class="fa fa-key text-danger form-control-feedback"></i>
							</div>
							<input type="submit" value="Login" class="btn btn-danger btn-lg btn-block">
						</form>
						<a href="#forgot-pwd" class="underline text-info">Forgot Password?</a>
						<a href="#register">Don't have an account? <span class="text-danger">Sign Up</span></a>
					</div>

					<div id="register" class="form-action hide">
						<div class="login-header">
							<h4>Sign Up for Everest</h4>
						</div>
						<form action="index.html">
							<div class="form-group has-feedback">
								<label class="control-label" for="userName1">User Name</label>
								<input type="text" class="form-control" id="userName1">
								<i class="fa fa-user form-control-feedback"></i>
							</div>
							<div class="form-group has-feedback">
								<label class="control-label" for="password1">Password</label>
								<input type="text" class="form-control" id="password1">
								<i class="fa fa-key form-control-feedback"></i>
							</div>
							<div class="form-group has-feedback">
								<label class="control-label" for="password2">Confirm password</label>
								<input type="text" class="form-control" id="password2">
								<i class="fa fa-key form-control-feedback"></i>
							</div>
							<input type="submit" value="Sign Up" class="btn btn-danger btn-lg btn-block">
						</form>
						<a href="#login">Already have an account? <span class="text-danger">Sign In</span></a>
					</div>

					<div id="forgot-pwd" class="form-action hide">
						<div class="login-header">
							<h4>Reset your Password</h4>
						</div>
						<form action="index.html">
							<div class="form-group has-feedback">
								<label class="control-label" for="password3">Password</label>
								<input type="text" class="form-control" id="password3">
								<i class="fa fa-key form-control-feedback"></i>
							</div>
							<div class="form-group has-feedback">
								<label class="control-label" for="password4">Confirm password</label>
								<input type="text" class="form-control" id="password4">
								<i class="fa fa-key form-control-feedback"></i>
							</div>
							<input type="submit" value="Reset" class="btn btn-danger btn-lg btn-block">
						</form>
						<a href="#register">Don't have an account? <span class="text-danger">Sign Up</span></a>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- Container Fluid ends -->