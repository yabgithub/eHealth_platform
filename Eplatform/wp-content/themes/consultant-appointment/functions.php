<?php
/**
 * Consultant Appointment functions and definitions
 *
 * @package Consultant Appointment
 */

if ( ! defined( 'CONSULTANT_APPOINTMENT_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'CONSULTANT_APPOINTMENT_VERSION', '1.0.0' );
}

function consultant_appointment_setup() {

	load_theme_textdomain( 'consultant-appointment' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( "align-wide" );
	add_theme_support( "responsive-embeds" );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'consultant-appointment' ),
			'social-menu' => esc_html__('Social Menu', 'consultant-appointment'),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support(
		'custom-background',
		apply_filters(
			'consultant_appointment_custom_background_args',
			array(
				'default-color' => '#fafafa',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	
}
add_action( 'after_setup_theme', 'consultant_appointment_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function consultant_appointment_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'consultant_appointment_content_width', 640 );
}
add_action( 'after_setup_theme', 'consultant_appointment_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function consultant_appointment_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'consultant-appointment' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'consultant-appointment' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'consultant-appointment' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'consultant-appointment' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'consultant-appointment' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'consultant-appointment' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'consultant-appointment' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'consultant-appointment' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'consultant_appointment_widgets_init' );


function consultant_appointment_social_menu()
    {
        if (has_nav_menu('social-menu')) :
            wp_nav_menu(array(
                'theme_location' => 'social-menu',
                'container' => 'ul',
                'menu_class' => 'social-menu menu',
                'menu_id'  => 'menu-social',
            ));
        endif;
    }


/**
 * Enqueue scripts and styles.
 */

function consultant_appointment_scripts() {
    // Google Fonts
    $query_args = array(
        'family' => 'Montserrat:wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900|Roboto:wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900|PT+Sans:wght@0,400;0,700;1,400;1,700',
        'display' => 'swap',
    );
    wp_enqueue_style('consultant-appointment-google-fonts', add_query_arg($query_args, 'https://fonts.googleapis.com/css'), array(), null);

    // Font Awesome CSS
    wp_enqueue_style('font-awesome-5', get_template_directory_uri() . '/revolution/assets/vendors/font-awesome-5/css/all.min.css', array(), '5.15.3');

    // Owl Carousel CSS
    wp_enqueue_style('owl-carousel-style', get_template_directory_uri() . '/revolution/assets/css/owl.carousel.css', array(), '2.3.4');
    
    // Main stylesheet
    wp_enqueue_style('consultant-appointment-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));

    // RTL styles if needed
    wp_style_add_data('consultant-appointment-style', 'rtl', 'replace');

    // Navigation script
    wp_enqueue_script('consultant-appointment-navigation', get_template_directory_uri() . '/js/navigation.js', array(), wp_get_theme()->get('Version'), true);

    // Owl Carousel script
    wp_enqueue_script('owl-carousel-jquery', get_template_directory_uri() . '/revolution/assets/js/owl.carousel.js', array('jquery'), '2.3.4', true);

    // Custom script
    wp_enqueue_script('consultant-appointment-custom-js', get_template_directory_uri() . '/revolution/assets/js/custom.js', array('jquery'), wp_get_theme()->get('Version'), true);

    // Comments reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'consultant_appointment_scripts');

if (!function_exists('consultant_appointment_related_post')) :
    /**
     * Display related posts from same category
     *
     */
    function consultant_appointment_related_post($post_id){        
        $categories = get_the_category($post_id);
        if ($categories) {
            $category_ids = array();
            $category = get_category($category_ids);
            $categories = get_the_category($post_id);
            foreach ($categories as $category) {
                $category_ids[] = $category->term_id;
            }
            $count = $category->category_count;
            if ($count > 1) { ?>
                <div class="related-post">
                    
                    <h2 class="post-title"><?php esc_html_e('Related Posts','consultant-appointment'); ?></h2>
                    <?php
                    $consultant_appointment_cat_post_args = array(
                        'category__in' => $category_ids,
                        'post__not_in' => array($post_id),
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'post_status' => 'publish',
                        'ignore_sticky_posts' => true
                    );
                    $consultant_appointment_featured_query = new WP_Query($consultant_appointment_cat_post_args);
                    ?>
                    <div class="rel-post-wrap">
                        <?php
                        if ($consultant_appointment_featured_query->have_posts()) :

                        while ($consultant_appointment_featured_query->have_posts()) : $consultant_appointment_featured_query->the_post();
                            ?>

							<div class="card-item rel-card-item">
								<div class="card-content">
									<div class="entry-title">
										<h3>
											<a href="<?php the_permalink() ?>">
												<?php the_title(); ?>
											</a>
										</h3>
									</div>
									<div class="entry-meta">
										<?php consultant_appointment_posted_on(); ?>
									</div>
								</div>
							</div>
                        <?php
                        endwhile;
                        ?>
                <?php
                endif;
                wp_reset_postdata();
                ?>
                </div>
                <?php
            }
        }
    }
endif;
add_action('consultant_appointment_related_posts', 'consultant_appointment_related_post', 10, 1);

/**
 * Checkbox sanitization callback example.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 */
function consultant_appointment_sanitize_checkbox($checked)
{
    // Boolean check.
    return ((isset($checked) && true == $checked) ? true : false);
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/revolution/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/revolution/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/revolution/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/revolution/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/revolution/inc/jetpack.php';

}

function consultant_appointment_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'display_header_text' );
    $wp_customize->remove_control( 'display_header_text' );

}

add_action( 'customize_register', 'consultant_appointment_remove_customize_register', 11 );

/**
 * Custom logo
 */

function consultant_appointment_custom_css() {
?>
	<style type="text/css" id="custom-theme-colors" >
        :root {
           
            --consultant_appointment_logo_width: <?php echo absint(get_theme_mod('consultant_appointment_logo_width')); ?> ;   
        }
        .site-branding img {
            max-width:<?php echo esc_html(get_theme_mod('consultant_appointment_logo_width')); ?>px ;    
        }         
	</style>
<?php
}
add_action( 'wp_head', 'consultant_appointment_custom_css' );

function consultant_appointment_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

// Change number of products per row to 3
add_filter('loop_shop_columns', 'consultant_appointment_custom_loop_columns', 999);
function consultant_appointment_custom_loop_columns() {
    return 3; // Change this number to adjust the number of products per row
}