<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

?> 
<div class="col-md-3 col-sm-6 col-xs-12">
	<div class="block">
		<h1 class="block-title"><?php echo lang($block->title) ?>
		</h1>
		<div class="block-body">
			<p><?php echo lang($config['info']) ?></p>
			<form class="newsletter">
				<div class="input-group">
					<div class="input-group-addon">
						<i class="ion-ios-email-outline"></i>
					</div>
					<input type="email" class="form-control email" placeholder="<?php echo lang($config['caption']) ?>">
				</div>
				<button class="btn btn-primary btn-block white"><?php echo lang('Subscribe') ?></button>
			</form>
		</div>
	</div>
	<div class="line"></div>
	<div class="clearfix"></div>
</div>
<?php
$block->title = '';
