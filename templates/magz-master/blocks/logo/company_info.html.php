<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');
?>
<div class="col-md-3 col-sm-6 col-xs-12">
	<div class="block">
		<h1 class="block-title"><?php echo lang($block->title) ?></h1>
		<div class="block-body">
			<?php
			if (!empty($config['is_link'])) {
			?>
				<figure class="foot-logo">
					<a href="<?php echo _URL; ?>" title="<?php echo $output['title']; ?>" <?php echo $output['attribute']; ?>>
						<?php echo image($output['image'], $output['size'], 'alt="' . $output['title'] . '" title="' . $output['title'] . '"'); ?>
					</a>
				</figure>
			<?php
			}
			?>
			<p class="brand-description">
				<?php echo $output['title'] ?>
			</p>
			<?php
			if (!empty($config['is_link'])) {
			?>
				<a href="<?php echo $output['link']; ?>" title="<?php echo $output['title']; ?>" <?php echo $output['attribute']; ?> class="btn btn-magz white"><?php echo lang('About Us') ?> <i class="ion-ios-arrow-thin-right"></i></a>
			<?php
			}
			?>
		</div>
	</div>
</div>
<?php
$block->title = '';
?>