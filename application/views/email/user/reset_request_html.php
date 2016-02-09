<!DOCTYPE html>
<html>
	<head>
		<title>Password Reset Request</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body>
		<p>
			<?php echo $user['handle']; ?>,<br />
			<br />
			A password reset has been requested for your account.<br />
			<br />
			To reset your password, click on the following link.  Please note that this reset link will expire in 3 hours.  If you didn't issue a password reset, you should contact an admin immediately.<br />
			<br />
			<a href="<?php echo $reset_link; ?>"><?php echo $reset_link; ?></a>
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
					<a href="<?php echo $reset_link; ?>">Click Here</a>
			</tr>
		</table>
		<h3>Need Support?</h3>
		<p>
			If you have questions about this account, please email our support staff at <a href="mailto:support@varyx.io">support@varyx.io</a>.
			<br />
			-Var YX Support
		</p>
  </body>
</html>
