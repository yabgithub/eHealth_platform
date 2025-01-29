<?php
/**
* Body Classes.
* @package Medical Care Unit
*/
 
 if (!function_exists('medical_care_unit_body_classes')) :

    function medical_care_unit_body_classes($medical_care_unit_classes) {

        $medical_care_unit_default = medical_care_unit_get_default_theme_options();
        global $post;
        // Adds a class of hfeed to non-singular pages.
        if ( !is_singular() ) {
            $medical_care_unit_classes[] = 'hfeed';
        }

        // Adds a class of no-sidebar when there is no sidebar present.
        if ( !is_active_sidebar( 'sidebar-1' ) ) {
            $medical_care_unit_classes[] = 'no-sidebar';
        }

        $medical_care_unit_global_sidebar_layout = esc_html( get_theme_mod( 'medical_care_unit_global_sidebar_layout',$medical_care_unit_default['medical_care_unit_global_sidebar_layout'] ) );

        if ( is_active_sidebar( 'sidebar-1' ) ) {
            if( is_single() || is_page() ){
                $medical_care_unit_post_sidebar = esc_html( get_post_meta( $post->ID, 'medical_care_unit_post_sidebar_option', true ) );
                if (empty($medical_care_unit_post_sidebar) || ($medical_care_unit_post_sidebar == 'global-sidebar')) {
                    $medical_care_unit_classes[] = esc_attr( $medical_care_unit_global_sidebar_layout );
                } else{
                    $medical_care_unit_classes[] = esc_attr( $medical_care_unit_post_sidebar );
                }
            }else{
                $medical_care_unit_classes[] = esc_attr( $medical_care_unit_global_sidebar_layout );
            }
            
        }
        
        return $medical_care_unit_classes;
    }

endif;

add_filter('body_class', 'medical_care_unit_body_classes');