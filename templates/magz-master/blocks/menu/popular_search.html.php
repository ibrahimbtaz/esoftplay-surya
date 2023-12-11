<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');



$r = explode(' ', $config['submenu']);
$y = @$r[0] == 'top' ? 'top' : '';
$x = @$r[1] == 'left' ? 'left' : '';

?>

<div class="search search_popular">
	<div class="help-block">
		<div><?php echo lang('Popular:') ?></div>
		<?php
		echo magazine_horizontal_search($menus);
		?>
	</div>
</div>
<?php
$block->title = '';