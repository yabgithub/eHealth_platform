<?php
/**
 * Custom Functions.
 *
 * @package Medical Care Unit
 */

if( !function_exists( 'medical_care_unit_fonts_url' ) ) :

    //Google Fonts URL
    function medical_care_unit_fonts_url(){

        $medical_care_unit_font_families = array(
            'Lexend:wght@100;200;300;400;500;600;700;800;900',
        );

        $medical_care_unit_fonts_url = add_query_arg( array(
            'family' => implode( '&family=', $medical_care_unit_font_families ),
            'display' => 'swap',
        ), 'https://fonts.googleapis.com/css2' );

        return esc_url_raw($medical_care_unit_fonts_url);

    }

endif;

if ( ! function_exists( 'medical_care_unit_sub_menu_toggle_button' ) ) :

    function medical_care_unit_sub_menu_toggle_button( $medical_care_unit_args, $medical_care_unit_item, $depth ) {

        // Add sub menu toggles to the main menu with toggles
        if ( $medical_care_unit_args->theme_location == 'medical-care-unit-primary-menu' && isset( $medical_care_unit_args->show_toggles ) ) {
            
            // Wrap the menu item link contents in a div, used for positioning
            $medical_care_unit_args->before = '<div class="submenu-wrapper">';
            $medical_care_unit_args->after  = '';

            // Add a toggle to items with children
            if ( in_array( 'menu-item-has-children', $medical_care_unit_item->classes ) ) {

                $medical_care_unit_toggle_target_string = '.menu-item.menu-item-' . $medical_care_unit_item->ID . ' > .sub-menu';

                // Add the sub menu toggle
                $medical_care_unit_args->after .= '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $medical_care_unit_toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250" aria-expanded="false"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . esc_html__( 'Show sub menu', 'medical-care-unit' ) . '</span>' . medical_care_unit_get_theme_svg( 'chevron-down' ) . '</span></button>';

            }

            // Close the wrapper
            $medical_care_unit_args->after .= '</div><!-- .submenu-wrapper -->';
            // Add sub menu icons to the main menu without toggles (the fallback menu)

        }elseif( $medical_care_unit_args->theme_location == 'medical-care-unit-primary-menu' ) {

            if ( in_array( 'menu-item-has-children', $medical_care_unit_item->classes ) ) {

                $medical_care_unit_args->before = '<div class="link-icon-wrapper">';
                $medical_care_unit_args->after  = medical_care_unit_get_theme_svg( 'chevron-down' ) . '</div>';

            } else {

                $medical_care_unit_args->before = '';
                $medical_care_unit_args->after  = '';

            }

        }

        return $medical_care_unit_args;

    }

endif;

add_filter( 'nav_menu_item_args', 'medical_care_unit_sub_menu_toggle_button', 10, 3 );

