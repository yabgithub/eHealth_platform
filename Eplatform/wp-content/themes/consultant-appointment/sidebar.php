<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Consultant Appointment
 */

?>

<?php

if ( is_active_sidebar( 'sidebar-1' )) { ?>
	<aside id="secondary" class="widget-area sidebar-width">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside>
<?php } else { ?>
	<aside id="secondary" class="widget-area sidebar-width">
		<div class="default-sidebar">
			<aside id="search-3" class="widget widget_search">
	            <h2 class="widget-title"><?php esc_html_e('Search', 'consultant-appointment'); ?></h2>
	            <form method="get" id="searchform" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
		            <input placeholder="<?php esc_attr_e('Type here...', 'consultant-appointment'); ?>" type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
		            <input type="submit" class="search-field" value="<?php esc_attr_e('Search...', 'consultant-appointment');?>" />
		        </form>
	        </aside>
	        <aside id="categories-2" class="widget widget_categories">
	            <h2 class="widget-title"><?php esc_html_e('Categories', 'consultant-appointment'); ?></h2>
	            <ul>
	                <?php
	                wp_list_categories(array(
	                    'title_li' => '',
	                ));
	                ?>
	            </ul>
	        </aside>
	        <aside id="pages-2" class="widget widget_pages">
	            <h2 class="widget-title"><?php esc_html_e('Pages', 'consultant-appointment'); ?></h2>
	            <ul>
	                <?php
	                wp_list_pages(array(
	                    'title_li' => '',
	                ));
	                ?>
	            </ul>
	        </aside>
	        <aside id="archives-2" class="widget widget_archive">
	            <h2 class="widget-title"><?php esc_html_e('Archives', 'consultant-appointment'); ?></h2>
	            <ul>
	            <?php
	            wp_get_archives(array(
	                'type' => 'postbypost',
	                'format' => 'html',
	                'before' => '<li>',
	                'after' => '</li>',
	            ));
	            ?>
	        </ul>
	       </aside>
	   </div>
	</aside>
<?php } ?>