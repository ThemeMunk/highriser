<?php
/**
 * Template part for displaying content on index.
 *
 * @package highriser
 */
?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
						<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
						<div class="featured-img">
						 	<?php
                if ( has_post_thumbnail() ) {
                  the_post_thumbnail( 'large', array( 'class' => '' ) );
              	}
							?>
						</div>
          <div class="entry-content">
			<?php
                the_content( sprintf(
                    /* translators: %s: Name of current post. */
                    wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'highriser' ), array( 'span' => array( 'class' => array() ) ) ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'highriser' ),
                    'after'  => '</div>',
                ) );
            ?>
          </div>
					</article>
