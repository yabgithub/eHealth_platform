<?php

$medical_care_unit_custom_css = "";

	$medical_care_unit_theme_pagination_options_alignment = get_theme_mod('medical_care_unit_theme_pagination_options_alignment', 'Center');
	if ($medical_care_unit_theme_pagination_options_alignment == 'Center') {
		$medical_care_unit_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$medical_care_unit_custom_css .= 'justify-content: center;margin: 0 auto;';
		$medical_care_unit_custom_css .= '}';
	} else if ($medical_care_unit_theme_pagination_options_alignment == 'Right') {
		$medical_care_unit_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$medical_care_unit_custom_css .= 'justify-content: right;margin: 0 0 0 auto;';
		$medical_care_unit_custom_css .= '}';
	} else if ($medical_care_unit_theme_pagination_options_alignment == 'Left') {
		$medical_care_unit_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$medical_care_unit_custom_css .= 'justify-content: left;margin: 0 auto 0 0;';
		$medical_care_unit_custom_css .= '}';
	}

	$medical_care_unit_theme_breadcrumb_options_alignment = get_theme_mod('medical_care_unit_theme_breadcrumb_options_alignment', 'Left');
	if ($medical_care_unit_theme_breadcrumb_options_alignment == 'Center') {
	    $medical_care_unit_custom_css .= '.breadcrumbs ul{';
	    $medical_care_unit_custom_css .= 'text-align: center !important;';
	    $medical_care_unit_custom_css .= '}';
	} else if ($medical_care_unit_theme_breadcrumb_options_alignment == 'Right') {
	    $medical_care_unit_custom_css .= '.breadcrumbs ul{';
	    $medical_care_unit_custom_css .= 'text-align: Right !important;';
	    $medical_care_unit_custom_css .= '}';
	} else if ($medical_care_unit_theme_breadcrumb_options_alignment == 'Left') {
	    $medical_care_unit_custom_css .= '.breadcrumbs ul{';
	    $medical_care_unit_custom_css .= 'text-align: Left !important;';
	    $medical_care_unit_custom_css .= '}';
	}

	$medical_care_unit_menu_text_transform = get_theme_mod('medical_care_unit_menu_text_transform', 'Capitalize');
	if ($medical_care_unit_menu_text_transform == 'Capitalize') {
	    $medical_care_unit_custom_css .= '.site-navigation .primary-menu > li a{';
	    $medical_care_unit_custom_css .= 'text-transform: Capitalize !important;';
	    $medical_care_unit_custom_css .= '}';
	} else if ($medical_care_unit_menu_text_transform == 'uppercase') {
	    $medical_care_unit_custom_css .= '.site-navigation .primary-menu > li a{';
	    $medical_care_unit_custom_css .= 'text-transform: uppercase !important;';
	    $medical_care_unit_custom_css .= '}';
	} else if ($medical_care_unit_menu_text_transform == 'lowercase') {
	    $medical_care_unit_custom_css .= '.site-navigation .primary-menu > li a{';
	    $medical_care_unit_custom_css .= 'text-transform: lowercase !important;';
	    $medical_care_unit_custom_css .= '}';
	}

	$medical_care_unit_single_page_content_alignment = get_theme_mod('medical_care_unit_single_page_content_alignment', 'left');
	if ($medical_care_unit_single_page_content_alignment == 'left') {
	    $medical_care_unit_custom_css .= '#single-page .type-page{';
	    $medical_care_unit_custom_css .= 'text-align: left !important;';
	    $medical_care_unit_custom_css .= '}';
	} else if ($medical_care_unit_single_page_content_alignment == 'center') {
	    $medical_care_unit_custom_css .= '#single-page .type-page{';
	    $medical_care_unit_custom_css .= 'text-align: center !important;';
	    $medical_care_unit_custom_css .= '}';
	} else if ($medical_care_unit_single_page_content_alignment == 'right') {
	    $medical_care_unit_custom_css .= '#single-page .type-page{';
	    $medical_care_unit_custom_css .= 'text-align: right !important;';
	    $medical_care_unit_custom_css .= '}';
	}

	$medical_care_unit_footer_widget_title_alignment = get_theme_mod('medical_care_unit_footer_widget_title_alignment', 'left');
	if ($medical_care_unit_footer_widget_title_alignment == 'left') {
	    $medical_care_unit_custom_css .= 'h2.widget-title{';
	    $medical_care_unit_custom_css .= 'text-align: left !important;';
	    $medical_care_unit_custom_css .= '}';
	} else if ($medical_care_unit_footer_widget_title_alignment == 'center') {
	    $medical_care_unit_custom_css .= 'h2.widget-title{';
	    $medical_care_unit_custom_css .= 'text-align: center !important;';
	    $medical_care_unit_custom_css .= '}';
	} else if ($medical_care_unit_footer_widget_title_alignment == 'right') {
	    $medical_care_unit_custom_css .= 'h2.widget-title{';
	    $medical_care_unit_custom_css .= 'text-align: right !important;';
	    $medical_care_unit_custom_css .= '}';
	}

	$medical_care_unit_show_hide_related_product = get_theme_mod('medical_care_unit_show_hide_related_product',true);
	if($medical_care_unit_show_hide_related_product != true){
	        $medical_care_unit_custom_css .='.related.products{';
	            $medical_care_unit_custom_css .='display: none;';
	        $medical_care_unit_custom_css .='}';
	}

	/*-------------------- Global First Color -------------------*/

	$medical_care_unit_global_color = get_theme_mod('medical_care_unit_global_color', '#05cd9e'); // Add a fallback if the color isn't set

	if ($medical_care_unit_global_color) {
		$medical_care_unit_custom_css .= ':root {';
		$medical_care_unit_custom_css .= '--global-color: ' . esc_attr($medical_care_unit_global_color) . ';';
		$medical_care_unit_custom_css .= '}';
	}	

	/*-------------------- Content Font -------------------*/

	$medical_care_unit_content_typography_font = get_theme_mod('medical_care_unit_content_typography_font', 'Lexend'); // Add a fallback if the color isn't set

	if ($medical_care_unit_content_typography_font) {
		$medical_care_unit_custom_css .= ':root {';
		$medical_care_unit_custom_css .= '--font-main: ' . esc_attr($medical_care_unit_content_typography_font) . ';';
		$medical_care_unit_custom_css .= '}';
	}

	/*-------------------- Heading Font -------------------*/

	$medical_care_unit_heading_typography_font = get_theme_mod('medical_care_unit_heading_typography_font', 'Lexend'); // Add a fallback if the color isn't set

	if ($medical_care_unit_heading_typography_font) {
		$medical_care_unit_custom_css .= ':root {';
		$medical_care_unit_custom_css .= '--font-head: ' . esc_attr($medical_care_unit_heading_typography_font) . ';';
		$medical_care_unit_custom_css .= '}';
	}