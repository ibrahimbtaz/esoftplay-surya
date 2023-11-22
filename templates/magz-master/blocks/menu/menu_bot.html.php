<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

function _horizontal_bot($menus, $y = '', $x = '', $level = -1) // $y = 'down' || 'top' AND $x = 'right'|| 'left'
{
	$output = '';
	if (!empty($menus)) {
		$highlight = menu_parent_ids(@$_GET['menu_id'], $menus);
		if ($level == -1) {
			$output = call_user_func(__FUNCTION__, menu_parse($menus), $y, $x, ++$level);
		} else
		if (empty($level)) {
			$cls = !empty($y) ? ' nav-' . $y : '';
			$cls .= !empty($x) ? ' nav-' . $x : '';
			$out = '';

			foreach ($menus as $menu) {
				$sub = call_user_func(__FUNCTION__, $menu['child'], $y, $x, ++$level);
				if (!empty($sub)) {
					$act 	= in_array($menu['id'], $highlight) ? ' active' : '';
					$out .= '<li><a role="button" data-toggle="dropdown" tabindex="-1" href="' . $menu['link'] . '" title="' . $menu['title'] . '">' . $menu['title'] . ' <i class="ion-ios-arrow-right"></i></a>' . $sub . '</li>';
				} else {
					$act 	= in_array($menu['id'], $highlight) ? ' class="active"' : '';
					$out .= '<li' . $act . '><a href="' . $menu['link'] . '" title="' . $menu['title'] . '">' . $menu['title'] . '</a></li>';
				}
			}
			$output = '<ul class="footer-nav-horizontal' . $cls . '">' . $out . '</ul>';
		} else {
			$out = '';
			foreach ($menus as $menu) {
				$sub = call_user_func(__FUNCTION__, $menu['child'], $y, $x, ++$level);
				if (!empty($sub)) {
					$act 	= in_array($menu['id'], $highlight) ? ' active' : '';
					$out .= '<li class="' . $act . ' "><a tabindex="-1" href="' . $menu['link'] . '" title="' . $menu['title'] . '">' . $menu['title'] . '</a>' . $sub . '</li>';
				} else {
					$act 	= in_array($menu['id'], $highlight) ? ' class="active"' : '';
					$out .= '<li' . $act . ' ><a href="' . $menu['link'] . '" title="' . $menu['title'] . '">' . $menu['title'] . '</a></li>';
				}
			}
			$output = '<ul class="dropdown-menu" role="menu">' . $out . '</ul>';
		}
	}
	return $output;
}

$r = explode(' ', $config['submenu']);
$y = @$r[0] == 'top' ? 'top' : '';
$x = @$r[1] == 'left' ? 'left' : '';
?>

<div class="col-md-3 col-xs-12 col-sm-6">
	<div class="block">
		<div class="block-body no-margin">
			<?php echo _horizontal_bot($menus, $y, $x); ?>
		</div>
	</div>
</div>

<?php 
$block->title = '';
?>