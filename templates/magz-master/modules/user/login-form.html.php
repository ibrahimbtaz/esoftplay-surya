<?php
link_js('includes/lib/pea/includes/formIsRequire.js', false);
?>
<h2 class="form-signin-heading"><?php echo lang('Please sign in'); ?></h2>
<form class="form-signin formIsRequire" method="POST" action="">
	<div class="form-group">
		<label><?php echo lang('Username'); ?></label>
		<input class="form-control" placeholder="<?php echo lang('Username'); ?>" req="any true" autofocus="" type="username" name="usr" />
	</div>
	<div class="form-group">
		<label class="fw"><?php echo lang('Password'); ?>
			<a href="forgot.html" class="pull-right">Forgot Password?</a>
		</label>
		<input class="form-control" placeholder="<?php echo lang('Password'); ?>" req="any true" type="password" name="pwd" />
	</div>
	<div class="checkbox">
		<label>
			<input value="1" type="checkbox" name="rememberme" /> <?php echo lang('Remember me'); ?>
		</label>
	</div>
	<input type="hidden" name="url" value="<?php echo $user_url; ?>" />
	<div class="form-group text-right">
		<button class="btn btn-primary btn-block" type="submit"><?php echo lang('Login'); ?></button>
	</div>
	<div class="form-group text-center">
		<span class="text-muted">Don't have an account?</span> <a href="register.html">Create one</a>
	</div>
	<div class="title-line">
		or
	</div>
	<a href="#" class="btn btn-social btn-block facebook"><i class="ion-social-facebook"></i> Login with Facebook</a>
</form>