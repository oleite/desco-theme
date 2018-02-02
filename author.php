<?php
   get_header();

   $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
   $authorAvatarURL = get_avatar_url($curauth->user_email);
   $authorAvatarRedirect = bp_core_get_user_domain($curauth->ID);
   $authorRedirectTitle = 'Ir para o perfil pessoal de '. $curauth->display_name;
?>

<div id="primary" class="content-area">
      <main id="main" class="site-main" role="main">

         <div class="author-header">
            <a class="author-avatar" href="<?php echo $authorAvatarRedirect; ?>" title="<?php echo $authorRedirectTitle; ?>">
               <img src="<?php echo $authorAvatarURL; ?>" />
            </a>
            <h1 class="author-title">
               Posts de
               <a href="<?php echo $authorAvatarRedirect; ?>" title="<?php echo $authorRedirectTitle; ?>">
                  <?php echo $curauth->display_name; ?>
               </a>
            </h1>
         </div>

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
