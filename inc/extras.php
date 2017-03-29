<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package highriser
 */

 /**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function highriser_body_classes( $classes ) {

	if ( ! is_active_sidebar( 'sidebar-main' ) ) {	
		$classes[] = 'full-width';
	}    

    $slider_body_ed = get_theme_mod( 'highriser_ed_slider', '0' );
	if ( $slider_body_ed ) {
		$classes[] = 'slideshow-enabled';
	}

	return $classes;
}
add_filter( 'body_class', 'highriser_body_classes' );

/**
 * Callback for Social Links
 */
function highriser_social_cb(){
    $facebook   = get_theme_mod( 'highriser_facebook' );
    $twitter    = get_theme_mod( 'highriser_twitter' );
    $instagram  = get_theme_mod( 'highriser_instagram' );
    $google_plus= get_theme_mod( 'highriser_google_plus' );
    $pinterest  = get_theme_mod( 'highriser_pinterest' );
    $linkedin   = get_theme_mod( 'highriser_linkedin' );
    $youtube    = get_theme_mod( 'highriser_youtube' );

    if( $facebook || $twitter || $instagram || $google_plus || $pinterest || $linkedin || $youtube ){
    ?>
    <ul class="social-networks col-lg-5 col-md-12 col-sm-12 col-xs-12 pull-right">
		<?php if( $facebook ){?>
            <li><a href="<?php echo esc_url( $facebook );?>" target="_blank" title="<?php esc_html_e( 'Facebook', 'highriser' ); ?>"><span class="fa fa-facebook"></span></a></li>
		<?php } if( $twitter ){?>
            <li><a href="<?php echo esc_url( $twitter );?>" target="_blank" title="<?php esc_html_e( 'Twitter', 'highriser' ); ?>"><span class="fa fa-twitter"></span></a></li>
        <?php } if( $instagram ){?>
            <li><a href="<?php echo esc_url( $instagram );?>" target="_blank" title="<?php esc_html_e( 'Instagram', 'highriser' ); ?>"><span class="fa fa-instagram"></span></a></li>
		<?php } if( $google_plus ){?>
            <li><a href="<?php echo esc_url( $google_plus );?>" target="_blank" title="<?php esc_html_e( 'Google Plus', 'highriser' ); ?>"><span class="fa fa-google-plus"></span></a></li>
        <?php } if( $pinterest ){?>
            <li><a href="<?php echo esc_url( $pinterest );?>" target="_blank" title="<?php esc_html_e( 'Pinterest', 'highriser' ); ?>"><span class="fa fa-pinterest-p"></span></a></li>
		<?php } if( $linkedin ){?>
            <li><a href="<?php echo esc_url( $linkedin );?>" target="_blank" title="<?php esc_html_e( 'LinkedIn', 'highriser' ); ?>"><span class="fa fa-linkedin"></span></a></li>
		<?php } if( $youtube ){?>
            <li><a href="<?php echo esc_url( $youtube );?>" target="_blank" title="<?php esc_html_e( 'YouTube', 'highriser' ); ?>"><span class="fa fa-youtube"></span></a></li>
        <?php }?>
	</ul>
    <?php
    }
}
add_action( 'highriser_social', 'highriser_social_cb' );

/**
 * Callback function for Home Page Slider
 */
function highriser_slider_cb(){
    $slider_caption  = get_theme_mod( 'highriser_slider_caption', '1' );
    $slider_readmore = get_theme_mod( 'highriser_slider_readmore', esc_html__( 'Read More', 'highriser' ) );
    $slider_char     = get_theme_mod( 'highriser_slider_char', 100 );

	$sticky_post     = get_option( 'sticky_posts' ); //get all sticky posts 
	rsort( $sticky_post ); /* Sort the stickies with the newest ones at the top http://justintadlock.com/archives/2009/03/28/get-the-latest-sticky-posts-in-wordpress */
	$sticky = array_slice( $sticky_post, 0, 6 ); //slice the array to only store first six stickies


    if ( $sticky_post ) {
 
        $query = new WP_Query( array(
			'post_type'           => 'post', 
			'post_status'         => 'publish',
			'posts_per_page'      => 6,
			'post__in'            => $sticky,
			'orderby'       => 'post__in',		
			'ignore_sticky_posts' => 1,	
        ));
        if( $query->have_posts() ){ ?>
        <div class="slideshow">
            <ul id="imagegallery">
            <?php
            while( $query->have_posts() ){
                $query->the_post();
                $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'highriser-slider' );
                if ( has_post_thumbnail() ) {				
                ?>                
                <li>
                <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" /></a>
	            <?php if( $slider_caption ){ ?>
                    <div class="banner-text">
    					<div class="text">
                            <div class="category">
                                <?php
                                    $categories = get_the_category();
                                    if ( ! empty( $categories ) ) {
                                        echo '<a class="category" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                    }
                                ?>
                            </div>
    						<strong class="title"><?php the_title(); ?></strong>
                            <a href="<?php  the_permalink() ; ?>" class="btn-readmore"><?php echo esc_html( $slider_readmore ); ?></a>
    					</div>
    				</div>
                    <?php } ?>
                </li>                
                <?php
				}
            }
            wp_reset_postdata();
            ?>
            </ul>
        </div>
        <?php
        }		
	}		

}
add_action( 'highriser_slider', 'highriser_slider_cb' );

/**
 * Function to exclude sticky post from main query
*/
function highriser_exclude_sticky_post( $query ){

    $stickies = get_option( 'sticky_posts' );     //get all sticky posts
	rsort( $stickies ); /* Sort the stickies with the newest ones at the top */		
	$featured_stickies = array_slice($stickies, 0, 6);     //slice the array to only store first six stickies

    if ( ! is_admin() && $query->is_home() && $query->is_main_query() && get_theme_mod( 'highriser_ed_slider' ) && $featured_stickies ) {
        $query->set( 'post__not_in',  $featured_stickies );
    }    
}
add_filter( 'pre_get_posts', 'highriser_exclude_sticky_post' );

if ( ! function_exists( 'highriser_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... is_admin is added so it does not runs on admin dashboard
 */
function highriser_excerpt_more() {
	return ' &hellip; ';
}
add_filter( 'excerpt_more', 'highriser_excerpt_more' );
endif;

if ( ! function_exists( 'highriser_excerpt_length' ) && ! is_admin() ) :
/**
 * Changes the default 55 character in excerpt. is_admin is added so it does not runs on admin dashboard
*/
function highriser_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'highriser_excerpt_length', 999 );
endif;

/**
 * Footer Credits
*/
if ( ! function_exists( 'highriser_footer_credit' ) ) :

function highriser_footer_credit(){

    $text  = '<div class="copyright">';
    $text .=  esc_html__( 'Copyright &copy; ', 'highriser' ) . date_i18n( 'Y' );
    $text .= ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>. ';
    $text .= '</div><span class="by">';
    $text .= '<a href="' . esc_url( 'http://thememunk.com/theme/highriser/' ) .'" rel="author" target="_blank">' . esc_html__( 'Theme Highriser by ThemeMunk', 'highriser' ) .'</a>. ';
    $text .= sprintf( esc_html__( 'Powered by %s', 'highriser' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'highriser' ) ) .'" target="_blank">WordPress</a>.' );
    $text .= '</div>';

    echo apply_filters( 'highriser_footer_text', $text );
}
endif;

add_action( 'highriser_footer', 'highriser_footer_credit' );
