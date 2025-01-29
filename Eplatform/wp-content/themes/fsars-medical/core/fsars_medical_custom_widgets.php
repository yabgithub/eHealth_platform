<?php   
/**
 * @package fsars-medical
 */
 ?>
 <?php
function fsars_medical_widgets_init() { 	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fsars-medical' ),
		'description'   => esc_html__( 'Appears on sidebar', 'fsars-medical' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="" class="widget">',
		'after_widget'  => '</aside>',
	) );			
}
add_action( 'widgets_init', 'fsars_medical_widgets_init' );