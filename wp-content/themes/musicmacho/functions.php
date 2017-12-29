<?php
/**
 * musicmacho functions and definitions.
 *
 * @package musicmacho
 */

if ( ! function_exists( 'musicmacho_setup' ) ) :

function musicmacho_setup() {
	
	load_theme_textdomain( 'musicmacho', get_template_directory() . '/languages' );

	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-logo', array(
			'height'      => 80,
			'width'       => 500,
			'flex-width' => true,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' ),
	) );
	
	add_editor_style();
	
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size('musicmacho-blog-thumbnail-image', 282, 282, true);
	

	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'musicmacho' ),
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'custom-background', apply_filters( 'musicmacho_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	function musicmacho_active_widgets($active){
		//Theme widgets
	    $active['timer-widget'] = true;
	    $active['button-widget'] = true;
	    
	    //Bundled Widgets
	    $active['contact'] = true;
	    $active['cta'] = true;
	    $active['editor'] = true;
	    $active['features'] = true;
	    $active['google-map'] = true;
	    $active['headline'] = true;
	    $active['hero'] = true;
	    $active['icon'] = true;
	    $active['image'] = true;
	    $active['image-grid'] = true;
	    $active['portfolio-grid'] = true;
	    $active['layout-slider'] = true;
	    $active['post-carousel'] = true;
	    $active['price-table'] = true;
	    $active['simple-masonry'] = true;
	    $active['slider'] = true;
	    $active['slick-slider'] = true;
	    $active['social-media-buttons'] = true;
	    $active['taxonomy'] = true;
	    $active['testimonial'] = true;
	    $active['video'] = true;
	    $active['button'] = true;
		return $active;
  	}
}
endif;
add_action( 'after_setup_theme', 'musicmacho_setup' );

function musicmacho_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'musicmacho_content_width', 640 );
}
add_action( 'after_setup_theme', 'musicmacho_content_width', 0 );

function musicmacho_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'musicmacho' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'musicmacho' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'musicmacho_widgets_init' );

add_action( 'tgmpa_register', 'musicmacho_register_recommended_plugins' );

