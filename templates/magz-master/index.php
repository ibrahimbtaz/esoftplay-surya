<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo $sys->meta(); ?>
	<!--[if lt IE 9]>
				<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', false);
				<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', false);
			<![endif]-->
</head>

<body>
	<div class="primary">
		<div class="firstbar">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-12">
						<?php echo $sys->block_show('logo'); ?>
					</div>
					<div class="col-md-9 col-sm-12">
						<?php echo $sys->block_show('header'); ?>
					</div>
				</div>
			</div>
		</div>
		<nav class="menu">
			<div class="container">
				<?php echo $sys->block_show('top') ?>
			</div>
		</nav>
	</div>
	<section class="home">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-12 col-xs-12">
					<?php echo $sys->block_show('content_top'); ?>
					<div class="owl-carousel owl-theme slide" id="featured">
						<?php echo trim($Bbc->content); ?>
					</div>
					<?php echo $sys->block_show('content_bottom'); ?>
				</div>
				<div class="col-xs-6 col-md-4 sidebar" id="sidebar">
					<div class="sidebar-title for-tablet">Sidebar</div>
					<?php echo $sys->block_show('right'); ?>
				</div>
			</div>
		</div>
	</section>

	<section class="best-of-the-week">
		<div class="container">
			<?php echo $sys->block_show('bottom') ?>

		</div>
	</section>

	<footer class="footer">
		<div class="container">
			<?php echo $sys->block_show('footer') ?>
		</div>
		<?php echo config('site', 'footer'); ?>
	</footer>

	<?php
	$sys->link_js($sys->template_url . 'js/application.js', false);
	$sys->link_js($sys->template_url . 'js/jquery.migrate.js', false);
	// $sys->link_js($sys->template_url . 'scripts/bootstrap/bootstrap.min.js', false);
	?>
	<script src="<?php echo _URL; ?>templates/admin/bootstrap/js/bootstrap.min.js"></script>
	<script>
		var $target_end = $(".best-of-the-week");
	</script>
	<?php
	$sys->link_js($sys->template_url . 'scripts/jquery-number/jquery.number.min.js', false);
	$sys->link_js($sys->template_url . 'scripts/owlcarousel/dist/owl.carousel.min.js', false);
	$sys->link_js($sys->template_url . 'scripts/magnific-popup/dist/jquery.magnific-popup.min.js', false);
	$sys->link_js($sys->template_url . 'scripts/easescroll/jquery.easeScroll.js', false);
	$sys->link_js($sys->template_url . 'scripts/sweetalert/dist/sweetalert.min.js', false);
	$sys->link_js($sys->template_url . 'scripts/toast/jquery.toast.min.js', false);
	$sys->link_js($sys->template_url . 'js/demo.js', false);
	$sys->link_js($sys->template_url . 'js/e-magz.js', false);
	// echo $sys->block_show('debug');
	?>


</body>

</html>