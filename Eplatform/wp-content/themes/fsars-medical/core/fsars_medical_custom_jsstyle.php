<?php   
/**
 * @package fsars-medical
 */
function fsars_medical_style_js()
 {
 	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/views/bootstrap/css/bootstrap.css');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/views/css/font-awesome.css');
	wp_enqueue_style( 'fsars-medical-basic-style', get_stylesheet_uri() );
        wp_enqueue_style( 'fsars-medical-lite-style', get_template_directory_uri() .'/views/css/fsars-medical-lite-main.css');
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/views/bootstrap/js/bootstrap.js', array('jquery'));	
	wp_enqueue_script( 'fsars-medical-toggle-jquery', get_template_directory_uri() . '/views/js/fsars_medical-toggle.js', array('jquery'));	
 }
 add_action( 'wp_enqueue_scripts', 'fsars_medical_style_js' );
 function fsars_medical_skip_link_focus_fix() {
    // The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
    ?>
    <script>
        /(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function () {
            var t, e = location.hash.substring(1);
            /^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
        }, !1);
    </script>
    <!-- menu dropdown accessibility -->
    <script type="text/javascript">

        jQuery(document).ready(function () {
            jQuery(".nav").fsarsmedicalaccessibleDropDown();
        });

        jQuery.fn.fsarsmedicalaccessibleDropDown = function () {
            var el = jQuery(this);

            /* Make dropdown menus keyboard accessible */

            jQuery("a", el).focus(function () {
                jQuery(this).parents("li").addClass("hover");
            }).blur(function () {
                jQuery(this).parents("li").removeClass("hover");
            });
        }
    </script>
    <?php

}
add_action('wp_print_footer_scripts', 'fsars_medical_skip_link_focus_fix');