<?php
/**
 * Custom Header feature.
 *
 * @package musicmacho
 */

function musicmacho_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'musicmacho_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1300,
		'height'                 => 700,
		'flex-height'            => true,
		'wp-head-callback'       => 'musicmacho_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'musicmacho_custom_header_setup' );

if ( ! function_exists( 'musicmacho_header_style' ) ) :
function musicmacho_header_style() {
	$header_text_color = get_header_textcolor();
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) { return; } ?>
	<style type="text/css">
	<?php  if ( ! display_header_text() ) : ?>
		a .site-title,
		a .site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php else : ?>
		a .site-title,
		a .site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php }
endif;