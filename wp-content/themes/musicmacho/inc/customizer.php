<?php
/**
 * musicmacho Theme Customizer.
 *
 * @package musicmacho
 */

function musicmacho_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->add_panel( 'top_header',
	    array(
	        'title' => __( 'Header Settings', 'musicmacho' ),
	        'description' => __('Header Options','musicmacho'),
	        'priority' => 20, 
	    )
	);
	$wp_customize->add_panel( 'general',
	    array(
	        'title' => __( 'General Settings', 'musicmacho' ),
	        'description' => __('General Options','musicmacho'),
	        'priority' => 18, 
	    )
	);
	$wp_customize->add_section( 'musicmacho_footer_section' , array(
	    'title'       => __( 'Footer Settings', 'musicmacho' ),
	    'priority'    => 24,
	    'capability'     => 'edit_theme_options',
	) );
	$wp_customize->add_setting( 'musicmacho_footer_section_copyright_text', array(
		    'default'        => '',
		    'sanitize_callback' => 'sanitize_text_field',
		    'capability'     => 'edit_theme_options',
	) );
	$wp_customize->add_control( 'musicmacho_footer_section_copyright_text', array(
	  'label' => __( 'Footer CopyRight Text','musicmacho' ),
	  'section' => 'musicmachoFooterSection',
	  'type' => 'textarea',
	) );
	$wp_customize->get_section('background_image')->panel = 'general';
	$wp_customize->get_section('static_front_page')->panel = 'general';
	$wp_customize->get_section('title_tagline')->panel = 'general';
	$wp_customize->add_section( 'musicmacho_header_fixed' , array(
		'panel'    	=> 'top_header',
	    'title'    	=> __( 'Fixed Header', 'musicmacho' ),
	    'priority' 	=> 20,
	    'capability'=> 'edit_theme_options',
	) );
	$wp_customize->add_setting(
	    'musicmacho_header_navigation_fixed',
		    array('sanitize_callback' => 'sanitize_text_field')
		);
		$wp_customize->add_control(
	    	'musicmacho_header_navigation_fixed',
	   	 array(
	        'type' => 'checkbox',
	        'label' => 'Click here if you want fixed header on top.',
	        'section' => 'musicmacho_header_fixed',
	        'choices'        => array(
	            "1"   => esc_html__( "On ", 'musicmacho' ),
	            "0"   => esc_html__( "Off", 'musicmacho' ),
	        ),
	    )
	);
	$wp_customize->add_section( 'musicmacho_top_header_socials' , array(
		'panel'    => 'top_header',
	    'title'       => __( 'Social Settings', 'musicmacho' ),
	    'description' => __('In first input box, you need to add FONT AWESOME shortcode and in second input box, you need to add your social media profile URL.','musicmacho'),
	    'priority'    => 28,
	    'capability'     => 'edit_theme_options',
	) );
	for($i=1;$i<4;$i++) {
		$wp_customize->add_setting( 'musicmacho_social_icon'.$i, array(
		    'default'        => '',
		    'sanitize_callback' => 'sanitize_text_field',
		    'capability'     => 'edit_theme_options',
		) );
		$wp_customize->add_control( 'musicmacho_social_icon'.$i, array(
		    'label'   => __('Social Link-', 'musicmacho').$i,
		    'section' => 'musicmacho_top_header_socials',
		    'type'    => 'text',
		    'input_attrs' => array('placeholder' => __('fa-facebook','musicmacho')),
		) );
		
		$wp_customize->add_setting( 'musicmacho_social_url'.$i, array(
		    'default'        => '',
		    'sanitize_callback' => 'esc_url_raw',
		    'capability'     => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'musicmacho_social_url'.$i, array(
		    'section' => 'musicmacho_top_header_socials',
		    'type'    => 'text',
		    'input_attrs' => array('placeholder' => __('http://facebook.com','musicmacho')),
		) );
	}
	$wp_customize->add_section( 'musicmacho_top_header_logo' , array(
		'panel'    => 'top_header',
	    'title'       => __( 'Top Header Logo', 'musicmacho' ),
	    'priority'    => 25,
	    'capability'     => 'edit_theme_options',
	) );
	$wp_customize->add_setting( 'musicmacho_top_header_icon' , array('sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'musicmacho_top_header_icon', array(
                'label'    => __( 'Top Heaer Icon', 'musicmacho' ),
                'section'  => 'musicmacho_top_header_logo',
                'settings' => 'musicmacho_top_header_icon',
    ) ) );
    $wp_customize->add_setting(
	    'musicmacho_theme_color',
	    array(
	        'default' => '#ac403c',
	        'capability'     => 'edit_theme_options',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'musicmacho_theme_color',
	        array(
	            'label'      => __('Theme Color','musicmacho'),
	            'section' => 'colors',
	        )
	    )
	);
	$wp_customize->add_setting(
	    'musicmacho_secondary_color',
	    array(
	        'default' 			=> '#292A2E',
	        'capability'     	=> 'edit_theme_options',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'musicmacho_secondary_color',
	        array(
	            'label'   => __('Secondary Color','musicmacho'),
	            'section' => 'colors',
	        )
	    )
	);
}
add_action( 'customize_register', 'musicmacho_customize_register' );

