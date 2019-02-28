<?php get_header(); ?>

	<div id="content">

		<div class="wrap">

			<div id="main">

				<div id="breadcrumbs">
					<ul>
						<li><a href="<?php echo site_url(); ?>">Inicio</a></li>
						<li class="sep">/</li>
						<li><?php the_title(); ?> »</li>
					</ul>
					<div class="clearfix"></div>
				</div>


				<div class="post">

					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), '660x9999' ); ?>
						<div class="clearfix"></div>

						<div class="texto">

							<h3 class="title"><?php the_title(); ?></h3>
							<div class="contenido">
								<?php the_content(); ?>
							</div>
						</div>
					<?php endwhile; ?>
					<?php else: ?>
					<?php endif; ?>

					<div class="clearfix"></div>
				</div>

			</div>

			<!-- Sidebar -->

			<?php get_sidebar(); ?>

			<div class="clearfix"></div>

		</div>

	</div>


	<div class="clearfix"></div>

<?php get_footer(); ?>