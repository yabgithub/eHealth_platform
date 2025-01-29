<?php
/**
 * Medical Care Unit functions and definitions
 * @package Medical Care Unit
 */

if ( ! function_exists( 'medical_care_unit_after_theme_support' ) ) :

	function medical_care_unit_after_theme_support() {
		
		load_theme_textdomain( 'medical-care-unit', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
        add_theme_support('woocommerce', array(
            'gallery_thumbnail_image_width' => 300,
        ));

		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffffff',
			)
		);

		$GLOBALS['content_width'] = apply_filters( 'medical_care_unit_content_width', 1140 );
		
		add_theme_support( 'post-thumbnails' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 270,
				'width'       => 90,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);
		
		add_theme_support( 'title-tag' );

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		add_theme_support( 'post-formats', array(
		    'video',
		    'audio',
		    'gallery',
		    'quote',
		    'image'
		) );
		
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );

		add_editor_style('/lib/custom/css/editor-style.css');

	}

endif;

add_action( 'after_setup_theme', 'medical_care_unit_after_theme_support' );

/**
 * Register and Enqueue Styles.
 */
function medical_care_unit_register_styles() {

	wp_enqueue_style( 'dashicons' );

    $medical_care_unit_theme_version = wp_get_theme()->get( 'Version' );
	$medical_care_unit_fonts_url = medical_care_unit_fonts_url();
    if( $medical_care_unit_fonts_url ){
    	require_once get_theme_file_path( 'lib/custom/css/wptt-webfont-loader.php' );
        wp_enqueue_style(
			'medical-care-unit-google-fonts',
			wptt_get_webfont_url( $medical_care_unit_fonts_url ),
			array(),
			$medical_care_unit_theme_version
		);
    }

    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/lib/swiper/css/swiper-bundle.min.css');
	wp_enqueue_style( 'medical-care-unit-style', get_stylesheet_uri(), array(), $medical_care_unit_theme_version );

	wp_enqueue_style( 'medical-care-unit-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom_css.php' );
	wp_add_inline_style( 'medical-care-unit-style',$medical_care_unit_custom_css );

	$medical_care_unit_css = '';

	if ( get_header_image() ) :

		$medical_care_unit_css .=  '
			.header-navbar{
				background-image: url('.esc_url(get_header_image()).');
				-webkit-background-size: cover !important;
				-moz-background-size: cover !important;
				-o-background-size: cover !important;
				background-size: cover !important;
			}';

	endif;

	wp_add_inline_style( 'medical-care-unit-style', $medical_care_unit_css );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	

	wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/lib/swiper/js/swiper-bundle.min.js', array('jquery'), '', 1);
	wp_enqueue_script( 'medical-care-unit-custom', get_template_directory_uri() . '/lib/custom/js/theme-custom-script.js', array('jquery'), '', 1);

    // Global Query
    if( is_front_page() ){

    	$medical_care_unit_posts_per_page = absint( get_option('posts_per_page') );
        $medical_care_unit_c_paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
        $medical_care_unit_posts_args = array(
            'posts_per_page'        => $medical_care_unit_posts_per_page,
            'paged'                 => $medical_care_unit_c_paged,
        );
        $medical_care_unit_posts_qry = new WP_Query( $medical_care_unit_posts_args );
        $max = $medical_care_unit_posts_qry->max_num_pages;

    }else{
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $medical_care_unit_c_paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    }

    $medical_care_unit_default = medical_care_unit_get_default_theme_options();
    $medical_care_unit_pagination_layout = get_theme_mod( 'medical_care_unit_pagination_layout',$medical_care_unit_default['medical_care_unit_pagination_layout'] );
}

add_action( 'wp_enqueue_scripts', 'medical_care_unit_register_styles',200 );

