<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

if (!empty($cat['list']) && is_array($cat['list'])) {
?>
	<div class="col-md-6 col-sm-6">
		<h1 class="title-col">
			<?php echo $block->title ?>
			<div class="carousel-nav" id="hot-news-nav">
				<div class="prev">
					<i class="ion-ios-arrow-left"></i>
				</div>
				<div class="next">
					<i class="ion-ios-arrow-right"></i>
				</div>
			</div>
		</h1>
		<div class="body-col vertical-slider" data-max="4" data-nav="#hot-news-nav" data-item="article">
			<?php
			foreach ($cat['list'] as $data) {
				$edit_data = (content_posted_permission() && $user->id == $data['created_by']) ? 1 : 0;
				$link = content_link($data['id'], $data['title']);
			?>
				<article class="article-mini">
					<div class="inner">
						<?php
						$image = (!empty($config['thumbnail']) && !empty($data['image'])) ? '<img src="' . content_src($data['image'], false, false) . '" alt="Sample Article">' : '';
						$ml = !empty($image) ? '85px' : 0;
						$imagelink = (!empty($config['title_link']) ? "<figure><a href=\"$link\">$image</a></figure>" : "<figure>$image</figure>");
						echo (!empty($image)) ? $imagelink :  '';
						?>
						<div class="padding" style="margin-left: <?php echo $ml; ?>">
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
							<div class="detail">
								<?php
								if (!empty($config['created']) || !empty($config['tag'])) {
									$m = (empty($config['created'])) ? 0 : '';
									$r = content_category($data['id'], $config['tag_link']);
									echo (!empty($config['tag'])) ? '<div class="category col-md-auto" style="' . $m . ' ">' . implode('', $r) . '</div>' : '';
									echo (!empty($config['created'])) ? '<div class="time" style="margin:' . $m . '">' . lang('created') . content_date($data['created']) . '</div>' : '';
								?>
									<div class="clearfix"></div>
								<?php
								}
								?>
							</div>
							<p>
								<?php echo @$data[$config['intro']]; ?>
								<?php echo (!empty($config['read_more'])) ? '<a href="' . $link . '" class="readmore">' . lang('Read more') . '</a>' : ''; ?>
							</p>
							<?php
							if (empty($data['revised'])) {
								$config['modified'] = 0;
							}
							if (!empty($config['rating']) || !empty($config['modified']) || !empty($config['author']) || !empty($edit_data)) {
								if (!empty($edit_data)) {
							?>
									<div class="">
										<?php echo ($config['modified']) ? '<span class="text-muted">' . lang('modified') . content_date($data['modified']) . '</span>' : ''; ?>
										<a href="<?php echo $Bbc->mod['circuit'] . '.posted_form&id=' . $data['id']; ?>" title="<?php echo lang('edit content'); ?>"><?php echo icon('edit'); ?></a>
									</div>
								<?php
								} else {
									echo (!empty($config['modified'])) ? '<div class="time text-left pull-left"><span class="text-muted">' . lang('modified') . content_date($data['modified']) . '</span></div>' : '';
									echo (!empty($config['author'])) ? '<div class="time text-left pull-left"><span class="text-muted">' . lang('author') . $data['created_by_alias'] . '</span></div>' : '';
								?>
									<div class="clearfix"></div>
							<?php
								}
								if (!empty($config['rating'])) {
									echo rating($data['rating']);
								}
							}
							?>
						</div>
					</div>
				</article>
			<?php
			}
			?>
		</div>
	</div>
<?php
}
$block->title = '';
?>