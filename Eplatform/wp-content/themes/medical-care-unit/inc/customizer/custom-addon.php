<?php
/**
* Custom Addons.
*
* @package Medical Care Unit
*/

$wp_customize->add_section( 'medical_care_unit_theme_pagination_options',
    array(
    'title'      => esc_html__( 'Customizer Custom Settings', 'medical-care-unit' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_addons_panel',
    )
);


// Add Pagination Enable/Disable option to Customizer
$wp_customize->add_setting( 'medical_care_unit_enable_pagination', 
    array(
        'default'           => true, // Default is enabled
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_enable_pagination', // Sanitize the input
    )
);

// Add the control to the Customizer
$wp_customize->add_control( 'medical_care_unit_enable_pagination', 
    array(
        'label'    => esc_html__( 'Enable Pagination', 'medical-care-unit' ),
        'section'  => 'medical_care_unit_theme_pagination_options', // Add to the correct section
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting( 'medical_care_unit_theme_pagination_type', 
    array(
        'default'           => 'numeric', // Set "numeric" as the default
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_pagination_type', // Use our sanitize function
    )
);

$wp_customize->add_control( 'medical_care_unit_theme_pagination_type',
    array(
        'label'       => esc_html__( 'Pagination Style', 'medical-care-unit' ),
        'section'     => 'medical_care_unit_theme_pagination_options',
        'type'        => 'select',
        'choices'     => array(
            'numeric'      => esc_html__( 'Numeric (Page Numbers)', 'medical-care-unit' ),
            'newer_older'  => esc_html__( 'Newer/Older (Previous/Next)', 'medical-care-unit' ), // Renamed to "Newer/Older"
        ),
    )
);


$wp_customize->add_setting( 'medical_care_unit_theme_pagination_options_alignment',
    array(
    'default'           => $medical_care_unit_default['medical_care_unit_theme_pagination_options_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'medical_care_unit_sanitize_pagination_meta',
    )
);
$wp_customize->add_control( 'medical_care_unit_theme_pagination_options_alignment',
    array(
    'label'       => esc_html__( 'Pagination Alignment', 'medical-care-unit' ),
    'section'     => 'medical_care_unit_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'Center'    => esc_html__( 'Center', 'medical-care-unit' ),
        'Right' => esc_html__( 'Right', 'medical-care-unit' ),
        'Left'  => esc_html__( 'Left', 'medical-care-unit' ),
        ),
    )
);

$wp_customize->add_setting( 'medical_care_unit_theme_breadcrumb_options_alignment',
    array(
    'default'           => $medical_care_unit_default['medical_care_unit_theme_breadcrumb_options_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'medical_care_unit_sanitize_pagination_meta',
    )
);
$wp_customize->add_control( 'medical_care_unit_theme_breadcrumb_options_alignment',
    array(
    'label'       => esc_html__( 'Breadcrumb Alignment', 'medical-care-unit' ),
    'section'     => 'medical_care_unit_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'Center'    => esc_html__( 'Center', 'medical-care-unit' ),
        'Right' => esc_html__( 'Right', 'medical-care-unit' ),
        'Left'  => esc_html__( 'Left', 'medical-care-unit' ),
        ),
    )
);

$wp_customize->add_setting('medical_care_unit_breadcrumb_font_size',
    array(
        'default'           => $medical_care_unit_default['medical_care_unit_breadcrumb_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_number_range',
    )
);
$wp_customize->add_control('medical_care_unit_breadcrumb_font_size',
    array(
        'label'       => esc_html__('Breadcrumb Font Size', 'medical-care-unit'),
        'section'     => 'medical_care_unit_theme_pagination_options',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 45,
           'step'   => 1,
        ),
    )
);

$wp_customize->add_setting( 'medical_care_unit_single_page_content_alignment',
    array(
    'default'           => $medical_care_unit_default['medical_care_unit_single_page_content_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'medical_care_unit_sanitize_page_content_alignment',
    )
);
$wp_customize->add_control( 'medical_care_unit_single_page_content_alignment',
    array(
    'label'       => esc_html__( 'Single Page Content Alignment', 'medical-care-unit' ),
    'section'     => 'medical_care_unit_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'medical-care-unit' ),
        'center'  => esc_html__( 'Center', 'medical-care-unit' ),
        'right'    => esc_html__( 'Right', 'medical-care-unit' ),
        ),
    )
);
