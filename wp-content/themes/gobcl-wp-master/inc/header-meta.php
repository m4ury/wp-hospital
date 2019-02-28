<!-- Facebook -->

<?php if (is_home()): ?>

	<meta property="og:title" content="<?php bloginfo('name'); ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo site_url(); ?>" />
	<meta property="og:image" content="<?php echo get_theme_mod( 'gobcl_logo' ); ?>" />
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
	<meta property="og:description" content="<?php bloginfo('description'); ?>">

<?php elseif (is_singular()): ?>

	<meta property="og:title" content="<?php echo $post->post_title ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo get_permalink($post->ID); ?>" />
	<meta property="og:image" content="<?php $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID)); echo $img[0]; ?>" />
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
	<meta property="og:description" content="<?php echo wp_trim_words( $post->post_content, 40, '...' ); ?>">

<?php endif ?>


<!-- ToDo: Twitter -->