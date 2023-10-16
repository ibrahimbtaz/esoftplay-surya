<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

$config = $output['config'];
$arr		=  $output['data'];
?>
<div class="item">
	<?php
	foreach ((array)$arr as $data) {
	?>
		<article class="featured">
			<div class="overlay"></div>

			<figure>
				<?php echo (!empty($config['thumbnail']) && !empty($data['image'])) ? content_src($data['image'], ' class="" title="' . $data['title'] . '"') : ''; ?>
			</figure>
			<div class="details">
				<?php
				if ($config['tag']) {
					$r = content_category($data['id'], $config['tag_link']);
				?>
					<div class="category text-light"><?php echo lang('Tags') . implode(' ', $r) ?></div>
				<?php
				}
				?>
				<?php
				if ($config['author']) {
				?>
					<div class="category"><a href="<?php echo $link; ?>" title="<?php echo $data['title']; ?>" class=""><?php echo $data['created_by_alias']; ?></a></div>
				<?php
				}
				$link = content_link($data['id'], $data['title']);
				if ($config['title']) {
					if ($config['title_link']) {
					?>
						<h1><a href="<?php echo $link; ?>" title="<?php echo $data['title']; ?>"><?php echo $data['title'] ?></a></h1>
					<?php
					} else {
					?>
						<h1><?php echo $data['title'] ?></h1>
					<?php
					}
				}
				if ($config['created']) {
					?>
					<!-- <div class="category"><a href="category.html">Computer</a></div> -->
					<div class="text-light time">
						<?php echo ($config['created']) ?  content_date($data['created'])  : ''; ?>
					</div>
				<?php
				}
				?>
				<?php
				if ($config['rating'] || $config['modified']) {
				?>
					<div class="time">
						<?php
						if ($config['rating']) {
						?>
							<div class="col-md-6 no-both text-light">
								<?php echo rating($data['rating']); ?>
							</div>
						<?php
						}
						if (empty($data['revised'])) {
							$config['modified'] = 0;
						}
						if (!empty($config['modified'])) {
						?>
							<div class="col-md-6 no-left text-right">
								<em class="text-right pull-right text-light"><?php echo lang('modified') . content_date($data['modified']); ?></em>
							</div>
						<?php
						}
						?>
						<div class="clearfix"></div>
					</div>
				<?php
				}
				?>
		</article>
	<?php
	}
	?>
</div>