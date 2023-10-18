<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

$config = $output['config'];
$arr		=  $output['data'];

function content_category_style($ids, $is_link = true)
{
	global $db, $Bbc;
	$output = array();
	if (empty($ids)) return $output;
	$ids = is_array($ids) ? $ids : array($ids);
	if (!isset($Bbc->content_category_array)) {
		$q = "SELECT c.`id`, t.`title` FROM bbc_content_cat AS c LEFT JOIN bbc_content_cat_text AS t
			ON(c.`id`=t.`cat_id` AND t.`lang_id`=" . lang_id() . ")";
		$Bbc->content_category_array = $db->cacheGetAssoc($q);
	}
	$r_cat = $Bbc->content_category_array;
	$q = "SELECT * FROM bbc_content_category WHERE content_id IN (" . implode(',', $ids) . ")";
	$r = $db->cacheGetAll($q);
	foreach ($r as $dt) {
		$title = $r_cat[$dt['cat_id']];
		$output[$dt['content_id']][] = ($is_link) ? '<a href="' . content_cat_link($dt['cat_id'], $title) . '" title="' . $title . '" style="padding: 5px 15px; margin:0 4px;">' . $title . '</a>' : $title;
	}
	if (get_config('content', 'manage', 'webtype') == '1') {
		$q = "SELECT t.`id`, t.`title`, l.`content_id` FROM bbc_content_tag AS t
		LEFT JOIN bbc_content_tag_list AS l ON (t.`id`=l.`tag_id`)
		WHERE l.`content_id` IN (" . implode(',', $ids) . ")";
		$r = $db->cacheGetAll($q);
		foreach ($r as $t) {
			$output[$t['content_id']][] = ($is_link) ? '<a href="' . content_tag_link($t['id'], $t['title']) . '" title="' . $t['title'] . '" style="padding: 5px 15px; margin:0 4px;">' . $t['title'] . '</a>' : $t['title'];
		}
	}
	if (
		count($ids) == 1
		&& (isset($dt['content_id'])
			|| isset($t['content_id']))
	) {
		$content_id = isset($dt['content_id']) ? $dt['content_id'] : $t['content_id'];
		$output     = !empty($output[$content_id]) ? $output[$content_id] : array();
	}
	return $output;
}
?>
<div class="item">
	<?php
	foreach ((array)$arr as $data) {
	?>
		<article class="featured">
			<div class="overlay"></div>
			<figure>
				<?php echo (!empty($config['thumbnail']) && !empty($data['image'])) ? content_src($data['image'], ' class="" title="' . $data['title'] . '"') : ''; ?>
			</figure>
			<div class="details">
				<?php
				if ($config['tag']) {
					$r = content_category_style($data['id'], $config['tag_link']);
				?>
					<div class="category text-light"><?php echo  implode('', $r) ?></div>
				<?php
				}
				$link = content_link($data['id'], $data['title']);
				if ($config['title']) {
					if ($config['title_link']) {
				?>
						<h1><a href="<?php echo $link; ?>" title="<?php echo $data['title']; ?>"><?php echo $data['title'] ?></a></h1>
					<?php
					} else {
					?>
						<h1><?php echo $data['title'] ?></h1>
					<?php
					}
				}
				$tr = (($config['created'] && $config['author']) || ($config['rating'] && $config['modified'])) ? ' text-right' : '';

				if ($config['created'] || $config['author']) {
					?>
				<div class="row">
						<?php
						echo ($config['author']) ? '<div class="col-md-6 time"><span>' . lang('author') . $data['created_by_alias'] . '</span></div>' : '';
						echo ($config['created']) ? '<div class="col-md-6 time ' . $tr . '"><span>' . lang('created') . content_date($data['created']) . '</span></div>' : '';
						?>
					</div>
				<?php
				}
				if ($config['rating'] || $config['modified']) {
				?>
					<div class="row">
						<?php
						echo ($config['rating']) ? '<div class="col-md-6 text-light time">' . rating($data['rating']) . '</div>' : '';
						echo (empty($data['revised'])) ? $config['modified'] = 0 : '';
						echo (!empty($config['modified'])) ? '<div class="col-md-6' . $tr . '"><em class="time text-light">' .  lang('modified') . content_date($data['modified']) . '</em></div>' : '';
						?>
						<div class="clearfix"></div>
					</div>
				<?php
				}
				?>
		</article>
	<?php
	}
	?>
</div>