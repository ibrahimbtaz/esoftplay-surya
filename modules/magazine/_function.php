<?php
function magazine_rating($value, $table = '', $table_id = '', $string_voter = 'voter', $string_db = '')
{
	$total_voters = $grade = 0;
	if (!empty($value)) {
		$r = explode(',', $value);
		$total_voters = array_sum($r);
		foreach ($r as $i => $voters) {
			$grade += $voters * ($i + 1);
		}
		$grade = ($grade > 0) ? round($grade / $total_voters, 1) : 0;
		$grade = floor($grade * 2) / 2;
	}
	ob_start();
	if (
		empty($table_id) || empty($table) ||
		!empty($_SESSION['bbc_rating'][$table][$table_id])
	) {
		echo '<a class="love">';
		for ($i = 1; $i <= 1; $i++) {
			$c = $grade <= $i ? '-o' : ($grade < ($i + 1) ? '-half-o' : '');
			echo icon('fa-heart' . $c);
		}
		echo '&nbsp;' . items($total_voters, $string_voter) . '</a>';
	} else {
		icon('fa-heart');
		$token = array(
			'table' => $table,
			'voter' => $string_voter,
			'db'    => $string_db,
		); 
		?>
		<input type="number" name="rating" class="rating" value="<?php echo $grade; ?>" data-id="<?php echo $table_id; ?>" data-token="<?php echo encode(json_encode($token)); ?>" data-append="&nbsp;<?php echo items($total_voters, $string_voter); ?>" style="display: none;" />
		<?php
		link_js('templates/admin/bootstrap/js/rating.js', false);
	}
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

function magazine_rating_grade($value, $table = '', $table_id = '', $string_voter = 'voter', $string_db = '')
{
	$total_voters = $grade = 0;
	if (!empty($value)) {
		$r = explode(',', $value);
		$total_voters = array_sum($r);
		foreach ($r as $i => $voters) {
			$grade += $voters * ($i + 1);
		}
		$grade = ($grade > 0) ? round($grade / $total_voters, 1) : 0;
		$grade = floor($grade * 2) / 2;
	}

	// Mengembalikan hanya nilai angka
	return $grade;
}

function magazine_horizontal_login($menus, $y = '', $x = '', $level = -1) // $y = 'down' || 'top' AND $x = 'right'|| 'left'
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

function magazine_horizontal_search($menus, $y = '', $x = '', $level = -1) // $y = 'down' || 'top' AND $x = 'right'|| 'left'
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
					$out .= '<li class="dropdown' . $act . '"><a role="button" data-toggle="dropdown" tabindex="-1" href="' . $menu['link'] . '" title="' . $menu['title'] . '">' . $menu['title'] . ' <b class="caret"></b></a>' . $sub . '</li>';
				} else {
					$act = in_array($menu['id'], $highlight) ? ' class="active"' : '';
					$out .= '<li' . $act . '><a href="' . $menu['link'] . '" title="' . $menu['title'] . '">' . $menu['title'] . '</a></li>';
				}
			}
			$output = '<ul class="' . $cls . '">' . $out . '</ul>';
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

function magazine_horizontal_top($menus, $y = '', $x = '', $level = -1) // $y = 'down' || 'top' AND $x = 'right'|| 'left'
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

function magazine_horizontal_bot($menus, $y = '', $x = '', $level = -1) // $y = 'down' || 'top' AND $x = 'right'|| 'left'
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
