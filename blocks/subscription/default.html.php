<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');
?>
<aside>
	<div class="aside-body">
		<form class="newsletter" action="" method="post">
			<div class="icon">
				<i class="ion-ios-email-outline"></i>
				<h1><?php echo lang($block->title) ?></h1>
			</div>
			<div class="input-group">
				<input type="email" name="email" class="form-control email" placeholder="<?php echo lang($config['caption']) ?>">
				<div class="input-group-btn">
					<button class="btn btn-primary" type="submit" name="submit"><i class="ion-paper-airplane"></i></button>
				</div>
			</div>
			<p><?php echo lang($config['info']) ?></p>
		</form>
	</div>
</aside>
<?php
$block->title = '';
