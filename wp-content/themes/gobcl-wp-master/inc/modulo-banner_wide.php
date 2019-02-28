<?php 
	$banner_wide = gobcl_get_option('_gobcl_banner_wide');
?>

<div class="banner banner-foto">
	<a href="<?php echo $banner_wide[0]['url_banner_wide'] ?>">
		<div class="imagen">
			<img src="<?php echo $banner_wide[0]['imagen_banner_wide'] ?>" alt="<?php echo $banner_wide[0]['texto_1_banner_wide'] ?> <?php echo $banner_wide[0]['texto_2_banner_wide'] ?>">
		</div>
		<div class="velo"></div>
		<div class="texto">
			<span><?php echo $banner_wide[0]['texto_1_banner_wide'] ?></span>
			<span><strong><?php echo $banner_wide[0]['texto_2_banner_wide'] ?></strong></span>
		</div>
	</a>
</div>