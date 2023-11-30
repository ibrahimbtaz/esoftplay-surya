<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo $sys->meta(); ?>
</head>

<body>
	<?php
	$is_admin = _ADMIN != '' ? 'div' : 'header';
	?>
	<<?php echo $is_admin ?> class="primary">
		<div class="firstbar">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-12">
						<?php echo $sys->block_show('logo'); ?>
					</div>
					<div class="col-md-6 col-sm-12" style="display: flex; flex-direction: column; flex-wrap: nowrap;">
						<?php echo $sys->block_show('intro'); ?>
					</div>
					<div class="col-md-3 col-sm-12">
						<?php echo $sys->block_show('header'); ?>
					</div>
				</div>
			</div>
		</div>
		<nav class="menu">
			<?php echo $sys->block_show('top') ?>
		</nav>
	</<?php echo $is_admin ?>>
	<section class="home">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-12 col-xs-12">
					<?php echo $sys->block_show('content_top'); ?>
					<?php echo trim($Bbc->content); ?>
					<?php echo $sys->block_show('content'); ?>
					<?php echo $sys->block_show('left'); ?>
					<?php echo $sys->block_show('content_bottom'); ?>
				</div>
				<div class="col-xs-6 col-md-4 sidebar" id="sidebar">
					<div class="sidebar-title for-tablet"><?php echo lang('Sidebar') ?></div>
					<?php echo $sys->block_show('right'); ?>
				</div>
			</div>
		</div>
	</section>

	<section class="best-of-the-week">
		<div class="container" style="display: flex; flex-direction: column; flex-wrap: nowrap;">
			<?php echo $sys->block_show('bottom') ?>
		</div>
	</section>

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<?php echo $sys->block_show('footer_col_satu') ?>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<?php echo $sys->block_show('footer_col_dua') ?>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<?php echo $sys->block_show('footer_col_tiga') ?>
				</div>
				<div class="col-md-3 col-xs-12 col-sm-6">
					<?php echo $sys->block_show('footer_col_empat') ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="copyright">
						<?php echo config('site', 'footer'); ?>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<script src="<?php echo _URL; ?>templates/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<?php
	// $sys->link_js($sys->template_url . 'js/application.js', false);
	$sys->link_js($sys->template_url . 'js/jquery.js', false);
	$sys->link_js($sys->template_url . 'js/jquery.migrate.js', false);
	// $sys->link_js($sys->template_url . 'css/scripts/bootstrap/bootstrap.min.js', false);
	?>
	<script>
		var $target_end = $(".best-of-the-week");
	</script>
	<?php
	$sys->link_js($sys->template_url . 'css/scripts/jquery-number/jquery.number.min.js', false);
	$sys->link_js($sys->template_url . 'css/scripts/owlcarousel/dist/owl.carousel.min.js', false);
	$sys->link_js($sys->template_url . 'css/scripts/magnific-popup/dist/jquery.magnific-popup.min.js', false);
	$sys->link_js($sys->template_url . 'css/scripts/easescroll/jquery.easeScroll.js', false);
	$sys->link_js($sys->template_url . 'css/scripts/sweetalert/dist/sweetalert.min.js', false);
	$sys->link_js($sys->template_url . 'css/scripts/toast/jquery.toast.min.js', false);
	// $sys->link_js($sys->template_url . 'js/demo.js', false); //karena kalo diaktifin, jadi error yang searchnya
	$sys->link_js($sys->template_url . 'js/e-magz.js', false);
	// echo $sys->block_show('debug');
	$sys->link_js($sys->template_url . 'js/main.js', false);
	?>
	<script type="text/javascript">
		
	</script>

</body>

</html>