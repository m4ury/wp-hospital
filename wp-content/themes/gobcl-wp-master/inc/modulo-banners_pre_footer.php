<?php
	$banners_pre_footer = gobcl_get_option('_gobcl_banners_pre_footer');
?>
<div class="banners banners-mosaico">

	<?php foreach ($banners_pre_footer as $banner): ?>
		<div class="banner banner-corto">
			<a href="<?php echo $banner['url_banner_pre_footer'] ?>"><img src="<?php echo $banner['image_banner_pre_footer'] ?>" alt="<?php echo $banner['alt_text_banner_pre_footer'] ?>"></a>
		</div>
	<?php endforeach ?>

	<div class="clearfix"></div>

</div>