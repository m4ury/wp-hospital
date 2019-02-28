<?php get_header(); ?>

	<div id="content">

		<div class="wrap">

			<div id="main">

				<div class="stream">

					<h5 class="titulo-seccion">Últimas Noticias</h5>
					<!-- Post destacado -->
					<?php

					/* 	Mostramos último post 'sticky' */

					$cat_noticias = get_category_by_slug('noticias');

					$args = array(
						'posts_per_page' => 1,
						'cat' => $cat_noticias->term_id,
						'post__in'  => get_option( 'sticky_posts' ),
						'ignore_sticky_posts' => 1,
						'no_found_rows' 	=> true,
					);
					$sticky = new WP_Query($args);

					$sticky_post = array();

					if($sticky->have_posts()) : while($sticky->have_posts()): $sticky->the_post(); ?>

						<div class="post tarjeta destacado">
							<div class="pic">
								<a href="<?php the_permalink(); ?>">
									<?php if (has_post_thumbnail()): ?>
										<?php the_post_thumbnail('660x250'); ?>
									<?php else: ?>
										<img src="http://placehold.it/660x250">
									<?php endif ?>
								</a>
							</div>
							<div class="texto">
								<div class="left">
									<h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								</div>
								<div class="right">
									<span class="meta"><?php the_time( 'j \d\e F \d\e Y '); ?></span>
									<?php the_excerpt(); ?>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="social">
								<ul>
									<li>
										<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
									</li>
									<li>
										<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-lang="es">Twittear</a>
									</li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
					<?php $sticky_post[] = get_the_id(); endwhile;
					wp_reset_postdata();
					endif; ?>

					<!-- Últimas Noticias -->

					<?php

					/*	Mostramos últimas noticias, excluyendo post 'sticky'. */

					$args = array(
						'cat'				=> $cat_noticias->term_id,
						'posts_per_page' 	=> '3',
						'no_found_rows' 	=> true,
						'post__not_in'		=> $sticky_post
					);

					$noticias = new WP_Query($args);

					if($noticias->have_posts()) : while($noticias->have_posts()): $noticias->the_post(); ?>

						<div class="post tarjeta">
							<div class="pic">

								<a href="<?php the_permalink(); ?>">

									<?php if (has_post_thumbnail()): ?>
										<?php the_post_thumbnail('320x210'); ?>
									<?php else: ?>
										<img src="http://placehold.it/320x210" alt="">
									<?php endif ?>

								</a>

							</div>
							<div class="texto">
								<span class="meta"><?php the_time( 'j \d\e F \d\e Y '); ?></span>
								<h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							</div>
							<div class="clearfix"></div>
						</div>

					<?php endwhile; ?>
						<a href="<?php echo get_category_link($cat_noticias->term_id); ?>" id="mas-noticias" class="boton">+ Ver más <strong>Noticias</strong></a>
					<?php
					wp_reset_postdata();
					endif; ?>



				</div>

				<?php /*get_search_form(); */?>


				<?php
					// Opciones del Tema - Home: Banner Wide
					$banner_wide = gobcl_get_option('_gobcl_banner_wide');

					if ($banner_wide) {
						get_template_part('inc/modulo', 'banner_wide');
					}
				?>

				

				<div class="clearfix"></div>

			</div>

			<!-- Sidebar -->

			<?php get_sidebar(); ?>

			<div class="clearfix"></div>

		</div>

	</div>

	<div id="prefooter">
		<div class="wrap">


			<?php
				// Opciones del tema - Home: Cita Destacada
				$cita_destacada = gobcl_get_option('_gobcl_cita_destacada');

				if ($cita_destacada) {
					get_template_part('inc/modulo', 'cita');
				}
			?>


			<?php
				// Opciones del tema - Home: Banners pre-footer
				$banners_pre_footer = gobcl_get_option('_gobcl_banners_pre_footer');

				if ($banners_pre_footer) {
					get_template_part('inc/modulo', 'banners_pre_footer');
				}
			?>

			<?php 
				// Módulo Enlaces productos prefooter
				get_template_part('inc/modulo', 'productos_pre_footer');
			 ?>

		</div>
	</div>

	<div class="clearfix"></div>

	<?php get_footer(); ?>