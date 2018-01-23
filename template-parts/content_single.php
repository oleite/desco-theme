<?php

$featured = get_post_meta( get_the_ID(), 'desco_featured', TRUE ); //possíveis valores: none, primary, secondary

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <header class="entry-header">

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
            por <?php the_author(); ?>
         </span>

         <div class="entry-excerpt">
            <?php the_excerpt(); ?>
         </div>
      </span>

   </header>

   <div class="entry-content">

   </div>

      <hr />

      <?php the_content(); ?>

      <hr />

      <footer class="entry-footer">
         <?php echo desco_posted_footer(); ?>
      </footer>


</article>