if ( ! function_exists( 'medical_care_unit_the_theme_svg' ) ):
    
    function medical_care_unit_the_theme_svg( $medical_care_unit_svg_name, $medical_care_unit_return = false ) {

        if( $medical_care_unit_return ){

            return medical_care_unit_get_theme_svg( $medical_care_unit_svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in medical_care_unit_get_theme_svg();.

        }else{

            echo medical_care_unit_get_theme_svg( $medical_care_unit_svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in medical_care_unit_get_theme_svg();.

        }
    }

endif;

if ( ! function_exists( 'medical_care_unit_get_theme_svg' ) ):

    function medical_care_unit_get_theme_svg( $medical_care_unit_svg_name ) {

        // Make sure that only our allowed tags and attributes are included.
        $medical_care_unit_svg = wp_kses(
            medical_care_unit_SVG_Icons::get_svg( $medical_care_unit_svg_name ),
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
                'polyline' => array(
                    'fill'      => true,
                    'points'    => true,
                ),
                'line' => array(
                    'fill'      => true,
                    'x1'      => true,
                    'x2' => true,
                    'y1'    => true,
                    'y2' => true,
                ),
            )
        );
        if ( ! $medical_care_unit_svg ) {
            return false;
        }
        return $medical_care_unit_svg;

    }

endif;


if( !function_exists( 'medical_care_unit_post_category_list' ) ) :

    // Post Category List.
    function medical_care_unit_post_category_list( $medical_care_unit_select_cat = true ){

        $medical_care_unit_post_cat_lists = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $medical_care_unit_post_cat_cat_array = array();
        if( $medical_care_unit_select_cat ){

            $medical_care_unit_post_cat_cat_array[''] = esc_html__( '-- Select Category --','medical-care-unit' );

        }

        foreach ( $medical_care_unit_post_cat_lists as $medical_care_unit_post_cat_list ) {

            $medical_care_unit_post_cat_cat_array[$medical_care_unit_post_cat_list->slug] = $medical_care_unit_post_cat_list->name;

        }

        return $medical_care_unit_post_cat_cat_array;
    }

endif;

if( !function_exists('medical_care_unit_single_post_navigation') ):

    function medical_care_unit_single_post_navigation(){

        $medical_care_unit_default = medical_care_unit_get_default_theme_options();
        $medical_care_unit_twp_navigation_type = esc_attr( get_post_meta( get_the_ID(), 'twp_disable_ajax_load_next_post', true ) );
        $medical_care_unit_current_id = '';
        $article_wrap_class = '';
        global $post;
        $medical_care_unit_current_id = $post->ID;
        if( $medical_care_unit_twp_navigation_type == '' || $medical_care_unit_twp_navigation_type == 'global-layout' ){
            $medical_care_unit_twp_navigation_type = get_theme_mod('medical_care_unit_twp_navigation_type', $medical_care_unit_default['medical_care_unit_twp_navigation_type']);
        }

        if( $medical_care_unit_twp_navigation_type != 'no-navigation' && 'post' === get_post_type() ){

            if( $medical_care_unit_twp_navigation_type == 'theme-normal-navigation' ){ ?>

                <div class="navigation-wrapper">
                    <?php
                    // Previous/next post navigation.
                    the_post_navigation(array(
                        'prev_text' => '<span class="arrow" aria-hidden="true">' . medical_care_unit_the_theme_svg('arrow-left',$medical_care_unit_return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Previous post:', 'medical-care-unit') . '</span><span class="post-title">%title</span>',
                        'next_text' => '<span class="arrow" aria-hidden="true">' . medical_care_unit_the_theme_svg('arrow-right',$medical_care_unit_return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Next post:', 'medical-care-unit') . '</span><span class="post-title">%title</span>',
                    )); ?>
                </div>
                <?php

            }else{

                $medical_care_unit_next_post = get_next_post();
                if( isset( $medical_care_unit_next_post->ID ) ){

                    $medical_care_unit_next_post_id = $medical_care_unit_next_post->ID;
                    echo '<div loop-count="1" next-post="' . absint( $medical_care_unit_next_post_id ) . '" class="twp-single-infinity"></div>';

                }
            }

        }

    }

endif;

add_action( 'medical_care_unit_navigation_action','medical_care_unit_single_post_navigation',30 );

if( !function_exists('medical_care_unit_content_offcanvas') ):

    // Offcanvas Contents
    function medical_care_unit_content_offcanvas(){ ?>

        <div id="offcanvas-menu">
            <div class="offcanvas-wraper">
                <div class="close-offcanvas-menu">
                    <div class="offcanvas-close">
                        <a href="javascript:void(0)" class="skip-link-menu-start"></a>
                        <button type="button" class="button-offcanvas-close">
                            <span class="offcanvas-close-label">
                                <?php echo esc_html__('Close', 'medical-care-unit'); ?>
                            </span>
                        </button>
                    </div>
                </div>
                <div id="primary-nav-offcanvas" class="offcanvas-item offcanvas-main-navigation">
                    <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'medical-care-unit'); ?>" role="navigation">
                        <ul class="primary-menu theme-menu">
                            <?php
                            if (has_nav_menu('medical-care-unit-primary-menu')) {
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'medical-care-unit-primary-menu',
                                        'show_toggles' => true,
                                    )
                                );
                            }else{

                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'show_toggles' => true,
                                        'walker' => new medical_care_unit_Walker_Page(),
                                    )
                                );
                            }
                            ?>
                        </ul>
                    </nav><!-- .primary-menu-wrapper -->
                </div>
                <a href="javascript:void(0)" class="skip-link-menu-end"></a>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'medical_care_unit_before_footer_content_action','medical_care_unit_content_offcanvas',30 );

