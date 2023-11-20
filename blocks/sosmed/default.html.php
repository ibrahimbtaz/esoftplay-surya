<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

?>
<div class="col-md-3 col-xs-12 col-sm-6">
	<div class="block">
		<h1 class="block-title"><?php echo $block->title ?></h1>
		<div class="block-body">
			<p><?php echo $config['info'] ?></p>
			<ul class="social trp">
				<?php
				unset($config['template'], $config['info']);
				foreach ($config as $key => $value) {
					$originalkey = $key;
					switch ($key) {
						case 'twitter':
							$key = $key . '-outline';
							break;
						case 'youtube':
							$key = $key . '-outline';
							break;
						case 'instagram':
							$key = $key . '-outline';
							break;
						default:
							$key;
							break;
					}
					if (!empty($value)) {
				?>
						<li>
							<a href="<?php echo $value ?>" class="<?php echo $originalkey ?>">
								<svg>
									<rect width="0" height="0" />
								</svg>
								<i class="ion-social-<?php echo $key ?>"></i>
							</a>
						</li>
				<?php
					}
				}
				?>
			</ul>
		</div>
	</div>
</div>
<?php
$block->title = '';
