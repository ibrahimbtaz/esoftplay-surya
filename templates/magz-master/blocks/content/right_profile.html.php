<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');
if (!empty($cat['list']) && is_array($cat['list'])) {
	_func('magazine');
	?>
	<aside>
		<div class="aside-body">
			<div class="featured-author">
				<div class="featured-author-inner">
					<?php
					$content_by_alias = [];
					foreach ($cat['list'] as $row) {
						$author = $row['created_by_alias'];
						$content_by_alias[$author][] = $row;
					}
					foreach ($content_by_alias as $author => $contents) {
						$data = reset($contents);
						?>
						<div class="featured-author-cover" style="background-color: grey;" alt="Sample Article">
							<div class="badges">
								<div class="badge-item"><i class="ion-star"></i> <?php lang('Featured') ?></div>
							</div>
							<div class="featured-author-center">
								<figure class="featured-author-picture">
									<img src="<?php echo content_src($data['image'], false, false) ?>" alt="Sample Article">
								</figure>
								<div class="featured-author-info">
									<h2 class="name" style="color:black;"><?php echo $data['created_by_alias']  ?></h2>
									<div class="desc">@<?php echo $data['created_by_alias']  ?></div>
								</div>
							</div>
						</div>
						<div class="featured-author-body">
							<div class="featured-author-count">
								<div class="item">
									<a href="#">
										<div class="name"><?php echo lang('Posts') ?></div>
										<div class="value"><?php echo $data['hits'] ?></div>
									</a>
								</div>
								<div class="item">
									<a href="#">
										<div class="name"><?php echo lang('Stars') ?></div>
										<div class="value"><?php echo magazine_rating_grade($data['rating']) ?></div>
									</a>
								</div>
								<div class="item">
									<a href="#">
										<div class="icon">
											<div><?php echo lang('More') ?></div>
											<i class="ion-chevron-right"></i>
										</div>
									</a>
								</div>
							</div>
							<div class="featured-author-quote">
								<?php echo @$data[$config['intro']]; ?>
							</div>
							<div class="block">
								<h2 class="block-title"><?php echo lang('Photos') ?></h2>
								<div class="block-body">
									<ul class="item-list-round" data-magnific="gallery">
										<?php
										foreach ($contents as $key => $data) {
											$link = content_link($data['id'], $data['title']); ?>
											<li><a href="<?php echo content_src($data['image'], false, false) ?>" style="background-image: url('<?php echo content_src($data['image'], false, false)?>');"></a></li>
										<?php
										} ?>
									</ul>
								</div>
							</div>
							<div class="featured-author-footer">
								<a href="#"><?php echo lang('See All Authors') ?></a>
							</div>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</aside>
<?php
}
$block->title = '';