if( !function_exists('medical_care_unit_footer_content_widget') ):

    function medical_care_unit_footer_content_widget(){

        $medical_care_unit_default = medical_care_unit_get_default_theme_options();
        
            $medical_care_unit_footer_column_layout = absint(get_theme_mod('medical_care_unit_footer_column_layout', $medical_care_unit_default['medical_care_unit_footer_column_layout']));
            $medical_care_unit_footer_sidebar_class = 12;
            if($medical_care_unit_footer_column_layout == 2) {
                $medical_care_unit_footer_sidebar_class = 6;
            }
            if($medical_care_unit_footer_column_layout == 3) {
                $medical_care_unit_footer_sidebar_class = 4;
            }
            ?>
           
           <?php if ( get_theme_mod('medical_care_unit_display_footer', false) == true ) : ?>
                <div class="footer-widgetarea">
                    <div class="wrapper">
                        <div class="column-row">

                            <?php for ($i=0; $i < $medical_care_unit_footer_column_layout; $i++) {
                                ?>
                                <div class="column <?php echo 'column-' . absint($medical_care_unit_footer_sidebar_class); ?> column-sm-12">
                                    <?php dynamic_sidebar('medical-care-unit-footer-widget-' . $i); ?>
                                </div>
                           <?php } ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>

        <?php

    }

endif;

add_action( 'medical_care_unit_footer_content_action','medical_care_unit_footer_content_widget',10 );

if( !function_exists('medical_care_unit_footer_content_info') ):

    /**
     * Footer Copyright Area
    **/
    function medical_care_unit_footer_content_info(){

        $medical_care_unit_default = medical_care_unit_get_default_theme_options(); ?>
        <div class="site-info">
            <div class="wrapper">
                <div class="column-row">
                    <div class="column column-9">
                        <div class="footer-credits">
                            <div class="footer-copyright">
                                <?php
                                $medical_care_unit_footer_copyright_text = wp_kses_post( get_theme_mod( 'medical_care_unit_footer_copyright_text', $medical_care_unit_default['medical_care_unit_footer_copyright_text'] ) );
                                    echo esc_html( $medical_care_unit_footer_copyright_text );
                                    echo '<br>';
                                    echo esc_html__('Theme: ', 'medical-care-unit') . '<a href="' . esc_url('https://www.omegathemes.com/products/free-medical-wordpress-theme') . '" title="' . esc_attr__('Medical Care Unit', 'medical-care-unit') . '" target="_blank"><span>' . esc_html__('Medical Care Unit', 'medical-care-unit') . '</span></a>' . esc_html__(' By ', 'medical-care-unit') . '  <span>' . esc_html__('OMEGA ', 'medical-care-unit') . '</span>';
                                    echo esc_html__('Powered by ', 'medical-care-unit') . '<a href="' . esc_url('https://wordpress.org') . '" title="' . esc_attr__('WordPress', 'medical-care-unit') . '" target="_blank"><span>' . esc_html__('WordPress.', 'medical-care-unit') . '</span></a>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="column column-3 align-text-right">
                        <a class="to-the-top" href="#site-header">
                            <span class="to-the-top-long">
                                <?php if ( get_theme_mod('medical_care_unit_enable_to_the_top', true) == true ) : ?>
                                    <?php
                                    $medical_care_unit_to_the_top_text = get_theme_mod( 'medical_care_unit_to_the_top_text', __( 'To the Top', 'medical-care-unit' ) );
                                    printf( 
                                        wp_kses( 
                                            /* translators: %s is the arrow icon markup */
                                            '%s %s', 
                                            array( 'span' => array( 'class' => array(), 'aria-hidden' => array() ) ) 
                                        ), 
                                        esc_html( $medical_care_unit_to_the_top_text ),
                                        '<span class="arrow" aria-hidden="true">&uarr;</span>' 
                                    );
                                    ?>
                                <?php endif; ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }

endif;

add_action( 'medical_care_unit_footer_content_action','medical_care_unit_footer_content_info',20 );


