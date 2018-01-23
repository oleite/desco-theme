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
            por
            <a class="author-link" href="<?php the_author_posts_link(); ?>">
               <?php the_author(); ?>
            </a>
         </span>

      </span>

   </header>
   <hr />
   <div class="entry-content">

      <?php the_content(); ?>

   </div>
   <hr />
   <footer class="entry-footer">

         <?php echo get_avatar( get_the_author_meta( 'user_email' ), '50' ); ?>

   </footer>

</article>
