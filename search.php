<?php
   get_header();

?>

<div id="primary" class="content-area">
      <main id="main" class="site-main" role="main">

         <h1 class="author-title">Resultados da pesquisa por "<?php echo get_search_query(); ?>"</h1>
         <?php the_widget('WP_Widget_Search', $instance = array(), $args = array() ) ?>


         <div class="container post-grid">

            <?php if ( have_posts() ):

            	while ( have_posts() ):	the_post();

            		get_template_part( 'template-parts/content-home', get_post_format() );

            	endwhile;

            endif; ?>



         </div><!-- .container -->

      </main>
</div><!-- #primary -->

<?php get_footer(); ?>
