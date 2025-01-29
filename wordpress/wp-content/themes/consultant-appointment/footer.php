<?php
/**
 * The template for displaying the footer
 *
 * @package Consultant Appointment
 */

?>

<footer id="colophon" class="site-footer">
    <?php 
        if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3')) {
    ?>
        <section class="footer-top">
            <div class="container">
                <div class="flex-row">
                    <?php
                        if (is_active_sidebar('footer-1')) {
                    ?>
                            <div class="footer-col">
                                <?php dynamic_sidebar('footer-1'); ?>
                            </div>
                    <?php
                        }
                        if (is_active_sidebar('footer-2')) {
                    ?>  
                            <div class="footer-col">
                                <?php dynamic_sidebar('footer-2'); ?>
                            </div>
                    <?php
                        }
                        if (is_active_sidebar('footer-3')) {
                    ?>
                            <div class="footer-col">
                                <?php dynamic_sidebar('footer-3'); ?>
                            </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </section>
    <?php
        } else { ?>
            <section class="footer-top default_footer_widgets">
                <div class="container">
                    <div class="flex-row">
                        <aside id="search-2" class="widget widget_search default_footer_search">
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
                </div>
            </section>
    <?php } ?>

		<div class="footer-bottom">
			<div class="container">
				<?php 
				$consultant_appointment_footer_social = absint(get_theme_mod('consultant_appointment_footer_social_menu', 1));
				if($consultant_appointment_footer_social == 1){ 
				?>
				<div class="social-links">
					<?php
						consultant_appointment_social_menu();
					?>
				</div>
				<?php 
				} 
				?>
				<div class="site-info">
					<div>
						<?php
				            if (!get_theme_mod('consultant_appointment_copyright_option') ) { ?>
				              <?php esc_html_e('Consultant Appointment WordPress Theme By Revolution WP ','consultant-appointment'); ?>
				            <?php } else {
				              echo esc_html(get_theme_mod('consultant_appointment_copyright_option'));
				            }
			          	?>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<?php 
	$consultant_appointment_footer_go_to_top = absint(get_theme_mod('consultant_appointment_enable_go_to_top_option', 1));
	if($consultant_appointment_footer_go_to_top == 1){ 
		?>
		<a href="javascript:void(0);" class="footer-go-to-top go-to-top"><i class="fas fa-chevron-up"></i></a>
<?php } ?>

<?php wp_footer(); ?>

</body>
</html>