<?php

add_action('wp_ajax_nopriv_desco_load_more', 'desco_load_more');
add_action('wp_ajax_desco_load_more', 'desco_load_more');

function desco_load_more() {

   $paged = $_POST["page"] + 1;
   $query = new WP_query(array(
      'post-type' => 'post',
      'post-status' => 'publish',
      'paged' => $paged
   ));

   if ( $query->have_posts() ):

      while (  $query->have_posts() ):	 $query->the_post();

         get_template_part( 'template-parts/content-home', get_post_format() );

      endwhile;

   endif;

   wp_reset_postdata();

   die();
}
