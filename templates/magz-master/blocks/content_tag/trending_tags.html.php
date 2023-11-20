<div class="col-md-6 col-sm-6 trending-tags">
	<h1 class="title-col"><?php echo $block->title ?></h1>
	<div class="body-col">
		<ol class="tags-list">
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
		</ol>
	</div>
</div>
<?php
$block->title = '';
?>