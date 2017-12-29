<?php
/*
Widget Name: MusicMacho Button
Description: A powerful yet simple button widget for your sidebars or Page Builder pages.
*/
class musicmacho_button_widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'button-widget',
			__('MusicMacho Button', 'musicmacho'),
			array(
				'description' => __('A customizable button widget.', 'musicmacho'),
				'panels_groups' => array('musicGroup')
			)
		);
	}
	function initialize() {
		$this->register_frontend_styles(
			array(
				array(
					'musicmacho-button-base',
					get_template_directory_uri().'/inc/widgets/button-widget/assets/css/styles.css',
					array(),
				),
			)
		);
	}
	function initialize_form() {
		return array(
			'musicmacho_text' => array(
				'type' => 'text',
				'default' => 'Button',
				'label' => __('Button text', 'musicmacho'),
				'sanitize' => 'sanitize_text_field'
			),
			'musicmacho_button_icon' => array(
				'type' => 'icon',
				'label' => __('Icon', 'musicmacho'),
			),
			'musicmacho_url' => array(
				'type' => 'link',
				'label' => __('Destination URL', 'musicmacho'),
			),
			'musicmacho_new_window' => array(
				'type' => 'checkbox',
				'default' => false,
				'label' => __('Open in a new window', 'musicmacho'),
			),
			'musicmacho_design' => array(
				'type' => 'section',
				'label' => __('Design and layout', 'musicmacho'),
				'hide' => true,
				'fields' => array(
					'musicmacho_font' => array(
						'type' => 'font',
						'label' => __( 'Font', 'musicmacho' ),
						'default' => 'default'
					),
					'musicmacho_width' => array(
						'type' => 'measurement',
						'label' => __('Button Width', 'musicmacho'),
					),
					'musicmacho_border_width' => array(
						'type' => 'measurement',
						'label' => __('Button Border Width', 'musicmacho'),
					),
					'musicmacho_border_radius' => array(
						'type' => 'measurement',
						'label' => __('Button Radius', 'musicmacho'),
					),
					'musicmacho_align' => array(
						'type' => 'select',
						'label' => __('Align', 'musicmacho'),
						'default' => 'center',
						'options' => array(
							'left' => __('Left', 'musicmacho'),
							'right' => __('Right', 'musicmacho'),
							'center' => __('Center', 'musicmacho'),
							'justify' => __('Justify', 'musicmacho'),
						),
					),
					'musicmacho_theme' => array(
						'type' => 'select',
						'label' => __('Button theme', 'musicmacho'),
						'default' => 'style1',
						'options' => array(
							'style1' => __('Style 1', 'musicmacho'),
						),
					),
					'musicmacho_button_color_option' => array(
						'type' => 'select',
						'label' => __( 'Select Color Option', 'musicmacho'),
						'description' => __('if you select theme default colors option then customizer colors will be render.','musicmacho'),
						'default' => '1',
						'options' => array(
							'1' => 'Theme Default Colors',
							'2' => 'Custom Colors',
				        ),
						'state_emitter' => array(
							'callback' => 'select',
							'args'     => array( 'musicmacho_theme_color' )
						),
						'sanitize' => 'sanitize_text_field'
				    ),
					'musicmacho_button_color' => array(
						'type' => 'color',
						'label' => __('Button color', 'musicmacho'),
						'state_handler' => array(
							'musicmacho_theme_color[1]' => array( 'hide' ),
							'musicmacho_theme_color[2]' => array( 'show' ),
						),
					),
					'musicmacho_hover_color' => array(
						'type' => 'color',
						'label' => __('Hover color', 'musicmacho'),
						'state_handler' => array(
							'musicmacho_theme_color[1]' => array( 'hide' ),
							'musicmacho_theme_color[2]' => array( 'show' ),
						),
					),
					'musicmacho_text_color' => array(
						'type' => 'color',
						'label' => __('Text color', 'musicmacho'),
						'state_handler' => array(
							'musicmacho_theme_color[1]' => array( 'hide' ),
							'musicmacho_theme_color[2]' => array( 'show' ),
						),
					),
					'musicmacho_hover' => array(
						'type' => 'checkbox',
						'default' => true,
						'label' => __('Use hover effects', 'musicmacho'),
					),
					'musicmacho_font_size' => array(
						'type' => 'measurement',
						'label' => __('Font size', 'musicmacho'),
					),
					'musicmacho_padding_top' => array(
						'type' => 'measurement',
						'label' => __('Padding Top', 'musicmacho'),
					),
					'musicmacho_padding_right' => array(
						'type' => 'measurement',
						'label' => __('Padding Right', 'musicmacho'),
					),
					'musicmacho_padding_bottom' => array(
						'type' => 'measurement',
						'label' => __('Padding Bottom', 'musicmacho'),
					),
					'musicmacho_padding_left' => array(
						'type' => 'measurement',
						'label' => __('Padding Left', 'musicmacho'),
					),
				),
			),
			'musicmacho_attributes' => array(
				'type' => 'section',
				'label' => __('Other attributes and SEO', 'musicmacho'),
				'hide' => true,
				'fields' => array(
					'musicmacho_id' => array(
						'type' => 'text',
						'label' => __('Button ID', 'musicmacho'),
						'description' => __('An ID attribute allows you to target this button in Javascript.', 'musicmacho'),
					),

					'musicmacho_title' => array(
						'type' => 'text',
						'label' => __('Title attribute', 'musicmacho'),
						'description' => __('Adds a title attribute to the button link.', 'musicmacho'),
					),

					'musicmacho_onclick' => array(
						'type' => 'text',
						'label' => __('Onclick', 'musicmacho'),
						'description' => __('Run this Javascript when the button is clicked. Ideal for tracking.', 'musicmacho'),
					),
				),
			),
		);
	}
	function get_template_name($instance) {
		return 'button-widget-template';
	}
	function get_style_name($instance) {
		if(empty($instance['musicmacho_design']['theme'])) return 'style1';
		return $instance['musicmacho_design']['theme'];
	}

	/**
	* Get the variables that we'll be injecting into the less stylesheet.
	*
	* @param $instance
	*
	* @return array
	*/
	function get_less_variables($instance){
		if( empty( $instance ) || empty( $instance['musicmacho_design'] ) ) return array();
		$musicmacho_less_vars = array();
		$musicmacho_less_vars['musicmacho_button_width'] = isset( $instance['musicmacho_design']['width'] ) ? $instance['musicmacho_design']['width'] : '';
		$musicmacho_less_vars['musicmacho_border_width'] = isset( $instance['musicmacho_design']['musicmacho_border_width'] ) ? $instance['musicmacho_design']['musicmacho_border_width'] : '';
		$musicmacho_less_vars['musicmacho_border_radius'] = isset( $instance['musicmacho_design']['musicmacho_border_radius'] ) ? $instance['musicmacho_design']['musicmacho_border_radius'] : '';
		$musicmacho_less_vars['musicmacho_has_button_width'] = empty( $instance['musicmacho_design']['width'] ) ? 'false' : 'true';
		$musicmacho_less_vars['musicmacho_button_color'] = $instance['musicmacho_design']['musicmacho_button_color_option'] === '1' ? get_theme_mod('secondaryColor','#292A2E') : $instance['musicmacho_design']['musicmacho_button_color'];
		$musicmacho_less_vars['musicmacho_hover_color'] = $instance['musicmacho_design']['musicmacho_button_color_option'] === '1' ? get_theme_mod('musicmacho_theme_color','#AC403C') : $instance['musicmacho_design']['musicmacho_hover_color'];
		$musicmacho_less_vars['musicmacho_text_color'] = $instance['musicmacho_design']['musicmacho_button_color_option'] === '1' ? get_theme_mod('bodyOverlayColor','#fff') : $instance['musicmacho_design']['musicmacho_text_color'];
		$musicmacho_less_vars['musicmacho_font_size'] = isset($instance['musicmacho_design']['fontSize']) ? $instance['musicmacho_design']['musicmacho_font_size'] : '';
		$musicmacho_less_vars['musicmacho_padding_left'] = isset( $instance['musicmacho_design']['musicmacho_padding_left'] ) ? $instance['musicmacho_design']['musicmacho_padding_left'] : '40px';
		$musicmacho_less_vars['musicmacho_padding_bottom'] = isset( $instance['musicmacho_design']['musicmacho_padding_bottom'] ) ? $instance['musicmacho_design']['musicmacho_padding_bottom'] : '15px';
		$musicmacho_less_vars['musicmacho_padding_right'] = isset( $instance['musicmacho_design']['musicmacho_padding_right'] ) ? $instance['musicmacho_design']['musicmacho_padding_right'] : '40px';
		$musicmacho_less_vars['musicmacho_padding_top'] = isset( $instance['musicmacho_design']['musicmacho_padding_top'] ) ? $instance['musicmacho_design']['musicmacho_padding_top'] : '15px';
		$musicmacho_less_vars['musicmacho_has_text'] = empty( $instance['text'] ) ? 'false' : 'true';

		// button font family and weight
		if ( ! empty( $instance['musicmacho_design']['musicmacho_font'] ) ) {
			$font = siteorigin_widget_get_font( $instance['musicmacho_design']['musicmacho_font'] );
			$musicmacho_less_vars['musicmacho_button_font'] = $font['family'];
			if ( ! empty( $font['weight'] ) ) {
				$musicmacho_less_vars['musicmacho_button_fontweight'] = $font['weight'];
			}
		}
		return $musicmacho_less_vars;
	}

	/**
	* Make sure the instance is the most up to date version.
	*
	* @param $instance
	*
	* @return mixed
	*/
	function modify_instance($instance){

		if( empty($instance['musicmacho_button_icon']) ) {
			$instance['musicmacho_button_icon'] = array();
			if(isset($instance['icon_selected'])) $instance['musicmacho_button_icon']['icon_selected'] = $instance['icon_selected'];
			if(isset($instance['icon_color'])) $instance['musicmacho_button_icon']['icon_color'] = $instance['icon_color'];
			if(isset($instance['icon'])) $instance['musicmacho_button_icon']['icon'] = $instance['icon'];
			unset($instance['icon_selected']);
			unset($instance['icon_color']);
			unset($instance['icon']);
		}

		if( empty($instance['musicmacho_design']) ) {
			$instance['musicmacho_design'] = array();
			if(isset($instance['musicmacho_align'])) $instance['musicmacho_design']['musicmacho_align'] = $instance['musicmacho_align'];
			if(isset($instance['theme'])) $instance['musicmacho_design']['theme'] = $instance['theme'];
			if(isset($instance['button_color'])) $instance['musicmacho_design']['button_color'] = $instance['button_color'];
			if(isset($instance['text_color'])) $instance['musicmacho_design']['text_color'] = $instance['text_color'];
			if(isset($instance['musicmacho_hover'])) $instance['musicmacho_design']['musicmacho_hover'] = $instance['musicmacho_hover'];
			if(isset($instance['musicmacho_font_size'])) $instance['musicmacho_design']['musicmacho_font_size'] = $instance['musicmacho_font_size'];
			if(isset($instance['musicmacho_rounding'])) $instance['musicmacho_design']['musicmacho_rounding'] = $instance['musicmacho_rounding'];
			if(isset($instance['musicmacho_padding'])) $instance['musicmacho_design']['musicmacho_padding'] = $instance['musicmacho_padding'];
			unset($instance['musicmacho_align']);
			unset($instance['theme']);
			unset($instance['musicmacho_button_color']);
			unset($instance['musicmacho_text_color']);
			unset($instance['musicmacho_hover']);
			unset($instance['musicmacho_font_size']);
			unset($instance['musicmacho_rounding']);
			unset($instance['musicmacho_padding']);
		}
		if( empty($instance['musicmacho_attributes']) ) {
			$instance['musicmacho_attributes'] = array();
			if(isset($instance['musicmacho_id'])) $instance['musicmacho_attributes']['musicmacho_id'] = $instance['musicmacho_id'];
			unset($instance['musicmacho_id']);
		}
		return $instance;
	}
}
siteorigin_widget_register('button-widget', __FILE__, 'musicmacho_button_widget');
