<div class="spacer">
	<!-- Row starts -->
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<div class="panel no-margin">
				<div class="panel-body">
					<?php echo form_open('', array('id' => 'edit-user')); ?>
						<fieldset>
							<legend>User Account Information</legend>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label class="control-label">Handle</label>
										<input type="text" name="user[handle]" value="<?php echo set_value('user[handle]', $user['handle']); ?>" class="form-control" />
									</div>
									<div class="col-md-6">
										<label class="control-label">E-mail Address</label>
										<input type="text" name="user[email_address]" value="<?php echo set_value('user[email_address]', $user['email_address']); ?>" class="form-control" />
									</div>
								</div>
							</div>
						</fieldset>


						<div class="form-group">
							<div class="col-lg-6 col-lg-offset-6">
								<button type="submit" class="btn btn-success">Save</button>
							</div>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<?php echo validation_errors(); ?>
		</div>
	</div>
</div>	
