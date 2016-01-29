	<!-- Row starts -->
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

		<?php echo form_open('', array('id' => 'edit-publisher')); ?>

			<div class="blog">
				<div class="blog-header">
					<h5 class="blog-title">User Account Information</h5>
				</div>
				<div class="blog-body table-responsive">
					<table class="table table-bordered table-striped table-condensed">
						<tbody>
							<tr>
								<th>
									<label for="inputUserEmailAddress" class="<?php if(strlen(form_error('user[email]')) > 0):?> error<?php endif; ?>"><i class="required">*</i>Email:</label>
								</th>
								<td>
									<input id="inputUserEmailAddress" type="text"  name="user[email_address]" value="<?php echo set_value('user[email]', $user['email']); ?>" class="input-xlarge<?php if(strlen(form_error('user[email]')) > 0):?> error popover-alert<?php endif; ?>"<?php if(strlen(form_error('user[email]')) > 0):?> data-content="<?php echo form_error('user[email]'); ?>" data-placement="right"<?php endif; ?> />
								</td>
							</tr>
							<tr>
								<th>
									<label for="inputUserHandle" class="<?php if(strlen(form_error('user[handle]')) > 0):?> error<?php endif; ?>"><i class="required">*</i>Username:</label>
								</th>
								<td>
									<input id="inputUserHandle" type="text" name="user[handle]"  value="<?php echo set_value('user[handle]', $user['handle']); ?>" class="input-xlarge<?php if(strlen(form_error('user[handle]')) > 0):?> error popover-alert<?php endif; ?>"<?php if(strlen(form_error('user[handle]')) > 0):?> data-content="<?php echo form_error('user[handle]'); ?>" data-placement="right"<?php endif; ?> />
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="blog-footer">
					<div class="center-text button-row">
						<a href="<?php echo site_url('users/manage/'.((!is_numeric($user['id'])) ? 'dashboard' : 'detail/'.$user['id'])); ?>" class="btn">Cancel Changes</a>
						<input type="submit" name="user-save" value="Save and Close" class="btn btn-primary" />
					</div>
				</div>
			</div>
	
		<?php echo form_close(); ?>
			
		</div>
	</div>