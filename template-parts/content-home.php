<?php

$featured = get_post_meta( get_the_ID(), 'desco_featured', TRUE ); //possíveis valores: none, primary, secondary

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('content-home post fade-in'); ?>>

   <?php if (is_sticky()): ?>
      <i class="sticky-post sticky-left" aria-hidden="true" title="Post fixado"></i>
      <i class="sticky-post sticky-right" aria-hidden="true" title="Post fixado"></i>
   <?php endif; ?>

   <header class="entry-header">

      <?php if(has_post_thumbnail()): ?>
         <div class="standard-featured">
            <a href="<?php the_permalink(); ?>">
               <?php the_post_thumbnail( 'thumbnail' ); ?>
            </a>
         </div>
      <?php endif; ?>

   </header>

   <div class="entry-content jumbotron">

      <h2 class="entry-title">
         <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
         </a>
      </h2>

      <?php if(!is_author()): ?>
         <span class="entry-author" >
            Por <?php the_author_posts_link(); ?> |
            em <?php the_category(', '); ?>
         </span>
      <?php endif; ?>

      <div class="entry-excerpt">
         <?php the_excerpt(); ?>
      </div>

      <footer class="entry-footer">
         <?php
            echo desco_posted_badges('<p style="text-align: right">' , ' ' , '</p>');
            echo desco_posted_date();
            echo desco_posted_comments_number();
         ?>
      </footer>
   </div>

</article>
