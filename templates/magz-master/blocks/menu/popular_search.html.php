<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

function _horizontal_search($menus, $y = '', $x = '', $level = -1) // $y = 'down' || 'top' AND $x = 'right'|| 'left'
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

$r = explode(' ', $config['submenu']);
$y = @$r[0] == 'top' ? 'top' : '';
$x = @$r[1] == 'left' ? 'left' : '';

?>

<div class="search search_popular">
	<div class="help-block">
		<div><?php echo lang('Popular:') ?></div>
		<?php
		echo _horizontal_search($menus);
		?>
	</div>
</div>
<script>
	_Bbc(function($) {
		function periksaPosisi() {
			var divAtas = $(".search_top");
			var divBawah = $(".search_popular");

			if (divBawah.index() < divAtas.index()) {
				divBawah.css({"margin-top": "20px", "margin-bottom": "0"});
			} else {
				divBawah.css("margin-top", "0px"); // Atur kembali margin-top jika div bawah di bawah div atas
			}
			if (divAtas.index() < divBawah.index()) {
				divAtas.css({"margin-top": "20px", "margin-bottom": "0"});
			} else {
				divAtas.css("margin-top", "0px"); // Atur kembali margin-top jika div bawah di bawah div atas
			}
		}
		periksaPosisi();

		// Panggil fungsi periksaPosisi setiap 1 detik (1000ms)
		// setInterval(periksaPosisi, 1);
	});
</script>
<?php
$block->title = '';
?>