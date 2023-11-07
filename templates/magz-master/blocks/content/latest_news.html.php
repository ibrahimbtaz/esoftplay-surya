<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

function _content_without_thumbnail($src, $is_imgsrc = false, $is_large_image = false)
{
	$output = '';
	$path   = 'images/modules/content/images/';
	if (is_url($src)) {
		$output = $src;
	} else
	if (_class('images')->exists(_ROOT . $src)) {
		$output = _URL . $src;
	} else
	if ($is_large_image && _class('images')->exists(_ROOT . $path . 'p_' . $src)) {
		$output = _URL . $path . 'p_' . $src;
	} else
	if (_class('images')->exists(_ROOT . $path . $src)) {
		$output = _URL . $path . $src;
	} else {
		$p = 'images/modules/content/' . get_config('content', 'manage', 'images');
		if (_class('images')->exists(_ROOT . $p)) {
			$output = _URL . $p;
		}
	}
	if ($is_imgsrc) {
		$tag = is_string($is_imgsrc) ? $is_imgsrc : ' class=""';
		$output = image($output, '', $tag);
	}
	return $output;
}

// function _icon_ion($value = 'edit', $alt = '', $extra = '')
// {
// 	if (empty($alt)) {
// 		$alt = str_replace('-', ' ', $value);
// 		if (substr($value, 0, 3) == 'fa-') {
// 			$alt = substr($alt, 3);
// 		}
// 		if (substr($alt, -2) == ' o') {
// 			$alt = substr($alt, 0, -2);
// 		}
// 	}
// 	if (!empty($extra)) {
// 		if (substr($extra, 0, 1) != ' ') {
// 			$extra = ' ' . $extra;
// 		}
// 	}
// 	if (substr($value, 0, 3) == 'ion-') {
// 		link_css(_ROOT . 'templates/magz-master/css/scripts/ionicons/css/ionicons.min.css');
// 		return '<i class="ion' . $value . '" title="' . $alt . '"' . $extra . '></i>';
// 	}
// 	$class = '';
// 	$old_icon = array(
// 		'add'      => 'plus', 'disable'  => 'ban-circle', 'download' => 'cloud-download', 'enable'   => 'ok-circle', 'help'     => 'question-sign', 'image'    => 'picture', 'inactive' => 'eye-close', 'login'    => 'log-in', 'mail'     => 'envelope', 'right'    => 'ok-sign', 'tooltip'  => 'info-sign', 'unknown'  => 'file', 'update'   => 'check', 'upload'   => 'cloud-upload', 'warn'     => 'warning-sign'
// 	);
// 	if (isset($old_icon[$value])) {
// 		$class = $old_icon[$value];
// 	}
// 	if (empty($class)) {
// 		// include dirname(__FILE__).'/../config/icons.php';
// 		$class = $value;
// 	}
// 	return '<span class="glyphicon glyphicon-' . $class . '" title="' . $alt . '"' . $extra . '></span>';
// }


function _rating_love($value, $table = '', $table_id = '', $string_voter = 'voter', $string_db = '')
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

### TEMPLATES ####
?>
<!-- <div class="line">
	<div>Latest News</div>
