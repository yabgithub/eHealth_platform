<?php
/**
 * Consultant Appointment Theme Customizer
 *
 * @package Consultant Appointment
 */

function Consultant_Appointment_Customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'Consultant_Appointment_Customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'Consultant_Appointment_Customize_partial_blogdescription',
			)
		);
	}

	/*
    * Theme Options Panel
    */
	$wp_customize->add_panel('consultant_appointment_panel', array(
		'priority' => 25,
		'capability' => 'edit_theme_options',
		'title' => __('Consultant Theme Options', 'consultant-appointment'),
	));

	/*
	* Customizer main header section
	*/

	$wp_customize->add_setting(
		'consultant_appointment_site_title_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'consultant_appointment_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'consultant_appointment_site_title_text',
		array(
			'label'       => __('Enable Title', 'consultant-appointment'),
			'description' => __('Enable or Disable Title from the site', 'consultant-appointment'),
			'section'     => 'title_tagline',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'consultant_appointment_site_tagline_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 0,
			'sanitize_callback' => 'consultant_appointment_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'consultant_appointment_site_tagline_text',
		array(
			'label'       => __('Enable Tagline', 'consultant-appointment'),
			'description' => __('Enable or Disable Tagline from the site', 'consultant-appointment'),
			'section'     => 'title_tagline',
			'type'        => 'checkbox',
		)
	);

		$wp_customize->add_setting(
		'consultant_appointment_logo_width',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '150',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'consultant_appointment_logo_width',
		array(
			'label'       => __('Logo Width in PX', 'consultant-appointment'),
			'section'     => 'title_tagline',
			'type'        => 'number',
			'input_attrs' => array(
	            'min' => 100,
	             'max' => 300,
	             'step' => 1,
	         ),
		)
	);

	/*Additional Options*/
	$wp_customize->add_section('consultant_appointment_additional_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Additional Options', 'consultant-appointment'),
		'panel'       => 'consultant_appointment_panel',
	));

	/*Main Slider Enable Option*/
	$wp_customize->add_setting(
		'consultant_appointment_enable_preloader',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 0,
			'sanitize_callback' => 'consultant_appointment_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'consultant_appointment_enable_preloader',
		array(
			'label'       => __('Enable Preloader', 'consultant-appointment'),
			'description' => __('Checked to show preloader', 'consultant-appointment'),
			'section'     => 'consultant_appointment_additional_section',
			'type'        => 'checkbox',
		)
	);
	
	/*Main Header Options*/
	$wp_customize->add_section('consultant_appointment_header_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Main Header Options', 'consultant-appointment'),
		'panel'       => 'consultant_appointment_panel',
	));

	/*
	* Customizer top header section
	*/

	/*
	* Customizer main header section
	*/

	/*Main Header Options*/
	$wp_customize->add_section('consultant_appointment_header_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Main Header Options', 'consultant-appointment'),
		'panel'       => 'consultant_appointment_panel',
	));

	$wp_customize->add_setting(
		'consultant_appointment_main_topbar',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 0,
			'sanitize_callback' => 'consultant_appointment_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'consultant_appointment_main_topbar',
		array(
			'label'       => __('Enable Topbar', 'consultant-appointment'),
			'description' => __('Checked to show the Topbar', 'consultant-appointment'),
			'section'     => 'consultant_appointment_header_section',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'consultant_appointment_header_search',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 0,
			'sanitize_callback' => 'consultant_appointment_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'consultant_appointment_header_search',
		array(
			'label'       => __('Enable Disable Search', 'consultant-appointment'),
			'description' => __('Enable or Disable header Search', 'consultant-appointment'),
			'section'     => 'consultant_appointment_header_section',
			'type'        => 'checkbox',
		)
	);

	/*Main Header Phone Text*/
	$wp_customize->add_setting(
		'consultant_appointment_header_info_phone',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'consultant_appointment_header_info_phone',
		array(
			'label'       => __('Edit Phone Number ', 'consultant-appointment'),
			'section'     => 'consultant_appointment_header_section',
			'type'        => 'text',
		)
	);

	/*Facebook Link*/
	$wp_customize->add_setting(
		'consultant_appointment_facebook_link_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'consultant_appointment_facebook_link_option',
		array(
			'label'       => __('Edit Facebook Link', 'consultant-appointment'),
			'section'     => 'consultant_appointment_header_section',
			'type'        => 'url',
		)
	);

	/*Twitter Link*/
	$wp_customize->add_setting(
		'consultant_appointment_twitter_link_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'consultant_appointment_twitter_link_option',
		array(
			'label'       => __('Edit Twitter Link', 'consultant-appointment'),
			'section'     => 'consultant_appointment_header_section',
			'type'        => 'url',
		)
	);

	$wp_customize->add_setting(
		'consultant_appointment_pinterest_link_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'consultant_appointment_pinterest_link_option',
		array(
			'label'       => __('Edit Pinterest Link', 'consultant-appointment'),
			'section'     => 'consultant_appointment_header_section',
			'type'        => 'url',
		)
	);

	/*Instagram Link*/
	$wp_customize->add_setting(
		'consultant_appointment_instagram_link_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'consultant_appointment_instagram_link_option',
		array(
			'label'       => __('Edit Instagram Link', 'consultant-appointment'),
			'section'     => 'consultant_appointment_header_section',
			'type'        => 'url',
		)
	);

	$wp_customize->add_setting(
		'consultant_appointment_linked_link_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'consultant_appointment_linked_link_option',
		array(
			'label'       => __('Edit Linkedin Link', 'consultant-appointment'),
			'section'     => 'consultant_appointment_header_section',
			'type'        => 'url',
		)
	);

	$wp_customize->add_setting(
		'consultant_appointment_youtube_link_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'consultant_appointment_youtube_link_option',
		array(
			'label'       => __('Edit Youtube Link', 'consultant-appointment'),
			'section'     => 'consultant_appointment_header_section',
			'type'        => 'url',
		)
	);

	/*
	* Customizer main slider section
	*/
	/*Main Slider Options*/
	$wp_customize->add_section('consultant_appointment_slider_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Main Slider Options', 'consultant-appointment'),
		'panel'       => 'consultant_appointment_panel',
	));

	/*Main Slider Enable Option*/
	$wp_customize->add_setting(
		'consultant_appointment_enable_slider',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 0,
			'sanitize_callback' => 'consultant_appointment_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'consultant_appointment_enable_slider',
		array(
			'label'       => __('Enable Main Slider', 'consultant-appointment'),
			'description' => __('Checked to show the main slider', 'consultant-appointment'),
			'section'     => 'consultant_appointment_slider_section',
			'type'        => 'checkbox',
		)
	);

	for ($i=1; $i <= 3; $i++) { 

		/*Main Slider Image*/
		$wp_customize->add_setting(
			'consultant_appointment_slider_image'.$i,
			array(
				'capability'    => 'edit_theme_options',
		        'default'       => '',
		        'transport'     => 'postMessage',
		        'sanitize_callback' => 'esc_url_raw',
	    	)
	    );

		$wp_customize->add_control( 
			new WP_Customize_Image_Control( $wp_customize, 
				'consultant_appointment_slider_image'.$i, 
				array(
			        'label' => __('Edit Slider Image ', 'consultant-appointment') .$i,
			        'description' => __('Edit the slider image.', 'consultant-appointment'),
			        'section' => 'consultant_appointment_slider_section',
				)
			)
		);

		/*Main Slider Heading*/
		$wp_customize->add_setting(
			'consultant_appointment_slider_top_text'.$i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'consultant_appointment_slider_top_text'.$i,
			array(
				'label'       => __('Edit Slider Top Text ', 'consultant-appointment') .$i,
				'description' => __('Edit the slider Top text.', 'consultant-appointment'),
				'section'     => 'consultant_appointment_slider_section',
				'type'        => 'text',
			)
		);

		/*Main Slider Heading*/
		$wp_customize->add_setting(
			'consultant_appointment_slider_heading'.$i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'consultant_appointment_slider_heading'.$i,
			array(
				'label'       => __('Edit Heading Text ', 'consultant-appointment') .$i,
				'description' => __('Edit the slider heading text.', 'consultant-appointment'),
				'section'     => 'consultant_appointment_slider_section',
				'type'        => 'text',
			)
		);

		/*Main Slider Content*/
		$wp_customize->add_setting(
			'consultant_appointment_slider_text'.$i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'consultant_appointment_slider_text'.$i,
			array(
				'label'       => __('Edit Content Text ', 'consultant-appointment') .$i,
				'description' => __('Edit the slider content text.', 'consultant-appointment'),
				'section'     => 'consultant_appointment_slider_section',
				'type'        => 'text',
			)
		);

		/*Main Slider Button1 Text*/
		$wp_customize->add_setting(
			'consultant_appointment_slider_button1_text'.$i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			'consultant_appointment_slider_button1_text'.$i,
			array(
				'label'       => __('Edit Button #1 Text ', 'consultant-appointment') .$i,
				'description' => __('Edit the slider button text.', 'consultant-appointment'),
				'section'     => 'consultant_appointment_slider_section',
				'type'        => 'text',
			)
		);

		/*Main Slider Button1 URL*/
		$wp_customize->add_setting(
			'consultant_appointment_slider_button1_link'.$i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			'consultant_appointment_slider_button1_link'.$i,
			array(
				'label'       => __('Edit Button #1 URL ', 'consultant-appointment') .$i,
				'description' => __('Edit the slider button url.', 'consultant-appointment'),
				'section'     => 'consultant_appointment_slider_section',
				'type'        => 'url',
			)
		);
	}

	// Existing Section and Basic Settings
    $wp_customize->add_section('consultant_appointment_events_section', array(
        'priority'       => 5,
        'capability'     => 'edit_theme_options',
        'title'          => __('Our Pricing Plans Options', 'consultant-appointment'),
        'panel'          => 'consultant_appointment_panel',
    ));

    // Enable Option
    $wp_customize->add_setting('consultant_appointment_enable_event', array(
        'capability'        => 'edit_theme_options',
        'default'           => 0,
        'sanitize_callback' => 'consultant_appointment_sanitize_checkbox',
    ));
    $wp_customize->add_control('consultant_appointment_enable_event', array(
        'label'       => __('Enable Our Pricing Plans Section', 'consultant-appointment'),
        'section'     => 'consultant_appointment_events_section',
        'type'        => 'checkbox',
    ));

    $wp_customize->add_setting('consultant_appointment_servicesec_heading', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('consultant_appointment_servicesec_heading', array(
        'label'       => __('Edit Section Heading', 'consultant-appointment'),
        'section'     => 'consultant_appointment_events_section',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('consultant_appointment_servicesec_content', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('consultant_appointment_servicesec_content', array(
        'label'       => __('Edit Section Text', 'consultant-appointment'),
        'section'     => 'consultant_appointment_events_section',
        'type'        => 'text',
    ));

    $wp_customize->add_setting(
		'consultant_appointment_header_button_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 'VIEW ALL DEPARTMENT',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'consultant_appointment_header_button_text',
		array(
			'label'       => __('Edit Button Text ', 'consultant-appointment'),
			'section'     => 'consultant_appointment_events_section',
			'type'        => 'text',
		)
	);

	/*Main Header Button Link*/
	$wp_customize->add_setting(
		'consultant_appointment_header_button_link',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'consultant_appointment_header_button_link',
		array(
			'label'       => __('Edit Button Link ', 'consultant-appointment'),
			'section'     => 'consultant_appointment_events_section',
			'type'        => 'url',
		)
	);

    // Category Selection
    $categories = get_categories();
    $cat_choices = array('select' => 'Select Category');
    foreach ($categories as $category) {
        $cat_choices[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('consultant_appointment_blog_cat', array(
        'default'           => 'select',
        'sanitize_callback' => 'consultant_appointment_sanitize_choices',
    ));
    $wp_customize->add_control('consultant_appointment_blog_cat', array(
        'label'       => __('Select Category to display Pricing Plans', 'consultant-appointment'),
        'section'     => 'consultant_appointment_events_section',
        'type'        => 'select',
        'choices'     => $cat_choices,
    ));

    // Number of Posts to Show
    $wp_customize->add_setting('consultant_appointment_posts_to_show', array(
        'default'           => 3,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('consultant_appointment_posts_to_show', array(
        'label'       => __('Number of Posts to Show', 'consultant-appointment'),
        'section'     => 'consultant_appointment_events_section',
        'type'        => 'number',
        'input_attrs' => array('min' => 1, 'step' => 1),
    ));

    // Dynamic settings for Icons, Prices, and Features
    $num_posts = get_theme_mod('consultant_appointment_posts_to_show', 3);

    for ($consultant_appointment_i = 1; $consultant_appointment_i <= $num_posts; $consultant_appointment_i++) {
        // Icon setting
        $wp_customize->add_setting('consultant_appointment_services_icon' . $consultant_appointment_i, array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('consultant_appointment_services_icon' . $consultant_appointment_i, array(
            'label'       => __('Add Icon for Post ', 'consultant-appointment') . $consultant_appointment_i,
            'section'     => 'consultant_appointment_events_section',
            'type'        => 'text',
        ));

         // Price setting
        $wp_customize->add_setting('consultant_appointment_courses_prices' . $consultant_appointment_i, array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('consultant_appointment_courses_prices' . $consultant_appointment_i, array(
            'label'       => __('Add Price for Post ', 'consultant-appointment') . $consultant_appointment_i,
            'section'     => 'consultant_appointment_events_section',
            'type'        => 'text',
        ));

        // Features settings
        for ($consultant_appointment_j = 1; $consultant_appointment_j <= 3; $consultant_appointment_j++) {
	        $wp_customize->add_setting('consultant_appointment_post' . $consultant_appointment_i . '_feature_heading' . $consultant_appointment_j, array(
	            'default'           => '',
	            'sanitize_callback' => 'sanitize_text_field',
	        ));
	        $wp_customize->add_control('consultant_appointment_post' . $consultant_appointment_i . '_feature_heading' . $consultant_appointment_j, array(
	            'label'       => __('Service ', 'consultant-appointment') . $consultant_appointment_j . __(' Text for Post ', 'consultant-appointment') . $consultant_appointment_i,
	            'section'     => 'consultant_appointment_events_section',
	            'type'        => 'text',
	        ));
	    }
    }

	/*
	* Customizer Footer Section
	*/
	/*Footer Options*/
	$wp_customize->add_section('consultant_appointment_footer_section', array(
		'priority'       => 8,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Footer Options', 'consultant-appointment'),
		'panel'       => 'consultant_appointment_panel',
	));


	/*Footer Social Menu Option*/
	$wp_customize->add_setting(
		'consultant_appointment_footer_social_menu',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'consultant_appointment_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'consultant_appointment_footer_social_menu',
		array(
			'label'       => __('Enable Footer Social Menu', 'consultant-appointment'),
			'description' => __('Checked to show the footer social menu. Go to Dashboard >> Appearance >> Menus >> Create New Menu >> Add Custom Link >> Add Social Menu >> Checked Social Menu >> Save Menu.', 'consultant-appointment'),
			'section'     => 'consultant_appointment_footer_section',
			'type'        => 'checkbox',
		)
	);	

	/*Go To Top Option*/
	$wp_customize->add_setting(
		'consultant_appointment_enable_go_to_top_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'consultant_appointment_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'consultant_appointment_enable_go_to_top_option',
		array(
			'label'       => __('Enable Go To Top', 'consultant-appointment'),
			'description' => __('Checked to enable Go To Top option.', 'consultant-appointment'),
			'section'     => 'consultant_appointment_footer_section',
			'type'        => 'checkbox',
		)
	);

	/*Footer Copyright Text Enable*/
	$wp_customize->add_setting(
		'consultant_appointment_copyright_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'consultant_appointment_copyright_option',
		array(
			'label'       => __('Edit Copyright Text', 'consultant-appointment'),
			'description' => __('Edit the Footer Copyright Section.', 'consultant-appointment'),
			'section'     => 'consultant_appointment_footer_section',
			'type'        => 'text',
		)
	);
}
add_action( 'customize_register', 'Consultant_Appointment_Customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function Consultant_Appointment_Customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function Consultant_Appointment_Customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function Consultant_Appointment_Customize_preview_js() {
	wp_enqueue_script( 'consultant-appointment-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), CONSULTANT_APPOINTMENT_VERSION, true );
}
add_action( 'customize_preview_init', 'Consultant_Appointment_Customize_preview_js' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Consultant_Appointment_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/revolution/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Consultant_Appointment_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Consultant_Appointment_Customize_Section_Pro( $manager,'consultant_appointment_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Consultant Appointment', 'consultant-appointment' ),
			'pro_text' => esc_html__( 'Buy Pro', 'consultant-appointment' ),
			'pro_url'  => esc_url('https://www.revolutionwp.com/wp-themes/consultant-appointment-wordpress-theme/'),
		) )	);		
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'consultant-appointment-customize-controls', trailingslashit( get_template_directory_uri() ) . '/revolution/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'consultant-appointment-customize-controls', trailingslashit( get_template_directory_uri() ) . '/revolution/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Consultant_Appointment_Customize::get_instance();