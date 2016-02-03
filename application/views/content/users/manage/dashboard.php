	<!-- Row starts -->
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<div class="blog">
				<div class="blog-header">
					<h5 class="blog-title">Users</h5>
				</div>
				<div class="blog-body table-responsive">
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