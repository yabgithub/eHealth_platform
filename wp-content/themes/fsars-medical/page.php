<?php
/**
 * @package fsars-medical
 */

get_header(); 
?>
<div class="container" id="contentdiv">
     <div class="row">
        
        <div class="col-md-8 col-lg-8 col-sm-12 site-main">
        	 <div class="blog-post">
					<?php
                    if ( have_posts() ) :
                        
                        while ( have_posts() ) : the_post();
                        ?>   
						<div><h1><?php the_title(); ?></h1></div>
						<div><?php the_content();?></div>
						 <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
						<?php if ( comments_open() || get_comments_number() ) :
						comments_template();
						endif;?>
                        <?php endwhile;
                    endif;
                    ?>
                    </div><!--blog-post -->
             </div><!--col-md-8-->
              <div class="col-md-4 col-lg-4 col-sm-12" id="sidebar">
                <?php get_sidebar();?>
             </div><!--col-md-4-->  
                          
        <div class="clearfix"></div>
    </div><!-- row -->
</div><!-- container -->
<?php get_footer(); ?>