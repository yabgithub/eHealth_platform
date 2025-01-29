<?php
/**
* Header Options.
*
* @package Medical Care Unit
*/

$medical_care_unit_default = medical_care_unit_get_default_theme_options();

// Header Section.
$wp_customize->add_section( 'medical_care_unit_button_header_setting',
	array(
	'title'      => esc_html__( 'Header Settings', 'medical-care-unit' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'medical_care_unit_theme_option_panel',
	)
);

$wp_customize->add_setting('medical_care_unit_header_button_ed',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_header_button_ed'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_header_button_ed',
    array(
        'label' => esc_html__('Enable Header Button', 'medical-care-unit'),
        'section' => 'medical_care_unit_button_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'medical_care_unit_header_layout_button_text',
    array(
    'default'           => $medical_care_unit_default['medical_care_unit_header_layout_button_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'medical_care_unit_header_layout_button_text',
    array(
    'label'    => esc_html__( 'Header Button Text', 'medical-care-unit' ),
    'section'  => 'medical_care_unit_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'medical_care_unit_header_layout_button_link',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'medical_care_unit_header_layout_button_link',
    array(
    'label'    => esc_html__( 'Header Button Link', 'medical-care-unit' ),
    'section'  => 'medical_care_unit_button_header_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting('medical_care_unit_menu_font_size',
    array(
        'default'           => $medical_care_unit_default['medical_care_unit_menu_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_number_range',
    )
);
$wp_customize->add_control('medical_care_unit_menu_font_size',
    array(
        'label'       => esc_html__('Menu Font Size', 'medical-care-unit'),
        'section'     => 'medical_care_unit_button_header_setting',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 30,
           'step'   => 1,
        ),
    )
);

$wp_customize->add_setting( 'medical_care_unit_menu_text_transform',
    array(
    'default'           => $medical_care_unit_default['medical_care_unit_menu_text_transform'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'medical_care_unit_sanitize_menu_transform',
    )
);
$wp_customize->add_control( 'medical_care_unit_menu_text_transform',
    array(
    'label'       => esc_html__( 'Menu Text Transform', 'medical-care-unit' ),
    'section'     => 'medical_care_unit_button_header_setting',
    'type'        => 'select',
    'choices'     => array(
        'capitalize' => esc_html__( 'Capitalize', 'medical-care-unit' ),
        'uppercase'  => esc_html__( 'Uppercase', 'medical-care-unit' ),
        'lowercase'    => esc_html__( 'Lowercase', 'medical-care-unit' ),
        ),
    )
);

$wp_customize->add_setting('medical_care_unit_sticky',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_sticky'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_sticky',
    array(
        'label' => esc_html__('Enable Sticky Header', 'medical-care-unit'),
        'section' => 'medical_care_unit_button_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('medical_care_unit_theme_loader',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_theme_loader'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_theme_loader',
    array(
        'label' => esc_html__('Enable Preloader', 'medical-care-unit'),
        'section' => 'medical_care_unit_button_header_setting',
        'type' => 'checkbox',
    )
);