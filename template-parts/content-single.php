<?php
/**
 * Template part for displaying content on index.
 *
 * @package highriser
 */
?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
						<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
						<div class="meta-info">
            				<?php highriser_posted_on(); ?>
						</div>
						<div class="featured-img">
						 	<?php
				                if ( has_post_thumbnail() ) {
				                  the_post_thumbnail( 'large', array( 'class' => '' ) );
				              	}
							?>
						</div>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
						<?php the_tags( '<ul class="tags"><li>', '</li><li>', '</li></ul>' ); ?>
					</article>
