	<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');
	
	$r = explode(' ', $config['submenu']);
	$y = @$r[0] == 'top' ? 'top' : '';
	$x = @$r[1] == 'left' ? 'left' : '';
	function menuuserlogin($menus, $y = '', $x = '', $level = -1) // $y = 'down' || 'top' AND $x = 'right'|| 'left'
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
						$act = in_array($menu['id'], $highlight) ? ' active' : '';
						$out .= '<li class="dropdown' . $act . '"><a role="button" data-toggle="dropdown" tabindex="-1" href="' . $menu['link'] . '" title="' . $menu['title'] . '"><div>' . $menu['title'] . ' </div><b class="caret"></b></a>' . $sub . '</li>';
					} else {
						$act = in_array($menu['id'], $highlight) ? ' class="active"' : '';
						$out .= '<li' . $act . '><a href="' . $menu['link'] . '" title="' . $menu['title'] . '"><div>' . $menu['title'] . '</div></a></li>';
					}
				}
				$output = '<div class="col-md-4 col-sm-12 text-right"><ul class="nav-icons' . $cls . '">' . $out . '</ul></div>';
			} else {
				$out = '';
				foreach ($menus as $menu) {
					$sub = call_user_func(__FUNCTION__, $menu['child'], $y, $x, ++$level);
					if (!empty($sub)) {
						$act = in_array($menu['id'], $highlight) ? ' active' : '';
						$out .= '<li class="dropdown-submenu' . $act . '"><a tabindex="-1" href="' . $menu['link'] . '" title="' . $menu['title'] . '">' . $menu['title'] . '</a>' . $sub . '</li>';
					} else {
						$act = in_array($menu['id'], $highlight) ? ' class="activ	e"' : '';
						$out .= '<li' . $act . '><a href="' . $menu['link'] . '" title="' . $menu['title'] . '">' . $menu['title'] . '</a></li>';
					}
				}
				$output = '<ul class="dropdown-menu" role="menu">' . $out . '</ul>';
			}
		}
		return $output;
	}

	echo menuuserlogin($menus, $y, $x);
	?>

	<!-- <div class="col-md-4 col-sm-12 text-right">
		<ul class="nav-icons">
			<li>
				<a href="register.html">
					<i class="ion-person-add"></i>
					<div>Register</div>
				</a>
			</li>
			<li>
				<a href="login.html">
					<i class="ion-person"></i>
					<div>Login</div>
				</a>
			</li>
		</ul>
	</div> -->