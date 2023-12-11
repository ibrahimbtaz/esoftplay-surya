<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

if (!empty($cat['list']) && is_array($cat['list'])) {
?>
	<aside>
		<h1 class="aside-title"><?php echo $block->title ?>
			<div class="carousel-nav" id="video-list-nav">
				<div class="prev"><i class="ion-ios-arrow-left"></i></div>
				<div class="next"><i class="ion-ios-arrow-right"></i></div>
			</div>
		</h1>
		<div class="aside-body">
			<ul class="video-list" data-youtube='"carousel":true, "nav": "#video-list-nav"'>
				<?php
				foreach ($cat['list'] as $data) {
					$edit_data = (content_posted_permission() && $user->id == $data['created_by']) ? 1 : 0;
					$link = content_link($data['id'], $data['title']);
					if (!empty($data['video'])) {
						include_once _ROOT . 'modules/content/constants.php';
						?>
						<div class="form-group">
							<center>
								<?php echo str_replace('{code}', $data['video'], _VIDEO_EMBED); ?>
							</center>
							<?php
							if (!empty($data['caption'])) {
							?>
								<div class="help-block"><?php echo $data['caption']; ?></div>
							<?php
							}
							?>
						</div>
						<?php
					}
				}
				?>
			</ul>
		</div>
	</aside>
<?php
}
$block->title = '';