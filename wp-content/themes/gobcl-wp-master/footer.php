
	<footer>
		<div class="wrap">

			<div class="bicolor">
				<span class="azul"></span>
				<span class="rojo"></span>
			</div>

            <div class="top">

                <div class="listas">

					<?php if (has_nav_menu('menu_footer_1')): ?>
						<div class="lista">
							<h5><?php echo get_menu_title('menu_footer_1') ?></h5>
							<?php

							$args = array(
			                    'theme_location' => 'menu_footer_1',
			                    'container' => '',
			                    'menu_class' => 'menu',
			                    'menu_id' => '',
			                    'echo' => true,
			                    'fallback_cb' => '',
			                    'before' => '',
			                    'after' => '',
			                    'link_before' => '',
			                    'link_after' => '',
			                    'items_wrap' => '<ul id="menu-main-menu" class="menu-main">%3$s</ul>',
			                    'depth' => 0,
			                    'walker' => ''
			                );

			                wp_nav_menu( $args ); ?>
						</div>
					<?php endif; ?>

					<?php if (has_nav_menu('menu_footer_2')): ?>

						<div class="lista">
							<h5><?php echo get_menu_title('menu_footer_2') ?></h5>
							<?php $args = array(
			                    'theme_location' => 'menu_footer_2',
			                    'container' => '',
			                    'menu_class' => 'menu',
			                    'menu_id' => '',
			                    'echo' => true,
			                    'fallback_cb' => '',
			                    'before' => '',
			                    'after' => '',
			                    'link_before' => '',
			                    'link_after' => '',
			                    'items_wrap' => '<ul id="menu-main-menu" class="menu-main">%3$s</ul>',
			                    'depth' => 0,
			                    'walker' => ''
			                );

			                wp_nav_menu( $args ); ?>
						</div>
					<?php endif; ?>

					<?php if (has_nav_menu('menu_footer_3')): ?>

						<div class="lista">
							<h5><?php echo get_menu_title('menu_footer_3') ?></h5>
							<?php $args = array(
			                    'theme_location' => 'menu_footer_3',
			                    'container' => '',
			                    'menu_class' => 'menu',
			                    'menu_id' => '',
			                    'echo' => true,
			                    'fallback_cb' => '',
			                    'before' => '',
			                    'after' => '',
			                    'link_before' => '',
			                    'link_after' => '',
			                    'items_wrap' => '<ul id="menu-main-menu" class="menu-main">%3$s</ul>',
			                    'depth' => 0,
			                    'walker' => ''
			                );

			                wp_nav_menu( $args ); ?>
						</div>

					<?php endif; ?>

                </div>

                <div class="clearfix"></div>
                <div class="sep"></div>

            </div>

            <div class="bottom">

                <div class="left">
                    <span><?php echo gobcl_get_option('_gobcl_datos_contacto') ?></span>
                </div>

                <nav>
                    <?php

							$args = array(
			                    'theme_location' => 'menu_inferior',
			                    'container' => '',
			                    'menu_class' => 'menu',
			                    'menu_id' => '',
			                    'echo' => true,
			                    'fallback_cb' => '',
			                    'before' => '',
			                    'after' => '',
			                    'link_before' => '',
			                    'link_after' => '',
			                    'items_wrap' => '<ul id="menu-main-menu" class="menu-main">%3$s</ul>',
			                    'depth' => 0,
			                    'walker' => ''
			                );

			                wp_nav_menu( $args ); ?>
                </nav>

                <div class="clearfix"></div>

                <div class="bicolor">
					<span class="azul"></span>
					<span class="rojo"></span>
				</div>

            </div>

		</div>

	</footer>

	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

	<?php wp_footer(); ?>

	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/main.js" ></script>

</body>
</html>