<?php 
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = urldecode($query_split[1]);
}

$search = new WP_Query($search_query);

get_header(); ?>

	<div id="content">

		<div class="wrap">

			<div id="main">

				<div class="stream">

					<h3>Resultados de búsqueda</h3>

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
						<h4>No se encontraron resultados.</h4>
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