	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="block">
			<h1 class="block-title"><?php echo $block->title ?> <div class="right"><a href="<?php echo site_url('content/popular') ?>"><?php echo lang('See All') ?> <i class="ion-ios-arrow-thin-right"></i></a></div>
			</h1>
			<div class="block-body">
				<ul class="tags">
					<?php
					foreach ((array)$tags as $data) {
						$link = content_tag_link($data['id'], $data['title']);
					?>
						<li>
							<a href="<?php echo content_tag_link($data['id'], $data['title']); ?>" title="<?php echo $data['title']; ?>"><?php echo $data['title']; ?></a>
						</li>
					<?php
					}
					?>
				</ul>
			</div>
		</div>
		<div class="line"></div>
	</div>
	<?php
	$block->title = '';
	?>