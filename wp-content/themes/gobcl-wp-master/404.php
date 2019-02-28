<?php get_header(); ?>

	<div id="content">

		<div class="wrap">
		
			<div id="main">

				<h5 class="titulo-seccion">Error 404</h5>

				<div class="post">
					<div class="texto">
					<h3 class="title">La página que buscas no existe</h3>
						<div class="contenido">
							<p>Intenta <a href="<?php echo site_url(); ?>">volviendo al home</a>, o utiliza el buscador.</p>
						</div>
					</div>
				</div>

				<?php get_search_form(); ?>

			</div>

			<!-- Sidebar -->

			<?php get_sidebar(); ?>

			<div class="clearfix"></div>

		</div>

	</div>

	

	<div class="clearfix"></div>

	<?php get_footer(); ?>