function musicmacho_custom_css() { ?>
	
	<style type="text/css">
		.TitleCenterBlackRussian .line-right.go,.TitleCenterBlackRussian .line-left.go,.title-data ul li::before,.side-area ul li a::before,
		.pagination .page-numbers:hover,.singleblog-post-content .singleblog-tag a:hover{
			background: <?php echo esc_attr(get_theme_mod('musicmacho_theme_color','#AC403C')); ?>;
		}
		.side-area input:focus,
		.comment-form textarea:focus,
		.comment-form input:focus,
		.blog-content .search-form input:focus,
		.singleblog-post-content .content-text blockquote{
			border-color: <?php echo esc_attr(get_theme_mod('musicmacho_theme_color','#AC403C')); ?>;
		}
		.btn-black:hover,
		[type="submit"]:hover, input[type="submit"]:hover, button[type="submit"]:hover, .subscribe-form input[type="submint"]:hover{
			box-shadow: 5px 5px 0px <?php echo esc_attr(get_theme_mod('musicmacho_theme_color','#AC403C')); ?>;
		}
		.side-area ul li a:hover,
		.title-data a:hover,
		.singleblog-post-content .comment-wrap a:hover{
			color: <?php echo esc_attr(get_theme_mod('musicmacho_theme_color','#AC403C')); ?>;
		}
		.side-area ul li a:hover::before,
		.copyright-wrap,
		[type="submit"],
		input[type="submit"],
		button[type="submit"],
		.contact-us-form.darkForm input[type="submit"],
		.contact-us-form.lightForm input[type="submit"],
		.title-data ul li:hover::before,
		.btn-black,
		.header-wrap,.pagination .page-numbers,.singleblog-post-content .singleblog-tag a {
			background: <?php echo esc_attr(get_theme_mod('musicmacho_secondary_color','#292A2E')); ?>;
		}
		.comment-form textarea, .comment-form input,.side-area input,
		.blog-content .search-form input{
			border-color: <?php echo esc_attr(get_theme_mod('musicmacho_secondary_color','#292A2E')); ?>;
		}
		.title-data a,.SingleBlog-wrap a{
			color: <?php echo esc_attr(get_theme_mod('musicmacho_secondary_color','#292A2E')); ?>;
		}
		.pagination .page-numbers:hover {
			box-shadow: 5px 5px 0px <?php echo esc_attr(get_theme_mod('musicmacho_secondary_color','#292A2E')); ?>;
		}
	</style>
<?php }
add_action('wp_head','musicmacho_custom_css',900);

function musicmacho_customize_preview_js() {
	wp_enqueue_script( 'musicmacho_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'musicmacho_customize_preview_js' );
