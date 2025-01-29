<?php
/**
* Layouts Settings.
*
* @package Medical Care Unit
*/

$medical_care_unit_default = medical_care_unit_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'medical_care_unit_layout_setting',
	array(
	'title'      => esc_html__( 'Global Layout Settings', 'medical-care-unit' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'      => 'medical_care_unit_theme_option_panel',
	)
);

$wp_customize->add_setting( 'medical_care_unit_global_sidebar_layout',
    array(
    'default'           => $medical_care_unit_default['medical_care_unit_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'medical_care_unit_sanitize_sidebar_option',
    )
);
$wp_customize->add_control( 'medical_care_unit_global_sidebar_layout',
    array(
    'label'       => esc_html__( 'Global Sidebar Layout', 'medical-care-unit' ),
    'section'     => 'medical_care_unit_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__( 'Right Sidebar', 'medical-care-unit' ),
        'left-sidebar'  => esc_html__( 'Left Sidebar', 'medical-care-unit' ),
        'no-sidebar'    => esc_html__( 'No Sidebar', 'medical-care-unit' ),
        ),
    )
);