function medical_care_unit_admin_enqueue_scripts_callback() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
    wp_enqueue_media();
    }
    wp_enqueue_script('medical-care-unit-uploaderjs', get_stylesheet_directory_uri() . '/lib/custom/js/uploader.js', array(), "1.0", true);
}
add_action( 'admin_enqueue_scripts', 'medical_care_unit_admin_enqueue_scripts_callback' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function medical_care_unit_menus() {

	$medical_care_unit_locations = array(
		'medical-care-unit-primary-menu'  => esc_html__( 'Primary Menu', 'medical-care-unit' ),
	);

	register_nav_menus( $medical_care_unit_locations );
}

add_action( 'init', 'medical_care_unit_menus' );

add_filter('loop_shop_columns', 'medical_care_unit_loop_columns');
if (!function_exists('medical_care_unit_loop_columns')) {
	function medical_care_unit_loop_columns() {
		$medical_care_unit_columns = get_theme_mod( 'medical_care_unit_per_columns', 3 );
		return $medical_care_unit_columns;
	}
}

add_filter( 'loop_shop_per_page', 'medical_care_unit_per_page', 20 );
function medical_care_unit_per_page( $medical_care_unit_cols ) {
  	$medical_care_unit_cols = get_theme_mod( 'medical_care_unit_product_per_page', 9 );
	return $medical_care_unit_cols;
}

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/classes/class-svg-icons.php';
require get_template_directory() . '/classes/class-walker-menu.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/classes/body-classes.php';
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/metabox.php';
require get_template_directory() . '/inc/pagination.php';
require get_template_directory() . '/lib/breadcrumbs/breadcrumbs.php';
require get_template_directory() . '/lib/custom/css/dynamic-style.php';

/**
 * For Admin Page
 */
if (is_admin()) {
	require get_template_directory() . '/inc/get-started/get-started.php';
}


if (! defined( 'MEDICAL_CARE_UNIT_DOCS_PRO' ) ){
define('MEDICAL_CARE_UNIT_DOCS_PRO',__('https://layout.omegathemes.com/steps/medical-care-unit/','medical-care-unit'));
}
if (! defined( 'MEDICAL_CARE_UNIT_BUY_NOW' ) ){
define('MEDICAL_CARE_UNIT_BUY_NOW',__('https://www.omegathemes.com/products/medical-care-wordpress-theme','medical-care-unit'));
}
if (! defined( 'MEDICAL_CARE_UNIT_SUPPORT_FREE' ) ){
define('MEDICAL_CARE_UNIT_SUPPORT_FREE',__('https://wordpress.org/support/theme/medical-care-unit/','medical-care-unit'));
}
if (! defined( 'MEDICAL_CARE_UNIT_REVIEW_FREE' ) ){
define('MEDICAL_CARE_UNIT_REVIEW_FREE',__('https://wordpress.org/support/theme/medical-care-unit/reviews/#new-post','medical-care-unit'));
}
if (! defined( 'MEDICAL_CARE_UNIT_DEMO_PRO' ) ){
define('MEDICAL_CARE_UNIT_DEMO_PRO',__('https://layout.omegathemes.com/medical-care-unit/','medical-care-unit'));
}
if (! defined( 'MEDICAL_CARE_UNIT_LITE_DOCS_PRO' ) ){
define('MEDICAL_CARE_UNIT_LITE_DOCS_PRO',__('https://layout.omegathemes.com/steps/free-medical-care-unit/','medical-care-unit'));
}

function medical_care_unit_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'display_header_text' );
    $wp_customize->remove_control( 'display_header_text' );

}

add_action( 'customize_register', 'medical_care_unit_remove_customize_register', 11 );

// Apply styles based on customizer settings

function medical_care_unit_customizer_css() {
    ?>
    <style type="text/css">
        <?php
        $medical_care_unit_footer_widget_background_color = get_theme_mod('medical_care_unit_footer_widget_background_color');
        if ($medical_care_unit_footer_widget_background_color) {
            echo '.footer-widgetarea { background-color: ' . esc_attr($medical_care_unit_footer_widget_background_color) . '; }';
        }

        $medical_care_unit_footer_widget_background_image = get_theme_mod('medical_care_unit_footer_widget_background_image');
        if ($medical_care_unit_footer_widget_background_image) {
            echo '.footer-widgetarea { background-image: url(' . esc_url($medical_care_unit_footer_widget_background_image) . '); }';
        }
        $medical_care_unit_copyright_font_size = get_theme_mod('medical_care_unit_copyright_font_size');
        if ($medical_care_unit_copyright_font_size) {
            echo '.footer-copyright { font-size: ' . esc_attr($medical_care_unit_copyright_font_size) . 'px;}';
        }
        ?>
    </style>
    <?php
}
add_action('wp_head', 'medical_care_unit_customizer_css');

function medical_care_unit_radio_sanitize(  $medical_care_unit_input, $medical_care_unit_setting  ) {
	$medical_care_unit_input = sanitize_key( $medical_care_unit_input );
	$medical_care_unit_choices = $medical_care_unit_setting->manager->get_control( $medical_care_unit_setting->id )->choices;
	return ( array_key_exists( $medical_care_unit_input, $medical_care_unit_choices ) ? $medical_care_unit_input : $medical_care_unit_setting->default );
}
require get_template_directory() . '/inc/general.php';