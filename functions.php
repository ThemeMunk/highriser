<?php
/**
 * Highriser functions and definitions.
 *
 * Do not go gentle into that good night,
 * Old age should burn and rave at close of day;
 * Rage, rage against the dying of the light.
 *
 * Though wise men at their end know dark is right,
 * Because their words had forked no lightning they
 * Do not go gentle into that good night.
 *
 * Dylan Thomas, 1914 - 1953
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License as published by the Free Software Foundation; either version 2 of the License,
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @package    Highriser
 * @subpackage Functions
 * @author     ThemeMunk <support@thememunk.com>
 * @copyright  Copyright (c) 2015 - 2016, ThemeMunk
 * @link       https://thememunk.com/theme/highriser
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package highriser
 */

if ( ! function_exists( 'highriser_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function highriser_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on highriser, use a find and replace
	 * to change 'highriser' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'highriser' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// add custmo logo support
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 250,
		'flex-width' => true,
		'flex-height' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
    add_image_size( 'highriser-slider', 1100, 400, true); 	// Custom Image Size

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'highriser' ),
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
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'highriser_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

}
endif;
add_action( 'after_setup_theme', 'highriser_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function highriser_content_width() {

	$content_width = 750;
	$GLOBALS['content_width'] = apply_filters( 'highriser_content_width', $content_width );	
	
}
add_action( 'after_setup_theme', 'highriser_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function highriser_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Main', 'highriser' ),
		'id'            => 'sidebar-main',
		'description'   => esc_html__( 'Use this widget area to display widgets in the post and pages.', 'highriser' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'highriser' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Use this widget area to display widgets in the first column of the footer.', 'highriser' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'highriser' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Use this widget area to display widgets in the second column of the footer.', 'highriser' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'highriser' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Use this widget area to display widgets in the third column of the footer.', 'highriser' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'highriser_widgets_init' );

/**
 * Register custom fonts.
 */
function highriser_fonts_url() {

	$fonts_url = '';
	
	/* Translators: If there are characters in your language that are not
	* supported by Source Sans, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$source_sans = _x( 'on', 'Source Sans Pro: on or off', 'highriser' );
	 
	/* Translators: If there are characters in your language that are not
	* supported by Source Serif, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$roboto = _x( 'on', 'Roboto: on or off', 'highriser' );
	 
	if ( 'off' !== $source_sans || 'off' !== $roboto ) {
	$font_families = array();	
	 
	if ( 'off' !== $source_sans ) {
	$font_families[] = 'Source Sans Pro:300,400,600,700,900';
	}
	 
	if ( 'off' !== $roboto ) {
	$font_families[] = 'Roboto:400,500,700,900';
	}
	 
	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);
	 
	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
	 
	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function highriser_scripts() {
	wp_enqueue_style( 'highriser-google-fonts', highriser_fonts_url(), array(), null );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'jquery-lightslider', get_template_directory_uri(). '/css/lightslider.css' );
	wp_enqueue_style( 'jquery-meanmenu', get_template_directory_uri() . '/css/meanmenu.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri(). '/css/bootstrap.css' );
	wp_enqueue_style( 'highriser-cards-style', get_template_directory_uri(). '/css/cards.css' );
	wp_enqueue_style( 'highriser-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery-meanmenu', get_template_directory_uri() . '/js/jquery.meanmenu.js', array('jquery'), '2.6.0', true );
	wp_enqueue_script( 'jquery-lightslider', get_template_directory_uri() . '/js/lightslider.js', array('jquery'), '2.6.0', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '2.6.0', true );
	wp_enqueue_script( 'jquery-matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight.js', array('jquery'), '2.6.0', true );
	wp_enqueue_script( 'highriser-cards', get_template_directory_uri() . '/js/cards.js', array('jquery'), '2.6.0', true );
	wp_enqueue_script( 'highriser-custom-js', get_template_directory_uri() . '/js/highriser.js', array('jquery'), '1.0.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'highriser_scripts' );

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Custom Theme Functions
 */
require_once get_template_directory() . '/inc/extras.php';

/**
 * Theme Info in Customizer
 */
require_once get_template_directory() . '/inc/info.php';