<?php
get_header();
$thecat = get_the_category(get_the_ID());
?>



	<div id="content">

		<div class="wrap">

			<div id="main">

				<div id="breadcrumbs">
					<ul>
						<li><a href="<?php echo site_url(); ?>">Inicio</a></li>
						<li class="sep">/</li>
						<li><a href="<?php echo get_category_link($thecat[0]->term_id); ?>"><?php echo $thecat[0]->name ?> »</a></li>

					</ul>
					<div class="clearfix"></div>
				</div>

				<div class="post">

					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						<div class="pic">
							<?php the_post_thumbnail('660x9999'); ?>
						</div>

						<div class="clearfix"></div>

						<div class="social">
							<ul>
								<li>
									<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
								</li>
								<li>
									<a href="https://twitter.com/share" class="twitter-share-button" data-via="gobiernodechile" data-lang="es" data-url="<?php the_permalink(); ?>">Twittear</a>
								</li>
							</ul>
						</div>

						<div class="fontsize">
							<ul>
								<li class="small"><a data-size="10">a</a></li>
								<li class="medium current"><a data-size="14">a</a></li>
								<li class="large"><a data-size="20">a</a></li>
							</ul>
						</div>

						<div class="clearfix"></div>

						<div class="texto">
							<span class="meta"><?php the_time( 'j \d\e F \d\e Y '); ?></span>
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