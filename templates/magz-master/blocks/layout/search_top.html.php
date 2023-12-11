<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

$placeholder = lang($config['caption']);
$value       = '';

if ($Bbc->mod['name'] == 'content' && $Bbc->mod['task'] == 'search') {
	if (!empty($_SESSION['currSearch'])) {
		$placeholder = $_SESSION['currSearch'];
		$value       = $_SESSION['currSearch'];
	}
}

?>
<form method="post" class="search search_top" id="block_search<?php echo $block->id ?>" action="" role="form">
	<div class="form-group">
		<div class="input-group">
			<input type="text" class="form-control input-sm  form-control-sm" name="keyword" value="<?php echo $value; ?>" placeholder="<?php echo $placeholder; ?>" />
			<div class="input-group-btn">
				<button class="btn btn-primary" type="submit"><i class="ion-search"></i></button>
			</div>
		</div>
	</div>
</form>
<script type="text/javascript">
	_Bbc(function($) {
		console.log("#block_search<?php echo $block->id ?>");
		$("#block_search<?php echo $block->id ?>").submit(function(e) {
			console.log('test');
			e.preventDefault();
			var a = $('input[name="keyword"]');
			if (a.val() == "") {
				alert("<?php echo lang('Please Insert Keyword!'); ?>");
				a.focus();
			} else {
				var b = _URL + 'search.htm';
				var c = encodeURIComponent(a.val());
				if (c.length > 12) {
					b += '?id=';
				} else {
					b += '/';
				}
				b += c;
				document.location.href = b;
			}
		})
	});
</script>
<?php
$block->title = '';