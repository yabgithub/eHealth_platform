<?php
/**
 * Default Values.
 *
 * @package Medical Care Unit
 */

if ( ! function_exists( 'medical_care_unit_get_default_theme_options' ) ) :
	function medical_care_unit_get_default_theme_options() {

		$medical_care_unit_defaults = array();
		
		// Options.
        $medical_care_unit_defaults['medical_care_unit_logo_width_range']                           = 300;
		$medical_care_unit_defaults['medical_care_unit_global_sidebar_layout']					    = 'right-sidebar';
        $medical_care_unit_defaults['medical_care_unit_global_color']                 = '#05cd9e';
        $medical_care_unit_defaults['medical_care_unit_pagination_layout']      = 'numeric';
        $medical_care_unit_defaults['medical_care_unit_pagination_layout']      = 'Center';
        $medical_care_unit_defaults['medical_care_unit_pagination_layout']      = 'Left';
		$medical_care_unit_defaults['medical_care_unit_footer_column_layout']                         = 3;
        $medical_care_unit_defaults['medical_care_unit_menu_font_size']                 = 15;
        $medical_care_unit_defaults['medical_care_unit_copyright_font_size']                 = 16;
        $medical_care_unit_defaults['medical_care_unit_breadcrumb_font_size']                 = 16;
        $medical_care_unit_defaults['medical_care_unit_excerpt_limit']                 = 10;
        $medical_care_unit_defaults['medical_care_unit_menu_text_transform']                 = 'capitalize';  
        $medical_care_unit_defaults['medical_care_unit_single_page_content_alignment']                 = 'left';
        $medical_care_unit_defaults['medical_care_unit_theme_pagination_options_alignment']                 = 'Center';
        $medical_care_unit_defaults['medical_care_unit_theme_breadcrumb_options_alignment']                 = 'Left';
        $medical_care_unit_defaults['medical_care_unit_per_columns']                 = 3;  
        $medical_care_unit_defaults['medical_care_unit_product_per_page']                 = 9; 
		$medical_care_unit_defaults['medical_care_unit_footer_copyright_text'] 						= esc_html__( 'All rights reserved.', 'medical-care-unit' );
        $medical_care_unit_defaults['medical_care_unit_header_button_ed']       = 1;
        $medical_care_unit_defaults['medical_care_unit_header_layout_button_text']                  = esc_html__('Book Appointment','medical-care-unit');
        $medical_care_unit_defaults['medical_care_unit_twp_navigation_type']              			= 'theme-normal-navigation';
        $medical_care_unit_defaults['medical_care_unit_post_author']                		= 1;
        $medical_care_unit_defaults['medical_care_unit_display_archive_post_sticky_post']            = 1;
        $medical_care_unit_defaults['medical_care_unit_display_archive_post_category']            = 1;
        $medical_care_unit_defaults['medical_care_unit_display_archive_post_title']            = 1;
        $medical_care_unit_defaults['medical_care_unit_display_archive_post_content']            = 1;
        $medical_care_unit_defaults['medical_care_unit_display_archive_post_button']            = 1;
        $medical_care_unit_defaults['medical_care_unit_post_date']                		= 1;
        $medical_care_unit_defaults['medical_care_unit_post_category']                	= 1;
        $medical_care_unit_defaults['medical_care_unit_post_tags']                		= 1;
        $medical_care_unit_defaults['medical_care_unit_sticky']                 = 0;
        $medical_care_unit_defaults['medical_care_unit_floating_next_previous_nav']       = 1;
        $medical_care_unit_defaults['medical_care_unit_header_banner']               		= 1;
        $medical_care_unit_defaults['medical_care_unit_display_header_title']               = 1;
        $medical_care_unit_defaults['medical_care_unit_category_section']               	= 1;
        $medical_care_unit_defaults['medical_care_unit_cat_main_service_title']                               = esc_html__('SERVICE WE PROVIDE','medical-care-unit');
        $medical_care_unit_defaults['medical_care_unit_cat_main_title']                   			= esc_html__('Medical Services to Improve Your Health and Wellbeing.','medical-care-unit');
        $medical_care_unit_defaults['medical_care_unit_background_color']               	= '#fff';
        $medical_care_unit_defaults['medical_care_unit_default_text_color']               = '#000';
        $medical_care_unit_defaults['medical_care_unit_border_color']               		= '#ededed';
        $medical_care_unit_defaults['medical_care_unit_theme_loader']                 = 0;
        $medical_care_unit_defaults['medical_care_unit_display_footer']            = 0;
        $medical_care_unit_defaults['medical_care_unit_footer_widget_title_alignment']                 = 'left'; 
        $medical_care_unit_defaults['medical_care_unit_show_hide_related_product']          = 1;
        $medical_care_unit_defaults['medical_care_unit_display_archive_post_image']            = 1;
        $medical_care_unit_defaults['medical_care_unit_display_archive_post_category']          = 1;
        $medical_care_unit_defaults['medical_care_unit_display_archive_post_sticky_post']       = 1;
        $medical_care_unit_defaults['medical_care_unit_display_archive_post_title']             = 1;
        $medical_care_unit_defaults['medical_care_unit_display_archive_post_content']           = 1;
        $medical_care_unit_defaults['medical_care_unit_display_archive_post_button']            = 1;

        $medical_care_unit_defaults['medical_care_unit_enable_to_the_top']                      = 1;
        $medical_care_unit_defaults['medical_care_unit_to_the_top_text']                      = esc_html__( 'To The Top', 'medical-care-unit' );

		// Pass through filter.
		$medical_care_unit_defaults = apply_filters( 'medical_care_unit_filter_default_theme_options', $medical_care_unit_defaults );

		return $medical_care_unit_defaults;
	}
endif;