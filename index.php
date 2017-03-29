<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package highriser
 */

get_header(); ?>
	<!-- contain main informative part of the site -->
	<main id ="main">
		<div class="holder">
			<!-- contain main content of the site -->
			<section id="content">
				<div class="blog-content">

					<?php
                        if ( have_posts() ) :


                            /* Start the Loop */
                            while ( have_posts() ) : the_post();

                                /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'template-parts/content' );

                            endwhile;

							echo "<div class='clearfix'></div>";

                             the_posts_pagination( array(
                            'mid_size' => 3,
                            'prev_text' => __( '<i class="fa fa-angle-double-left"></i>', 'highriser' ),
                            'next_text' => __( '<i class="fa fa-angle-double-right"></i>', 'highriser' ),
                            ) );

                        else :

                            get_template_part( 'template-parts/content', 'none' );

                       endif;
				   ?>



				</div>
			</section>

		</div>
	</main>
<?php get_footer(); ?>
