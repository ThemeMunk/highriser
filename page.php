<?php
/**
 * The template file to show single page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package highriser
 */

get_header(); 
$body_classes = get_body_class();
?>
	<!-- contain main informative part of the site -->
	<main id ="main">
		<div class="holder inner">
			<!-- contain main content of the site -->
				<?php
                 if (in_array('full-width', $body_classes)) { // check if page is full-width or not. 
                 $offsetclass = "col-lg-offset-2 col-md-offset-1";
                 }
                 else {
                 $offsetclass = "";
                 }
                 ?>            
                <section id="content" class="col-lg-8 col-sm-10 col-sm-12 col-xs-12 <?php echo esc_html( $offsetclass ); ?>">
				<div class="blog-content">


					<?php
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

                        endwhile; // End of the loop.
                    ?>

				</div>
			</section>
			<?php get_sidebar(); ?>
		</div>
	</main>
<?php get_footer(); ?>
