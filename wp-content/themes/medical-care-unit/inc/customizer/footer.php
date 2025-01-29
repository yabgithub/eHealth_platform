<?php
/**
* Footer Settings.
*
* @package Medical Care Unit
*/

$medical_care_unit_default = medical_care_unit_get_default_theme_options();

$wp_customize->add_section( 'medical_care_unit_footer_widget_area',
	array(
	'title'      => esc_html__( 'Footer Setting', 'medical-care-unit' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'medical_care_unit_theme_option_panel',
	)
);

$wp_customize->add_setting('medical_care_unit_display_footer',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_display_footer'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
    );
    $wp_customize->add_control('medical_care_unit_display_footer',
        array(
            'label' => esc_html__('Enable Footer', 'medical-care-unit'),
            'section' => 'medical_care_unit_footer_widget_area',
            'type' => 'checkbox',
        )
    );

$wp_customize->add_setting( 'medical_care_unit_footer_column_layout',
	array(
	'default'           => $medical_care_unit_default['medical_care_unit_footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'medical_care_unit_sanitize_select',
	)
);
$wp_customize->add_control( 'medical_care_unit_footer_column_layout',
	array(
	'label'       => esc_html__( 'Footer Column Layout', 'medical-care-unit' ),
	'section'     => 'medical_care_unit_footer_widget_area',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'medical-care-unit' ),
		'2' => esc_html__( 'Two Column', 'medical-care-unit' ),
		'3' => esc_html__( 'Three Column', 'medical-care-unit' ),
	    ),
	)
);

$wp_customize->add_setting( 'medical_care_unit_footer_widget_title_alignment',
        array(
        'default'           => $medical_care_unit_default['medical_care_unit_footer_widget_title_alignment'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_footer_widget_title_alignment',
        )
);
$wp_customize->add_control( 'medical_care_unit_footer_widget_title_alignment',
    array(
    'label'       => esc_html__( 'Footer Widget Title Alignment', 'medical-care-unit' ),
    'section'     => 'medical_care_unit_footer_widget_area',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'medical-care-unit' ),
        'center'  => esc_html__( 'Center', 'medical-care-unit' ),
        'right'    => esc_html__( 'Right', 'medical-care-unit' ),
        ),
    )
);

$wp_customize->add_setting( 'medical_care_unit_footer_copyright_text',
	array(
	'default'           => $medical_care_unit_default['medical_care_unit_footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'medical_care_unit_footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'medical-care-unit' ),
	'section'  => 'medical_care_unit_footer_widget_area',
	'type'     => 'text',
	)
);

$wp_customize->add_setting('medical_care_unit_copyright_font_size',
    array(
        'default'           => $medical_care_unit_default['medical_care_unit_copyright_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_number_range',
    )
);
$wp_customize->add_control('medical_care_unit_copyright_font_size',
    array(
        'label'       => esc_html__('Copyright Font Size', 'medical-care-unit'),
        'section'     => 'medical_care_unit_footer_widget_area',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 5,
           'max'   => 30,
           'step'   => 1,
    	),
    )
);

$wp_customize->add_setting( 'medical_care_unit_footer_widget_background_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medical_care_unit_footer_widget_background_color', array(
    'label'     => __('Footer Widget Background Color', 'medical-care-unit'),
    'description' => __('It will change the complete footer widget background color.', 'medical-care-unit'),
    'section' => 'medical_care_unit_footer_widget_area',
    'settings' => 'medical_care_unit_footer_widget_background_color',
)));

$wp_customize->add_setting('medical_care_unit_footer_widget_background_image',array(
    'default'   => '',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'medical_care_unit_footer_widget_background_image',array(
    'label' => __('Footer Widget Background Image','medical-care-unit'),
    'section' => 'medical_care_unit_footer_widget_area'
)));

$wp_customize->add_setting('medical_care_unit_enable_to_the_top',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_enable_to_the_top'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_enable_to_the_top',
    array(
        'label' => esc_html__('Enable To The Top', 'medical-care-unit'),
        'section' => 'medical_care_unit_footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'medical_care_unit_to_the_top_text',
    array(
    'default'           => $medical_care_unit_default['medical_care_unit_to_the_top_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'medical_care_unit_to_the_top_text',
    array(
    'label'    => esc_html__( 'To The Top Text', 'medical-care-unit' ),
    'section'  => 'medical_care_unit_footer_widget_area',
    'type'     => 'text',
    )
);