<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

function _horizontal_login($menus, $y = '', $x = '', $level = -1) // $y = 'down' || 'top' AND $x = 'right'|| 'left'
{
	global $user;
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
					$act = in_array($menu['id'], $highlight) ? ' active' : '';
					$out .= '<li class="' . $act . '"><a role="button" data-toggle="dropdown" tabindex="-1" href="' . $menu['link'] . '" title="' . $menu['title'] . '">' . $menu['title'] . ' <b class="caret"></b></a>' . $sub . '</li>';
				} else {
					$act = in_array($menu['id'], $highlight) ? ' class="active"' : '';
					$out .= '<li' . $act . '><a href="' . $menu['link'] . '" title="' . $menu['title'] . '">' . $menu['title'] . '</a></li>';
				}
			}
			$output = '<ul class="nav-icons text-right nav_username">
									<li class="dropdown magz-dropdown">
										<a role="button" data-toggle="dropdown" tabindex="-1" href="' . $menu['link'] . '" title="' . $menu['title'] . '"><div>' . $user->username . '</div><b class="caret"></b></a>
										<ul class="dropdown-menu pull-right" role="menu"' . $cls . '">' . $out . '</ul>
									</li>
								</ul>';
		} else {
			$out = '';
			foreach ($menus as $menu) {
				$sub = call_user_func(__FUNCTION__, $menu['child'], $y, $x, ++$level);
				if (!empty($sub)) {
					$act = in_array($menu['id'], $highlight) ? ' active' : '';
					$out .= '<li class="dropdown-submenu' . $act . '"><a tabindex="-1" href="' . $menu['link'] . '" title="' . $menu['title'] . '">' . $menu['title'] . '</a>' . $sub . '</li>';
				} else {
					$act = in_array($menu['id'], $highlight) ? ' class="active"' : '';
					$out .= '<li' . $act . '><a href="' . $menu['link'] . '" title="' . $menu['title'] . '">' . $menu['title'] . '</a></li>';
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

echo _horizontal_login($menus, $y, $x);