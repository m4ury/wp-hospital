<?php $cat_fotodestacada = get_category_by_slug('foto-destacada'); ?>

<?php if ($cat_fotodestacada): ?>

    <?php

    $args = array(
        'cat' => $cat_fotodestacada->term_id,
        'posts_per_page' => 1,
        'no_found_rows' => true
    );
    $fotodestacada = new WP_Query($args);

    if($fotodestacada->have_posts()) : while($fotodestacada->have_posts()): $fotodestacada->the_post(); ?>

        <div class="fotodeldia">

            <a href="<?php the_permalink(); ?>" class="foto">
                <?php the_post_thumbnail('320x210'); ?>
                <div class="clearfix"></div>
                <h5><?php the_title(); ?></h5>
                <?php the_excerpt(); ?>
            </a>

            <a href="<?php echo get_category_link($cat_fotodestacada->term_id); ?>" class="boton mas-fotos">+ Ver más <strong>Fotos Destacadas</strong></a>

        </div>

    <?php endwhile;
    wp_reset_postdata();
    endif; ?>

<?php endif ?>