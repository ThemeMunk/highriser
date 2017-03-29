<?php
/**
 * The sidebar containing the footer widget area
 *
 * If no active widgets in this sidebar, hide it completely.
 *
 * @package highriser
 */

if ( ! is_active_sidebar( 'sidebar-1' ) && ! is_active_sidebar( 'sidebar-2' ) && ! is_active_sidebar( 'sidebar-3' ) ) {
	return;
}
?>
		<div class="holder">
			<section class="footer-widgets">
                		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
							<article class="col-lg-4 col-md-6 col-xs-12 col-sm-12">                        
								<?php dynamic_sidebar( 'sidebar-1' ); ?>
							</article>                            
                        <?php endif; ?>

                		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
							<article class="col-lg-4 col-md-6 col-xs-12 col-sm-12">                        
								<?php dynamic_sidebar( 'sidebar-2' ); ?>
							</article>                            
                        <?php endif; ?>

                		<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
							<article class="col-lg-4 col-md-6 col-xs-12 col-sm-12">                        
								<?php dynamic_sidebar( 'sidebar-3' ); ?>
							</article>                            
                        <?php endif; ?>

			</section>
		</div>
