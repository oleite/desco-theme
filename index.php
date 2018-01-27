<?php get_header(); ?>

<div id="primary" class="content-area">
      <main id="main" class="site-main" role="main">



         <div class="container post-grid">

            <?php if ( have_posts() ):

            	while ( have_posts() ):	the_post();

            		get_template_part( 'template-parts/content-home', get_post_format() );

            	endwhile;

            endif; ?>



         </div><!-- .container -->

         <div class="load-more">
            <a><i class="fa fa-spinner" aria-hidden="true"></i> Carregar Mais</a>
         </div>

      </main>
</div><!-- #primary -->

<?php get_footer(); ?>
