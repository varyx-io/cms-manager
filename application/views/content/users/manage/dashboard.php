<div class="datalist page page_users users">
	<div class="row">
		<div class="col-md-9">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Users</h3>
				</div>
				<div class="panel-body">
					<p>You have <?php echo $count; ?> users.</p>
					<form class="datalist-filter">
						<div class="input-group datalist-filter__search">
							<input type="text" placeholder="Find user" class="form-control"><span class="input-group-btn">
								<button type="button" role="button" data-toggle="collapse" data-target="#datalist-filter__detail" aria-controls="users__filter-detail" aria-expanded="false" class="btn btn-default">
									<div class="fa fa-filter"></div>
								</button></span>
						</div>
						
						<div id="datalist-filter__detail" class="collapse">
							<div class="container-fluid datalist-filter__detail">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
												<input type="text" placeholder="Location" class="form-control datalist-filter__location">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group selectize__group">
												<div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
												<select placeholder="Email" class="datalist-filter__email"></select>
											</div>
										</div>
									</div>
									<div class="col-md-4 input-daterange">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-calendar-minus-o"></i></div>
												<input type="text" value="" class="form-control datalist-filter__from">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></div>
												<input type="text" value="" class="form-control datalist-filter__to">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<input id="datalist-filter__salary" type="text" name="" value="" class="slider">
										</div>
										<div class="form-group">
											<div class="checkbox checkbox-danger">
												<input id="datalist-filter__actives" type="checkbox">
												<label for="datalist-filter__actives">Actives only</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</form>
					<div class="datalist__result">
						<ul role="tablist" class="nav nav-tabs">
							<li role="presentation" class="active"><a href="#customers" aria-controls="customers" role="tab" data-toggle="tab">Customers&nbsp;</a></li>
							<li role="presentation"><a href="#managers" aria-controls="managers" role="tab" data-toggle="tab">Managers&nbsp;</a></li>
							<li role="presentation"><a href="#admins" aria-controls="admins" role="tab" data-toggle="tab">Admins&nbsp;</a></li>
							<li role="presentation"><a href="#new" aria-controls="new" role="tab" data-toggle="tab"><i class="fa fa-plus"></i>&nbsp;New</a></li>
						</ul>
						<div class="tab-content">
							<div id="new" role="tabpanel" class="tab-pane">
								<form action="<?php echo site_url('users/record'); ?>" class="form new-user" method="POST">
									<input type="hidden" name="user-save" value="true" />
									<div class="container-fluid">
										<div class="row">
											<div class="col-md-8">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<div class="input-group">
																<div class="input-group-addon"><i class="fa fa-user"></i></div>
																<input type="text" name="user[handle]" placeholder="Handle" class="form-control" />
															</div>
														</div>
														<div class="form-group">
															<div class="input-group">
																<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
																<input type="text" name="user[email_address]" placeholder="E-mail Address" class="form-control" />
															</div>
														</div>
														<div class="form-group">
															<div class="input-group">
																<div class="input-group-addon"><i class="fa fa-briefcase"></i></div>
																<select placeholder="Role" class="selectpicker">
																	<option value="customer">Customer</option>
																	<option value="manager">Manager</option>
																	<option value="admin">Admin</option>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<div class="input-group">
																<div class="input-group-addon"><i class="fa fa-key"></i></div>
																<input type="password" placeholder="Password" class="form-control">
															</div>
														</div>
														<div class="form-group">
															<div class="input-group">
																<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
																<input type="text" placeholder="Location" class="form-control">
															</div>
														</div>
														<div class="form-group">
															<div class="input-group">
																<div class="input-group-addon"><i class="fa fa-heartbeat"></i></div>
																<select placeholder="Status" class="selectpicker">
																	<option value="customer">Active</option>
																	<option value="manager">Confirmed</option>
																	<option value="admin">Blocked</option>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<textarea rows="3" placeholder="Notes" class="form-control"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="fileupload">
													<label>
														<div class="fa fa-image"></div>
														<input type="file">
													</label>
												</div>
											</div>
										</div>
									</div>
									<button class="btn btn-success">Save</button>
								</form>
							</div>

							<div id="customers" role="tabpanel" class="tab-pane active">
								<div class="scrollable scrollbar-macosx">
									<div class="container-fluid">
										<table width="100%" class="datalist__table table datatable display table-hover">
											<thead>
												<tr>
													<th class="users__table-id">#ID</th>
													<th class="users__table-name">Handle</th>
													<th class="users__table-location">Location</th>
													<th class="users__table-contact">E-mail Address</th>
													<th class="users__table-date">Date</th>
													<th class="users__table-salary">Salary</th>
													<th></th>
													<th></th>
													<th class="users__table-status">Status</th>
												</tr>
											</thead>
											<tbody>
												
												<?php foreach($users as $user): ?>
												<tr>
													<td><?php echo $user->id; ?></td>
													<td><?php echo $user->handle; ?></td>
													<td>Susaki</td>
													<td><?php echo $user->email_address; ?></td>
													<td><?php echo $user->created; ?></td>
													<td>$9001.67</td>
													<td>Customer</td>
													<td>[8, 1, 7, 7, 9, 7, 5, 4, 5, 7, 1, 7, 1, 9, 4, 8, 5, 2]</td>
													<td><?php echo ucwords($user->status); ?></td>
												</tr>
												<?php endforeach; ?>
												<tr>
													<td>5217</td>
													<td>Kimberly Garza</td>
													<td>Susaki</td>
													<td>kgarza1@google.it</td>
													<td>11/24/2015</td>
													<td>$9001.67</td>
													<td>Customer</td>
													<td>[8, 1, 7, 7, 9, 7, 5, 4, 5, 7, 1, 7, 1, 9, 4, 8, 5, 2]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>7632</td>
													<td>Kelly Gutierrez</td>
													<td>Boyeros</td>
													<td>kgutierrez5@baidu.com</td>
													<td>1/24/2015</td>
													<td>$3445.20</td>
													<td>Customer</td>
													<td>[7, 3, 2, 7, 5, 3, 3, 9, 9, 6, 2, 6, 4, 8, 3, 2, 1, 2]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>8019</td>
													<td>Deborah Gutierrez</td>
													<td>Sarongan</td>
													<td>dgutierrezb@csmonitor.com</td>
													<td>6/17/2015</td>
													<td>$18932.16</td>
													<td>Customer</td>
													<td>[5, 2, 0, 4, 1, 0, 3, 3, 6, 1, 2, 4, 5, 6, 6, 8, 3, 4]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>9969</td>
													<td>Paula Cox</td>
													<td>Dianfang</td>
													<td>pcoxe@newyorker.com</td>
													<td>5/23/2015</td>
													<td>$24361.71</td>
													<td>Customer</td>
													<td>[7, 9, 4, 3, 5, 3, 5, 9, 4, 0, 5, 5, 5, 7, 7, 4, 0, 2]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>3213</td>
													<td>Mary Cruz</td>
													<td>Ljukovo</td>
													<td>mcruzh@t.co</td>
													<td>3/12/2015</td>
													<td>$5079.81</td>
													<td>Customer</td>
													<td>[3, 7, 2, 4, 0, 9, 2, 4, 8, 3, 4, 1, 8, 7, 3, 3, 6, 6]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>4212</td>
													<td>Frank Fernandez</td>
													<td>Ituiutaba</td>
													<td>ffernandezi@washington.edu</td>
													<td>10/24/2015</td>
													<td>$8013.98</td>
													<td>Customer</td>
													<td>[9, 6, 2, 8, 9, 2, 3, 4, 4, 6, 3, 0, 0, 1, 2, 8, 9, 6]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>2387</td>
													<td>Carlos Sullivan</td>
													<td>Smidary</td>
													<td>csullivann@bluehost.com</td>
													<td>6/18/2015</td>
													<td>$24807.29</td>
													<td>Customer</td>
													<td>[0, 0, 8, 3, 5, 6, 1, 2, 5, 6, 9, 3, 8, 6, 2, 0, 5, 9]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>7782</td>
													<td>Samuel Stewart</td>
													<td>Tyoply Stan</td>
													<td>sstewartq@wufoo.com</td>
													<td>3/21/2015</td>
													<td>$3599.88</td>
													<td>Customer</td>
													<td>[2, 1, 2, 4, 0, 3, 2, 3, 3, 8, 8, 0, 5, 9, 8, 2, 1, 9]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>5625</td>
													<td>Todd Clark</td>
													<td>Muaralembu</td>
													<td>tclarkr@qq.com</td>
													<td>9/16/2015</td>
													<td>$4306.56</td>
													<td>Customer</td>
													<td>[5, 5, 4, 9, 9, 1, 2, 0, 1, 8, 2, 4, 7, 0, 3, 8, 5, 1]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>2748</td>
													<td>Ronald Fisher</td>
													<td>Jiangnan</td>
													<td>rfishers@yolasite.com</td>
													<td>6/21/2015</td>
													<td>$27881.35</td>
													<td>Customer</td>
													<td>[3, 0, 2, 8, 1, 8, 7, 9, 9, 4, 8, 1, 0, 9, 4, 7, 6, 4]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>6358</td>
													<td>Shirley Edwards</td>
													<td>Angra dos Reis</td>
													<td>sedwardsz@cam.ac.uk</td>
													<td>3/31/2015</td>
													<td>$17112.70</td>
													<td>Customer</td>
													<td>[6, 7, 9, 5, 0, 1, 7, 9, 8, 3, 0, 0, 7, 5, 6, 2, 9, 7]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>9373</td>
													<td>Lisa Walker</td>
													<td>Dashiren</td>
													<td>lwalker12@nih.gov</td>
													<td>3/6/2015</td>
													<td>$3569.21</td>
													<td>Customer</td>
													<td>[8, 7, 3, 8, 9, 3, 6, 8, 7, 8, 5, 0, 8, 0, 2, 2, 7, 4]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>1056</td>
													<td>Bobby Evans</td>
													<td>Libu</td>
													<td>bevans14@cbslocal.com</td>
													<td>12/31/2015</td>
													<td>$19022.33</td>
													<td>Customer</td>
													<td>[0, 8, 7, 9, 8, 5, 6, 9, 5, 6, 5, 4, 9, 3, 6, 9, 6, 9]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>4648</td>
													<td>Stephen Olson</td>
													<td>Sakura</td>
													<td>solson1b@google.cn</td>
													<td>3/27/2015</td>
													<td>$12482.44</td>
													<td>Customer</td>
													<td>[1, 1, 1, 4, 7, 3, 2, 6, 9, 3, 3, 0, 7, 7, 2, 0, 5, 8]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>2033</td>
													<td>Julie Payne</td>
													<td>Baini</td>
													<td>jpayne1d@indiegogo.com</td>
													<td>4/12/2015</td>
													<td>$23167.77</td>
													<td>Customer</td>
													<td>[6, 1, 0, 3, 3, 9, 3, 8, 8, 8, 2, 3, 1, 0, 2, 7, 3, 0]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>8348</td>
													<td>Larry Cole</td>
													<td>Rawang</td>
													<td>lcole1k@yahoo.com</td>
													<td>9/30/2015</td>
													<td>$5607.10</td>
													<td>Customer</td>
													<td>[0, 5, 2, 0, 4, 3, 6, 3, 7, 7, 3, 0, 8, 9, 3, 8, 4, 2]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>3309</td>
													<td>Carol Burton</td>
													<td>Huangtugang</td>
													<td>cburton1r@tinypic.com</td>
													<td>10/10/2015</td>
													<td>$11438.18</td>
													<td>Customer</td>
													<td>[4, 5, 7, 9, 8, 9, 1, 1, 7, 3, 6, 8, 0, 8, 9, 9, 4, 9]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>1366</td>
													<td>Shirley Chapman</td>
													<td>Delodpeken</td>
													<td>schapman1s@chronoengine.com</td>
													<td>11/2/2015</td>
													<td>$13104.18</td>
													<td>Customer</td>
													<td>[0, 5, 1, 2, 3, 3, 9, 3, 3, 7, 3, 7, 0, 1, 6, 4, 3, 3]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>9714</td>
													<td>Christopher Richards</td>
													<td>Ignacio Zaragoza</td>
													<td>crichards1t@ocn.ne.jp</td>
													<td>2/28/2015</td>
													<td>$21431.82</td>
													<td>Customer</td>
													<td>[7, 4, 1, 5, 6, 1, 5, 8, 4, 4, 5, 7, 3, 2, 2, 1, 9, 0]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>5397</td>
													<td>Angela Kennedy</td>
													<td>Nacimiento</td>
													<td>akennedy20@dot.gov</td>
													<td>12/2/2015</td>
													<td>$19285.15</td>
													<td>Customer</td>
													<td>[2, 8, 6, 8, 9, 0, 1, 8, 6, 5, 8, 1, 8, 9, 2, 1, 9, 7]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>5664</td>
													<td>Theresa Weaver</td>
													<td>Fangshan</td>
													<td>tweaver21@tamu.edu</td>
													<td>2/7/2015</td>
													<td>$18339.68</td>
													<td>Customer</td>
													<td>[2, 0, 1, 8, 7, 8, 2, 8, 1, 8, 1, 5, 9, 9, 4, 2, 0, 5]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>0522</td>
													<td>Gary Long</td>
													<td>Qianwei</td>
													<td>glong22@spotify.com</td>
													<td>7/12/2015</td>
													<td>$19481.19</td>
													<td>Customer</td>
													<td>[2, 3, 6, 7, 6, 7, 7, 7, 1, 3, 3, 6, 7, 6, 3, 1, 0, 9]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>7134</td>
													<td>Judy Shaw</td>
													<td>Ngchesar Hamlet</td>
													<td>jshaw23@surveymonkey.com</td>
													<td>2/8/2015</td>
													<td>$16721.12</td>
													<td>Customer</td>
													<td>[7, 6, 4, 7, 7, 3, 9, 2, 2, 1, 0, 9, 4, 2, 3, 1, 5, 7]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>4952</td>
													<td>Joan Day</td>
													<td>Saint Louis</td>
													<td>jday26@cargocollective.com</td>
													<td>3/1/2015</td>
													<td>$21866.64</td>
													<td>Customer</td>
													<td>[5, 3, 5, 6, 0, 9, 4, 5, 3, 4, 8, 0, 2, 7, 1, 0, 2, 8]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>2881</td>
													<td>Earl Berry</td>
													<td>Novo Hamburgo</td>
													<td>eberry2d@businessinsider.com</td>
													<td>5/10/2015</td>
													<td>$26251.10</td>
													<td>Customer</td>
													<td>[3, 4, 2, 3, 8, 7, 6, 1, 5, 3, 7, 5, 0, 3, 5, 3, 6, 9]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>6275</td>
													<td>Dennis Perry</td>
													<td>Freire</td>
													<td>dperry2g@elegantthemes.com</td>
													<td>8/12/2015</td>
													<td>$8352.67</td>
													<td>Customer</td>
													<td>[1, 7, 7, 3, 0, 2, 3, 7, 2, 7, 6, 9, 9, 1, 7, 6, 7, 2]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>3155</td>
													<td>Helen Ramirez</td>
													<td>Huangshi</td>
													<td>hramirez2k@geocities.com</td>
													<td>8/3/2015</td>
													<td>$7763.20</td>
													<td>Customer</td>
													<td>[4, 3, 8, 3, 9, 6, 0, 5, 8, 0, 9, 7, 3, 0, 7, 4, 2, 0]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>7713</td>
													<td>Wanda Watson</td>
													<td>Saint Pierre</td>
													<td>wwatson2q@webs.com</td>
													<td>4/27/2015</td>
													<td>$26747.96</td>
													<td>Customer</td>
													<td>[5, 0, 9, 1, 5, 0, 3, 7, 1, 9, 0, 2, 2, 2, 8, 5, 2, 5]</td>
													<td>Active</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div id="managers" role="tabpanel" class="tab-pane">
								<div class="scrollable scrollbar-macosx">
									<div class="container-fluid">
										<table width="100%" class="datalist__table table datatable display table-hover">
											<thead>
												<tr>
													<th class="users__table-id">#ID</th>
													<th class="users__table-name">Name</th>
													<th class="users__table-location">Location</th>
													<th class="users__table-contact">Contact</th>
													<th class="users__table-date">Date</th>
													<th class="users__table-salary">Salary</th>
													<th></th>
													<th></th>
													<th class="users__table-status">Status</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>5858</td>
													<td>Richard White</td>
													<td>Brody</td>
													<td>rwhite3@reuters.com</td>
													<td>1/3/2016</td>
													<td>$28633.51</td>
													<td>Manager</td>
													<td>[9, 7, 5, 8, 7, 0, 4, 0, 6, 7, 0, 1, 8, 1, 4, 4, 6, 0]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>9194</td>
													<td>Fred Hernandez</td>
													<td>Benito Juarez</td>
													<td>fhernandez6@rambler.ru</td>
													<td>11/25/2015</td>
													<td>$21544.86</td>
													<td>Manager</td>
													<td>[4, 2, 6, 6, 8, 8, 4, 2, 4, 4, 4, 1, 0, 5, 9, 1, 5, 5]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>1553</td>
													<td>Walter Austin</td>
													<td>Gaoyi</td>
													<td>waustin8@usa.gov</td>
													<td>5/3/2015</td>
													<td>$8514.95</td>
													<td>Manager</td>
													<td>[3, 8, 5, 4, 2, 9, 4, 0, 6, 2, 5, 4, 0, 2, 5, 6, 0, 3]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>2343</td>
													<td>Norma Montgomery</td>
													<td>Kruhlaye</td>
													<td>nmontgomery9@canalblog.com</td>
													<td>9/24/2015</td>
													<td>$11877.40</td>
													<td>Manager</td>
													<td>[9, 9, 4, 3, 0, 7, 7, 4, 3, 8, 8, 4, 6, 0, 3, 4, 7, 3]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>7267</td>
													<td>Arthur Richards</td>
													<td>Nizhnekamsk</td>
													<td>arichardsa@odnoklassniki.ru</td>
													<td>12/16/2015</td>
													<td>$7032.58</td>
													<td>Manager</td>
													<td>[6, 6, 5, 3, 1, 5, 2, 9, 4, 4, 9, 7, 7, 2, 3, 5, 6, 7]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>7218</td>
													<td>Mildred Ramos</td>
													<td>Yangmaogong</td>
													<td>mramosg@yellowbook.com</td>
													<td>4/20/2015</td>
													<td>$13010.70</td>
													<td>Manager</td>
													<td>[5, 8, 4, 3, 3, 6, 7, 3, 8, 8, 5, 3, 7, 4, 5, 8, 3, 6]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>0399</td>
													<td>Dorothy Fox</td>
													<td>Tangdukou</td>
													<td>dfoxm@mapquest.com</td>
													<td>1/30/2015</td>
													<td>$20212.23</td>
													<td>Manager</td>
													<td>[4, 9, 4, 6, 7, 0, 3, 9, 2, 4, 9, 0, 7, 6, 0, 3, 2, 7]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>3612</td>
													<td>Robin Richards</td>
													<td>Miskolc</td>
													<td>rrichardso@typepad.com</td>
													<td>6/9/2015</td>
													<td>$1984.22</td>
													<td>Manager</td>
													<td>[2, 1, 0, 7, 0, 7, 4, 0, 7, 7, 5, 5, 5, 3, 5, 3, 2, 7]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>9265</td>
													<td>Robert Thomas</td>
													<td>Resistencia</td>
													<td>rthomast@bigcartel.com</td>
													<td>5/25/2015</td>
													<td>$26091.32</td>
													<td>Manager</td>
													<td>[5, 7, 7, 4, 6, 6, 7, 2, 8, 7, 5, 6, 7, 7, 0, 7, 8, 9]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>1105</td>
													<td>Jean Romero</td>
													<td>Jargalant</td>
													<td>jromerou@blogtalkradio.com</td>
													<td>5/20/2015</td>
													<td>$26919.81</td>
													<td>Manager</td>
													<td>[0, 9, 6, 4, 7, 1, 9, 4, 2, 0, 9, 1, 6, 5, 0, 4, 5, 0]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>2391</td>
													<td>Julie Kelley</td>
													<td>Vilar do Monte</td>
													<td>jkelleyw@huffingtonpost.com</td>
													<td>5/2/2015</td>
													<td>$25867.10</td>
													<td>Manager</td>
													<td>[3, 2, 3, 6, 2, 1, 3, 0, 2, 9, 9, 8, 2, 6, 5, 8, 9, 7]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>8754</td>
													<td>Shirley Young</td>
													<td>Haibara</td>
													<td>syoung10@cbsnews.com</td>
													<td>11/4/2015</td>
													<td>$17387.03</td>
													<td>Manager</td>
													<td>[9, 4, 2, 4, 7, 9, 0, 6, 4, 0, 7, 2, 0, 8, 2, 8, 1, 0]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>5465</td>
													<td>Norma Gonzales</td>
													<td>Wedangtemu</td>
													<td>ngonzales13@yahoo.com</td>
													<td>6/25/2015</td>
													<td>$12059.73</td>
													<td>Manager</td>
													<td>[7, 7, 6, 6, 7, 8, 3, 8, 9, 3, 6, 9, 5, 2, 6, 8, 0, 8]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>8798</td>
													<td>Stephen Burke</td>
													<td>Kuala Lumpur</td>
													<td>sburke19@is.gd</td>
													<td>6/12/2015</td>
													<td>$7811.99</td>
													<td>Manager</td>
													<td>[4, 3, 9, 0, 2, 4, 0, 1, 5, 1, 6, 3, 2, 1, 4, 8, 0, 2]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>7620</td>
													<td>Donna Warren</td>
													<td>San Francisco de Yare</td>
													<td>dwarren1a@live.com</td>
													<td>5/23/2015</td>
													<td>$6634.65</td>
													<td>Manager</td>
													<td>[9, 3, 8, 1, 0, 7, 1, 0, 9, 0, 8, 7, 3, 8, 4, 8, 1, 3]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>0556</td>
													<td>Carolyn Howard</td>
													<td>Xixiang</td>
													<td>choward1g@sfgate.com</td>
													<td>7/30/2015</td>
													<td>$22302.36</td>
													<td>Manager</td>
													<td>[5, 7, 6, 9, 4, 4, 3, 3, 7, 6, 6, 3, 6, 1, 5, 4, 9, 8]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>3841</td>
													<td>Diana Washington</td>
													<td>Parreira</td>
													<td>dwashington1h@blogs.com</td>
													<td>9/20/2015</td>
													<td>$1901.76</td>
													<td>Manager</td>
													<td>[0, 9, 6, 2, 9, 3, 2, 8, 1, 6, 7, 6, 6, 1, 3, 2, 3, 3]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>8451</td>
													<td>Christina Wheeler</td>
													<td>Seredka</td>
													<td>cwheeler1j@symantec.com</td>
													<td>12/1/2015</td>
													<td>$21374.58</td>
													<td>Manager</td>
													<td>[0, 9, 9, 9, 8, 9, 0, 2, 7, 6, 3, 1, 3, 8, 2, 8, 2, 5]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>7177</td>
													<td>Marie Pierce</td>
													<td>Bayeman</td>
													<td>mpierce1m@shutterfly.com</td>
													<td>6/20/2015</td>
													<td>$29320.39</td>
													<td>Manager</td>
													<td>[6, 9, 8, 2, 1, 7, 0, 4, 1, 2, 8, 6, 6, 5, 1, 2, 1, 0]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>5321</td>
													<td>Betty Spencer</td>
													<td>Shayuan</td>
													<td>bspencer1p@paypal.com</td>
													<td>3/29/2015</td>
													<td>$10773.40</td>
													<td>Manager</td>
													<td>[2, 6, 9, 9, 1, 0, 0, 8, 5, 9, 9, 9, 9, 6, 5, 3, 3, 4]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>5611</td>
													<td>Lillian Smith</td>
													<td>Solna</td>
													<td>lsmith1q@nih.gov</td>
													<td>5/11/2015</td>
													<td>$28788.43</td>
													<td>Manager</td>
													<td>[7, 7, 3, 9, 4, 2, 7, 9, 9, 5, 2, 1, 7, 6, 3, 7, 6, 4]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>2286</td>
													<td>Dorothy Fowler</td>
													<td>Sebu</td>
													<td>dfowler1u@marketwatch.com</td>
													<td>6/17/2015</td>
													<td>$26634.74</td>
													<td>Manager</td>
													<td>[4, 1, 5, 9, 6, 3, 3, 4, 3, 9, 0, 5, 3, 8, 8, 0, 8, 4]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>1224</td>
													<td>Irene Bradley</td>
													<td>Licheng</td>
													<td>ibradley1v@wikipedia.org</td>
													<td>8/9/2015</td>
													<td>$15376.01</td>
													<td>Manager</td>
													<td>[1, 5, 9, 6, 7, 5, 7, 1, 6, 0, 5, 3, 0, 7, 8, 8, 7, 0]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>6274</td>
													<td>Elizabeth Reynolds</td>
													<td>Podstrana</td>
													<td>ereynolds1x@mit.edu</td>
													<td>4/25/2015</td>
													<td>$29635.51</td>
													<td>Manager</td>
													<td>[2, 6, 7, 8, 5, 0, 3, 0, 2, 0, 8, 1, 8, 9, 1, 2, 5, 4]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>7366</td>
													<td>Dorothy Fox</td>
													<td>Heping</td>
													<td>dfox1y@tripadvisor.com</td>
													<td>6/3/2015</td>
													<td>$20477.74</td>
													<td>Manager</td>
													<td>[8, 8, 0, 6, 8, 2, 0, 4, 0, 4, 0, 1, 4, 0, 8, 8, 7, 2]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>3949</td>
													<td>Jessica Coleman</td>
													<td>Campechuela</td>
													<td>jcoleman2e@xrea.com</td>
													<td>5/23/2015</td>
													<td>$27848.01</td>
													<td>Manager</td>
													<td>[4, 6, 5, 4, 7, 1, 0, 7, 2, 1, 7, 9, 5, 5, 8, 3, 5, 9]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>2951</td>
													<td>Phillip Freeman</td>
													<td>Liufang</td>
													<td>pfreeman2j@ibm.com</td>
													<td>7/5/2015</td>
													<td>$13755.10</td>
													<td>Manager</td>
													<td>[8, 9, 6, 5, 6, 2, 2, 9, 7, 1, 4, 9, 5, 5, 1, 0, 8, 3]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>5804</td>
													<td>Nancy Day</td>
													<td>Viseu</td>
													<td>nday2m@drupal.org</td>
													<td>2/23/2015</td>
													<td>$17527.10</td>
													<td>Manager</td>
													<td>[8, 2, 7, 1, 1, 3, 8, 2, 9, 9, 4, 7, 2, 8, 5, 7, 5, 6]</td>
													<td>Active</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div id="admins" role="tabpanel" class="tab-pane">
								<div class="scrollable scrollbar-macosx">
									<div class="container-fluid">
										<table width="100%" class="datalist__table table datatable display table-hover">
											<thead>
												<tr>
													<th class="users__table-id">#ID</th>
													<th class="users__table-name">Name</th>
													<th class="users__table-location">Location</th>
													<th class="users__table-contact">Contact</th>
													<th class="users__table-date">Date</th>
													<th class="users__table-salary">Salary</th>
													<th></th>
													<th></th>
													<th class="users__table-status">Status</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>9991</td>
													<td>Douglas Stevens</td>
													<td>Voiron</td>
													<td>dstevens0@tripadvisor.com</td>
													<td>9/13/2015</td>
													<td>$20705.16</td>
													<td>Admin</td>
													<td>[9, 6, 6, 7, 4, 5, 3, 1, 9, 0, 4, 2, 7, 1, 0, 7, 7, 6]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>6193</td>
													<td>William Sullivan</td>
													<td>Rungis</td>
													<td>wsullivan2@nydailynews.com</td>
													<td>7/9/2015</td>
													<td>$19482.56</td>
													<td>Admin</td>
													<td>[6, 6, 4, 2, 1, 0, 5, 9, 4, 3, 2, 6, 0, 6, 8, 5, 0, 7]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>6314</td>
													<td>Kimberly Warren</td>
													<td>Chengjiao</td>
													<td>kwarren4@engadget.com</td>
													<td>9/27/2015</td>
													<td>$9338.88</td>
													<td>Admin</td>
													<td>[9, 0, 6, 4, 9, 9, 4, 8, 8, 9, 8, 0, 5, 9, 2, 4, 7, 1]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>4420</td>
													<td>Jennifer Reynolds</td>
													<td>Primorskiy</td>
													<td>jreynolds7@foxnews.com</td>
													<td>4/4/2015</td>
													<td>$15742.75</td>
													<td>Admin</td>
													<td>[9, 5, 6, 0, 3, 0, 8, 1, 1, 8, 4, 3, 5, 2, 9, 8, 8, 5]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>8790</td>
													<td>Julia Hicks</td>
													<td>Daszewice</td>
													<td>jhicksc@springer.com</td>
													<td>2/5/2015</td>
													<td>$19875.40</td>
													<td>Admin</td>
													<td>[0, 4, 5, 3, 8, 8, 3, 4, 3, 2, 0, 9, 3, 2, 8, 1, 2, 3]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>6341</td>
													<td>Gloria Cook</td>
													<td>Podhum</td>
													<td>gcookj@geocities.jp</td>
													<td>6/27/2015</td>
													<td>$14724.11</td>
													<td>Admin</td>
													<td>[4, 4, 3, 4, 3, 9, 7, 0, 6, 0, 1, 5, 4, 1, 3, 7, 5, 7]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>0646</td>
													<td>Tammy Ross</td>
													<td>Neietsu</td>
													<td>trossl@admin.ch</td>
													<td>3/14/2015</td>
													<td>$16340.46</td>
													<td>Admin</td>
													<td>[9, 8, 9, 4, 3, 5, 8, 5, 2, 6, 0, 4, 0, 5, 8, 3, 5, 8]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>8090</td>
													<td>Samuel Young</td>
													<td>Tilburg</td>
													<td>syoungx@vk.com</td>
													<td>5/5/2015</td>
													<td>$27611.84</td>
													<td>Admin</td>
													<td>[0, 9, 5, 2, 6, 3, 4, 5, 5, 2, 4, 9, 0, 8, 7, 8, 2, 8]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>9793</td>
													<td>Nicole Perez</td>
													<td>Watoona</td>
													<td>nperez11@npr.org</td>
													<td>3/24/2015</td>
													<td>$21375.56</td>
													<td>Admin</td>
													<td>[8, 3, 8, 9, 4, 8, 2, 4, 7, 3, 7, 8, 2, 9, 6, 5, 4, 4]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>4258</td>
													<td>Victor Lynch</td>
													<td>Meylan</td>
													<td>vlynch15@craigslist.org</td>
													<td>7/4/2015</td>
													<td>$12560.31</td>
													<td>Admin</td>
													<td>[6, 7, 4, 5, 3, 6, 4, 1, 8, 2, 6, 9, 3, 6, 2, 0, 8, 7]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>9441</td>
													<td>Harry Shaw</td>
													<td>Old Shinyanga</td>
													<td>hshaw16@java.com</td>
													<td>8/23/2015</td>
													<td>$6158.76</td>
													<td>Admin</td>
													<td>[1, 2, 5, 3, 6, 7, 4, 3, 0, 3, 4, 4, 7, 6, 4, 1, 2, 3]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>1704</td>
													<td>Michael Peters</td>
													<td>Wringinsari</td>
													<td>mpeters1c@1688.com</td>
													<td>6/27/2015</td>
													<td>$25229.82</td>
													<td>Admin</td>
													<td>[5, 4, 0, 0, 7, 5, 9, 8, 5, 3, 3, 1, 4, 8, 3, 5, 6, 8]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>7689</td>
													<td>Eugene Fernandez</td>
													<td>Heshan</td>
													<td>efernandez1i@usda.gov</td>
													<td>10/19/2015</td>
													<td>$28109.26</td>
													<td>Admin</td>
													<td>[2, 0, 4, 8, 0, 5, 8, 9, 7, 7, 7, 4, 0, 8, 7, 7, 9, 8]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>6426</td>
													<td>Donald Cook</td>
													<td>La Carlota</td>
													<td>dcook1l@msu.edu</td>
													<td>2/7/2015</td>
													<td>$17238.34</td>
													<td>Admin</td>
													<td>[8, 3, 2, 5, 2, 5, 2, 4, 3, 9, 8, 5, 8, 3, 5, 2, 3, 8]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>3247</td>
													<td>Mary Graham</td>
													<td>Evinayong</td>
													<td>mgraham1n@comcast.net</td>
													<td>9/30/2015</td>
													<td>$7407.78</td>
													<td>Admin</td>
													<td>[0, 6, 6, 7, 9, 1, 2, 0, 5, 5, 4, 8, 4, 8, 0, 3, 9, 0]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>7326</td>
													<td>Angela Larson</td>
													<td>Phatthana Nikhom</td>
													<td>alarson1o@slideshare.net</td>
													<td>2/26/2015</td>
													<td>$19318.43</td>
													<td>Admin</td>
													<td>[2, 1, 3, 4, 9, 3, 9, 6, 7, 1, 5, 3, 5, 0, 1, 0, 9, 5]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>2675</td>
													<td>Cynthia Stewart</td>
													<td>Rumburk</td>
													<td>cstewart1w@bandcamp.com</td>
													<td>3/31/2015</td>
													<td>$3494.88</td>
													<td>Admin</td>
													<td>[8, 0, 9, 1, 6, 3, 2, 3, 9, 6, 1, 6, 3, 8, 0, 0, 7, 3]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>7347</td>
													<td>Evelyn Welch</td>
													<td>Quintas</td>
													<td>ewelch24@umich.edu</td>
													<td>4/3/2015</td>
													<td>$4141.18</td>
													<td>Admin</td>
													<td>[2, 6, 9, 3, 3, 1, 4, 1, 5, 9, 5, 3, 7, 7, 8, 1, 4, 1]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>2976</td>
													<td>Patrick Bennett</td>
													<td>Houston</td>
													<td>pbennett25@lulu.com</td>
													<td>11/30/2015</td>
													<td>$17849.01</td>
													<td>Admin</td>
													<td>[2, 4, 8, 5, 3, 4, 0, 8, 1, 0, 5, 5, 6, 6, 7, 9, 8, 6]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>9767</td>
													<td>Patricia Gray</td>
													<td>Montpellier</td>
													<td>pgray27@blinklist.com</td>
													<td>8/5/2015</td>
													<td>$8233.93</td>
													<td>Admin</td>
													<td>[0, 6, 0, 2, 1, 9, 3, 8, 4, 1, 3, 4, 4, 2, 7, 2, 6, 7]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>7945</td>
													<td>Roy Hart</td>
													<td>Akzhal</td>
													<td>rhart2c@gizmodo.com</td>
													<td>7/16/2015</td>
													<td>$28796.39</td>
													<td>Admin</td>
													<td>[9, 1, 5, 3, 5, 7, 4, 2, 2, 6, 3, 5, 4, 7, 0, 6, 8, 0]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>6530</td>
													<td>Angela Allen</td>
													<td>Santa Eulalia</td>
													<td>aallen2f@foxnews.com</td>
													<td>6/21/2015</td>
													<td>$26793.07</td>
													<td>Admin</td>
													<td>[1, 0, 5, 9, 2, 3, 4, 6, 6, 8, 9, 1, 2, 8, 9, 7, 7, 8]</td>
													<td>Inactive</td>
												</tr>
												<tr>
													<td>0894</td>
													<td>Jean Schmidt</td>
													<td>Prapen</td>
													<td>jschmidt2h@oakley.com</td>
													<td>2/3/2015</td>
													<td>$20548.59</td>
													<td>Admin</td>
													<td>[0, 4, 5, 5, 5, 9, 4, 6, 5, 5, 7, 0, 5, 7, 0, 9, 9, 6]</td>
													<td>Active</td>
												</tr>
												<tr>
													<td>0341</td>
													<td>Wayne Ward</td>
													<td>La Suiza</td>
													<td>wward2p@homestead.com</td>
													<td>6/5/2015</td>
													<td>$28737.41</td>
													<td>Admin</td>
													<td>[8, 2, 4, 3, 2, 8, 1, 9, 8, 3, 3, 7, 1, 0, 3, 6, 6, 9]</td>
													<td>Inactive</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="users-preview datalist-preview">
				<div class="users-preview__cont">
					<div title="Name" class="users-preview__name">Name</div>
					<div class="users-preview__data">
						<div class="users-preview__photo">
							<div style=""></div>
						</div>
						<div class="users-preview__info">
							<div class="users-preview__position">Position</div>
							<div class="users-preview__stat sparkline"></div>
							<div class="users-preview__edit">
								<div class="btn-group btn-group-sm">
									<button type="button" class="btn btn-danger">Edit</button>
									<button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-danger dropdown-toggle"><span class="caret"></span></button>
									<ul class="dropdown-menu">
										<li><a class="users-preview__detail" href="#">Details</a></li>
										<li><a class="users-preview__reset" href="#">Reset</a></li>
										<li><a class="users-preview__disable" href="#">Disable</a></li>
										<li><a class="users-preview__delete" href="#">Delete</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="users-preview__props">
						<div title="Location" class="users-preview__prop"><i class="fa fa-map-marker"></i><span class="users-preview__location">Location</span></div>
						<div title="Contact" class="users-preview__prop"><i class="fa fa-envelope"></i><span class="users-preview__contact">Contact</span></div>
						<div class="users-preview__prop"><i class="fa fa-calendar"></i><span class="users-preview__date">Date</span></div>
						<div class="users-preview__prop"><i class="fa fa-heartbeat"></i><span class="users-preview__status">Status</span></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>