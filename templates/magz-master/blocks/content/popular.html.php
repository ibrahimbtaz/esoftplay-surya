<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

function _mini_images($src, $is_imgsrc = false, $is_large_image = false)
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
	<aside>
		<h1 class="aside-title"><?php echo lang('Popular') ?> <a href="#" class="all"><?php echo lang('See All') ?> <i class="ion-ios-arrow-right"></i></a></h1>
		<div class="aside-body">
			<?php
			foreach ($cat['list'] as $data) {
				$edit_data = (content_posted_permission() && $user->id == $data['created_by']) ? 1 : 0;
				$link = content_link($data['id'], $data['title']);
				$image = (!empty($config['thumbnail']) && !empty($data['image'])) ? _mini_images($data['image'], true, false) : '';
			?>
				<article class="article-mini">
					<div class="inner">
						<figure>
							<a href="<?php echo $link; ?>">
								<?php echo $image; ?>
							</a>
						</figure>
						<div class="padding">
							<h1><a href="<?php echo $link; ?>"><?php echo $data['title']; ?></a></h1>
						</div>
					</div>
				</article>
			<?php
			}
			?>
		</div>
	</aside>
<?php
}
