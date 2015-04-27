<?php


// CUSTOM METABOXES //////////////////////////////////////////////////////////////////



	add_action('add_meta_boxes', function(){
		global $post;

		add_meta_box( 'fecha_evento', 'Fecha del evento', 'metabox_fecha_evento', 'eventos', 'advanced', 'high' );
		// echo $post->post_name;
		switch ( $post->post_name ) {
			case 'info-general':
				add_meta_box( 'social', 'Redes sociales', 'metabox_social', 'page', 'advanced', 'high' );
				add_meta_box( 'telefono', 'Teléfonos', 'metabox_telefono', 'page', 'advanced', 'high' );
				add_meta_box( 'email', 'E-mail de contacto', 'metabox_email', 'page', 'advanced', 'high' );
				add_meta_box( 'direccion', 'Dirección', 'metabox_direccion', 'page', 'advanced', 'high' );
				add_meta_box( 'motivo_contacto', 'Motivo de contacto', 'metabox_motivo_contacto', 'page', 'advanced', 'high' );		
				break;
			case 'sunland-express':
				add_meta_box( 'descripcion_home', 'Descripción página de inicio', 'metabox_home_express', 'page', 'advanced', 'high' );
				break;
			default:
				break;
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
	<input type="text" class="[ widefat ]" name="_facebook_meta" value="$facebook" />
	<label>Twitter:</label>
	<input type="text" class="[ widefat ]" name="_twitter_meta" value="$twitter" />
	<label>Instagram:</label>
	<input type="text" class="[ widefat ]" name="_instagram_meta" value="$instagram" />
	<label>Youtube:</label>
	<input type="text" class="[ widefat ]" name="_youtube_meta" value="$youtube" />

END;
	}// metabox_social

	function metabox_telefono($post){
		$telefono1 = get_post_meta($post->ID, '_telefono1_meta', true);
		$telefono2 = get_post_meta($post->ID, '_telefono2_meta', true);

		wp_nonce_field(__FILE__, '_telefono1_meta_nonce');
		wp_nonce_field(__FILE__, '_telefono2_meta_nonce');

echo <<<END

	<label>Teléfono 1:</label>
	<input type="text" class="[ widefat ]" name="_telefono1_meta" value="$telefono1" />
	<label>Teléfono 2:</label>
	<input type="text" class="[ widefat ]" name="_telefono2_meta" value="$telefono2" />

END;
	}// metabox_telefono

	function metabox_email($post){
		$email = get_post_meta($post->ID, '_email_meta', true);

		wp_nonce_field(__FILE__, '_email_meta_nonce');

echo <<<END

	<label>Email:</label>
	<input type="text" class="[ widefat ]" name="_email_meta" value="$email" />

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

	<textarea class="[ widefat ]" id="geo-autocomplete" name="_direccion_meta">$direccion</textarea>
	<input type="hidden" class="[ widefat ]" id="lat" name="_lat_meta" value="$lat" data-geo="lat" />
	<input type="hidden" class="[ widefat ]" id="lon" name="_lon_meta" value="$lon" data-geo="lng" />

END;
	}// metabox_direccion

	function metabox_motivo_contacto($post){
		$motivo_contacto 	= get_post_meta($post->ID, '_motivo_contacto_meta', true);

		wp_nonce_field(__FILE__, '_motivo_contacto_meta_nonce');

echo <<<END

	<label>Ingresa los motivos de contacto separado por comas (ej. Informes, Ayuda, Pasar a saludar...):</label>
	<input type="text" class="[ widefat ]" name="_motivo_contacto_meta" value="$motivo_contacto" />

END;
	}// metabox_motivo_contacto

	function metabox_home_express($post){
		$descripcion_home_express = get_post_meta($post->ID, '_descripcion_home_express_meta', true);

		wp_nonce_field(__FILE__, '_descripcion_home_express_meta_nonce');

echo <<<END
	<textarea type="text" class="[ widefat ]" name="_descripcion_home_express_meta">$descripcion_home_express</textarea>
END;
	}// metabox_home_express

	function metabox_fecha_evento($post){
		$dia = get_post_meta($post->ID, '_dia_meta', true);
		$hora = get_post_meta($post->ID, '_hora_meta', true);

		wp_nonce_field(__FILE__, '_dia_meta_nonce');
		wp_nonce_field(__FILE__, '_hora_meta_nonce');

echo <<<END

	<label>Teléfono 1:</label>
	<input type="text" class="[ widefat ][ js-datepicker ]" name="_dia_meta" value="$dia" />
	<label>Teléfono 2:</label>
	<input type="text" class="[ widefat ]" name="_hora_meta" value="$hora" />

END;
	}// metabox_fecha_evento



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

		// Motivo de contacto
		if ( isset($_POST['_motivo_contacto_meta']) and check_admin_referer(__FILE__, '_motivo_contacto_meta_nonce') ){
			update_post_meta($post_id, '_motivo_contacto_meta', $_POST['_motivo_contacto_meta']);
		}

		// Descripción para home sobre Sunland Express
		if ( isset($_POST['_descripcion_home_express_meta']) and check_admin_referer(__FILE__, '_descripcion_home_express_meta_nonce') ){
			update_post_meta($post_id, '_descripcion_home_express_meta', $_POST['_descripcion_home_express_meta']);
		}

		// Fecha del evento en Foro Sunland
		if ( isset($_POST['_fecha_evento_express_meta']) and check_admin_referer(__FILE__, '_fecha_evento_express_meta_nonce') ){
			update_post_meta($post_id, '_fecha_evento_express_meta', $_POST['_fecha_evento_express_meta']);
		}

	});



// OTHER METABOXES ELEMENTS //////////////////////////////////////////////////////////
