<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <header class="entry-header">

      <?php if(has_post_thumbnail()): ?>
         <div class="standard-featured">
               <?php the_post_thumbnail( 'thumbnail' ); ?>
         </div>
      <?php endif; ?>

      <span class="entry-headercontent">
         <h1>
            <?php
               the_title();
               edit_post_link( __( 'Editar', 'textdomain' ), '<p>', '</p>', null, 'btn btn-primary btn-edit-post-link' );
            ?>
         </h1>
      </span>

   </header>

   <div class="entry-content">

      <?php the_content(); ?>

   </div>

   <footer class="entry-footer">


   </footer>

</article>
