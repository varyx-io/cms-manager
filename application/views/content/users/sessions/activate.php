<!-- Container Fluid starts -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-push-4 col-md-4 col-sm-push-3 col-sm-6 col-sx-12">
<?php echo validation_errors(); ?>
			<!-- Header end -->
			<div class="login-container">
				<div class="login-wrapper animated flipInY">
					<div id="forgot-pwd" class="form-action">
						<div class="login-header">
							<h4>Activate Your Account</h4>
						</div>
						<?php echo form_open('', array('id' => 'reset_password_form', 'class' => 'form-signin')); ?>
						<input type="hidden" name="passphrase-save" value="true" />
							<div class="form-group has-feedback">
								<label class="control-label" for="password3">Password</label>
								<input type="password" class="form-control" id="password3" name="user_passphrase[passphrase]">
								<i class="fa fa-key form-control-feedback"></i>
							</div>
							<div class="form-group has-feedback">
								<label class="control-label" for="password4">Confirm password</label>
								<input type="password" name="user_passphrase[confirm]" class="form-control" id="password4">
								<i class="fa fa-key form-control-feedback"></i>
							</div>
							<input type="submit" value="Reset" class="btn btn-danger btn-lg btn-block">
						<?php echo form_close(); ?>
						<a href="#register">Don't have an account? <span class="text-danger">Sign Up</span></a>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- Container Fluid ends -->