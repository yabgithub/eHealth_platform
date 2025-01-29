<?php
/**
* Typography Settings.
*
* @package Medical Care Unit
*/

$medical_care_unit_default = medical_care_unit_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'medical_care_unit_typography_setting',
	array(
	'title'      => esc_html__( 'Typography Settings', 'medical-care-unit' ),
	'priority'   => 21,
	'capability' => 'edit_theme_options',
	'panel'      => 'medical_care_unit_theme_option_panel',
	)
);

// -----------------  Font array
$medical_care_unit_fonts = array(
    'bad-script' => 'Bad Script',
    'bitter'     => 'Bitter',
    'charis-sil' => 'Charis SIL',
    'cuprum'     => 'Cuprum',
    'exo-2'      => 'Exo 2',
    'jost'       => 'Jost',
    'open-sans'  => 'Open Sans',
    'oswald'     => 'Oswald',
    'play'       => 'Play',
    'roboto'     => 'Roboto',
    'outfit'     => 'Outfit',
    'ubuntu'     => 'Ubuntu',
    'Lexend'     => 'Lexend',
);

 // -----------------  General text font
 $wp_customize->add_setting( 'medical_care_unit_content_typography_font', array(
    'default'           => 'Lexend',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'medical_care_unit_radio_sanitize',
) );
$wp_customize->add_control( 'medical_care_unit_content_typography_font', array(
    'type'     => 'select',
    'label'    => esc_html__( 'General Content font', 'medical-care-unit' ),
    'section'  => 'medical_care_unit_typography_setting',
    'settings' => 'medical_care_unit_content_typography_font',
    'choices'  => $medical_care_unit_fonts,
) );

 // -----------------  General Heading font
$wp_customize->add_setting( 'medical_care_unit_heading_typography_font', array(
    'default'           => 'Lexend',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'medical_care_unit_radio_sanitize',
) );
$wp_customize->add_control( 'medical_care_unit_heading_typography_font', array(
    'type'     => 'select',
    'label'    => esc_html__( 'General heading font', 'medical-care-unit' ),
    'section'  => 'medical_care_unit_typography_setting',
    'settings' => 'medical_care_unit_heading_typography_font',
    'choices'  => $medical_care_unit_fonts,
) );