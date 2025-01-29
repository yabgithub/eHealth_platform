<?php
/**
* Posts Settings.
*
* @package Medical Care Unit
*/

$medical_care_unit_default = medical_care_unit_get_default_theme_options();

// Single Post Section.
$wp_customize->add_section( 'medical_care_unit_single_posts_settings',
    array(
    'title'      => esc_html__( 'Single Meta Information Settings', 'medical-care-unit' ),
    'priority'   => 35,
    'capability' => 'edit_theme_options',
    'panel'      => 'medical_care_unit_theme_option_panel',
    )
);

$wp_customize->add_setting('medical_care_unit_post_author',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_post_author'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_post_author',
    array(
        'label' => esc_html__('Enable Posts Author', 'medical-care-unit'),
        'section' => 'medical_care_unit_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('medical_care_unit_post_date',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_post_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_post_date',
    array(
        'label' => esc_html__('Enable Posts Date', 'medical-care-unit'),
        'section' => 'medical_care_unit_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('medical_care_unit_post_category',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'medical-care-unit'),
        'section' => 'medical_care_unit_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('medical_care_unit_post_tags',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_post_tags'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_post_tags',
    array(
        'label' => esc_html__('Enable Posts Tags', 'medical-care-unit'),
        'section' => 'medical_care_unit_single_posts_settings',
        'type' => 'checkbox',
    )
);

// Archive Post Section.
$wp_customize->add_section( 'medical_care_unit_posts_settings',
    array(
    'title'      => esc_html__( 'Archive Meta Information Settings', 'medical-care-unit' ),
    'priority'   => 36,
    'capability' => 'edit_theme_options',
    'panel'      => 'medical_care_unit_theme_option_panel',
    )
);

$wp_customize->add_setting('medical_care_unit_display_archive_post_sticky_post',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_display_archive_post_sticky_post'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_display_archive_post_sticky_post',
    array(
        'label' => esc_html__('Enable sticky Post', 'medical-care-unit'),
        'section' => 'medical_care_unit_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('medical_care_unit_display_archive_post_image',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_display_archive_post_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_display_archive_post_image',
    array(
        'label' => esc_html__('Enable Posts Image', 'medical-care-unit'),
        'section' => 'medical_care_unit_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('medical_care_unit_display_archive_post_category',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_display_archive_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_display_archive_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'medical-care-unit'),
        'section' => 'medical_care_unit_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('medical_care_unit_display_archive_post_title',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_display_archive_post_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_display_archive_post_title',
    array(
        'label' => esc_html__('Enable Posts Title', 'medical-care-unit'),
        'section' => 'medical_care_unit_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('medical_care_unit_display_archive_post_content',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_display_archive_post_content'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_display_archive_post_content',
    array(
        'label' => esc_html__('Enable Posts Content', 'medical-care-unit'),
        'section' => 'medical_care_unit_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('medical_care_unit_display_archive_post_button',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_display_archive_post_button'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_display_archive_post_button',
    array(
        'label' => esc_html__('Enable Posts Button', 'medical-care-unit'),
        'section' => 'medical_care_unit_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('medical_care_unit_excerpt_limit',
    array(
        'default'           => $medical_care_unit_default['medical_care_unit_excerpt_limit'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_number_range',
    )
);
$wp_customize->add_control('medical_care_unit_excerpt_limit',
    array(
        'label'       => esc_html__('Blog Post Excerpt limit', 'medical-care-unit'),
        'section'     => 'medical_care_unit_posts_settings',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 45,
           'step'   => 1,
        ),
    )
);