<?php
/**
 * Template Name: Home Page
 */

get_header();
?>

<main id="primary">

    <?php 
        $consultant_appointment_main_slider_wrap = absint(get_theme_mod('consultant_appointment_enable_slider', 0));

        if ($consultant_appointment_main_slider_wrap == 1): 
    ?>
        <section id="main-slider-wrap">
            <div class="slider-main">
                <div class="owl-carousel">
                    <?php for ($consultant_appointment_main_i = 1; $consultant_appointment_main_i <= 3; $consultant_appointment_main_i++): ?>
                        <?php 
                        $consultant_appointment_slider_image = get_theme_mod('consultant_appointment_slider_image' . $consultant_appointment_main_i);
                        if ($consultant_appointment_slider_image): 
                        ?>
                            <div class="main-slider-inner-box">
                                <div class="container">
                                    <div class="flex-row">
                                        <div class="slider-left">
                                            <div class="main-slider-content-box">
                                                <?php if ($consultant_appointment_top_text = get_theme_mod('consultant_appointment_slider_top_text' . $consultant_appointment_main_i)): ?>
                                                    <p class="slider-top"><?php echo esc_html($consultant_appointment_top_text); ?> <i class="fas fa-calendar-check"></i></p>
                                                <?php endif; ?>

                                                <?php if ( $consultant_appointment_heading = get_theme_mod( 'consultant_appointment_slider_heading' . $consultant_appointment_main_i ) ) : ?>
                                                    <?php 
                                                        // Split the heading into words
                                                        $consultant_appointment_words = explode(' ', $consultant_appointment_heading);

                                                        // Get the last two words
                                                        $consultant_appointment_last_two_words = array_splice($consultant_appointment_words, -2);

                                                        // Reconstruct the heading with the last two words wrapped in a span
                                                        $consultant_appointment_formatted_heading = implode(' ', $consultant_appointment_words) . ' <span class="bold-text">' . implode(' ', $consultant_appointment_last_two_words) . '</span>';
                                                    ?>
                                                    <h1><?php echo $consultant_appointment_formatted_heading; ?></h1>
                                                <?php endif; ?>


                                                <?php if ($consultant_appointment_text = get_theme_mod('consultant_appointment_slider_text' . $consultant_appointment_main_i)): ?>
                                                    <p class="slider-para"><?php echo wp_kses_post($consultant_appointment_text); ?></p>
                                                <?php endif; ?>

                                                <div class="main-slider-button">
                                                    <?php 
                                                    $consultant_appointment_button1_link = get_theme_mod('consultant_appointment_slider_button1_link' . $consultant_appointment_main_i);
                                                    $consultant_appointment_button1_text = get_theme_mod('consultant_appointment_slider_button1_text' . $consultant_appointment_main_i);
                                                    if ($consultant_appointment_button1_link || $consultant_appointment_button1_text): 
                                                    ?>
                                                        <a class="slide-btn-1" href="<?php echo esc_url($consultant_appointment_button1_link); ?>">
                                                            <?php echo esc_html($consultant_appointment_button1_text); ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slider-right">
                                            <img src="<?php echo esc_url($consultant_appointment_slider_image); ?>" alt="<?php echo esc_attr($consultant_appointment_heading); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php 
    // Check if the section is enabled
    $consultant_appointment_main_expert_wrap = absint(get_theme_mod('consultant_appointment_enable_event', 0));
    if ($consultant_appointment_main_expert_wrap == 1): 

        // Get category and posts to show values
        $consultant_appointment_catData2 = get_theme_mod('consultant_appointment_blog_cat');
        $consultant_appointment_posts_to_show = absint(get_theme_mod('consultant_appointment_posts_to_show', 3));

        // Check if category is set and not the default "select"
        if (!empty($consultant_appointment_catData2) && $consultant_appointment_catData2 !== 'select'): 
            $consultant_appointment_page_query = new WP_Query(array(
                'category_name' => sanitize_text_field($consultant_appointment_catData2),
                'posts_per_page' => $consultant_appointment_posts_to_show,
            ));

            if ($consultant_appointment_page_query->have_posts()):
                $consultant_appointment_post_count = 0;
    ?>
    <section id="main-expert-wrap">
        <div class="container">
            <div class="flex-row">
                <div class="heading-expert-wrap">
                    <?php 
                        $consultant_appointment_servicesec_heading = get_theme_mod('consultant_appointment_servicesec_heading');
                        $consultant_appointment_servicesec_content = get_theme_mod('consultant_appointment_servicesec_content');

                        // Check if there is any heading or content to display
                        if ($consultant_appointment_servicesec_heading || $consultant_appointment_servicesec_content): 
                        ?>
                            <div class="heading-main-serv">
                                <?php if ($consultant_appointment_servicesec_heading): ?>
                                    <i class="fas fa-calendar-check"></i><h2 class="serv-heading"><?php echo esc_html($consultant_appointment_servicesec_heading); ?></h2>
                                <?php endif; ?>
                                <?php if ($consultant_appointment_servicesec_content): ?>
                                    <p class="serv-content"><?php echo esc_html($consultant_appointment_servicesec_content); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <div class="view-button">
                            <?php if (get_theme_mod('consultant_appointment_header_button_link') || get_theme_mod('consultant_appointment_header_button_text', 'VIEW ALL DEPARTMENT')): ?>
                                <a href="<?php echo esc_url(get_theme_mod('consultant_appointment_header_button_link')); ?>"><?php echo esc_html(get_theme_mod('consultant_appointment_header_button_text', 'VIEW ALL DEPARTMENT')); ?></a>
                            <?php endif; ?>
                        </div>
                </div>
                <div class="serv-primary">
                    <div class="owl-carousel">
                        <?php 
                        // Loop through each post
                        while ($consultant_appointment_page_query->have_posts()): 
                            $consultant_appointment_page_query->the_post();
                            $consultant_appointment_post_count++; 
                        ?>
                        <div class="box">
                            <div class="box-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                 <?php 
                                // Display price for the current post only
                                $consultant_appointment_price = get_theme_mod("consultant_appointment_courses_prices" . ($consultant_appointment_page_query->current_post + 1)); // +1 because current_post is zero-based
                                if ($consultant_appointment_price): 
                                ?>
                                    <div class="serv-price">
                                        <span class="post-price mb-0"><?php echo esc_html($consultant_appointment_price); ?></span><span class="price-end-text"><?php esc_html_e('Per month', 'consultant-appointment'); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php 
                                // Get the icon class for the current post only
                                $consultant_appointment_icon_class = get_theme_mod("consultant_appointment_services_icon" . ($consultant_appointment_page_query->current_post + 1)); // +1 to match the settings index
                                if ($consultant_appointment_icon_class): 
                                ?>
                                    <div class="icon-main">
                                        <div class="icon">
                                            <i class="<?php echo esc_attr($consultant_appointment_icon_class); ?> main-icon"></i>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php 
                                // Check if any feature text is set for this post
                                $consultant_appointment_features_to_show = false;
                                for ($consultant_appointment_feature_count = 1; $consultant_appointment_feature_count <= 3; $consultant_appointment_feature_count++) {
                                    if (get_theme_mod("consultant_appointment_post{$consultant_appointment_post_count}_feature_heading{$consultant_appointment_feature_count}") != '') {
                                        $consultant_appointment_features_to_show = true;
                                        break;
                                    }
                                }
                                ?>
                                <?php if ($consultant_appointment_features_to_show): ?>
                                    <div class="post-features">
                                        <?php 
                                        // Display each feature if it has text
                                        for ($consultant_appointment_feature_count = 1; $consultant_appointment_feature_count <= 3; $consultant_appointment_feature_count++): 
                                            $consultant_appointment_feature_text = get_theme_mod("consultant_appointment_post{$consultant_appointment_post_count}_feature_heading{$consultant_appointment_feature_count}");
                                            if ($consultant_appointment_feature_text): 
                                        ?>
                                            <div class="feature-item">
                                                <span class="main-features"><?php echo esc_html($consultant_appointment_feature_text); ?></span>
                                            </div>
                                        <?php 
                                            endif;
                                        endfor;
                                        ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="clearfix"></div> 
                        </div>          
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>   
            </div>             
        </div>
    </section>
    <?php else: ?>
        <p><?php esc_html_e('No posts found in this category.', 'consultant-appointment'); ?></p>
    <?php 
        endif; 
    endif; 
    endif; 
    ?>

</main>

<?php
get_footer();
?>