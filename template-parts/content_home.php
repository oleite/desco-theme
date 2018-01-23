<?php

$featured = get_post_meta( get_the_ID(), 'desco_featured', TRUE ); //possíveis valores: none, primary, secondary

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
   <header class="entry-header">

      <?php if(has_post_thumbnail()): ?>
         <div class="standard-featured">
            <a href="<?php the_permalink(); ?>">
               <?php the_post_thumbnail( 'thumbnail' ); ?>
            </a>
         </div>
      <?php endif; ?>

   </header>

   <div class="entry-content">

      <h2 class="entry-title">
         <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
         </a>
      </h2>

      <div class="entry-excerpt">
         <?php the_excerpt(); ?>
      </div>

      <footer class="entry-footer">
         <?php echo desco_posted_footer(); ?>
      </footer>
   </div>

</article>
