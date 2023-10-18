<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

$placeholder = lang($config['caption']);
$value       = '';
if (!empty($_SESSION['currSearch'])) {
	$placeholder = $_SESSION['currSearch'];
	$value       = $_SESSION['currSearch'];
}
?>
<div class="col-md-8 col-sm-12">
	<form method="post" class="search" id="block_search<?php echo $block->id ?>" action="" role="form">
		<div class="form-group">
			<div class="input-group">
				<input type="text" class="form-control input-sm  form-control-sm" name="keyword" value="<?php echo $value; ?>" placeholder="<?php echo $placeholder; ?>" />
				<div class="input-group-btn">
					<button class="btn btn-primary" type="submit"><i class="ion-search"></i></button>
				</div>
			</div>
		</div>
		<div class="help-block">
			<div>Popular:</div>
			<ul>
				<li><a href="#">HTML5</a></li>
				<li><a href="#">CSS3</a></li>
				<li><a href="#">Bootstrap 3</a></li>
				<li><a href="#">jQuery</a></li>
				<li><a href="#">AnguarJS</a></li>
			</ul>
		</div>
	</form>
</div>
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