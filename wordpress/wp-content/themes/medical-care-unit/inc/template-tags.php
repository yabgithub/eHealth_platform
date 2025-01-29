<?php
/**
 * Custom Functions
 * @package Medical Care Unit
 * @since 1.0.0
 */

if( !function_exists('medical_care_unit_site_logo') ):

    /**
     * Logo & Description
     */
    /**
     * Displays the site logo, either text or image.
     *
     * @param array $medical_care_unit_args Arguments for displaying the site logo either as an image or text.
     * @param boolean $medical_care_unit_echo Echo or return the HTML.
     *
     * @return string $medical_care_unit_html Compiled HTML based on our arguments.
     */
    function medical_care_unit_site_logo( $medical_care_unit_args = array(), $medical_care_unit_echo = true ){
        $medical_care_unit_logo = get_custom_logo();
        $medical_care_unit_site_title = get_bloginfo('name');
        $medical_care_unit_contents = '';
        $medical_care_unit_classname = '';
        $medical_care_unit_defaults = array(
            'logo' => '%1$s<span class="screen-reader-text">%2$s</span>',
            'logo_class' => 'site-logo site-branding',
            'title' => '<a href="%1$s" class="custom-logo-name">%2$s</a>',
            'title_class' => 'site-title',
            'home_wrap' => '<h1 class="%1$s">%2$s</h1>',
            'single_wrap' => '<div class="%1$s">%2$s</div>',
            'condition' => (is_front_page() || is_home()) && !is_page(),
        );
        $medical_care_unit_args = wp_parse_args($medical_care_unit_args, $medical_care_unit_defaults);
        /**
         * Filters the arguments for `medical_care_unit_site_logo()`.
         *
         * @param array $medical_care_unit_args Parsed arguments.
         * @param array $medical_care_unit_defaults Function's default arguments.
         */
        $medical_care_unit_args = apply_filters('medical_care_unit_site_logo_args', $medical_care_unit_args, $medical_care_unit_defaults);
        if ( has_custom_logo() ) {
            $medical_care_unit_contents = sprintf($medical_care_unit_args['logo'], $medical_care_unit_logo, esc_html($medical_care_unit_site_title));
            $medical_care_unit_contents .= sprintf($medical_care_unit_args['title'], esc_url( get_home_url(null, '/') ), esc_html($medical_care_unit_site_title));
            $medical_care_unit_classname = $medical_care_unit_args['logo_class'];
        } else {
            if ( get_theme_mod('medical_care_unit_display_header_title', true) == true ) :
                $medical_care_unit_contents = sprintf($medical_care_unit_args['title'], esc_url( get_home_url(null, '/') ), esc_html($medical_care_unit_site_title));
                $medical_care_unit_classname = $medical_care_unit_args['title_class'];
            endif;
        }
        $medical_care_unit_wrap = $medical_care_unit_args['condition'] ? 'home_wrap' : 'single_wrap';
        // $medical_care_unit_wrap = 'home_wrap';
        $medical_care_unit_html = sprintf($medical_care_unit_args[$medical_care_unit_wrap], $medical_care_unit_classname, $medical_care_unit_contents);
        /**
         * Filters the arguments for `medical_care_unit_site_logo()`.
         *
         * @param string $medical_care_unit_html Compiled html based on our arguments.
         * @param array $medical_care_unit_args Parsed arguments.
         * @param string $medical_care_unit_classname Class name based on current view, home or single.
         * @param string $medical_care_unit_contents HTML for site title or logo.
         */
        $medical_care_unit_html = apply_filters('medical_care_unit_site_logo', $medical_care_unit_html, $medical_care_unit_args, $medical_care_unit_classname, $medical_care_unit_contents);
        if (!$medical_care_unit_echo) {
            return $medical_care_unit_html;
        }
        echo $medical_care_unit_html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }

endif;

if( !function_exists('medical_care_unit_site_description') ):

    /**
     * Displays the site description.
     *
     * @param boolean $medical_care_unit_echo Echo or return the html.
     *
     * @return string $medical_care_unit_html The HTML to display.
     */
    function medical_care_unit_site_description($medical_care_unit_echo = true){
        
        if ( get_theme_mod('medical_care_unit_display_header_text', false) == true ) :
        $medical_care_unit_description = get_bloginfo('description');
        if (!$medical_care_unit_description) {
            return;
        }
        $medical_care_unit_wrapper = '<div class="site-description"><span>%s</span></div><!-- .site-description -->';
        $medical_care_unit_html = sprintf($medical_care_unit_wrapper, esc_html($medical_care_unit_description));
        /**
         * Filters the html for the site description.
         *
         * @param string $medical_care_unit_html The HTML to display.
         * @param string $medical_care_unit_description Site description via `bloginfo()`.
         * @param string $medical_care_unit_wrapper The format used in case you want to reuse it in a `sprintf()`.
         * @since 1.0.0
         *
         */
        $medical_care_unit_html = apply_filters('medical_care_unit_site_description', $medical_care_unit_html, $medical_care_unit_description, $medical_care_unit_wrapper);
        if (!$medical_care_unit_echo) {
            return $medical_care_unit_html;
        }
        echo $medical_care_unit_html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
         endif;
    }

