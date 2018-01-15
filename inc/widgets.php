<?php

class Desco_Profile_Widget extends WP_Widget {

   //setup the widget name, description, etc
   public function __construct() {
      $widget_ops = array(
         'classname' => 'desco-profile-widget',
         'description' => 'Desconceito custom Profile Widget',

      );
      parent::__construct('desco_profile','Perfil Desconceito', $widget_ops);
   }

   //back-end display of widget
   public function form( $instance ) {
      echo '<p>Sem opções disponíveis</p>';
   }

   //front-end display widget
   public function widget( $args, $instance) {

      $current_user = wp_get_current_user();
      $profilePicURL = get_avatar_url($current_user->user_email);
      $profilePicRedirect = get_site_url(null, '/wp-admin/profile.php');


      echo $args['before_widget'];
      if ( is_user_logged_in() ){
         if ( ($current_user instanceof WP_User) ) {


              echo '<a href="' . $profilePicRedirect  . '"><img src="' . $profilePicURL . '" /></a>';
              echo '<p>Olá, <b>' . $current_user->display_name . '</b></p>' ;
              echo '<a href="' . $profilePicRedirect  . '"><i class="fa fa-cog" aria-hidden="true"></i></a>';



         }
      }
      echo $args['after_widget'];

   }
}
add_action( 'widgets_init', function() {
   register_widget('Desco_Profile_Widget');
} );
