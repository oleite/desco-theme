<?php /*

@package desco-theme

*/

if(post_password_required()) {
   return;
}

?>

<div id="comments" class="comments-area">

   <?php
      if( have_comments() ):
      //We have comments
   ?>

   <h2 class="comments-title">
      <?php printf('Comentários ( ' . get_comments_number() . ' )'); ?>
   </h2>

   <?php desco_get_post_comments_navigation(); ?>

   <ol class="comment-list">
      <?php
         $args = array(
            'walker'             => null,
            'max_depth'          => 3,
            'style'              => 'ol',
            'callback'           => null,
            'end_callback'       => null,
            'type'               => 'all',
            'reply_text'         => 'Responder',
            'page'               => '',
            'per_page'           => '',
            'avatar_size'        => 75,
            'reverse_top_level'  => '',
            'reverse_children'   => '',
            'format'             => 'html5',
            'short_ping'         => false,
            'echo'               => true
         );

         wp_list_comments( $args );
      ?>
   </ol>


   <?php desco_get_post_comments_navigation(); ?>




   <?php
      if( !comments_open() && get_comments_number() ):
   ?>

      <p class="no-comments"><?php esc_html_e( 'Os comentários estão fechados para este post.', 'desco-theme' ); ?></p>

   <?php
      endif;
   ?>


   <?php
      endif;
   ?>

   <?php
      $args array{

      }

      comment_form();
   ?>

</div> <!-- .comments-area -->