endif;

if( !function_exists('medical_care_unit_posted_on') ):

    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function medical_care_unit_posted_on( $medical_care_unit_icon = true, $medical_care_unit_animation_class = '' ){

        $medical_care_unit_default = medical_care_unit_get_default_theme_options();
        $medical_care_unit_post_date = absint( get_theme_mod( 'medical_care_unit_post_date',$medical_care_unit_default['medical_care_unit_post_date'] ) );

        if( $medical_care_unit_post_date ){

            $medical_care_unit_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
            if (get_the_time('U') !== get_the_modified_time('U')) {
                $medical_care_unit_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
            }

            $medical_care_unit_time_string = sprintf($medical_care_unit_time_string,
                esc_attr(get_the_date(DATE_W3C)),
                esc_html(get_the_date()),
                esc_attr(get_the_modified_date(DATE_W3C)),
                esc_html(get_the_modified_date())
            );

            $medical_care_unit_year = get_the_date('Y');
            $medical_care_unit_month = get_the_date('m');
            $medical_care_unit_day = get_the_date('d');
            $medical_care_unit_link = get_day_link($medical_care_unit_year, $medical_care_unit_month, $medical_care_unit_day);

            $medical_care_unit_posted_on = '<a href="' . esc_url($medical_care_unit_link) . '" rel="bookmark">' . $medical_care_unit_time_string . '</a>';

            echo '<div class="entry-meta-item entry-meta-date">';
            echo '<div class="entry-meta-wrapper '.esc_attr( $medical_care_unit_animation_class ).'">';

            if( $medical_care_unit_icon ){

                echo '<span class="entry-meta-icon calendar-icon"> ';
                medical_care_unit_the_theme_svg('calendar');
                echo '</span>';

            }

            echo '<span class="posted-on">' . $medical_care_unit_posted_on . '</span>'; // WPCS: XSS OK.
            echo '</div>';
            echo '</div>';

        }

    }

endif;

if( !function_exists('medical_care_unit_posted_by') ) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function medical_care_unit_posted_by( $medical_care_unit_icon = true, $medical_care_unit_animation_class = '' ){   

        $medical_care_unit_default = medical_care_unit_get_default_theme_options();
        $medical_care_unit_post_author = absint( get_theme_mod( 'medical_care_unit_post_author',$medical_care_unit_default['medical_care_unit_post_author'] ) );

        if( $medical_care_unit_post_author ){

            echo '<div class="entry-meta-item entry-meta-author">';
            echo '<div class="entry-meta-wrapper '.esc_attr( $medical_care_unit_animation_class ).'">';

            if( $medical_care_unit_icon ){
            
                echo '<span class="entry-meta-icon author-icon"> ';
                medical_care_unit_the_theme_svg('user');
                echo '</span>';
                
            }

            $medical_care_unit_byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) . '">' . esc_html(get_the_author()) . '</a></span>';
            echo '<span class="byline"> ' . $medical_care_unit_byline . '</span>'; // WPCS: XSS OK.
            echo '</div>';
            echo '</div>';

        }

    }

endif;


if( !function_exists('medical_care_unit_posted_by_avatar') ) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function medical_care_unit_posted_by_avatar( $medical_care_unit_date = false ){

        $medical_care_unit_default = medical_care_unit_get_default_theme_options();
        $medical_care_unit_post_author = absint( get_theme_mod( 'medical_care_unit_post_author',$medical_care_unit_default['medical_care_unit_post_author'] ) );

        if( $medical_care_unit_post_author ){



            echo '<div class="entry-meta-left">';
            echo '<div class="entry-meta-item entry-meta-avatar">';
            echo wp_kses_post( get_avatar( get_the_author_meta( 'ID' ) ) );
            echo '</div>';
            echo '</div>';

            echo '<div class="entry-meta-right">';

            $medical_care_unit_byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) . '">' . esc_html(get_the_author()) . '</a></span>';

            echo '<div class="entry-meta-item entry-meta-byline"> ' . $medical_care_unit_byline . '</div>';

            if( $medical_care_unit_date ){
                medical_care_unit_posted_on($medical_care_unit_icon = false);
            }
            echo '</div>';

        }

    }

endif;