if( !function_exists( 'medical_care_unit_main_slider' ) ) :

    function medical_care_unit_main_slider(){

        $medical_care_unit_default = medical_care_unit_get_default_theme_options();
        $medical_care_unit_header_banner = get_theme_mod( 'medical_care_unit_header_banner', $medical_care_unit_default['medical_care_unit_header_banner'] );
        $medical_care_unit_header_banner_cat = get_theme_mod( 'medical_care_unit_header_banner_cat' );

        if( $medical_care_unit_header_banner ){

            $medical_care_unit_rtl = '';
            if( is_rtl() ){
                $medical_care_unit_rtl = 'dir="rtl"';
            }

          $medical_care_unit_banner_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 4,'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $medical_care_unit_header_banner_cat ) ) );

          if( $medical_care_unit_banner_query->have_posts() ): ?>

            <div class="theme-custom-block theme-banner-block">
                <div class="swiper-container theme-main-carousel swiper-container" <?php echo $medical_care_unit_rtl; ?>>

                    <div class="swiper-wrapper">

                      <?php
                      while( $medical_care_unit_banner_query->have_posts() ):
                        $medical_care_unit_banner_query->the_post();
                        $medical_care_unit_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                        $medical_care_unit_default_image = get_template_directory_uri() . '/assets/images/banner.png'; // Replace with the actual path to your default image  
                        $medical_care_unit_featured_image = isset( $medical_care_unit_featured_image[0] ) ? $medical_care_unit_featured_image[0] : $medical_care_unit_default_image;?>

                          <div class="swiper-slide main-carousel-item">
                             
                                  <div class="theme-article-post">
                                  <div class="entry-thumbnail">
                                      <div class="data-bg data-bg-large" data-background="<?php echo esc_url($medical_care_unit_featured_image); ?>">
                                          <a href="<?php the_permalink(); ?>" class="theme-image-responsive" tabindex="0"></a>
                                      </div>
                                      <?php medical_care_unit_post_format_icon(); ?>
                                  </div>
                            
                                  <div class="main-carousel-caption">
                                      <div class="post-content ">

                                          <header class="entry-header">
                                                <h2 class="entry-title entry-title-big">
                                                    <a href="<?php the_permalink(); ?>" rel="bookmark"><span><?php the_title(); ?></span></a>
                                                </h2>
                                          </header>


                                          <div class="entry-content">
                                              <?php
                                              if (has_excerpt()) {

                                                  the_excerpt();

                                              } else {

                                                  echo esc_html(wp_trim_words(get_the_content(), 25, '...'));

                                              } ?>
                                          </div>

                                          <a href="<?php the_permalink(); ?>" class="btn-fancy btn-fancy-primary" tabindex="0">
                                              <?php echo esc_html__('Know More', 'medical-care-unit'); ?>
                                          </a>

                                      </div>
                                  </div>
                                  </div>


                          </div>

                      <?php endwhile; ?>

                    </div>

                    <div class="swiper-pagination"></div>

                    <div class="swiper-control swiper-control_center">
                            <div class="theme-carousel-control">
                            <div class="swiper-button-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45.0282" height="9" viewBox="0 0 45.0282 9.0371"><polyline points="4.825 0.354 0.707 4.471 4.92 8.684"></polyline><line x1="0.9028" y1="4.513" x2="45.0278" y2="4.5405"></line></svg>
                            </div>
                            
                            <div class="swiper-button-next">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45.0277" height="9" viewBox="0 0 45.0277 9.0373"><polyline points="40.108 8.684 44.321 4.471 40.203 0.354"></polyline><line x1="0.0003" y1="4.5409" x2="44.1253" y2="4.5134"></line></svg>
                            </div>
                            </div>
                    </div>

                </div>
            </div>

          <?php
          wp_reset_postdata();
          endif;

        }

    }

endif;

if (!function_exists('medical_care_unit_post_format_icon')):

    // Post Format Icon.
    function medical_care_unit_post_format_icon() {

        $medical_care_unit_format = get_post_format(get_the_ID()) ?: 'standard';
        $medical_care_unit_icon = '';
        $medical_care_unit_title = '';
        if( $medical_care_unit_format == 'video' ){
            $medical_care_unit_icon = medical_care_unit_get_theme_svg( 'video' );
            $medical_care_unit_title = esc_html__('Video','medical-care-unit');
        }elseif( $medical_care_unit_format == 'audio' ){
            $medical_care_unit_icon = medical_care_unit_get_theme_svg( 'audio' );
            $medical_care_unit_title = esc_html__('Audio','medical-care-unit');
        }elseif( $medical_care_unit_format == 'gallery' ){
            $medical_care_unit_icon = medical_care_unit_get_theme_svg( 'gallery' );
            $medical_care_unit_title = esc_html__('Gallery','medical-care-unit');
        }elseif( $medical_care_unit_format == 'quote' ){
            $medical_care_unit_icon = medical_care_unit_get_theme_svg( 'quote' );
            $medical_care_unit_title = esc_html__('Quote','medical-care-unit');
        }elseif( $medical_care_unit_format == 'image' ){
            $medical_care_unit_icon = medical_care_unit_get_theme_svg( 'image' );
            $medical_care_unit_title = esc_html__('Image','medical-care-unit');
        }
        
        if (!empty($medical_care_unit_icon)) { ?>
            <div class="theme-post-format">
                <span class="post-format-icom"><?php echo medical_care_unit_svg_escape($medical_care_unit_icon); ?></span>
                <?php if( $medical_care_unit_title ){ echo '<span class="post-format-label">'.esc_html( $medical_care_unit_title ).'</span>'; } ?>
            </div>
        <?php }
    }

