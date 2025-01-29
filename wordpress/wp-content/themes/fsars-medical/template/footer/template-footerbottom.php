<?php
$fsars_medical_copyright = get_theme_mod('fsars_medical_copyright');
$fsars_medical_design    = get_theme_mod('fsars_medical_design');
?>
<?php if ($fsars_medical_copyright || $fsars_medical_design) { ?>
    <div class="footer-bottom">

        <div class="container">

            <div class="row">
                <div class="col-sm-12 col-lg-6 col-md-6 col-xs-12">

                    <div class="design text-left">

                        <?php if (get_theme_mod('fsars_medical_design')) { ?>
                            <?php echo esc_html($fsars_medical_design); ?>
                        <?php } ?>

                    </div><!--design-->

                </div><!--col-sm-6-->

                <div class="col-sm-12 col-xs-12 col-lg-6 col-md-6">

                    <div class="copyright text-right">


                        <?php if (get_theme_mod('fsars_medical_copyright')) { ?>
                            <?php echo esc_html($fsars_medical_copyright); ?>
                        <?php } ?>         
                    </div><!--copyright-->

                </div>



            </div><!--row-->

        </div><!--container-->

    </div><!--footer-bottom-->
    <?php
}?>