<?php
/**
 * Template part for displaying content on index.
 *
 * @package highriser
 */
?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('card-box col-lg-4 col-md-6 col-sm-12 col-xs-12'); ?>>
                <div class="card" data-background="image" data-src="<?php esc_url( the_post_thumbnail_url( 'large' ) ); ?>">
                    <div class="header">
						<?php
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                        ?>										                    
                            <div class="category">
                                <h6>
                                    <span class="category">
                                        <?php  echo '<a class="category" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>'; ?>
                                    </span>
                                </h6>
                            </div>
						<?php } ?>                        
                    </div>
                    <div class="content">
						<?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
                        <span class="date"><?php echo esc_html( get_the_date() ); ?></span>
                    </div>
                    <div class="filter"></div>
                </div> <!-- end card -->
            </article>
