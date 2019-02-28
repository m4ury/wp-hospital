<?php get_header(); ?>

	<div id="content">

		<div class="wrap">

			<div id="main">

				<div class="stream">

					<h5><?php single_cat_title(); ?></h5>

					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<div class="post tarjeta">
							<div class="pic">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('320x210'); ?>
								</a>
							</div>
							<div class="texto">
								<span class="meta"><?php the_time( 'j \d\e F \d\e Y '); ?></span>
								<h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							</div>
							<div class="clearfix"></div>
						</div>
					<?php endwhile; ?>
					<?php else: ?>
					<?php endif; ?>

				</div>

				<!-- Paginador -->
				<div class="wp-pagenavi">
					<?php
					global $wp_query;

					$big = 999999999;

					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages
					) );
					?>
				</div>

			</div>

			<!-- Sidebar -->

			<?php get_sidebar(); ?>

			<div class="clearfix"></div>

		</div>

	</div>


	<div class="clearfix"></div>

	<?php get_footer(); ?>