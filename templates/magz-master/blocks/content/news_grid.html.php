<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');
_func('magazine');

if (!empty($cat['list']) && is_array($cat['list'])) {
	$pieces = array_chunk($cat['list'], ceil(count($cat['list']) / 2));
?>
	<div class="row">
		<?php
		foreach ($pieces as $chunk) {
		?>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="row">
					<?php
					foreach ($chunk as $data) {
						$edit_data = (content_posted_permission() && $user->id == $data['created_by']) ? 1 : 0;
						$link = content_link($data['id'], $data['title']);
					?>
						<article class="article col-md-12">
							<div class="inner">
								<?php
								$image = (!empty($config['thumbnail']) && !empty($data['image'])) ? '<img src="' . content_src($data['image'], false, false) . '" alt="Sample Article">' : '';
								$col = !empty($image) ? 9 : 12;
								$imagelink = (!empty($config['title_link']) ? "<figure><a href=\"$link\">$image</a></figure>" : "<figure>$image</figure>");
								echo (!empty($image)) ? $imagelink :  '';
								?>
								<div class="padding">
									<div class="detail">
										<?php
										if (!empty($config['created']) || !empty($config['tag'])) {
											$m = (empty($config['created'])) ? 0 : '';
											$r = content_category($data['id'], $config['tag_link']);
											echo (!empty($config['created'])) ? '<div class="time">' . lang('created') . content_date($data['created']) . '</div>' : '';
											echo (!empty($config['tag'])) ? '<div class="category col-md-auto text-right pull-right" style="' . $m . ' ">' . implode('', $r) . '</div>' : '';
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
									<?php
									if (empty($data['revised'])) {
										$config['modified'] = 0;
									}
									if (!empty($config['modified']) || !empty($config['author']) || !empty($edit_data)) {
										if (!empty($edit_data)) {
									?>
											<div class="">
												<?php echo ($config['modified']) ? '<span class="text-muted">' . lang('modified') . content_date($data['modified']) . '</span>' : ''; ?>
												<a href="<?php echo $Bbc->mod['circuit'] . '.posted_form&id=' . $data['id']; ?>" title="<?php echo lang('edit content'); ?>"><?php echo icon('edit'); ?></a>
											</div>
										<?php
										} else {
											echo ($config['modified']) ? '<div class="time"><span class="text-muted">' . lang('modified') . content_date($data['modified']) . '</span></div>' : '';
											echo ($config['author']) ? '<div class="time"><span class="text-muted">' . lang('author') . $data['created_by_alias'] . '</span></div>' : '';
										?>
											<div class="clearfix"></div>
										<?php
										}
									}
									if (!empty($config['rating']) || !empty($config['title_link'])) {
										?>
										<footer id="latest_news">
											<?php
											if (!empty($config['rating'])) {
												echo magazine_rating($data['rating']);
											}
											if (!empty($config['title_link'])) {
											?>
												<a class="btn btn-primary more " href="<?php echo $link ?>">
													<div><?php echo lang('More') ?></div>
													<div><i class="ion-ios-arrow-thin-right"></i></div>
												</a>
												<div class="clearfix"></div>
											<?php
											}
											?>
										</footer>
									<?php
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
		?>
	</div>
<?php
}
