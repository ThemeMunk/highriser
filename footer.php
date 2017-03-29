<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package highriser
 */
?>

	<!-- footer of the page -->
	<footer id="footer">
		<?php get_sidebar('footer'); ?>

    	<div class="footer-b">
			<div class="holder">
	            <?php do_action( 'highriser_footer' ); ?>
			</div>
		</div>

	</footer>
	<?php wp_footer(); ?>

</body>
</html>
