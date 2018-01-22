<?php

$featured = get_post_meta( get_the_ID(), 'desco_featured', TRUE ); //possíveis valores: none, primary, secondary

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <header class="entry-header">

      <a href="<?php the_permalink(); ?>"><h1 class="entry-title"><?php the_title(); ?></h1></a>

      <div class="entry-meta">
         <?php echo desco_posted_meta(); ?>

      </div>
   </header>

   <div class="entry-content">

      <?php if(has_post_thumbnail()): ?>
         <div class="standard-featured">
            <?php the_post_thumbnail( 'thumbnail' ); ?>
         </div>
      <?php endif; ?>

      <div class="entry-excerpt">
         <?php the_excerpt(); ?>
      </div>

   </div>

   <footer class="entry-footer">
      <?php echo desco_posted_footer(); ?>
   </footer>


</article>
