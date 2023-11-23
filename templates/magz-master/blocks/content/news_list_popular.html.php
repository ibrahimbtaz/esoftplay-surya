<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

if (!empty($cat['list']) && is_array($cat['list'])) {
?>
	<aside>
		<h1 class="aside-title"><?php echo $block->title ?> <a href="<?php echo site_url('content/popular') ?>" class="all"><?php echo lang('See All') ?> <i class="ion-ios-arrow-right"></i></a></h1>
		<div class="aside-body">
			<?php
			foreach ($cat['list'] as $data) {
				$edit_data = (content_posted_permission() && $user->id == $data['created_by']) ? 1 : 0;
				$link = content_link($data['id'], $data['title']);
				?>
				<article class="article-mini">
					<div class="inner">
						<?php
						$image = (!empty($config['thumbnail']) && !empty($data['image'])) ? content_src($data['image'], true, false) : '';
						$ml = !empty($image) ? '85px' : 0;
						$imagelink = (!empty($config['title_link']) ? "<figure><a href=\"$link\">$image</a></figure>" : "<figure>$image</figure>");
						echo (!empty($image)) ? $imagelink :  '';
						?>
						<div class="padding" style="margin-left: <?php echo $ml; ?>">
							<div class="detail">
								<?php
								if (!empty($config['created']) || !empty($config['tag'])) {
									$m = (empty($config['created'])) ? 0 : '';
									$r = content_category($data['id'], $config['tag_link']);
									echo (!empty($config['created'])) ? '<div class="time">' . lang('created') . content_date($data['created']) . '</div>' : '';
									echo (!empty($config['tag'])) ? '<div class="category col-md-auto text-right pull-right" style="margin:' . $m . '">' . implode('', $r) . '</div>' : '';
									?>
									<div class="clearfix"></div>
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
	</aside>
<?php
}
$block->title = '';
