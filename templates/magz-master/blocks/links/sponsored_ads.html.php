	<aside id="sponsored">
		<h1 class="aside-title"><?php echo $block->title ?></h1>
		<div class="aside-body">
			<ul class="sponsored">
				<?php
				foreach ($r as $dt) {
					$title = $config['show'] ? image($Bbc->mod['dir'] . $dt['image']) : '';
					if (empty($title)) $title = $dt['title'];
				?>
					<li>
						<a href="<?php echo $dt['link']; ?>" title="<?php echo $dt['title']; ?>">
							<?php echo image($Bbc->mod['dir'] . $dt['image']) ?>
						</a>
					</li>
				<?php
				}
				?>
			</ul>
		</div>
	</aside>
	<?php
$block->title = '';
	?>