<?php
/**
* Global Color Settings.
*
* @package Medical Care Unit
*/

$medical_care_unit_default = medical_care_unit_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'medical_care_unit_global_color_setting',
	array(
	'title'      => esc_html__( 'Global Color Settings', 'medical-care-unit' ),
	'priority'   => 1,
	'capability' => 'edit_theme_options',
	'panel'      => 'medical_care_unit_theme_option_panel',
	)
);

$wp_customize->add_setting( 'medical_care_unit_global_color',
    array(
    'default'           => '#05cd9e',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'medical_care_unit_global_color',
    array(
        'label'      => esc_html__( 'Global Color', 'medical-care-unit' ),
        'section'    => 'medical_care_unit_global_color_setting',
        'settings'   => 'medical_care_unit_global_color',
    ) ) 
);
