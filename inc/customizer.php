<?php
/**
 * highriser Theme Customizer.
 *
 * @package highriser
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function highriser_customize_register( $wp_customize ) {
    

	/** Slider Settings */
    $wp_customize->add_section(
        'highriser_slider_settings',
        array(
            'title' => esc_html__( 'Slider Settings', 'highriser' ),
            'priority' => 20,
            'description' => esc_html__( 'Please mark your posts as "sticky" to show in slider section. Your theme supports up to 6 posts in its slider section.', 'highriser' ),						
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Slider */
    $wp_customize->add_setting(
        'highriser_ed_slider',
        array(
            'default' => '',
            'sanitize_callback' => 'highriser_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'highriser_ed_slider',
        array(
            'label' => esc_html__( 'Enable Home Page Slider', 'highriser' ),
            'section' => 'highriser_slider_settings',
            'type' => 'checkbox',
        )
    );    
    
    /** Enable/Disable Slider Caption */
    $wp_customize->add_setting(
        'highriser_slider_caption',
        array(
            'default' => '1',
            'sanitize_callback' => 'highriser_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'highriser_slider_caption',
        array(
            'label' => esc_html__( 'Enable Slider Caption', 'highriser' ),
            'section' => 'highriser_slider_settings',
            'type' => 'checkbox',
        )
    );
    

    /** Slider Readmore */
    $wp_customize->add_setting(
        'highriser_slider_readmore',
        array(
            'default' => esc_html__( 'Read More', 'highriser' ),
            'sanitize_callback' => 'highriser_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'highriser_slider_readmore',
        array(
            'label' => esc_html__( 'Readmore Text', 'highriser' ),
            'section' => 'highriser_slider_settings',
            'type' => 'text',
        )
    );
        
    /** Slider Settings Ends */

	/** Social Settings */
    $wp_customize->add_section(
        'highriser_social_settings',
        array(
            'title' => esc_html__( 'Social Settings', 'highriser' ),
            'description' => esc_html__( 'Leave blank if you do not want to show the social link.', 'highriser' ),
            'priority' => 30,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Social in Header */
    $wp_customize->add_setting(
        'highriser_ed_social',
        array(
            'default' => '',
            'sanitize_callback' => 'highriser_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'highriser_ed_social',
        array(
            'label' => esc_html__( 'Enable Social Links', 'highriser' ),
            'section' => 'highriser_social_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Facebook */
    $wp_customize->add_setting(
        'highriser_facebook',
        array(
            'default' => '',
            'sanitize_callback' => 'highriser_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'highriser_facebook',
        array(
            'label' => esc_html__( 'Facebook', 'highriser' ),
            'section' => 'highriser_social_settings',
            'type' => 'text',
        )
    );
    
    /** Twitter */
    $wp_customize->add_setting(
        'highriser_twitter',
        array(
            'default' => '',
            'sanitize_callback' => 'highriser_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'highriser_twitter',
        array(
            'label' => esc_html__( 'Twitter', 'highriser' ),
            'section' => 'highriser_social_settings',
            'type' => 'text',
        )
    );
	
    /** Instagram */
    $wp_customize->add_setting(
        'highriser_instagram',
        array(
            'default' => '',
            'sanitize_callback' => 'highriser_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'highriser_instagram',
        array(
            'label' => esc_html__( 'Instagram', 'highriser' ),
            'section' => 'highriser_social_settings',
            'type' => 'text',
        )
    );	
    
    /** Google Plus */
    $wp_customize->add_setting(
        'highriser_google_plus',
        array(
            'default' => '',
            'sanitize_callback' => 'highriser_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'highriser_google_plus',
        array(
            'label' => esc_html__( 'Google Plus', 'highriser' ),
            'section' => 'highriser_social_settings',
            'type' => 'text',
        )
    );
	
    /** Pinterest */
    $wp_customize->add_setting(
        'highriser_pinterest',
        array(
            'default' => '',
            'sanitize_callback' => 'highriser_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'highriser_pinterest',

        array(
            'label' => esc_html__( 'Pinterest', 'highriser' ),
            'section' => 'highriser_social_settings',
            'type' => 'text',
        )
    );	
    
    /** LinkedIn */
    $wp_customize->add_setting(
        'highriser_linkedin',
        array(
            'default' => '',
            'sanitize_callback' => 'highriser_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'highriser_linkedin',
        array(
            'label' => esc_html__( 'LinkedIn', 'highriser' ),
            'section' => 'highriser_social_settings',
            'type' => 'text',
        )
    );
    
    /** Youtube */
    $wp_customize->add_setting(
        'highriser_youtube',
        array(
            'default' => '',
            'sanitize_callback' => 'highriser_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'highriser_youtube',
        array(
            'label' => esc_html__( 'YouTube', 'highriser' ),
            'section' => 'highriser_social_settings',
            'type' => 'text',
        )
    );
    

    

    /** Social Settings Ends */

 /**
     * Sanitization Funcitons
     * 
     * @link https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php  
     */     
    function highriser_sanitize_url( $url ){
        return esc_url_raw( $url );
    }
    
    function highriser_sanitize_checkbox( $checked ){
        // Boolean check.
	   return ( ( isset( $checked ) && true == $checked ) ? true : false );
    }
    
    function highriser_sanitize_select( $input, $setting ) {
    	// Ensure input is a slug.
    	$input = sanitize_key( $input );
    	// Get list of choices from the control associated with the setting.
    	$choices = $setting->manager->get_control( $setting->id )->choices;
    	// If the input is a valid key, return it; otherwise, return the default.
    	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }
    
    function highriser_sanitize_number_absint( $number, $setting ) {
    	// Ensure $number is an absolute integer (whole number, zero or greater).
    	$number = absint( $number );
    	// If the input is an absolute integer, return it; otherwise, return the default
    	return ( $number ? $number : $setting->default );
    }
    
    function highriser_sanitize_nohtml( $nohtml ) {
    	return wp_filter_nohtml_kses( $nohtml );
    }
    
    function highriser_sanitize_css( $css ) {
    	return wp_strip_all_tags( $css );
    }

   
}
add_action( 'customize_register', 'highriser_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function highriser_customize_preview_js() {
	wp_enqueue_script( 'highriser-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'highriser_customize_preview_js' );

function highriser_admin_scripts() {
	wp_enqueue_style( 'highriser-admin-style',get_template_directory_uri().'/inc/css/admin.css', '1.0', 'screen' );   
}
add_action( 'customize_controls_enqueue_scripts', 'highriser_admin_scripts' );