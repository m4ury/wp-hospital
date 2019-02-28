<?php

	// Opciones del Tema - Banners Sidebar

    $banners_sidebar = gobcl_get_option('_gobcl_banners_sidebar');

    if ($banners_sidebar): ?>

    <div class="banners">

        <?php foreach ($banners_sidebar as $banner): ?>
            <div class="banner banner-corto">
                <a href="<?php echo $banner['url_banner_sidebar'] ?>"><img src="<?php echo $banner['image_banner_sidebar'] ?>" alt="<?php echo $banner['alt_text_banner_sidebar'] ?>"></a>
            </div>
        <?php endforeach ?>

    </div>

    <div class="clearfix"></div>

    <?php endif // Fin Banners Sidebar ?>