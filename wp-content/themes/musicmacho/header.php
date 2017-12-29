<?php
/**
 * The header for our theme.
 *
 * @package musicmacho
 */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Lato:100,300,400,700,900" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php
    $pageJS =  get_post_meta($post->ID,'page_js',true);
    wp_head();
    if( is_home() ){
        wp_register_script( 'stories-js', '/wp-content/themes/musicmacho/js/stories.js' , '', '', false );
        wp_enqueue_script( 'stories-js');
    }
    if( is_front_page() ){
        wp_register_script( 'slick-js', '/wp-content/themes/musicmacho/js/slick.min.js' , '', '', false );
        wp_enqueue_script( 'slick-js');
        wp_register_script( 'home-js', '/wp-content/themes/musicmacho/js/home.js' , '', '', false );
        wp_enqueue_script( 'home-js');
    }
    if(isset($pageJS) && $pageJS != "" ){
        wp_register_script( $pageJS . '-js', '/wp-content/themes/musicmacho/js/' . $pageJS . '.js' , '', '', false );
        wp_enqueue_script( $pageJS . '-js');
    }

?>
    <script src="/endrukk/wp-content/themes/musicmacho/js/loader/snap.svg-min.js"></script>
    <script src="/endrukk/wp-content/themes/musicmacho/js/loader/classie.js"></script>
    <script src="/endrukk/wp-content/themes/musicmacho/js/loader/svgLoader.js"></script>
</head>
<body <?php body_class();?> style="overflow: hidden">

    <div id="loader" class="pageload-overlay show pageload-loading" data-opening="M20,15 50,30 50,30 30,30 Z;M0,0 80,0 50,30 20,45 Z;M0,0 80,0 60,45 0,60 Z;M0,0 80,0 80,60 0,60 Z" data-closing="M0,0 80,0 60,45 0,60 Z;M0,0 80,0 50,30 20,45 Z;M20,15 50,30 50,30 30,30 Z;M30,30 50,30 50,30 30,30 Z">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 80 60" preserveAspectRatio="none">
            <path d="M0,0C0,0,80,0,80,0C80,0,80,60,80,60C80,60,0,60,0,60C0,60,0,0,0,0"></path>
        </svg>
    </div>
    <span class="square-loader"><span class="square-inner"></span></span>

    <?php if( ( !is_front_page() ) && (!is_page_template( 'template-parts/front.php' ))) {  echo '<div class="MusicmachoWrap">';  } ?>
	<header>
        <?php $musicmacho_header_navigation_fixed = get_theme_mod('musicmacho_header_navigation_fixed'); ?>

        <!-- Menu start -->
        <div id="menu-button">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="menu-container">
            <?php if (has_nav_menu('primary')) {
                    $musicmacho_defaults = array(
                        'theme_location' => 'primary',
                        'container'      => 'div',
                        'container_id' => 'cssmenu'
                    );
                    wp_nav_menu($musicmacho_defaults);
                } ?>
        </div>
        <!-- Menu end -->

    </header>