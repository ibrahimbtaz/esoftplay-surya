<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');
if (!empty($cat['list']) && is_array($cat['list'])) {
	function _rating_grade($value, $table = '', $table_id = '', $string_voter = 'voter', $string_db = '')
	{
		$total_voters = $grade = 0;
		if (!empty($value)) {
			$r = explode(',', $value);
			$total_voters = array_sum($r);
			foreach ($r as $i => $voters) {
				$grade += $voters * ($i + 1);
			}
			$grade = ($grade > 0) ? round($grade / $total_voters, 1) : 0;
			$grade = floor($grade * 2) / 2;
		}

		// Mengembalikan hanya nilai angka
		return $grade;
	}
	?>
	<aside>
		<div class="aside-body">
			<div class="featured-author">
				<div class="featured-author-inner">
					<?php
					$contentsByAuthor = [];
					foreach ($cat['list'] as $row) {
						$author = $row['created_by_alias'];
						$contentsByAuthor[$author][] = $row;
					}
					foreach ($contentsByAuthor as $author => $contents) {
						$data = reset($contents);
						?>
						<div class="featured-author-cover" style="background-color: grey;" alt="Sample Article">
							<div class="badges">
								<div class="badge-item"><i class="ion-star"></i> <?php lang('Featured') ?></div>
							</div>
							<div class="featured-author-center">
								<figure class="featured-author-picture">
									<img src="<?php echo _URL;
														echo 'images/modules/content/images/' . $data['image'] ?>" alt="Sample Article"><!-- mendapatkan photo author -->
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
										<div class="value"><?php echo _rating_grade($data['rating']) ?></div>
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
											<li><a href="<?php echo _URL;
																		echo 'images/modules/content/images/' . $data['image'] ?>" style="background-image: url('<?php echo _URL;
																																																															echo 'images/modules/content/images/' . $data['image'] ?>');"></a></li>
											<!-- <li><a href="images/news/img12.jpg" style="background-image: url('images/news/img12.jpg');">
														<div class="more">+2</div>
													</a></li>
												<li class="hidden"><a href="images/news/img13.jpg" style="background-image: url('images/news/img13.jpg');"></a></li>
												<li class="hidden"><a href="images/news/img14.jpg" style="background-image: url('images/news/img14.jpg');"></a></li> -->
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
