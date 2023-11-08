<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

function _content_without_thumbnail2($src, $is_imgsrc = false, $is_large_image = false)
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

if (!empty($cat['list']) && is_array($cat['list'])) {
?>
	<div class="line top">
		<div><?php echo lang('Just Another News') ?></div>
	</div>
	<?php
	foreach ($cat['list'] as $data) {
		$edit_data = (content_posted_permission() && $user->id == $data['created_by']) ? 1 : 0;
		$link = content_link($data['id'], $data['title']);
	?>
		<article class="col-md-12 article-list">
			<div class="inner">
				<?php
				$image = (!empty($config['thumbnail']) && !empty($data['image'])) ? _content_without_thumbnail2($data['image'], true, false) : '';
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
				<div class="details">
					<div class="detail">
						<?php
						if (!empty($config['created']) || !empty($config['author']) || !empty($config['tag'])) {
						?>
							<?php
							$r = content_category($data['id'], $config['tag_link']);
							echo '<div class="category text-right pull-right" style="float: right;">' . implode('', $r) . '</div>';
							?>
							<?php echo (!empty($config['created'])) ? '<div class="time">' /* . lang('created') */ . content_date($data['created']) . '</div>' : ''; ?>
						<?php
						}
						?>
					</div>
					<?php
					if (!empty($config['title'])) {
						if (!empty($config['title_link'])) {
					?>
							<h1><a href="<?php echo $link; ?>" title="<?php echo $data['title']; ?>"><?php echo $data['title']; ?></a></h1>
						<?php
						} else {
						?>
							<h1><?php echo $data['title']; ?></h1>
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
						<a class="btn btn-primary more" href="<?php echo $link ?>">
							<div><?php echo lang('More') ?></div>
							<div><i class="ion-ios-arrow-thin-right"></i></div>
						</a>
					</footer>
				</div>
			</div>
		</article>
	<?php
	}
	?>
<?php
}