function musicmacho_register_recommended_plugins() 
{
    if(class_exists('TGM_Plugin_Activation')) { 
         $plugins = array(
     		array(
	           'name'      => esc_html__('Page Builder by SiteOrigin','musicmacho'),
	           'slug'      => 'siteorigin-panels',
	           'required'  => false,
	        ),
	        array(
	           'name'      => esc_html__('SiteOrigin Widgets Bundle','musicmacho'),
	           'slug'      => 'so-widgets-bundle',
	           'required'  => false,
	        ),
			array(
				'name'      => esc_html__('Contact Form 7','musicmacho'),
				'slug'      => 'contact-form-7',
				'required'  => false,
			),
             
         );
     
         $config = array(
           'default_path' => '',                      
           'menu'         => 'musicmacho-install-plugins', 
           'has_notices'  => true,                    
           'dismissable'  => true,                    
           'dismiss_msg'  => '',                      
           'is_automatic' => false,                   
           'message'      => '',                      
           'strings'      => array(
               'page_title'                      => esc_html__( 'Install Required Plugins', 'musicmacho' ),
               'menu_title'                      => esc_html__( 'Install Plugins', 'musicmacho' ),
               'installing'                      => esc_html__( 'Installing Plugin: %s', 'musicmacho' ), 
               'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'musicmacho' ),
               'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','musicmacho' ), 
               'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','musicmacho' ), 
               'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','musicmacho' ), 
               'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','musicmacho' ), 
               'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','musicmacho' ), 
               'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','musicmacho' ), 
               'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','musicmacho' ), 
               'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','musicmacho' ), 
               'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins','musicmacho' ),
               'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins','musicmacho' ),
               'return'                          => esc_html__( 'Return to Required Plugins Installer', 'musicmacho' ),
               'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'musicmacho' ),
               'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'musicmacho' ), 
               'nag_type'                        => 'updated'
           )
         );
         tgmpa( $plugins, $config );
    }

}
function MusicMachoAddWidgetFolders( $folders ){
    $folders[] = get_template_directory() . '/inc/widgets/';
    return $folders;
}
add_action('siteorigin_widgets_widget_folders', 'MusicMachoAddWidgetFolders');
/*
* Extending heading widget 
*/
function MusicMachoExtendHeading( $formOptions, $widget ){
    // Lets add a new theme option
    if( !empty($formOptions['divider']['fields']['style']['options']) ) {
      $formOptions['divider']['fields']['style']['options']['musicMachoDivider'] = esc_html__('Theme Style', 'musicmacho');
    }
    return $formOptions;
}
add_filter('siteorigin_widgets_form_options_sow-headline', 'MusicMachoExtendHeading', 10, 2);
/*
* Heading less 
*/
add_filter( 'siteorigin_widgets_less_file_sow-headline', 'MusicMachoHeadingLessFile', 10, 3 );
function MusicMachoHeadingLessFile( $fileName, $instance, $widget ){
    if( !empty($instance['divider']['style']) && $instance['divider']['style'] == 'musicMachoDivider' ) {
        // And this one for themes
        $fileName = get_stylesheet_directory() . '/inc/widgets/headline/style.less';
    }
    return $fileName;
}
/*
* Extending Button widget 
*/
function MusicMachoExtendButton( $formOptions, $widget ){
    // Lets add a new theme option
    if( !empty($formOptions['design']['fields']['theme']['options']) ) {
      $formOptions['design']['fields']['theme']['options']['musicMachoButton'] = esc_html__('Theme Style', 'musicmacho');
    }
    return $formOptions;
}
add_filter('siteorigin_widgets_form_options_sow-button', 'MusicMachoExtendButton', 10, 2);
/*
* Heading less 
*/
add_filter( 'siteorigin_widgets_less_file_sow-button', 'MusicMachoButtonLessFile', 10, 3 );
function MusicMachoButtonLessFile( $fileName, $instance, $widget ){
    if( !empty($instance['design']['theme']) && $instance['design']['theme'] == 'musicMachoButton' ) {
        // And this one for themes
        $fileName = get_stylesheet_directory() . '/inc/widgets/button/style.less';
    }
    return $fileName;
}
//Add Tabs
function MusicMachoAddWidgetTabs($tabs) {
    $tabs[] = array(
        'title' => esc_html__('MusicMacho Widgets', 'musicmacho'),
        'filter' => array(
            'groups' => array('musicGroup')
        )
    );
    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'MusicMachoAddWidgetTabs', 10);
add_action('admin_menu', 'musicmacho_options_add_page');
function musicmacho_options_add_page() {
  add_theme_page(esc_html__('MusicMachoPro Features', 'musicmacho'), esc_html__('MusicMachoPro Features', 'musicmacho'), 'edit_theme_options', 'musicmacho-pro-page','musicmacho_page');
}
function musicmacho_page(){ ?>
<div class="musicmacho-version">
  <a href="<?php echo esc_url('https://indigothemes.com/products/musicmacho-pro-wordpress-theme/'); ?>" target="_blank">
    <img src ="<?php echo esc_url('https://indigothemes.com/wp-content/uploads/musicmacho/features.jpg') ?>" width="100%" height="auto" />
  </a>
</div>
<?php 
}
/**
 * Implement Class TGM_Plugin_Activation
 */
require_once get_template_directory() .'/inc/class-tgm-plugin-activation.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Add css and js.
 */
require get_template_directory() . '/inc/enquefiles.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add "odd", "even" class to the wordpress posts
 */
function oddeven_post_class ( $classes ) {
    global $current_class;
    $classes[] = $current_class;
    $current_class = ($current_class == 'odd') ? 'even' : 'odd';
    return $classes;
}
add_filter ( 'post_class' , 'oddeven_post_class' );
global $current_class;
$current_class = 'odd';