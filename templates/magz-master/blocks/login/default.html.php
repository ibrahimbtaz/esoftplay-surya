<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

if (empty($user->id > 0)) {
?>
	<ul class="nav-icons">
		<li>
			<a href="<?php echo site_url('user/register') ?>">
				<i class="ion-person-add"></i>
				<div><?php echo lang('Register') ?></div>
			</a>
		</li>
		<li>
			<a href="<?php echo site_url('user/login') ?>">
				<i class="ion-person"></i>
				<div><?php echo lang('Login') ?></div>
			</a>
		</li>
	</ul>
<?php
}
