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
      <span class="entry-author" >
         Por <?php the_author_posts_link(); ?> |
         <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' atrás'; ?>
      </span>

      <div class="entry-excerpt">
         <?php the_excerpt(); ?>
      </div>

      <footer class="entry-footer">
         <?php echo desco_posted_footer(); ?>
      </footer>
   </div>

</article>
