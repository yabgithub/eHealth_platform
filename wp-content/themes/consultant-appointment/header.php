<?php
/**
 * The header for our theme
 *
 * @package Consultant Appointment
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'consultant-appointment' ); ?></a>

    <?php
    $consultant_appointment_preloader_wrap = absint( get_theme_mod( 'consultant_appointment_enable_preloader', 0 ) );
    if ( $consultant_appointment_preloader_wrap === 1 ) : ?>
        <div id="loader">
            <div class="loader-container">
                <div id="preloader" class="loader-2">
                    <div class="dot"></div>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <header id="masthead" class="site-header">
        <div class="headermain">
            <div class="header-info-box">
                <?php 
                $consultant_appointment_main_topbar = absint(get_theme_mod('consultant_appointment_main_topbar', 0));

                if ($consultant_appointment_main_topbar == 1): 
                 ?>
                    <div class="top-head">
                        <div class="container">
                            <div class="flex-row">
                                <div class="top-left">
                                    <?php if ( get_theme_mod( 'consultant_appointment_header_info_phone' ) ) : ?>
                                        <span class="contact-info">
                                            <span class="main-box phone">
                                                <span class="main-head">
                                                    <span class="pre-text">
                                                        <?php echo esc_html__( 'Do You Have Any Questions? Call Us', 'consultant-appointment' ); ?>
                                                    </span>
                                                    <a href="tel:<?php echo esc_attr( get_theme_mod( 'consultant_appointment_header_info_phone' ) ); ?>">
                                                        <?php echo esc_html( get_theme_mod( 'consultant_appointment_header_info_phone' ) ); ?>
                                                    </a>
                                                </span>
                                            </span>
                                        </span>
                                    <?php endif; ?>

                                </div>
                                <div class="top-right">
                                    <?php if ( get_theme_mod( 'consultant_appointment_header_search', false ) == 1 ) : ?>
                                        <span class="search-bar">
                                            <button type="button" class="open-search"><i class="fas fa-search"></i></button>
                                        </span>
                                    <?php endif; ?>
                                    <span class="social-media">
                                        <?php if ( get_theme_mod( 'consultant_appointment_facebook_link_option' ) ) : ?>
                                            <a href="<?php echo esc_url( get_theme_mod( 'consultant_appointment_facebook_link_option' ) ); ?>" target="_blank" rel="noopener noreferrer">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ( get_theme_mod( 'consultant_appointment_twitter_link_option' ) ) : ?>
                                            <a href="<?php echo esc_url( get_theme_mod( 'consultant_appointment_twitter_link_option' ) ); ?>" target="_blank" rel="noopener noreferrer">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ( get_theme_mod( 'consultant_appointment_pinterest_link_option' ) ) : ?>
                                            <a href="<?php echo esc_url( get_theme_mod( 'consultant_appointment_pinterest_link_option' ) ); ?>" target="_blank" rel="noopener noreferrer">
                                                <i class="fab fa-pinterest-p"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ( get_theme_mod( 'consultant_appointment_instagram_link_option' ) ) : ?>
                                            <a href="<?php echo esc_url( get_theme_mod( 'consultant_appointment_instagram_link_option' ) ); ?>" target="_blank" rel="noopener noreferrer">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ( get_theme_mod( 'consultant_appointment_linked_link_option' ) ) : ?>
                                            <a href="<?php echo esc_url( get_theme_mod( 'consultant_appointment_linked_link_option' ) ); ?>" target="_blank" rel="noopener noreferrer">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ( get_theme_mod( 'consultant_appointment_youtube_link_option' ) ) : ?>
                                            <a href="<?php echo esc_url( get_theme_mod( 'consultant_appointment_youtube_link_option' ) ); ?>" target="_blank" rel="noopener noreferrer">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        <?php endif; ?>
                                    </span>
                                </div>
                                <div class="search-outer">
                                    <div class="inner_searchbox">
                                        <?php get_search_form(); ?>
                                    </div>
                                    <button type="button" class="search-close"><i class="fas fa-window-close"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>


                <?php 
                $consultant_appointment_has_header_image = has_header_image();
                $consultant_appointment_header_image_url = $consultant_appointment_has_header_image ? esc_url( get_header_image() ) : '';
                ?>
                <div class="middle-head" style="background-image: url('<?php echo $consultant_appointment_header_image_url; ?>'); background-repeat: no-repeat; background-size: cover;">
                    <div class="header-menu-box">
                        <div class="container">
                            <div class="flex-row">
                                <div class="middle-left">
                                    <div class="site-branding">
                                        <?php
                                        if ( function_exists( 'the_custom_logo' ) ) {
                                            the_custom_logo();
                                        }
                                        if ( is_front_page() && is_home() ) :
                                            if ( get_theme_mod( 'consultant_appointment_site_title_text', true ) ) : ?>
                                                <h1 class="site-title">
                                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                                </h1>
                                            <?php endif;
                                        else :
                                            if ( get_theme_mod( 'consultant_appointment_site_title_text', true ) ) : ?>
                                                <p class="site-title">
                                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                                </p>
                                            <?php endif;
                                        endif;

                                        $consultant_appointment_description = get_bloginfo( 'description', 'display' );
                                        if ( $consultant_appointment_description || is_customize_preview() ) :
                                            if ( get_theme_mod( 'consultant_appointment_site_tagline_text', false ) ) : ?>
                                                <p class="site-description"><?php echo esc_html( $consultant_appointment_description ); ?></p>
                                            <?php endif;
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="middle-center">
                                    <div class="nav-menu-header-right">
                                        <nav id="site-navigation" class="main-navigation">
                                            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                                                <span class="screen-reader-text"><?php esc_html_e( 'Primary Menu', 'consultant-appointment' ); ?></span>
                                                <i class="fas fa-bars"></i>
                                            </button>
                                            <?php
                                            wp_nav_menu( array(
                                                'theme_location' => 'menu-1',
                                                'menu_id'        => 'primary-menu',
                                            ) );
                                            ?>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </header>
</div>
<?php wp_footer(); ?>
</body>
</html>