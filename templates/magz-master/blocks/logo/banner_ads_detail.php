<?php  if (!defined('_VALID_BBC')) exit('No direct script access allowed');
?>
<aside>
	<div class="aside-body">
		<figure class="ads">
			<?php echo image($output['image'], $output['size'], 'alt="' . $output['title'] . '" title="' . $output['title'] . '"'); ?>
			<figcaption><?php echo lang('Advertisement'); ?></figcaption>
		</figure>
	</div>
</aside>
<?php $block->title = '' ?>