<?php get_header(); ?>

<div id="primary" class="content-area">
      <main id="main" class="site-main" role="main">



         <div class="container post-grid js-posts-container">

            <?php if ( have_posts() ):

            	while ( have_posts() ):	the_post();

            		get_template_part( 'template-parts/content-home', get_post_format() );

            	endwhile;

            endif; ?>



         </div><!-- .container -->

         <div class="load-more">
            <a class="js-load-more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
               <i class="fa fa-spinner js-icon-loading" aria-hidden="true"></i> Carregar Mais
            </a>
         </div>

      </main>
</div><!-- #primary -->

<?php get_footer(); ?>
