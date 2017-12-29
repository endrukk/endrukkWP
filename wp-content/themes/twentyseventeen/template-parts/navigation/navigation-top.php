<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'twentyseventeen' ); ?>">

    <div class="menu-main-container" id="menu-main-container">
        <?php wp_nav_menu( array(
            'theme_location' => 'nav',
            'menu_id'        => 'menu-main',
            'link_before' => '<div class="circle-holder"></div><div class="menu-item">' ,
            'link_after' => '</div>'
        ) ); ?>
    </div>
</nav><!-- #site-navigation -->
