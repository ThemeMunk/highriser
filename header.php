<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="main">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package highriser
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">        
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>        
	<!-- set the viewport width and initial-scale on mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header id="masthead" class="site-header" role="banner">
	<div class="container">

        <div class="site-branding col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <?php
            if( has_custom_logo() ){
                the_custom_logo();
            }
            ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                    <p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
            <?php  endif; ?>
        </div><!-- .site-branding -->

        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

            <div class="social-section clearfix">
            	<div class="top-search col-lg-7 col-md-12 col-sm-12 col-xs-12">
		            <?php get_search_form(); ?>
                </div>
    			<?php if( get_theme_mod( 'highriser_ed_social', '0' ) ) do_action( 'highriser_social' ); ?>
            </div>
	        <div class="clearfix"></div>
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
            </nav>
        </div>

	</div>
</header>

    <?php
        if ( is_front_page() || is_home() ) {
            if( get_theme_mod( 'highriser_ed_slider' ) ) do_action( 'highriser_slider' );
        }
    ?>