endif;

if ( ! function_exists( 'medical_care_unit_svg_escape' ) ):

    /**
     * Get information about the SVG icon.
     *
     * @param string $medical_care_unit_svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function medical_care_unit_svg_escape( $medical_care_unit_input ) {

        // Make sure that only our allowed tags and attributes are included.
        $medical_care_unit_svg = wp_kses(
            $medical_care_unit_input,
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
            )
        );

        if ( ! $medical_care_unit_svg ) {
            return false;
        }

        return $medical_care_unit_svg;

    }

endif;

if( !function_exists( 'medical_care_unit_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function medical_care_unit_sanitize_sidebar_option_meta( $medical_care_unit_input ){

        $metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $medical_care_unit_input,$metabox_options ) ){

            return $medical_care_unit_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'medical_care_unit_sanitize_pagination_meta' ) ) :

    // Sidebar Option Sanitize.
    function medical_care_unit_sanitize_pagination_meta( $medical_care_unit_input ){

        $medical_care_unit_metabox_options = array( 'Center','Right','Left');
        if( in_array( $medical_care_unit_input,$medical_care_unit_metabox_options ) ){

            return $medical_care_unit_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists('medical_care_unit_category_carousel') ):

    // Single Posts Related Posts.
    function medical_care_unit_category_carousel(){

        $medical_care_unit_default = medical_care_unit_get_default_theme_options();
        $medical_care_unit_category_section = absint( get_theme_mod( 'medical_care_unit_category_section',$medical_care_unit_default['medical_care_unit_category_section'] ) );
        if( $medical_care_unit_category_section ){
            $medical_care_unit_rtl = '';
            if( is_rtl() ){
                $medical_care_unit_rtl = 'dir="rtl"';
            } ?>

            <div class="theme-custom-block featured-categories-block">
                <div class="wrapper-fluid">
                    <?php $medical_care_unit_cat_main_service_title = esc_html( get_theme_mod( 'medical_care_unit_cat_main_service_title',$medical_care_unit_default['medical_care_unit_cat_main_service_title'] ) );
                        if( $medical_care_unit_cat_main_service_title ){ ?>
                        <h4 class="entry-title"><?php echo esc_html( $medical_care_unit_cat_main_service_title ); ?></h4>
                    <?php } ?>
                    <?php $medical_care_unit_cat_main_title = esc_html( get_theme_mod( 'medical_care_unit_cat_main_title',$medical_care_unit_default['medical_care_unit_cat_main_title'] ) );
                        if( $medical_care_unit_cat_main_title ){ ?>
                        <h2 class="entry-title"><?php echo esc_html( $medical_care_unit_cat_main_title ); ?></h2>
                    <?php } ?>
                    <div class="swiper-container theme-main-carousel theme-categories-carousel" <?php echo $medical_care_unit_rtl; ?>>
                        <div class="swiper-wrapper">
                            <?php
                            for ($x = 1; $x <= 10; $x++) {
                                $medical_care_unit_c_category = get_theme_mod('medical_care_unit_category_cat_' . $x,'uncategorized');
                                if ($medical_care_unit_c_category) {
                                    $medical_care_unit_cat_obj = get_category_by_slug($medical_care_unit_c_category);
                                    $cat_name = isset( $medical_care_unit_cat_obj->name ) ? $medical_care_unit_cat_obj->name : '';
                                    $medical_care_unit_cat_id = isset( $medical_care_unit_cat_obj->term_id ) ? $medical_care_unit_cat_obj->term_id : '';
                                    $medical_care_unit_cat_link = get_category_link($medical_care_unit_cat_id);
                                    $medical_care_unit_term_image_url = get_term_meta( $medical_care_unit_cat_id, 'term_image', true );

                                    // Define your default image URL
                                    $medical_care_unit_default_image_url = get_template_directory_uri() . '/assets/images/service.png';
                                                                            
                                    // Use the default image if no term image is found
                                    if (empty($medical_care_unit_term_image_url)) {
                                        $medical_care_unit_term_image_url = $medical_care_unit_default_image_url;
                                    }
                                    ?>

                                    <div class="swiper-slide be-category-item">
                                       <div class="theme-article-post theme-transform-zoom">
                                            <div class="post-thumb-categories">
                                                <div class="data-bg data-bg-medium" data-background="<?php echo esc_url($medical_care_unit_term_image_url); ?>">
                                                    <a class="theme-image-responsive" href="<?php echo esc_url($medical_care_unit_cat_link); ?>" tabindex="0"></a>
                                                </div>
                                            </div>
                                            <div class="article-content">
                                                <?php
                                                if ($cat_name) { ?>
                                                    <h3 class="category-title">
                                                        <a href="<?php echo esc_url($medical_care_unit_cat_link); ?>" tabindex="0">
                                                            <?php echo esc_html($cat_name); ?>
                                                        </a>
                                                    </h3>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } ?>
                        </div>
                        <div class="swiper-control swiper-control_center">
                            <div class="theme-carousel-control">
                            <div class="swiper-button-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45.0282" height="9" viewBox="0 0 45.0282 9.0371"><polyline points="4.825 0.354 0.707 4.471 4.92 8.684"></polyline><line x1="0.9028" y1="4.513" x2="45.0278" y2="4.5405"></line></svg>
                            </div>
                            <div class="swiper-button-next">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45.0277" height="9" viewBox="0 0 45.0277 9.0373"><polyline points="40.108 8.684 44.321 4.471 40.203 0.354"></polyline><line x1="0.0003" y1="4.5409" x2="44.1253" y2="4.5134"></line></svg>
                            </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        <?php
        }

    }

endif;

if( !function_exists( 'medical_care_unit_sanitize_menu_transform' ) ) :

    // Sidebar Option Sanitize.
    function medical_care_unit_sanitize_menu_transform( $medical_care_unit_input ){

        $medical_care_unit_metabox_options = array( 'capitalize','uppercase','lowercase');
        if( in_array( $medical_care_unit_input,$medical_care_unit_metabox_options ) ){

            return $medical_care_unit_input;

        }else{

            return '';

        }
    }

endif;


if( !function_exists( 'medical_care_unit_sanitize_page_content_alignment' ) ) :

    // Sidebar Option Sanitize.
    function medical_care_unit_sanitize_page_content_alignment( $medical_care_unit_input ){

        $medical_care_unit_metabox_options = array( 'left','center','right');
        if( in_array( $medical_care_unit_input,$medical_care_unit_metabox_options ) ){

            return $medical_care_unit_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'medical_care_unit_sanitize_footer_widget_title_alignment' ) ) :

    // Footer Option Sanitize.
    function medical_care_unit_sanitize_footer_widget_title_alignment( $medical_care_unit_input ){

        $medical_care_unit_metabox_options = array( 'left','center','right');
        if( in_array( $medical_care_unit_input,$medical_care_unit_metabox_options ) ){

            return $medical_care_unit_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'medical_care_unit_sanitize_pagination_meta' ) ) :

    // Sidebar Option Sanitize.
    function medical_care_unit_sanitize_pagination_meta( $medical_care_unit_input ){

        $medical_care_unit_metabox_options = array( 'Center','Right','Left');
        if( in_array( $medical_care_unit_input,$medical_care_unit_metabox_options ) ){

            return $medical_care_unit_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'medical_care_unit_sanitize_pagination_type' ) ) :

    /**
     * Sanitize the pagination type setting.
     *
     * @param string $medical_care_unit_input The input value from the Customizer.
     * @return string The sanitized value.
     */
    function medical_care_unit_sanitize_pagination_type( $medical_care_unit_input ) {
        // Define valid options for the pagination type.
        $medical_care_unit_valid_options = array( 'numeric', 'newer_older' ); // Update valid options to include 'newer_older'

        // If the input is one of the valid options, return it. Otherwise, return the default option ('numeric').
        if ( in_array( $medical_care_unit_input, $medical_care_unit_valid_options, true ) ) {
            return $medical_care_unit_input;
        } else {
            // Return 'numeric' as the fallback if the input is invalid.
            return 'numeric';
        }
    }

endif;


// Sanitize the enable/disable setting for pagination
if( !function_exists('medical_care_unit_sanitize_enable_pagination') ) :
    function medical_care_unit_sanitize_enable_pagination( $medical_care_unit_input ) {
        return (bool) $medical_care_unit_input;
    }
endif;