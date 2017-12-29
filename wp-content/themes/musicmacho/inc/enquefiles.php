<?php

/**
 * Enqueue scripts and styles.
 */

add_action( 'wp_enqueue_scripts', 'musicmacho_scripts' );
add_action( 'wp_footer', 'musicmacho_scripts_footer' );

function musicmacho_scripts() {

	$musicmachoSuffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Titillium+Web:400,200,300,600,700,900' );
    wp_enqueue_style( 'animate', get_template_directory_uri().'/css/animate.css' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome'.$musicmachoSuffix.'.css' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap'.$musicmachoSuffix.'.css');
    
	wp_enqueue_style( 'musicmacho-default', get_template_directory_uri().'/css/default.css' );
	wp_enqueue_style( 'musicmacho-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }

	wp_enqueue_script( 'html5', get_template_directory_uri() . '/js/html5shiv.js');
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
}

function musicmacho_scripts_footer() {	

	$musicmachoSuffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'animate', get_template_directory_uri() . '/js/css3-animate-it.js', array('jquery'));
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap'.$musicmachoSuffix.'.js', array('jquery'));	
	wp_enqueue_script( 'countdowntimer', get_template_directory_uri() . '/js/jquery.countdowntimer.js', array('jquery'));
	wp_enqueue_script( 'lucid', get_template_directory_uri() . '/js/lucid.js', array('jquery'));
	wp_enqueue_script( 'musicmacho-custom', get_template_directory_uri() . '/js/musicmacho-custom.js', array('jquery'));
}