<div class="banner">
	<?php
	foreach ($r as $dt) {
		$title = $config['show'] ? image($Bbc->mod['dir'] . $dt['image']) : '';
		if (empty($title)) $title = $dt['title'];
		?>
		<a href="<?php echo $dt['link']; ?>" title="<?php echo $dt['title']; ?>">
			<?php echo image($Bbc->mod['dir'] . $dt['image']) ?>
		</a>
		<?php
	}
	?>
</div>
<?php
$block->title = '';