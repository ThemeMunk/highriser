<?php
/**
 * Highriser Theme Info
 *
 * @package HighRiser
 */

function highriser_customizer_theme_info( $wp_customize ) {
	
    $wp_customize->add_section( 'theme_info' , array(
		'title'       => esc_html__( 'Information Links' , 'highriser' ),
		'priority'    => 6,
		));

	$wp_customize->add_setting('theme_info_theme',array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
		));
    
    $theme_info = '';
	$theme_info .= '<h3 class="sticky_title">' . esc_html__( 'Need help?', 'highriser' ) . '</h3>';
    $theme_info .= '<span class="sticky_info_row"><a href="' . esc_url( 'http://demo.thememunk.com/highriser/' ) . '" target="_blank">' . esc_html__( 'View demo', 'highriser' ) . '</a></span>';
	$theme_info .= '<span class="sticky_info_row"><a href="' . esc_url( 'https://thememunk.com/article/highriser-documentation/' ) . '" target="_blank">' . esc_html__( 'View documentation', 'highriser' ) . '</a></span>';
    $theme_info .= '<span class="sticky_info_row"><a href="' . esc_url( 'https://thememunk.com/support/' ) . '" target="_blank">' . esc_html__( 'Support Ticket', 'highriser' ) . '</a></span>';
	$theme_info .= '<span class="sticky_info_row"><a href="' . esc_url( 'https://thememunk.com/theme/highriser/' ) . '" target="_blank">' . esc_html__( 'More Details', 'highriser' ) . '</a></span>';
	

	$wp_customize->add_control( new highriser_Theme_Info( $wp_customize ,'theme_info_theme',array(
		'label' => esc_html__( 'About HighRiser' , 'highriser' ),
		'section' => 'theme_info',
		'description' => $theme_info
		)));

	$wp_customize->add_setting('theme_info_more_theme',array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
		));

}
add_action( 'customize_register', 'highriser_customizer_theme_info' );


if( class_exists( 'WP_Customize_control' ) ){

	class highriser_Theme_Info extends WP_Customize_Control
	{
    	/**
       	* Render the content on the theme customizer page
       	*/
       	public function render_content()
       	{
       		?>
       		<label>
       			<strong class="customize-text_editor"><?php echo esc_html( $this->label ); ?></strong>
       			<br />
       			<span class="customize-text_editor_desc">
       				<?php echo wp_kses_post( $this->description ); ?>
       			</span>
       		</label>
       		<?php
       	}
    }//editor close
    
}//class close