<?php


// CUSTOM METABOXES //////////////////////////////////////////////////////////////////



	add_action('add_meta_boxes', function(){
		global $post;

		add_meta_box( 'fecha_evento', 'Fecha del evento', 'metabox_fecha_evento', 'eventos', 'advanced', 'high' );
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
			case 'sunland-studios':
				add_meta_box( 'descripcion_home_studios', 'Descripción página de inicio', 'metabox_home_studios', 'page', 'advanced', 'high' );
				add_meta_box( 'horario_studios', 'Horarios', 'metabox_horario_studios', 'page', 'advanced', 'high' );
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

	function metabox_home_studios($post){
		$descripcion_home_studios = get_post_meta($post->ID, '_descripcion_home_studios_meta', true);

		wp_nonce_field(__FILE__, '_descripcion_home_studios_meta_nonce');

echo <<<END
	<textarea type="text" class="[ widefat ]" name="_descripcion_home_studios_meta">$descripcion_home_studios</textarea>
END;
	}// metabox_home_studios

	function metabox_horario_studios($post){
		$lunes_hi = get_post_meta($post->ID, '_lunes_hi_meta', true);
		$lunes_hf = get_post_meta($post->ID, '_lunes_hf_meta', true);
		$martes_hi = get_post_meta($post->ID, '_martes_hi_meta', true);
		$martes_hf = get_post_meta($post->ID, '_martes_hf_meta', true);
		$miercoles_hi = get_post_meta($post->ID, '_miercoles_hi_meta', true);
		$miercoles_hf = get_post_meta($post->ID, '_miercoles_hf_meta', true);
		$jueves_hi = get_post_meta($post->ID, '_jueves_hi_meta', true);
		$jueves_hf = get_post_meta($post->ID, '_jueves_hf_meta', true);
		$viernes_hi = get_post_meta($post->ID, '_viernes_hi_meta', true);
		$viernes_hf = get_post_meta($post->ID, '_viernes_hf_meta', true);
		$sabado_hi = get_post_meta($post->ID, '_sabado_hi_meta', true);
		$sabado_hf = get_post_meta($post->ID, '_sabado_hf_meta', true);
		$domingo_hi = get_post_meta($post->ID, '_domingo_hi_meta', true);
		$domingo_hf = get_post_meta($post->ID, '_domingo_hf_meta', true);

		wp_nonce_field(__FILE__, '_lunes_hi_meta_nonce');
		wp_nonce_field(__FILE__, '_lunes_hf_meta_nonce');
		wp_nonce_field(__FILE__, '_martes_hi_meta_nonce');
		wp_nonce_field(__FILE__, '_martes_hf_meta_nonce');
		wp_nonce_field(__FILE__, '_miercoles_hi_meta_nonce');
		wp_nonce_field(__FILE__, '_miercoles_hf_meta_nonce');
		wp_nonce_field(__FILE__, '_jueves_hi_meta_nonce');
		wp_nonce_field(__FILE__, '_jueves_hf_meta_nonce');
		wp_nonce_field(__FILE__, '_viernes_hi_meta_nonce');
		wp_nonce_field(__FILE__, '_viernes_hf_meta_nonce');
		wp_nonce_field(__FILE__, '_sabado_hi_meta_nonce');
		wp_nonce_field(__FILE__, '_sabado_hf_meta_nonce');
		wp_nonce_field(__FILE__, '_domingo_hi_meta_nonce');
		wp_nonce_field(__FILE__, '_domingo_hf_meta_nonce');

echo <<<END
	<label>Lunes</label><br />
	<label>Hora inicial:</label>
	<input type="text" class="" name="_lunes_hi_meta" value="$lunes_hi">
	<label>Hora final:</label>
	<input type="text" class="" name="_lunes_hf_meta" value="$lunes_hf"><br /><br />
	<label>Martes</label><br />
	<label>Hora inicial:</label>
	<input type="text" class="" name="_martes_hi_meta" value="$martes_hi">
	<label>Hora final:</label>
	<input type="text" class="" name="_martes_hf_meta" value="$martes_hf"><br /><br />
	<label>Miécoles</label><br />
	<label>Hora inicial:</label>
	<input type="text" class="" name="_miercoles_hi_meta" value="$miercoles_hi">
	<label>Hora final:</label>
	<input type="text" class="" name="_miercoles_hf_meta" value="$miercoles_hf"><br /><br />
	<label>Jueves</label><br />
	<label>Hora inicial:</label>
	<input type="text" class="" name="_jueves_hi_meta" value="$jueves_hi">
	<label>Hora final:</label>
	<input type="text" class="" name="_jueves_hf_meta" value="$jueves_hf"><br /><br />
	<label>Viernes</label><br />
	<label>Hora inicial:</label>
	<input type="text" class="" name="_viernes_hi_meta" value="$viernes_hi">
	<label>Hora final:</label>
	<input type="text" class="" name="_viernes_hf_meta" value="$viernes_hf"><br /><br />
	<label>Sábado</label><br />
	<label>Hora inicial:</label>
	<input type="text" class="" name="_sabado_hi_meta" value="$sabado_hi">
	<label>Hora final:</label>
	<input type="text" class="" name="_sabado_hf_meta" value="$sabado_hf"><br /><br />
	<label>Domingo</label><br />
	<label>Hora inicial:</label>
	<input type="text" class="" name="_domingo_hi_meta" value="$domingo_hi">
	<label>Hora final:</label>
	<input type="text" class="" name="_domingo_hf_meta" value="$domingo_hf"><br /><br />
END;
	}// metabox_horario_studios

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

		// Horario de Foro Sunland
		if ( isset($_POST['_lunes_hi_meta']) and check_admin_referer(__FILE__, '_lunes_hi_meta_nonce') ){
			update_post_meta($post_id, '_lunes_hi_meta', $_POST['_lunes_hi_meta']);
		}
		if ( isset($_POST['_lunes_hf_meta']) and check_admin_referer(__FILE__, '_lunes_hf_meta_nonce') ){
			update_post_meta($post_id, '_lunes_hf_meta', $_POST['_lunes_hf_meta']);
		}
		if ( isset($_POST['_martes_hi_meta']) and check_admin_referer(__FILE__, '_martes_hi_meta_nonce') ){
			update_post_meta($post_id, '_martes_hi_meta', $_POST['_martes_hi_meta']);
		}
		if ( isset($_POST['_martes_hf_meta']) and check_admin_referer(__FILE__, '_martes_hf_meta_nonce') ){
			update_post_meta($post_id, '_martes_hf_meta', $_POST['_martes_hf_meta']);
		}
		if ( isset($_POST['_miercoles_hi_meta']) and check_admin_referer(__FILE__, '_miercoles_hi_meta_nonce') ){
			update_post_meta($post_id, '_miercoles_hi_meta', $_POST['_miercoles_hi_meta']);
		}
		if ( isset($_POST['_miercoles_hf_meta']) and check_admin_referer(__FILE__, '_miercoles_hf_meta_nonce') ){
			update_post_meta($post_id, '_miercoles_hf_meta', $_POST['_miercoles_hf_meta']);
		}
		if ( isset($_POST['_jueves_hi_meta']) and check_admin_referer(__FILE__, '_jueves_hi_meta_nonce') ){
			update_post_meta($post_id, '_jueves_hi_meta', $_POST['_jueves_hi_meta']);
		}
		if ( isset($_POST['_jueves_hf_meta']) and check_admin_referer(__FILE__, '_jueves_hf_meta_nonce') ){
			update_post_meta($post_id, '_jueves_hf_meta', $_POST['_jueves_hf_meta']);
		}
		if ( isset($_POST['_viernes_hi_meta']) and check_admin_referer(__FILE__, '_viernes_hi_meta_nonce') ){
			update_post_meta($post_id, '_viernes_hi_meta', $_POST['_viernes_hi_meta']);
		}
		if ( isset($_POST['_viernes_hf_meta']) and check_admin_referer(__FILE__, '_viernes_hf_meta_nonce') ){
			update_post_meta($post_id, '_viernes_hf_meta', $_POST['_viernes_hf_meta']);
		}
		if ( isset($_POST['_sabado_hi_meta']) and check_admin_referer(__FILE__, '_sabado_hi_meta_nonce') ){
			update_post_meta($post_id, '_sabado_hi_meta', $_POST['_sabado_hi_meta']);
		}
		if ( isset($_POST['_sabado_hf_meta']) and check_admin_referer(__FILE__, '_sabado_hf_meta_nonce') ){
			update_post_meta($post_id, '_sabado_hf_meta', $_POST['_sabado_hf_meta']);
		}
		if ( isset($_POST['_domingo_hi_meta']) and check_admin_referer(__FILE__, '_domingo_hi_meta_nonce') ){
			update_post_meta($post_id, '_domingo_hi_meta', $_POST['_domingo_hi_meta']);
		}
		if ( isset($_POST['_domingo_hf_meta']) and check_admin_referer(__FILE__, '_domingo_hf_meta_nonce') ){
			update_post_meta($post_id, '_domingo_hf_meta', $_POST['_domingo_hf_meta']);
		}
		
		
		
	

	});



// OTHER METABOXES ELEMENTS //////////////////////////////////////////////////////////
