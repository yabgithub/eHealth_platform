<?php 
function fsars_medical_customize_register($wp_customize){

    // Register custom section types.
    $wp_customize->register_section_type( 'fsars_medical_Customize_Section_Pro' );

    // Register sections.
    $wp_customize->add_section( new fsars_medical_Customize_Section_Pro(
        $wp_customize,
        'theme_go_pro',
        array(
            'priority' => 1,
            'title'    => esc_html__( 'FSars Medical', 'fsars-medical' ),
            'pro_text' => esc_html__( 'Upgrade To Pro', 'fsars-medical' ),
            'pro_url'  => 'https://www.featherthemes.com/themes/wordpress-fsars-medical/',
        )
    ) );
    $wp_customize->add_section('fsars_medical_header', array(
        'title'    => esc_html__('FSars Medical Header Phone and Email', 'fsars-medical'),
        'description' => '',
        'priority' => 30,
    ));
     $wp_customize->add_section('fsars_medical_social', array(
        'title'    => esc_html__('FSars Medical Social Section', 'fsars-medical'),
        'description' => '',
        'priority' => 35,
    ));


    //  =============================
    //  = Text Input phone number                =
    //  =============================
    $wp_customize->add_setting('fsars_medical_phone', array(
        'default'        => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
 
    $wp_customize->add_control('fsars_medical_phone', array(
        'label'      => esc_html__('Phone Number', 'fsars-medical'),
        'section'    => 'fsars_medical_header',
        'setting'   => 'fsars_medical_phone',
        'type'    => 'text'
    ));
    
    //  =============================
    //  = Text Input Email                =
    //  =============================
    $wp_customize->add_setting('fsars_medical_address', array(
        'default'        => '',
        'sanitize_callback' => 'sanitize_email'       
    ));
 
    $wp_customize->add_control('fsars_medical_address', array(
        'label'      => esc_html__('Email Address', 'fsars-medical'),
        'section'    => 'fsars_medical_header',
        'setting'   => 'fsars_medical_address',
        'type'    => 'email'
    ));

    //  =============================
    //  = Text Input facebook                =
    //  =============================
    $wp_customize->add_setting('fsars_medical_fb', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('fsars_medical_fb', array(
        'label'      => esc_html__('Facebook', 'fsars-medical'),
        'section'    => 'fsars_medical_social',
        'setting'   => 'fsars_medical_fb',
    ));
    //  =============================
    //  = Text Input Twitter                =
    //  =============================
    $wp_customize->add_setting('fsars_medical_twitter', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('fsars_medical_twitter', array(
        'label'      => esc_html__('Twitter', 'fsars-medical'),
        'section'    => 'fsars_medical_social',
        'setting'   => 'fsars_medical_twitter',
    ));
    //  =============================
    //  = Text Input googleplus                =
    //  =============================
    $wp_customize->add_setting('fsars_medical_glplus', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('fsars_medical_glplus', array(
        'label'      => esc_html__('Google Plus', 'fsars-medical'),
        'section'    => 'fsars_medical_social',
        'setting'   => 'fsars_medical_glplus',
    ));
    //  =============================
    //  = Text Input linkedin                =
    //  =============================
    $wp_customize->add_setting('fsars_medical_in', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('fsars_medical_in', array(
        'label'      => esc_html__('Linkedin', 'fsars-medical'),
        'section'    => 'fsars_medical_social',
        'setting'   => 'fsars_medical_in',
    ));

    //  =============================
    //  = slider section              =
    //  =============================
    $wp_customize->add_section('business_multi_lite_banner', array(
        'title'    => esc_html__('FSars Medical Home Banner Text', 'fsars-medical'),
        'description' => esc_html__('add home banner text here.','fsars-medical'),
        'priority' => 36,
    ));
   
// Banner heading Text
    $wp_customize->add_setting('banner_heading',array(
            'default'   => null,
            'sanitize_callback' => 'sanitize_text_field'    
    ));
    
    $wp_customize->add_control('banner_heading',array( 
            'type'  => 'text',
            'label' => esc_html__('Add Banner heading here','fsars-medical'),
            'section'   => 'business_multi_lite_banner',
            'setting'   => 'banner_heading'
    )); // Banner heading Text

    // Banner heading Text
    $wp_customize->add_setting('banner_sub_heading',array(
            'default'   => null,
            'sanitize_callback' => 'sanitize_text_field'    
    ));
    
    $wp_customize->add_control('banner_sub_heading',array( 
            'type'  => 'text',
            'label' => esc_html__('Add Banner sub heading here','fsars-medical'),
            'section'   => 'business_multi_lite_banner',
            'setting'   => 'banner_sub_heading'
    )); // Banner heading Text

  //  =============================
    //  = Footer              =
    //  =============================

    $wp_customize->add_section('fsars_medical_footer', array(
        'title'    => esc_html__('FSars Medical Footer', 'fsars-medical'),
        'description' => '',
        'priority' => 37,
    ));

	// Footer design and developed
	 $wp_customize->add_setting('fsars_medical_design', array(
        'default'        => '',
		'sanitize_callback' => 'sanitize_textarea_field'
    ));
 
    $wp_customize->add_control('fsars_medical_design', array(
        'label'      => esc_html__('Design and developed', 'fsars-medical'),
        'section'    => 'fsars_medical_footer',
        'setting'   => 'fsars_medical_design',
		'type'	   =>'textarea'
    ));
	// Footer copyright
	 $wp_customize->add_setting('fsars_medical_copyright', array(
        'default'        => '',
		'sanitize_callback' => 'sanitize_textarea_field'       
    ));
 
    $wp_customize->add_control('fsars_medical_copyright', array(
        'label'      => esc_html__('Copyright', 'fsars-medical'),
        'section'    => 'fsars_medical_footer',
        'setting'   => 'fsars_medical_copyright',
		'type'	   =>'textarea'
    ));	
}
add_action('customize_register', 'fsars_medical_customize_register');