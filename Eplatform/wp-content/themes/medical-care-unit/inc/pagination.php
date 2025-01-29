<?php
/**
 *
 * Pagination Functions
 *
 * @package Medical Care Unit
 */

/**
 * Pagination for archive.
 */
function medical_care_unit_render_posts_pagination() {
    // Get the setting to check if pagination is enabled
    $medical_care_unit_is_pagination_enabled = get_theme_mod( 'medical_care_unit_enable_pagination', true );

    // Check if pagination is enabled
    if ( $medical_care_unit_is_pagination_enabled ) {
        // Get the selected pagination type from the Customizer
        $medical_care_unit_pagination_type = get_theme_mod( 'medical_care_unit_theme_pagination_type', 'numeric' );

        // Check if the pagination type is "newer_older" (Previous/Next) or "numeric"
        if ( 'newer_older' === $medical_care_unit_pagination_type ) :
            // Display "Newer/Older" pagination (Previous/Next navigation)
            the_posts_navigation(
                array(
                    'prev_text' => __( '&laquo; Newer', 'medical-care-unit' ),  // Change the label for "previous"
                    'next_text' => __( 'Older &raquo;', 'medical-care-unit' ),  // Change the label for "next"
                    'screen_reader_text' => __( 'Posts navigation', 'medical-care-unit' ),
                )
            );
        else :
            // Display numeric pagination (Page numbers)
            the_posts_pagination(
                array(
                    'prev_text' => __( '&laquo; Previous', 'medical-care-unit' ),
                    'next_text' => __( 'Next &raquo;', 'medical-care-unit' ),
                    'type'      => 'list', // Display as <ul> <li> tags
                    'screen_reader_text' => __( 'Posts navigation', 'medical-care-unit' ),
                )
            );
        endif;
    }
}
add_action( 'medical_care_unit_posts_pagination', 'medical_care_unit_render_posts_pagination', 10 );