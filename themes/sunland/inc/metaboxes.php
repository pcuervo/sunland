<?php


// CUSTOM METABOXES //////////////////////////////////////////////////////////////////



	add_action('add_meta_boxes', function(){
		global $post;

		if( 'info-general' == $post->post_name ) {
			add_meta_box( 'social', 'Redes sociales', 'metabox_social', 'page', 'advanced', 'high' );
			add_meta_box( 'telefono', 'Teléfonos', 'metabox_telefono', 'page', 'advanced', 'high' );
			add_meta_box( 'email', 'E-mail de contacto', 'metabox_email', 'page', 'advanced', 'high' );
			add_meta_box( 'direccion', 'Dirección', 'metabox_direccion', 'page', 'advanced', 'high' );
			
		}
		
	});



// CUSTOM METABOXES CALLBACK FUNCTIONS ///////////////////////////////////////////////



	function metabox_social($post){
		$facebook = get_post_meta($post->ID, '_facebook_meta', true);
		$twitter = get_post_meta($post->ID, '_twitter_meta', true);
		$instagram = get_post_meta($post->ID, '_instagram_meta', true);
		$youtube = get_post_meta($post->ID, '_youtube_meta', true);

		wp_nonce_field(__FILE__, '_facebook_meta_nonce');
		wp_nonce_field(__FILE__, '_twitter_meta_nonce');
		wp_nonce_field(__FILE__, '_instagram_meta_nonce');
		wp_nonce_field(__FILE__, '_youtube_meta_nonce');

echo <<<END

	<label>Facebook:</label>
	<input type="text" class="widefat" id="lugar" name="_facebook_meta" value="$facebook" />
	<label>Twitter:</label>
	<input type="text" class="widefat" id="lugar" name="_twitter_meta" value="$twitter" />
	<label>Instagram:</label>
	<input type="text" class="widefat" id="lugar" name="_instagram_meta" value="$instagram" />
	<label>Youtube:</label>
	<input type="text" class="widefat" id="lugar" name="_youtube_meta" value="$youtube" />

END;
	}// metabox_social

	function metabox_telefono($post){
		$telefono1 = get_post_meta($post->ID, '_telefono1_meta', true);
		$telefono2 = get_post_meta($post->ID, '_telefono2_meta', true);

		wp_nonce_field(__FILE__, '_telefono1_meta_nonce');
		wp_nonce_field(__FILE__, '_telefono2_meta_nonce');

echo <<<END

	<label>Teléfono 1:</label>
	<input type="text" class="widefat" id="lugar" name="_telefono1_meta" value="$telefono1" />
	<label>Teléfono 2:</label>
	<input type="text" class="widefat" id="lugar" name="_telefono2_meta" value="$telefono2" />

END;
	}// metabox_telefono

	function metabox_email($post){
		$email = get_post_meta($post->ID, '_email_meta', true);

		wp_nonce_field(__FILE__, '_email_meta_nonce');

echo <<<END

	<label>Email:</label>
	<input type="text" class="widefat" id="lugar" name="_email_meta" value="$email" />

END;
	}// metabox_email

	function metabox_direccion($post){
		$direccion 	= get_post_meta($post->ID, '_direccion_meta', true);
		$lat 	 	= get_post_meta($post->ID, '_lat_meta', true);
		$lon 		= get_post_meta($post->ID, '_lon_meta', true);

		wp_nonce_field(__FILE__, '_direccion_meta_nonce');
		wp_nonce_field(__FILE__, '_lat_meta_nonce');
		wp_nonce_field(__FILE__, '_lon_meta_nonce');

echo <<<END

	<textarea class="widefat" id="geo-autocomplete" name="_direccion_meta">$direccion</textarea>
	<input type="text" class="widefat" id="lat" name="_lat_meta" value="$lat" data-geo="lat" /><br/><br/>
	<input type="text" class="widefat" id="lon" name="_lon_meta" value="$lon" data-geo="lng" /><br/><br/>

END;
	}// metabox_direccion



// SAVE METABOXES DATA ///////////////////////////////////////////////////////////////



	add_action('save_post', function($post_id){


		if ( ! current_user_can('edit_page', $post_id)) 
			return $post_id;

		if ( defined('DOING_AUTOSAVE') and DOING_AUTOSAVE ) 
			return $post_id;
		
		if ( wp_is_post_revision($post_id) OR wp_is_post_autosave($post_id) ) 
			return $post_id;

		if ( isset($_POST['_name_meta']) and check_admin_referer(__FILE__, '_name_meta_nonce') ){
			update_post_meta($post_id, '_name_meta', $_POST['_name_meta']);
		}

		// Social
		if ( isset($_POST['_facebook_meta']) and check_admin_referer(__FILE__, '_facebook_meta_nonce') ){
			update_post_meta($post_id, '_facebook_meta', $_POST['_facebook_meta']);
		}
		if ( isset($_POST['_twitter_meta']) and check_admin_referer(__FILE__, '_twitter_meta_nonce') ){
			update_post_meta($post_id, '_twitter_meta', $_POST['_twitter_meta']);
		}
		if ( isset($_POST['_instagram_meta']) and check_admin_referer(__FILE__, '_instagram_meta_nonce') ){
			update_post_meta($post_id, '_instagram_meta', $_POST['_instagram_meta']);
		}
		if ( isset($_POST['_youtube_meta']) and check_admin_referer(__FILE__, '_youtube_meta_nonce') ){
			update_post_meta($post_id, '_youtube_meta', $_POST['_youtube_meta']);
		}

		// Teléfonos
		if ( isset($_POST['_telefono1_meta']) and check_admin_referer(__FILE__, '_telefono1_meta_nonce') ){
			update_post_meta($post_id, '_telefono1_meta', $_POST['_telefono1_meta']);
		}
		if ( isset($_POST['_telefono2_meta']) and check_admin_referer(__FILE__, '_telefono2_meta_nonce') ){
			update_post_meta($post_id, '_telefono2_meta', $_POST['_telefono2_meta']);
		}

		// Email
		if ( isset($_POST['_email_meta']) and check_admin_referer(__FILE__, '_email_meta_nonce') ){
			update_post_meta($post_id, '_email_meta', $_POST['_email_meta']);
		}

		// Dirección
		if ( isset($_POST['_direccion_meta']) and check_admin_referer(__FILE__, '_direccion_meta_nonce') ){
			update_post_meta($post_id, '_direccion_meta', $_POST['_direccion_meta']);
		}
		if ( isset($_POST['_lat_meta']) and check_admin_referer(__FILE__, '_lat_meta_nonce') ){
			update_post_meta($post_id, '_lat_meta', $_POST['_lat_meta']);
		}
		if ( isset($_POST['_lon_meta']) and check_admin_referer(__FILE__, '_lon_meta_nonce') ){
			update_post_meta($post_id, '_lon_meta', $_POST['_lon_meta']);
		}

	});



// OTHER METABOXES ELEMENTS //////////////////////////////////////////////////////////
