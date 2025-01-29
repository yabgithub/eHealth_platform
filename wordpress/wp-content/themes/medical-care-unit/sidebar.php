<?php
/**
 * The sidebar containing the main widget area
 * @package Medical Care Unit
 */

global $post;

$medical_care_unit_default = medical_care_unit_get_default_theme_options();

if(!empty($post)) {
$medical_care_unit_post_sidebar = esc_html( get_post_meta( $post->ID, 'medical_care_unit_post_sidebar_option', true ) );
}

$medical_care_unit_sidebar_column_class = 'column-order-2';

if (empty($medical_care_unit_post_sidebar)) {
    $medical_care_unit_global_sidebar_layout = esc_html( get_theme_mod( 'medical_care_unit_global_sidebar_layout',$medical_care_unit_default['medical_care_unit_global_sidebar_layout'] ) );
} else {
    $medical_care_unit_global_sidebar_layout = $medical_care_unit_post_sidebar;
}
if ( ! is_active_sidebar( 'sidebar-1' ) || $medical_care_unit_global_sidebar_layout == 'no-sidebar' ) {
    return;
}

if ($medical_care_unit_global_sidebar_layout == 'left-sidebar') {
    $medical_care_unit_sidebar_column_class = 'column-order-1';
}
 ?>

<aside id="secondary" class="widget-area <?php echo $medical_care_unit_sidebar_column_class; ?>">
    <div class="widget-area-wrapper">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
</aside>