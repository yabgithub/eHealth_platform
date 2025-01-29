<?php
/**
* Additional Woocommerce Settings.
*
* @package Medical Care Unit
*/

$medical_care_unit_default = medical_care_unit_get_default_theme_options();

// Additional Woocommerce Section.
$wp_customize->add_section( 'medical_care_unit_additional_woocommerce_options',
	array(
	'title'      => esc_html__( 'Additional Woocommerce Options', 'medical-care-unit' ),
	'priority'   => 210,
	'capability' => 'edit_theme_options',
	'panel'      => 'medical_care_unit_theme_option_panel',
	)
);

	$wp_customize->add_setting('medical_care_unit_per_columns',
		array(
		'default'           => $medical_care_unit_default['medical_care_unit_per_columns'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'medical_care_unit_sanitize_number_range',
		)
	);
	$wp_customize->add_control('medical_care_unit_per_columns',
		array(
		'label'       => esc_html__('Product Per Column', 'medical-care-unit'),
		'section'     => 'medical_care_unit_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 10,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('medical_care_unit_product_per_page',
		array(
		'default'           => $medical_care_unit_default['medical_care_unit_product_per_page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'medical_care_unit_sanitize_number_range',
		)
	);
	$wp_customize->add_control('medical_care_unit_product_per_page',
		array(
		'label'       => esc_html__('Product Per Page', 'medical-care-unit'),
		'section'     => 'medical_care_unit_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 15,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('medical_care_unit_show_hide_related_product',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_show_hide_related_product'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
	);
	$wp_customize->add_control('medical_care_unit_show_hide_related_product',
	    array(
	        'label' => esc_html__('Enable Related Products', 'medical-care-unit'),
	        'section' => 'medical_care_unit_additional_woocommerce_options',
	        'type' => 'checkbox',
	    )
	);