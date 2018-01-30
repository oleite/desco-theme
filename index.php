<?php get_header(); ?>

<div id="primary" class="content-area">

      <main id="main" class="site-main" role="main">

         <div class="home-header fade-in">
            <?php
                // query for the specific page
                $query_homepage = new WP_Query( 'pagename=homepage' );
                // "loop" through query (even though it's just one page)
                while ( $query_homepage->have_posts() ) : $query_homepage->the_post();
                    the_content();
                endwhile;
                // reset post data (important!)
                wp_reset_postdata();
            ?>
            <?php the_widget('WP_Widget_Search', $instance = array(), $args = array() ) ?>
            <!--<i class="fa fa-facebook-square" aria-hidden="true"></i>-->
         </div>

         <div class="container post-grid js-posts-container">

            <?php if ( have_posts() ):

            	while ( have_posts() ):	the_post();

            		get_template_part( 'template-parts/content-home', get_post_format() );

            	endwhile;

            endif; ?>



         </div><!-- .container -->

         <div class="load-more">
            <a class="js-load-more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
               <span>Carregar Mais</span>
               <i class="fa fa-chevron-down js-icon-loading" aria-hidden="true"></i>
            </a>
         </div>

      </main>
</div><!-- #primary -->

<?php get_footer(); ?>
