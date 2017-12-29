<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<?php

wp_enqueue_style( 'slider', get_template_directory_uri() . '/assets/css/bootstrap-grid.css',false,'1.1','all');
wp_head();

?>
<link rel="stylesheet" href="<?= get_site_url() ?>/wp-content/themes/twentyseventeen/assets/css/loader.css" type="text/css" media="screen" />
</head>

<body <?php body_class(); ?>>
<div class="cssload-wrap">
    <div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div>Loading...</div>
</div>
<div id="page" class="site">
	<header id="masthead" class="site-header" role="banner">
<!--		--><?php //get_template_part( 'template-parts/header/header', 'image' ); ?>

<!--        LOGO-->
        <div class="site-logo">
            <?= the_custom_logo(); ?>
        </div>

<!--        TILTE-->
        <?php if ( is_home() && ! is_front_page() ) : ?>
            <header class="page-header">
                <h1 class="page-title"><?php single_post_title(); ?></h1>
            </header>
        <?php else : ?>
            <header class="page-header">
                <h1 class="page-title"><?php _e( 'Stories', 'twentyseventeen' ); ?></h1>
            </header>
        <?php endif; ?>

<!--        MENU-->
		<?php if ( has_nav_menu( 'top' ) ) : ?>
			<div class="navigation-top">
				<div class="wrap">
                    <div id="menu-toggle"><span></span></div>
                    <?php  get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
		<?php endif; ?>

	</header><!-- #masthead -->

	<?php

	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */
	if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="single-featured-image-header">';
		echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>

	<div class="site-content-contain">
		<div id="content" class="site-content">