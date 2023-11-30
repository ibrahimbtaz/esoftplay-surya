<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

$r = explode(' ', $config['submenu']);
$y = @$r[0] == 'top' ? 'top' : '';
$x = @$r[1] == 'left' ? 'left' : '';
_func('magazine');
?>
<div class="container">
	<div class="brand">
		<a href="#">
			<img src="<?php echo 'images/' . $_CONFIG['site']['logo']; ?>" alt="Magz Logo">
		</a>
	</div>
	<div class="mobile-toggle">
		<a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
	</div>
	<div class="mobile-toggle">
		<a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i></a>
	</div>
	<?php
	echo magazine_horizontal_top($menus, $y, $x);
	?>
</div>
<?php
$block->title = '';
?>