<?php
/**
 * Plugin Name: Social sharing
 * Plugin URI: http://danielpataki.com
 * Description: This plugin adds social sharing buttons to the bottom of the posts
 * Version: 1.0.0
 * Author: Endre Soó
 * Author URI: http://danielpataki.com
 * License: GPL2
 */
add_action( 'wp_head', 'social_sharing' );

function social_sharing() {
    if( is_single() ) {
        ?>
<!--        Facebook-->
        <meta property="og:title" content="<?php the_title() ?>" />
        <meta property="og:site_name" content="<?php bloginfo( 'name' ) ?>" />
        <meta property="og:url" content="<?php the_permalink() ?>" />
        <meta property="og:description" content="<?php the_excerpt() ?>" />
        <meta property="og:type" content="article" />

        <?php
        if ( has_post_thumbnail() ) :
            $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
            ?>
            <meta property="og:image" content="<?php echo $image[0]; ?>"/>
        <?php endif; ?>
<!--        /Facebook-->
<!--        Twitter-->

<!--        /Twitter-->

        <?php
    }
}

add_action('admin_menu', 'my_plugin_menu');

function my_plugin_menu() {
    add_menu_page('Social sharing plugin settings', 'Social sharing settings', 'manage_options', 'social-sharing-plugin-settings', 'social_sharing_plugin_settings_page', 'dashicons-admin-generic');
}


include('settings/main.php');