</div>
<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="row">
			<article class="article col-md-12">
				<div class="inner">
					<figure>
						<a href="single.html">
							<img src="templates/magz-master/images/news/img10.jpg" alt="Sample Article">
						</a>
					</figure>
					<div class="padding">
						<div class="detail">
							<div class="time">December 10, 2016</div>
							<div class="category"><a href="category.html">Healthy</a></div>
						</div>
						<h2><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
							labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
						<footer>
							<a href="#" class="love"><i class="ion-android-favorite-outline"></i>
								<div>1263</div>
							</a>
							<a class="btn btn-primary more" href="single.html">
								<div>More</div>
								<div><i class="ion-ios-arrow-thin-right"></i></div>
							</a>
						</footer>
					</div>
				</div>
			</article>
			<article class="article col-md-12">
				<div class="inner">
					<figure>
						<a href="single.html">
							<img src="templates/magz-master/images/news/img06.jpg" alt="Sample Article">
						</a>
					</figure>
					<div class="padding">
						<div class="detail">
							<div class="time">December 22, 2016</div>
							<div class="category"><a href="category.html">Healthy</a></div>
						</div>
						<h2><a href="single.html">Exercitation ullamco laboris nisi ut aliquip</a></h2>
						<p>Maecenas accumsan tortor ut velit pharetra mollis. Proin eu nisl et arcu iaculis placerat
							sollicitudin ut est. In fringilla dui dui.</p>
						<footer>
							<a href="#" class="love"><i class="ion-android-favorite-outline"></i>
								<div>327</div>
							</a>
							<a class="btn btn-primary more" href="single.html">
								<div>More</div>
								<div><i class="ion-ios-arrow-thin-right"></i></div>
							</a>
						</footer>
					</div>
				</div>
			</article>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="row">
			<article class="article col-md-12">
				<div class="inner">
					<figure>
						<a href="single.html">
							<img src="templates/magz-master/images/news/img05.jpg" alt="Sample Article">
						</a>
					</figure>
					<div class="padding">
						<div class="detail">
							<div class="time">December 09, 2016</div>
							<div class="category"><a href="category.html">Lifestyle</a></div>
						</div>
						<h2><a href="single.html">Mauris elementum libero at pharetra auctor</a></h2>
						<p>Vivamus in efficitur mi. Nullam semper justo ut elit lacinia lacinia. Class aptent taciti
							sociosqu ad litora torquent per conubia nostra.</p>
						<footer>
							<a href="#" class="love"><i class="ion-android-favorite-outline"></i>
								<div>1083</div>
							</a>
							<a class="btn btn-primary more" href="single.html">
								<div>More</div>
								<div><i class="ion-ios-arrow-thin-right"></i></div>
							</a>
						</footer>
					</div>
				</div>
			</article>
			<article class="article col-md-12">
				<div class="inner">
					<figure>
						<a href="single.html">
							<img src="templates/magz-master/images/news/img07.jpg" alt="Sample Article">
						</a>
					</figure>
					<div class="padding">
						<div class="detail">
							<div class="time">December 21, 2016</div>
							<div class="category"><a href="category.html">Sport</a></div>
						</div>
						<h2><a href="single.html">Sed do eiusmod tempor incididunt ut labore</a></h2>
						<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
							Mauris elementum libero at pharetra auctor.</p>
						<footer>
							<a href="#" class="love"><i class="ion-android-favorite-outline"></i>
								<div>980</div>
							</a>
							<a class="btn btn-primary more" href="single.html">
								<div>More</div>
								<div><i class="ion-ios-arrow-thin-right"></i></div>
							</a>
						</footer>
					</div>
				</div>
			</article>
		</div>
	</div>
</div> -->
<?php

if (!empty($cat['list']) && is_array($cat['list'])) {
?>
	<div class="line">
		<div><?php echo lang('Latest News') ?></div>
	</div>
	<?php

	// Membagi array $cat['list'] menjadi grup-grup dengan 2 data dalam setiap grup
	$chunks = array_chunk($cat['list'], 2);

	foreach ($chunks as $chunk) {
	?>
		<div class="row">
			<?php
			foreach ($chunk as $data) {
				$edit_data = (content_posted_permission() && $user->id == $data['created_by']) ? 1 : 0;
				$link = content_link($data['id'], $data['title']);
			?>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="row">
						<article class="article col-md-12">
							<div class="inner">
								<?php
								$image = (!empty($config['thumbnail']) && !empty($data['image'])) ? _content_without_thumbnail($data['image'], true, false) : '';
								$col = !empty($image) ? 9 : 12;
								if (!empty($config['title'])) {
									if (!empty($config['title_link'])) {
								?>
										<figure>
											<a href="<?php echo $link; ?>">
												<?php echo !empty($image) ? $image : ''; ?>
											</a>
										</figure>
									<?php
									} else {
									?>
										<figure>
											<?php echo !empty($image) ? $image : ''; ?>
										</figure>
								<?php
									}
								}
								?>
								<div class="padding">
									<div class="detail">
										<?php
										if (!empty($config['created']) || !empty($config['author']) || !empty($config['tag'])) {
										?>
											<?php echo (!empty($config['created'])) ? '<div class="time">' /* . lang('created') */ . content_date($data['created']) . '</div>' : ''; ?>
											<?php
											$r = content_category($data['id'], $config['tag_link']);
											echo '<div class="category text-right pull-right" style="float: right;">' . implode('', $r) . '</div>';
											?>
										<?php
										}
										?>
									</div>
									<?php
									if (!empty($config['title'])) {
										if (!empty($config['title_link'])) {
									?>
											<h2><a href="<?php echo $link; ?>" title="<?php echo $data['title']; ?>"><?php echo $data['title']; ?></a></h2>
										<?php
										} else {
										?>
											<h2><?php echo $data['title']; ?></h2>
									<?php
										}
									}
									?>

									<p>
										<?php echo @$data[$config['intro']]; ?>
										<?php echo (!empty($config['read_more'])) ? '<a href="' . $link . '" class="readmore">' . lang('Read more') . '</a>' : ''; ?>
									</p>

									<footer>
										<?php
										if ($config['rating']) {
											echo _rating_love($data['rating']);
										}
										?>

										<a class="btn btn-primary more" href="single.html">
											<div>More</div>
											<div><i class="ion-ios-arrow-thin-right"></i></div>
										</a>
									</footer>
								</div>
							</div>
						</article>
					</div>
				</div>
			<?php
			}
			?>
		</div>
<?php
	}
}
?>