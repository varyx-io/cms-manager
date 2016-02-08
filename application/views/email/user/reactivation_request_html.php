<!DOCTYPE html>
<html>
	<head>
		<title>Account Waiting For Activation</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body>
		<p>
			Dear <?php echo $user['first_name']; ?>,<br />
			<br />
			Your account still requires activation.
		</p>
		<table>
			<tr>
				<th>
					Username:
				</th>
				<td>
					<?php echo $user['handle']; ?>
				</td>
			</tr>
			<tr>
				<th>
					Set Password:
				</th>
				<td>
					<a href="<?php echo $activation_link; ?>">Click Here</a>
			</tr>
		</table>
		<p>
			To activate and maintain an account, you need to create a password and reset it periodically.<br />
			If the link above does not work, you may copy and past the link below into a web browser:<br />
			<br />
			<a href="<?php echo $activation_link; ?>"><?php echo $activation_link; ?></a>
		</p>
		<h3>Need Support?</h3>
		<p>
			If you have questions about this account, please email our support staff at <a href="mailto:support@varyx.io">support@varyx.io</a>.
			<br />
			-Var YX Support
		</p>
  </body>
</html>
