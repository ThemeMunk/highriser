<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package highriser
 */

if ( ! function_exists( 'highriser_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function highriser_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html( '%s', 'post date', 'highriser' ),
		'<i class="fa fa-calendar"></i><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html( '%s', 'post author', 'highriser' ),
		'<span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline">' . $byline . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'highriser_category' ) ) :
function highriser_category(){
    /* translators: used between list items, there is a space after the comma */
    $categories_list = get_the_category_list( esc_html__( ', ', 'highriser' ) );
    if ( $categories_list && highriser_categorized_blog() ) {
        printf( '<div class="category">' . esc_html__( '%1$s', 'highriser' ) . '</div>', $categories_list ); // WPCS: XSS OK.
    }
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function highriser_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'highriser_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'highriser_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so highriser_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so highriser_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in highriser_categorized_blog.
 */
function highriser_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'highriser_categories' );
}
add_action( 'edit_category', 'highriser_category_transient_flusher' );
add_action( 'save_post',     'highriser_category_transient_flusher' );
