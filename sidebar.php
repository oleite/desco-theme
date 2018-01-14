<?php
   if (! is_active_sidebar( 'sidenav' )) {
      return;
   }
?>

<aside id="secondary" class="widget_area" row="complementary">

   <?php dynamic_sidebar('sidenav'); ?>
   
</aside>
