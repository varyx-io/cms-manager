<div class="login">
	<?php echo validation_errors(); ?>
	<form class="login__form" action="<?php echo site_url('login'); ?>" method="post">
		<input type="hidden" name="login" value="true"/>
			<div class="login__logo"></div>
			<div class="form-group">
				<input type="text" name="user[handle]" class="form-control" placeholder="Login" autofocus>
			</div>
			<div class="form-group">
				<input type="password" name="user[passphrase]" class="form-control" placeholder="Password" >
			</div>
			<div class="form-group login__action">
				<div class="checkbox login__remember">
					<input id="chb1" type="checkbox">
					<label for="chb1">Remember</label>
				</div>
				<div class="login__submit">
					<button type="submit" class="btn btn-default">Sign in</button>
				</div>
			</div>
	</form>
</div>

