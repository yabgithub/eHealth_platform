<?php
/**
 * Custom page walker for this theme.
 *
 * @package Medical Care Unit
 */

if (!class_exists('Medical_Care_Unit_Walker_Page')) {
    /**
     * CUSTOM PAGE WALKER
     * A custom walker for pages.
     */
    class Medical_Care_Unit_Walker_Page extends Walker_Page
    {

        /**
         * Outputs the beginning of the current element in the tree.
         *
         * @param string $medical_care_unit_output Used to append additional content. Passed by reference.
         * @param WP_Post $page Page data object.
         * @param int $medical_care_unit_depth Optional. Depth of page. Used for padding. Default 0.
         * @param array $medical_care_unit_args Optional. Array of arguments. Default empty array.
         * @param int $current_page Optional. Page ID. Default 0.
         * @since 2.1.0
         *
         * @see Walker::start_el()
         */

        public function start_lvl( &$medical_care_unit_output, $medical_care_unit_depth = 0, $medical_care_unit_args = array() ) {
            $medical_care_unit_indent  = str_repeat( "\t", $medical_care_unit_depth );
            $medical_care_unit_output .= "$medical_care_unit_indent<ul class='sub-menu'>\n";
        }

        public function start_el(&$medical_care_unit_output, $page, $medical_care_unit_depth = 0, $medical_care_unit_args = array(), $current_page = 0)
        {

            if (isset($medical_care_unit_args['item_spacing']) && 'preserve' === $medical_care_unit_args['item_spacing']) {
                $t = "\t";
                $n = "\n";
            } else {
                $t = '';
                $n = '';
            }
            if ($medical_care_unit_depth) {
                $medical_care_unit_indent = str_repeat($t, $medical_care_unit_depth);
            } else {
                $medical_care_unit_indent = '';
            }

            $medical_care_unit_css_class = array('page_item', 'page-item-' . $page->ID);

            if (isset($medical_care_unit_args['pages_with_children'][$page->ID])) {
                $medical_care_unit_css_class[] = 'page_item_has_children';
            }

            if (!empty($current_page)) {
                $_current_page = get_post($current_page);
                if ($_current_page && in_array($page->ID, $_current_page->ancestors, true)) {
                    $medical_care_unit_css_class[] = 'current_page_ancestor';
                }
                if ($page->ID === $current_page) {
                    $medical_care_unit_css_class[] = 'current_page_item';
                } elseif ($_current_page && $page->ID === $_current_page->post_parent) {
                    $medical_care_unit_css_class[] = 'current_page_parent';
                }
            } elseif (get_option('page_for_posts') === $page->ID) {
                $medical_care_unit_css_class[] = 'current_page_parent';
            }

            /** This filter is documented in wp-includes/class-walker-page.php */
            $medical_care_unit_css_classes = implode(' ', apply_filters('page_css_class', $medical_care_unit_css_class, $page, $medical_care_unit_depth, $medical_care_unit_args, $current_page));
            $medical_care_unit_css_classes = $medical_care_unit_css_classes ? ' class="' . esc_attr($medical_care_unit_css_classes) . '"' : '';

            if ('' === $page->post_title) {
                /* translators: %d: ID of a post. */
                $page->post_title = sprintf(__('#%d (no title)', 'medical-care-unit'), $page->ID);
            }

            $medical_care_unit_args['link_before'] = empty($medical_care_unit_args['link_before']) ? '' : $medical_care_unit_args['link_before'];
            $medical_care_unit_args['link_after'] = empty($medical_care_unit_args['link_after']) ? '' : $medical_care_unit_args['link_after'];

            $medical_care_unit_atts = array();
            $medical_care_unit_atts['href'] = get_permalink($page->ID);
            $medical_care_unit_atts['aria-current'] = ($page->ID === $current_page) ? 'page' : '';

            /** This filter is documented in wp-includes/class-walker-page.php */
            $medical_care_unit_atts = apply_filters('page_menu_link_attributes', $medical_care_unit_atts, $page, $medical_care_unit_depth, $medical_care_unit_args, $current_page);

            $medical_care_unit_attributes = '';
            foreach ($medical_care_unit_atts as $attr => $medical_care_unit_value) {
                if (!empty($medical_care_unit_value)) {
                    $medical_care_unit_value = ('href' === $attr) ? esc_url($medical_care_unit_value) : esc_attr($medical_care_unit_value);
                    $medical_care_unit_attributes .= ' ' . $attr . '="' . $medical_care_unit_value . '"';
                }
            }

            $medical_care_unit_args['list_item_before'] = '';
            $medical_care_unit_args['list_item_after'] = '';
            $medical_care_unit_args['icon_rennder'] = '';
            // Wrap the link in a div and append a sub menu toggle.
            if (isset($medical_care_unit_args['show_toggles']) && true === $medical_care_unit_args['show_toggles']) {
                // Wrap the menu item link contents in a div, used for positioning.
                $medical_care_unit_args['list_item_after'] = '';
            }


            // Add icons to menu items with children.
            if (isset($medical_care_unit_args['show_sub_menu_icons']) && true === $medical_care_unit_args['show_sub_menu_icons']) {
                if (isset($medical_care_unit_args['pages_with_children'][$page->ID])) {
                    $medical_care_unit_args['icon_rennder'] = '';
                }
            }

            // Add icons to menu items with children.
            if (isset($medical_care_unit_args['show_toggles']) && true === $medical_care_unit_args['show_toggles']) {
                if (isset($medical_care_unit_args['pages_with_children'][$page->ID])) {

                    $toggle_target_string = '.page_item.page-item-' . $page->ID . ' > .sub-menu';

                    $medical_care_unit_args['list_item_after'] = '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . __( 'Show sub menu', 'medical-care-unit' ) . '</span>' . medical_care_unit_get_theme_svg( 'chevron-down' ) . '</span></button>';
                }
            }

            if (isset($medical_care_unit_args['show_toggles']) && true === $medical_care_unit_args['show_toggles']) {

                $medical_care_unit_output .= $medical_care_unit_indent . sprintf(
                        '<li%s>%s%s<a%s>%s%s%s</a>%s%s',
                        $medical_care_unit_css_classes,
                        '<div class="submenu-wrapper">',
                        $medical_care_unit_args['list_item_before'],
                        $medical_care_unit_attributes,
                        $medical_care_unit_args['link_before'],
                        /** This filter is documented in wp-includes/post-template.php */
                        apply_filters('the_title', $page->post_title, $page->ID),
                        $medical_care_unit_args['link_after'],
                        $medical_care_unit_args['list_item_after'],
                        '</div>'
                    );

            }else{

                $medical_care_unit_output .= $medical_care_unit_indent . sprintf(
                        '<li%s>%s<a%s>%s%s%s%s</a>%s',
                        $medical_care_unit_css_classes,
                        $medical_care_unit_args['list_item_before'],
                        $medical_care_unit_attributes,
                        $medical_care_unit_args['link_before'],
                        /** This filter is documented in wp-includes/post-template.php */
                        apply_filters('the_title', $page->post_title, $page->ID),
                        $medical_care_unit_args['icon_rennder'],
                        $medical_care_unit_args['link_after'],
                        $medical_care_unit_args['list_item_after']
                    );

            }

            if (!empty($medical_care_unit_args['show_date'])) {
                if ('modified' === $medical_care_unit_args['show_date']) {
                    $medical_care_unit_time = $page->post_modified;
                } else {
                    $medical_care_unit_time = $page->post_date;
                }

                $medical_care_unit_date_format = empty($medical_care_unit_args['date_format']) ? '' : $medical_care_unit_args['date_format'];
                $medical_care_unit_output .= ' ' . mysql2date($medical_care_unit_date_format, $medical_care_unit_time);
            }
        }
    }
}