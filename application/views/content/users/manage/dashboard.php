<div class="spacer">
	<!-- Row starts -->
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<div class="panel no-margin">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-sx-12">
							<div class="img-responsive pull-left">
								<h5 class="panel-title"><img src="img/logo2.png" alt="Everest" /> Users Dashboard</h5>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-sx-12">
							<div class="pull-right">
								<a href="<?php echo site_url('users/record'); ?>" class="btn btn-info"><i class="fa fa-user"></i> <span class="hidden-xs">New User</span></a>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped no-margin">
							<thead>
									<tr>
											<th>User Name</th>
											<th>E-mail Address</th>
											<th>Date Created</th>
											<th>&nbsp;</th>
									</tr>
							</thead>
							<tbody>
								<?php foreach($users as $user): ?>
									<tr>
											<td><?php echo $user->handle; ?></td>
											<td><?php echo $user->email_address; ?></td>
											<td><?php echo $user->created; ?></td>
											<td><a href="<?php echo site_url('users/' . $user->id . '/record'); ?>"><i class="fa fa-pencil"></i> Edit</a> <a href="<?php echo site_url('users/' . $user->id . '/delete'); ?>"><i class="fa fa-trash-o"></i> Delete</a></td>
									</tr>
									<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>