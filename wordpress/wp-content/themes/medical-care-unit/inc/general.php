<?php

function medical_care_unit_enqueue_fonts() {
    $medical_care_unit_default_font_content = 'Lexend';
    $medical_care_unit_default_font_heading = 'Lexend';

    $medical_care_unit_font_content = esc_attr(get_theme_mod('medical_care_unit_content_typography_font', $medical_care_unit_default_font_content));
    $medical_care_unit_font_heading = esc_attr(get_theme_mod('medical_care_unit_heading_typography_font', $medical_care_unit_default_font_heading));

    $medical_care_unit_css = '';

    // Always enqueue main font
    $medical_care_unit_css .= '
    :root {
        --font-main: ' . $medical_care_unit_font_content . ', ' . (in_array($medical_care_unit_font_content, ['bitter', 'charis-sil']) ? 'serif' : 'sans-serif') . '!important;
    }';
    wp_enqueue_style('medical-care-unit-style-font-general', get_template_directory_uri() . '/fonts/' . $medical_care_unit_font_content . '/font.css');

    // Always enqueue header font
    $medical_care_unit_css .= '
    :root {
        --font-head: ' . $medical_care_unit_font_heading . ', ' . (in_array($medical_care_unit_font_heading, ['bitter', 'charis-sil']) ? 'serif' : 'sans-serif') . '!important;
    }';
    wp_enqueue_style('medical-care-unit-style-font-h', get_template_directory_uri() . '/fonts/' . $medical_care_unit_font_heading . '/font.css');

    // Add inline style
    wp_add_inline_style('medical-care-unit-style-font-general', $medical_care_unit_css);
}
add_action('wp_enqueue_scripts', 'medical_care_unit_enqueue_fonts', 50);