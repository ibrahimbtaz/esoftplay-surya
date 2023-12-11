<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

if (!empty($cat['list']) && is_array($cat['list'])) {
?>
	<aside>
		<ul class="nav nav-tabs nav-justified" role="tablist">
			<li class="active">
				<a href="#recomended" aria-controls="recomended" role="tab" data-toggle="tab">
					<i class="ion-android-star-outline"></i> <?php echo $block->title ?>
				</a>
			</li>
			<li>
				<a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">
					<i class="ion-ios-chatboxes-outline"></i><?php echo lang('Comments') ?>
				</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="recomended">
				<?php foreach ($cat['list'] as $key => $data) {
					if ($key === 0 && isset($data['id'])) {
				?>
						<article class="article-fw">
							<div class="inner">
								<?php
								$image = (!empty($config['thumbnail']) && !empty($data['image'])) ? '<img src="' . content_src($data['image'], false, false) . '" alt="Sample Article">' : '';
								$col = !empty($image) ? 9 : 12;
								$imagelink = (!empty($config['title_link']) ? "<figure><a href=\"$link\">$image</a></figure>" : "<figure>$image</figure>");
								echo (!empty($image)) ? $imagelink :  '';
								?>
								<div class="details">
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
						<div class="line"></div>
					<?php
					} else {
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
				}
				?>
			</div>
			<div class="tab-pane comments" id="comments">
				<div class="comment-list sm">
					<?php 
						$content_id = $cat['list'][0]['id']; // Assuming content ID is stored in 'id' field
			      $q = 'SELECT * FROM `bbc_content_comment` WHERE `content_id` = ' . $content_id;  
			      $r_list = $db->getAll($q);
			      if (!empty($r_list)) {
			        foreach ($r_list as $index =>$comment) {
			        	?> 
								<div class="item">
									<div class="user">                                
										<figure>
											<img src="<?php echo content_src($comment['image'], $is_imgsrc = false, $is_large_image = false); ?>" alt="User Picture">
										</figure>
										<div class="details">
											<h5 class="name"><?php echo $comment['name'] ?></h5>
											<div class="time"><?php echo $comment['date'] ?></div>
											<div class="description">
												<?php echo  $comment['content'] ?>
											</div>
										</div>
									</div>
								</div>
			        	<?php			       
			        }
			      }
					 ?>
				</div>
			</div>
		</div>
	</aside>
<?php
}
$block->title = '';