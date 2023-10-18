<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

if ($user->id > 0) {
	echo 'You\'re Login as ' . $user->username;
} else {
?>
	<div class="col-md-4 col-sm-12 text-right">
		<ul class="nav-icons">
			<li><a href="register.html"><i class="ion-person-add"></i>
					<div>Register</div>
				</a></li>
			<li><a href="login.html"><i class="ion-person"></i>
					<div>Login</div>
				</a></li>
		</ul>
	</div>
<?php
}
