<?php
   get_header();

   $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

<div id="primary" class="content-area">
      <main id="main" class="site-main" role="main">

         <h1 class="author-title">Posts de <?php echo $curauth->nickname; ?></h1>

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
