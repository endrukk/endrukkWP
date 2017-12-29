<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		</div><!-- #content -->

    <?php
    $mobileOsPopup = mobile_app_popup();
    if( $mobileOsPopup && wp_is_mobile() ){
    ?>
        <div id="app_advertise_fixed">
            <div onclick="location.href='<?= $mobileOsPopup;?>'" id="app_image">
                <img width="70" height="70" src="/wp-content/uploads/logoApp.png">
            </div>
            <div onclick="location.href='<?= $mobileOsPopup;?>'" id="app_text">
                <strong>Alkaline Care APP</strong> <br>
                Portes gratuitos hasta final de año.<br>
                <span class="app_gratis">Gratuita</span> - <a class="descarga_app" href="#">Descarga App</a>
            </div>
            <div id="APPpopupClose" onclick="javascript:closePopUpApp()">
                x
            </div>
        </div>
    <?php
    }
    ?>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrap">
				<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );

				if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif;

				get_template_part( 'template-parts/footer/site', 'info' );
				?>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

<?php
/*footer loader*/
?>

<script>
    $(document).ready(function () {
        hideLoader();
    });
</script>
</html>
