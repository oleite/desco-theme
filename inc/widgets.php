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
      $current_user_name = $current_user->user_firstname;
      $profilePicURL = get_avatar_url($current_user->user_email);
      $profilePicRedirect = bp_loggedin_user_domain();
      $profileSettingsRedirect = get_edit_user_link();
      $profilePicTitle = "Ir para configurações de perfil";


      echo $args['before_widget'];
      if ( is_user_logged_in() ){
         if ( ($current_user instanceof WP_User) ) {


              echo '<a href="' . $profilePicRedirect  . '" title="'.$profilePicTitle.'"><img src="' . $profilePicURL . '" /></a>';
              echo '<p>Olá, <b>' . $current_user_name . '</b></p>' ;
              echo '<a href="' . $profileSettingsRedirect . '" title="'.$profilePicTitle.'"><i class="fa fa-cog" aria-hidden="true"></i></a>';
              echo '<a class="logout-button" href="' . wp_logout_url() . '" title="Fazer Log Out">[ sair ]</a>';


         }
      } else {
         echo '<a class="login-button" href="' . wp_login_url() . '" title="Fazer Log In"><h2>LOG IN</h2></a>';
      }

      echo $args['after_widget'];

   }
}
add_action( 'widgets_init', function() {
   register_widget('Desco_Profile_Widget');
} );








/*
   Edit default Wordpress Widgets
*/

function sunset_tag_cloud_font_change( $args ) {
   $args['smallest'] = 10;
   $args['largest'] = 10;
   return $args;
}
add_filter( 'widget_tag_cloud_args', 'sunset_tag_cloud_font_change' );
