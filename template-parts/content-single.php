<?php

$featured = get_post_meta( get_the_ID(), 'desco_featured', TRUE ); //possíveis valores: none, primary, secondary

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('content-single'); ?>>
   <header class="entry-header jumbotron fade-in">

      <?php if(has_post_thumbnail()): ?>
         <div class="standard-featured">
               <?php the_post_thumbnail( 'thumbnail' ); ?>
         </div>
      <?php endif; ?>
      <span class="entry-headercontent">
         <h1 class="entry-title">
            <?php the_title(); ?>
         </h1>
         <span class="entry-author" >
            Por <?php the_author_posts_link(); ?> |
            em <?php the_category(', '); ?>
         </span>

         <div class="entry-tags">
            <?php
               if (has_tag()) {
                  echo '<p>Tags: </p>' . desco_posted_tags();
               }
            ?>
         </div>

      </span>

      <?php desco_edit_post_button(); ?>

   </header>


   <div class="entry-content fade-in">
      <div class="entry-content-container js-highlightable">
         <div class="vertical-line"></div>
         <?php the_content(); ?>
      </div>
   </div>

   <footer class="entry-footer">

         <div class="author-info jumbotron">
            <div class="author-info-left">
               <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                  <?php echo get_avatar( get_the_author_meta( 'user_email' ), '100' ); ?>
               </a>
            </div>
            <div class="author-info-right">
               <p class="comment">Autor:</p>
               <h1> <?php the_author_posts_link(); ?> </h1>

               <div class="author-description">
                  <?php
                     $string = xprofile_get_field_data( 'Descrição' , get_the_author_meta('ID') );

                     echo $string;



                   ?>
               </div>
            </div>







         </div>
   </footer>

</article>
