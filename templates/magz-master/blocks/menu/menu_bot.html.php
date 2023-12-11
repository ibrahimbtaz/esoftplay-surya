<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

$r = explode(' ', $config['submenu']);
$y = @$r[0] == 'top' ? 'top' : '';
$x = @$r[1] == 'left' ? 'left' : '';
?>

<div class="block">
	<div class="block-body no-margin">
		<?php echo magazine_horizontal_bot($menus, $y, $x); ?>
	</div>
</div>
<div class="line"></div>
<?php
$block->title = '';