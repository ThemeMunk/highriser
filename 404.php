<?php
/**
 * The template file for 404 error page.
 *
 * @package highriser
 */

get_header(); ?>
	<main id ="main">
		<div class="holder inner">
			<section id="content">
            
					<article class="not-found">
                        <span><?php esc_html_e( '404', 'highriser' ); ?></span>
                        <h1><?php esc_html_e( 'Oops, The requested page cannot be found', 'highriser' ); ?></h1>                    
                        <p><?php esc_html_e( 'Go back to the homepage.', 'highriser' ); ?></p>
                        <a class="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Homepage', 'highriser' ); ?></a>   
					</article>            
            
			</section>
		
		</div>
	</main>
<?php get_footer(); ?>