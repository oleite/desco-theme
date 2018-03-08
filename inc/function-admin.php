<?php

	//Default admin panel color palette
	function set_default_admin_color($user_id) {
	    $args = array(
	        'ID' => $user_id,
	        'admin_color' => 'midnight'
	    );
	    wp_update_user( $args );
	}

	add_action('user_register', 'set_default_admin_color');
	if ( !current_user_can('manage_options') ) {

		remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

	}
	function desco_loginlogo_url($url) {
		 return get_site_url();
	}
	add_filter( 'login_headerurl', 'desco_loginlogo_url' );




	add_action( 'after_setup_theme', 'remove_admin_bar' );
	function remove_admin_bar() {
	    if( ! current_user_can('edit_posts') ) {
	        show_admin_bar(false);
	    }
	}

/*
	====================
		FEATURED POST META BOX
	====================
*/
	 /**
	  * Adds a box to the main column on the Post add/edit screens.
	  */
	 function desco_featured_add_meta_box() {
		add_meta_box(
			'desco_featured_meta',
			'Em Destaque',
			'desco_featured_meta_callback',
			'post',
			'normal',
			'low'
		); //you can change the 4th paramter i.e. post to custom post type name, if you want it for something else
	}
	add_action( 'add_meta_boxes', 'desco_featured_add_meta_box' ); // DESABILITADO ATÈ PROPER IMPLEMENTAÇÂO

	/**
	* Prints the box content.
	*
	* @param WP_Post $post The object for the current post/page.
	*/
	function desco_featured_meta_callback( $post ) {

	         // Add an nonce field so we can check for it later.
	         wp_nonce_field( 'desco_meta', 'desco_featured_meta_nonce' );

	         /*
	          * Use get_post_meta() to retrieve an existing value
	          * from the database and use the value for the form.
	          */
	         $value = get_post_meta( $post->ID, 'desco_featured', true ); //my_key is a meta_key. Change it to whatever you want
				if (empty($value)){
					$value = "none";
				}

	         ?>
				<div>
		 			<p class="howto">Apenas modifique caso haja a intenção de definir o 'post' como destacado</p>
		 			<div class="prfx-row-content">
		 				<label>
		 					<input type="radio" name="featured_radio" value="none" <?php checked( $value, 'none' ); ?> />
		 					Não destacado <i>(Padrão)</i>
		 				</label>
		 				<br />
		 				<label>
		 					<input type="radio" name="featured_radio" value="primary" <?php checked( $value, 'primary' ); ?> />
		 					Em Destaque Primário
		 				</label>
		 				<br />
		 				<label>
		 					<input type="radio" name="featured_radio" value="secondary" <?php checked( $value, 'secondary' ); ?> />
		 					Em Destaque Secundário
		 				</label>
		 			</div>
		 		</div>
	         <?php

	 }

	 /**
	  * When the post is saved, saves our custom data.
	  *
	  * @param int $post_id The ID of the post being saved.
	  */
	 function desco_featured_save_meta_data( $post_id ) {

	         /*
	          * We need to verify this came from our screen and with proper authorization,
	          * because the save_post action can be triggered at other times.
	          */

	         // Check if our nonce is set.
	         if ( !isset( $_POST['desco_featured_meta_nonce'] ) ) {
	                 return;
	         }

	         // Verify that the nonce is valid.
	         if ( !wp_verify_nonce( $_POST['desco_featured_meta_nonce'], 'desco_meta' ) ) {
	                 return;
	         }

	         // If this is an autosave, our form has not been submitted, so we don't want to do anything.
	         if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
	                 return;
	         }

	         // Check the user's permissions.
	         if ( !current_user_can( 'edit_post', $post_id ) ) {
	                 return;
	         }


	         // Sanitize user input.
	         $new_meta_value = ( isset( $_POST['featured_radio'] ) ? sanitize_html_class( $_POST['featured_radio'] ) : '' );

	         // Update the meta field in the database.
	         update_post_meta( $post_id, 'desco_featured', $new_meta_value );

	 }

	 add_action( 'save_post', 'desco_featured_save_meta_data' );
