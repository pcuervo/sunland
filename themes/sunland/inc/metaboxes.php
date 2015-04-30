<?php



// CUSTOM METABOXES //////////////////////////////////////////////////////////////////



	add_action('add_meta_boxes', function(){
		global $post;

		switch ( $post->post_name ) {
			case 'info-general':
				add_meta_box( 'social', 'Redes sociales', 'metabox_social', 'page', 'advanced', 'high' );
				add_meta_box( 'telefono', 'Teléfonos', 'metabox_telefono', 'page', 'advanced', 'high' );
				add_meta_box( 'email', 'E-mail de contacto', 'metabox_email', 'page', 'advanced', 'high' );
				add_meta_box( 'direccion', 'Dirección', 'metabox_direccion', 'page', 'advanced', 'high' );
				break;
			case 'sunland-express':
				add_meta_box( 'descripcion_home', 'Descripción página de inicio', 'metabox_home_express', 'page', 'advanced', 'high' );
				break;
			case 'sunland-studios':
				add_meta_box( 'descripcion_home_studios', 'Descripción página de inicio', 'metabox_home_studios', 'page', 'advanced', 'high' );
				break;
			case 'foro-sunland':
				add_meta_box( 'url_videos', 'Videos YouTube', 'metabox_videos_artes', 'page', 'advanced', 'high' );
				break;
			default:
				add_meta_box( 'fecha_evento', 'Fecha del evento', 'metabox_fecha_evento', 'eventos', 'advanced', 'high' );
				add_meta_box( 'audiencia', 'Audiencia', 'metabox_audiencia', 'talleres', 'advanced', 'high' );
				add_meta_box( 'horario_taller', 'Horario', 'metabox_horario_taller', 'talleres', 'advanced', 'high' );
				add_meta_box( 'duracion_taller', 'Duración', 'metabox_duracion_taller', 'talleres', 'advanced', 'high' );
				add_meta_box( 'demos_instructor', 'URL Soundcloud', 'metabox_demos_instructor', 'instructores', 'advanced', 'high' );
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

		echo '<label>Email:</label>';
		echo "<input type='text' class='[ widefat ]' name='_email_meta' value='$email' />";
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

	function metabox_home_express($post){
		$descripcion_home_express = get_post_meta($post->ID, '_descripcion_home_express_meta', true);

		wp_nonce_field(__FILE__, '_descripcion_home_express_meta_nonce');

		echo "<textarea type='text' class='[ widefat ]' name='_descripcion_home_express_meta'>$descripcion_home_express</textarea>";
	}// metabox_home_express

	function metabox_home_studios($post){
		$descripcion_home_studios = get_post_meta($post->ID, '_descripcion_home_studios_meta', true);

		wp_nonce_field(__FILE__, '_descripcion_home_studios_meta_nonce');

		echo "<textarea type='text' class='[ widefat ]' name='_descripcion_home_studios_meta'>$descripcion_home_studios</textarea>";
	}// metabox_home_studios

	function metabox_fecha_evento($post){
		$dia = get_post_meta($post->ID, '_dia_meta', true);
		$hora = get_post_meta($post->ID, '_hora_meta', true);

		wp_nonce_field(__FILE__, '_dia_meta_nonce');
		wp_nonce_field(__FILE__, '_hora_meta_nonce');

echo <<<END

	<label>Día:</label>
	<input type="text" class="[ widefat ][ js-datepicker ]" name="_dia_meta" value="$dia" />
	<label>Hora:</label>
	<input type="text" class="[ widefat ]" name="_hora_meta" value="$hora" />

END;
	}// metabox_fecha_evento

	function metabox_audiencia($post){
		$audiencia = get_post_meta($post->ID, '_audiencia_meta', true);

		wp_nonce_field(__FILE__, '_audiencia_meta_nonce');

		echo "<textarea type='text' class='[ widefat ]' name='_audiencia_meta'>$audiencia</textarea>";
	}// metabox_audiencia

	function metabox_horario_taller($post){
		$horario_taller = get_post_meta($post->ID, '_horario_taller_meta', true);

		wp_nonce_field(__FILE__, '_horario_taller_meta_nonce');

		echo "<input type='text' class='[ widefat ]' name='_horario_taller_meta' value='$horario_taller'>";
	}// metabox_horario_taller

	function metabox_duracion_taller($post){
		$duracion_taller = get_post_meta($post->ID, '_duracion_taller_meta', true);

		wp_nonce_field(__FILE__, '_duracion_taller_meta_nonce');

		echo "<input type='text' class='[ widefat ]' name='_duracion_taller_meta' value='$duracion_taller'>";
	}// metabox_duracion_taller

	function metabox_videos_artes($post){
		$video_danza = get_post_meta($post->ID, '_video_danza_meta', true);
		$video_musica = get_post_meta($post->ID, '_video_musica_meta', true);
		$video_teatro = get_post_meta($post->ID, '_video_teatro_meta', true);

		wp_nonce_field(__FILE__, '_video_danza_meta_nonce');
		wp_nonce_field(__FILE__, '_video_musica_meta_nonce');
		wp_nonce_field(__FILE__, '_video_teatro_meta_nonce');

		echo '<label>Danza:</label>';
		echo "<input type='text' class='[ widefat ]' name='_video_danza_meta' value='$video_danza'>";
		echo '<label>Música:</label>';
		echo "<input type='text' class='[ widefat ]' name='_video_musica_meta' value='$video_musica'>";
		echo '<label>Teatro:</label>';
		echo "<input type='text' class='[ widefat ]' name='_video_teatro_meta' value='$video_teatro'>";
	}// metabox_video_artes

	function metabox_demos_instructor($post){
		$soundcloud = get_post_meta($post->ID, '_soundcloud_meta', true);
		$youtube = get_post_meta($post->ID, '_youtube_meta', true);

		wp_nonce_field(__FILE__, '_soundcloud_meta_nonce');
		wp_nonce_field(__FILE__, '_youtube_meta_nonce');

echo <<<END

	<label>Soundcloud:</label>
	<input type="text" class="[ widefat ]" name="_soundcloud_meta" value="$soundcloud" />
	<label>Youtube:</label>
	<input type="text" class="[ widefat ]" name="_youtube_meta" value="$youtube" />

END;
	}// metabox_demos_instructor



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

		// Descripción para home sobre Sunland Express
		if ( isset($_POST['_descripcion_home_studios_meta']) and check_admin_referer(__FILE__, '_descripcion_home_studios_meta_nonce') ){
			update_post_meta($post_id, '_descripcion_home_studios_meta', $_POST['_descripcion_home_studios_meta']);
		}

		// Fecha del evento en Foro Sunland
		if ( isset($_POST['_dia_meta']) and check_admin_referer(__FILE__, '_dia_meta_nonce') ){
			update_post_meta($post_id, '_dia_meta', $_POST['_dia_meta']);
		}
		if ( isset($_POST['_hora_meta']) and check_admin_referer(__FILE__, '_hora_meta_nonce') ){
			update_post_meta($post_id, '_hora_meta', $_POST['_hora_meta']);
		}

		// Audiencia talleres
		if ( isset($_POST['_audiencia_meta']) and check_admin_referer(__FILE__, '_audiencia_meta_nonce') ){
			update_post_meta($post_id, '_audiencia_meta', $_POST['_audiencia_meta']);
		}

		// Horario talleres
		if ( isset($_POST['_horario_taller_meta']) and check_admin_referer(__FILE__, '_horario_taller_meta_nonce') ){
			update_post_meta($post_id, '_horario_taller_meta', $_POST['_horario_taller_meta']);
		}

		// Duración talleres
		if ( isset($_POST['_duracion_taller_meta']) and check_admin_referer(__FILE__, '_duracion_taller_meta_nonce') ){
			update_post_meta($post_id, '_duracion_taller_meta', $_POST['_duracion_taller_meta']);
		}

		// Video talleres
		if ( isset($_POST['_video_danza_meta']) and check_admin_referer(__FILE__, '_video_danza_meta_nonce') ){
			update_post_meta($post_id, '_video_danza_meta', $_POST['_video_danza_meta']);
		}
		if ( isset($_POST['_video_musica_meta']) and check_admin_referer(__FILE__, '_video_musica_meta_nonce') ){
			update_post_meta($post_id, '_video_musica_meta', $_POST['_video_musica_meta']);
		}
		if ( isset($_POST['_video_teatro_meta']) and check_admin_referer(__FILE__, '_video_teatro_meta_nonce') ){
			update_post_meta($post_id, '_video_teatro_meta', $_POST['_video_teatro_meta']);
		}

		// Demos instrcutores
		if ( isset($_POST['_soundcloud_meta']) and check_admin_referer(__FILE__, '_soundcloud_meta_nonce') ){
			update_post_meta($post_id, '_soundcloud_meta', $_POST['_soundcloud_meta']);
		}
		if ( isset($_POST['_youtube_meta']) and check_admin_referer(__FILE__, '_youtube_meta_nonce') ){
			update_post_meta($post_id, '_youtube_meta', $_POST['_youtube_meta']);
		}

	});



// OTHER METABOXES ELEMENTS //////////////////////////////////////////////////////////
