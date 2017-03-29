<?php
/**
 * Template Name: Full Width Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package highriser
 */

get_header(); ?>
	<!-- contain main informative part of the site -->
	<main id ="main">
		<div class="holder inner">
			<!-- contain main content of the site -->
			<section id="content">
				<div class="blog-content">

					<?php
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content', 'page' );

                        endwhile; // End of the loop.
                    ?>

				</div>
			</section>

		</div>
	</main>
<?php get_footer(); ?>
