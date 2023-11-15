<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

function _horizontal_top($menus, $y = '', $x = '', $level = -1) // $y = 'down' || 'top' AND $x = 'right'|| 'left'
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

			// buat menu untuk tablet
			$fortablet = '<li class="for-tablet nav-title"><a>' . lang('Menu') . '</a></li>
										<li class="for-tablet"><a href="' . site_url('user/login') . '">' . lang('Login') . '</a></li>
										<li class="for-tablet"><a href="' . site_url('user/register') . '">' . lang('Register') . '</a></li>';
			// harusnya bisa digabungin cuma kurang tau caranya

			foreach ($menus as $menu) {
				$sub = call_user_func(__FUNCTION__, $menu['child'], $y, $x, ++$level);
				if (!empty($sub)) {
					$act 	= in_array($menu['id'], $highlight) ? ' active' : '';
					$out .= '<li class="dropdown magz-dropdown"><a role="button" data-toggle="dropdown" tabindex="-1" href="' . $menu['link'] . '" title="' . $menu['title'] . '">' . $menu['title'] . ' <i class="ion-ios-arrow-right"></i></a>' . $sub . '</li>';
				} else {
					$act 	= in_array($menu['id'], $highlight) ? ' class="active"' : '';
					$out .= '<li' . $act . '><a href="' . $menu['link'] . '" title="' . $menu['title'] . '">' . $menu['title'] . '</a></li>';
				}
			}
			$output = '<div id="menu-list"><ul class="nav-list' . $cls . '">' . $fortablet . $out . '</ul></div>';
		} else {
			$out = '';
			foreach ($menus as $menu) {
				$sub = call_user_func(__FUNCTION__, $menu['child'], $y, $x, ++$level);
				if (!empty($sub)) {
					$act 	= in_array($menu['id'], $highlight) ? ' active' : '';
					$out .= '<li class="dropdown-submenu' . $act . ' "><a tabindex="-1" href="' . $menu['link'] . '" title="' . $menu['title'] . '">' . $menu['title'] . '</a>' . $sub . '</li>';
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
<div class="brand">
	<a href="#">
		<img src="<?php echo _URL; ?>templates/magz-master/images/logo.png" alt="Magz Logo">
	</a>
</div>
<div class="mobile-toggle">
	<a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
</div>
<div class="mobile-toggle">
	<a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i></a>
</div>
<?php
echo _horizontal_top($menus, $y, $x);