if( !function_exists('medical_care_unit_entry_footer') ):

    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function medical_care_unit_entry_footer( $medical_care_unit_cats = true, $medical_care_unit_tags = true, $medical_care_unit_edits = true){   

        $medical_care_unit_default = medical_care_unit_get_default_theme_options();
        $medical_care_unit_post_category = absint( get_theme_mod( 'medical_care_unit_post_category',$medical_care_unit_default['medical_care_unit_post_category'] ) );
        $medical_care_unit_post_tags = absint( get_theme_mod( 'medical_care_unit_post_tags',$medical_care_unit_default['medical_care_unit_post_tags'] ) );

        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {

            if( $medical_care_unit_cats && $medical_care_unit_post_category ){

                /* translators: used between list items, there is a space after the comma */
                $medical_care_unit_categories = get_the_category();
                if ($medical_care_unit_categories) {
                    echo '<div class="entry-meta-item entry-meta-categories">';
                    echo '<div class="entry-meta-wrapper">';
                
                    /* translators: 1: list of categories. */
                    echo '<span class="cat-links">';
                    foreach( $medical_care_unit_categories as $medical_care_unit_category ){

                        $medical_care_unit_cat_name = $medical_care_unit_category->name;
                        $medical_care_unit_cat_slug = $medical_care_unit_category->slug;
                        $medical_care_unit_cat_url = get_category_link( $medical_care_unit_category->term_id );
                        ?>

                        <a class="twp_cat_<?php echo esc_attr( $medical_care_unit_cat_slug ); ?>" href="<?php echo esc_url( $medical_care_unit_cat_url ); ?>" rel="category tag"><?php echo esc_html( $medical_care_unit_cat_name ); ?></a>

                    <?php }
                    echo '</span>'; // WPCS: XSS OK.
                    echo '</div>';
                    echo '</div>';
                }

            }

            if( $medical_care_unit_tags && $medical_care_unit_post_tags ){
                /* translators: used between list items, there is a space after the comma */
                $medical_care_unit_tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'medical-care-unit'));
                if( $medical_care_unit_tags_list ){

                    echo '<div class="entry-meta-item entry-meta-tags">';
                    echo '<div class="entry-meta-wrapper">';

                    /* translators: 1: list of tags. */
                    echo '<span class="tags-links">';
                    echo wp_kses_post($medical_care_unit_tags_list) . '</span>'; // WPCS: XSS OK.
                    echo '</div>';
                    echo '</div>';

                }

            }

            if( $medical_care_unit_edits ){

                edit_post_link(
                    sprintf(
                        wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Edit <span class="screen-reader-text">%s</span>', 'medical-care-unit'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
            }

        }
    }

endif;

if ( !function_exists('medical_care_unit_post_thumbnail') ) :

    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views. If no post thumbnail is available, a default image is used.
     */
    function medical_care_unit_post_thumbnail($image_size = 'full'){

        if( post_password_required() || is_attachment() ){ return; }

        // Set the URL for your default image here (e.g. from your theme directory)
        $medical_care_unit_default_image = get_template_directory_uri() . '/assets/images/banner.png'; // Update this path accordingly

        if ( is_singular() ) : ?>
                <?php the_post_thumbnail(); ?>
        <?php else : ?>

            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php

                $medical_care_unit_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $image_size);
                $medical_care_unit_featured_image = isset($medical_care_unit_featured_image[0]) ? $medical_care_unit_featured_image[0] : '';

                // Check if there's a featured image
                if ($medical_care_unit_featured_image != '' ) {
                    // Display the featured image
                    the_post_thumbnail($image_size, array(
                        'alt' => the_title_attribute(array(
                            'echo' => false,
                        )),
                    ));
                } else {
                    // No featured image, display the default image
                    echo '<img src="' . esc_url($medical_care_unit_default_image) . '" alt="' . the_title_attribute(array('echo' => false)) . '" />';
                }
                ?>
            </a>

        <?php
        endif; // End is_singular().
    }

endif;

if( !function_exists('medical_care_unit_is_comment_by_post_author') ):

    /**
     * Comments
     */
    /**
     * Check if the specified comment is written by the author of the post commented on.
     *
     * @param object $medical_care_unit_comment Comment data.
     *
     * @return bool
     */
    function medical_care_unit_is_comment_by_post_author($medical_care_unit_comment = null){

        if (is_object($medical_care_unit_comment) && $medical_care_unit_comment->user_id > 0) {
            $medical_care_unit_user = get_userdata($medical_care_unit_comment->user_id);
            $post = get_post($medical_care_unit_comment->comment_post_ID);
            if (!empty($medical_care_unit_user) && !empty($post)) {
                return $medical_care_unit_comment->user_id === $post->post_author;
            }
        }
        return false;
    }

endif;

if( !function_exists('medical_care_unit_breadcrumb') ) :

    /**
     * Medical Care Unit Breadcrumb
     */
    function medical_care_unit_breadcrumb($medical_care_unit_comment = null){

        echo '<div class="entry-breadcrumb">';
        breadcrumb_trail();
        echo '</div>';

    }

endif;