<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');
?>
<div class="headline">
	<?php
	$count = count($output['images']);
	if ($count > 0) {
		if (!empty($output['config']['control']) && $count > 1) {
			?>
			<div class="nav" id="headline-nav">
				<a class="left carousel-control" href="#imageslider<?php echo $block->id; ?>" role="button" data-slide="prev">
					<span class="ion-ios-arrow-left" aria-hidden="true"></span>
					<span class="sr-only"><?php echo lang('Previous') ?></span>
				</a>
				<a class="right carousel-control" href="#imageslider<?php echo $block->id; ?>" role="button" data-slide="next">
					<span class="ion-ios-arrow-right" aria-hidden="true"></span>
					<span class="sr-only"><?php echo lang('Next') ?></span>
				</a>
			</div>
			<?php
		}
		?>
		<div class="owl-carousel owl-theme" id="headline">
			<?php
			foreach ($output['images'] as $key => $dt) {
				$cls = $key ? '' : ' active';
				?>
				<div class="item<?php echo $cls; ?>">
					<a href="<?php echo $dt['link'] ?>" title="<?php echo $dt['title'] ?>">
						<?php echo $dt['title'] ?>
					</a>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	}
	?>
</div>