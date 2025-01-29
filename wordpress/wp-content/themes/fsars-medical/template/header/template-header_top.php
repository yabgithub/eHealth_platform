<a class="skip-link screen-reader-text" href="#contentdiv">
    <?php esc_html_e('Skip to content', 'fsars-medical'); ?></a>
<div id="maintopdiv">
    <div class="header-social-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6  col-sm-12 col-lg-6 text-left header-social-top-left list-space"> 
                    <ul class="list-inline"> 
                        <li>
                            <?php $fsars_medical_phone = get_theme_mod('fsars_medical_phone'); ?>
                            <?php if (!empty($fsars_medical_phone)) { ?>
                                <span class="info headerphone"><span class="fa fa-phone"></span>&nbsp;&nbsp;<a href="tel:<?php echo esc_attr($fsars_medical_phone); ?>"><?php echo esc_html($fsars_medical_phone); ?></a></span>
                            <?php } ?>
                        </li>
                        <li>
                            <?php $fsars_medical_email = get_theme_mod('fsars_medical_address'); ?>
                            <?php if (!empty($fsars_medical_email)) { ?>
                                <span class="info headeremail"><span class="fa fa-envelope"></span>&nbsp;&nbsp;<a href="mailto:<?php echo esc_attr($fsars_medical_email); ?>"><?php echo esc_html(sanitize_email($fsars_medical_email)); ?></a></span>
                            <?php } ?>                             
                        </li>
                    </ul>
                    <div class="clearfix"></div> 
                </div>
                <div class="col-md-6  col-sm-12 col-lg-6 text-right header-social-top-right list-space"> 
                    <ul class=" list-inline">
                        <?php if (get_theme_mod('fsars_medical_fb')) { ?>
                            <li><a title="<?php esc_attr_e('Facebook', 'fsars-medical'); ?>" class="fa fa-facebook" target="_blank" href="<?php echo esc_url(get_theme_mod('fsars_medical_fb')); ?>"></a> </li>
                        <?php } ?>
                        <?php if (get_theme_mod('fsars_medical_twitter')) { ?>
                            <li><a title="<?php esc_attr_e('twitter', 'fsars-medical'); ?>" class="fa fa-twitter" target="_blank" href="<?php echo esc_url(get_theme_mod('fsars_medical_twitter')); ?>"></a></li>
                        <?php } ?>
                        <?php if (get_theme_mod('fsars_medical_glplus')) { ?>
                            <li><a title="<?php esc_attr_e('googleplus', 'fsars-medical'); ?>" class="fa fa-google-plus" target="_blank" href="<?php echo esc_url(get_theme_mod('fsars_medical_glplus')); ?>"></a></li>
                        <?php } ?>
                        <?php if (get_theme_mod('fsars_medical_in')) { ?>
                            <li><a title="<?php esc_attr_e('linkedin', 'fsars-medical'); ?>" class="fa fa-linkedin" target="_blank" href="<?php echo esc_url(get_theme_mod('fsars_medical_in')); ?>"></a></li>
                        <?php } ?>
                    </ul> 
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div><!--row-->
        </div><!--container-->
    </div><!--header-social-top-->
    <div class="header-top">
        <div class="container" >
            <div class="row">  
                <div class="col-md-3  col-sm-12 col-lg-3 headercommon header-left leftlogo">            
                    <?php if (display_header_text() == true) { ?>
                        <div class="logotxt">
                            <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                            <p><?php bloginfo('description'); ?></p>
                        </div>
                    <?php } ?>

                </div> <!--col-sm-3--> 
                <div class="col-md-9  col-lg-9  col-sm-12 ">
                    <section id="main_navigation">
                        <div class="main-navigation-inner rightmenu">
                            <div class="toggle">
                                <a class="togglemenu" href="#"><?php esc_html_e('Menu', 'fsars-medical'); ?></a>
                            </div><!-- toggle --> 
                            <div class="sitenav">
                                <div class="nav">
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary'
                                    ));
                                    ?>
                                </div>
                            </div><!-- site-nav -->
                        </div><!--<div class=""main-navigation-inner">-->
                    </section><!--main_navigation-->

                </div><!--col-md-4 header_middle-->

                <div class="clearfix"></div>
            </div><!--row-->
        </div><!--container-->
    </div><!--main-navigations-->    
</div><!--maintopdiv-->