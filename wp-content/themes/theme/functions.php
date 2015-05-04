<?php


function elustro_theme_setup() {


	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	//	add_image_size( 'big-square', 800, 800, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => 'Главное меню',
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
	) );


	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	//	add_editor_style( array( 'editor-style.css' ) );
}

add_action( 'after_setup_theme', 'elustro_theme_setup' );

function elustro_theme_scripts() {

	// Load our main stylesheet.
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() );

	// Super-simpole modernizr with only html5shiv and css-classes
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', false, '2.8.3' );

	// Yandex.Share
	wp_enqueue_script( 'yandex-share', '//yandex.st/share/share.js', array(), false, true );

	wp_enqueue_script( 'prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array( 'jquery' ), '3.1.5', true );
	wp_enqueue_script( 'theme-scripts', get_template_directory_uri() . '/js/theme.js', array( 'jquery' ), '1.0', true );
}

add_action( 'wp_enqueue_scripts', 'elustro_theme_scripts' );

require_once get_template_directory() . '/inc/helpers.php';