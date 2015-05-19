<?php

/*------------------------------------*\
	CONSTANTS
\*------------------------------------*/



	/**
	* Define paths to javascript, styles, theme and site.
	**/
	define( 'JSPATH', get_template_directory_uri() . '/js/' );
	define( 'CSSPATH', get_template_directory_uri() . '/css/' );
	define( 'THEMEPATH', get_template_directory_uri() . '/' );
	define( 'SITEURL', site_url('/') );





/*------------------------------------*\
	INCLUDES
\*----------s--------------------------*/



	require_once('inc/post-types.php');
	require_once('inc/metaboxes.php');
	require_once('inc/taxonomies.php');
	require_once('inc/pages.php');
	require_once('inc/users.php');
	require_once('inc/functions-admin.php');
	require_once('inc/functions-js-footer.php');
	require_once('inc/functions-js-footer-admin.php');
	include 'demo.php';






/*------------------------------------*\
	GENERAL FUNCTIONS
\*------------------------------------*/



	/**
	* Enqueue frontend scripts and styles
	**/
	add_action( 'wp_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'plugins', JSPATH.'plugins.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'functions', JSPATH.'functions.js', array('plugins'), '1.0', true );

		// localize scripts
		wp_localize_script( 'functions', 'ajax_url', admin_url('admin-ajax.php') );
		wp_localize_script( 'functions', 'site_url', site_url() );
		wp_localize_script( 'functions', 'theme_url', THEMEPATH );


		// styles
		wp_enqueue_style( 'styles', get_stylesheet_uri() );

	});

	/**
	* Add javascript to the footer of pages.
	**/
	add_action( 'wp_footer', 'footer_scripts', 21 );





/*------------------------------------*\
	HELPER FUNCTIONS
\*------------------------------------*/



	/**
	 * Print the title tag based on what is being viewed.
	 * @return string
	 */
	function print_title(){
		global $page, $paged;

		wp_title( '|', true, 'right' );
		bloginfo( 'name' );

		// Add a page number if necessary
		if ( $paged >= 2 || $page >= 2 ){
			echo ' | ' . sprintf( __( 'Página %s' ), max( $paged, $page ) );
		}
	}// print_title

	/**
	 * Return the name of a month in Spanish.
	 * @param string $month - Number of month
	 * @return string $month_name - The name of month in Spanish
	 */
	function get_month_name( $month ){

		switch ( $month ) {
			case 1:
				return 'enero';
			case 2:
				return 'febrero';
			case 3:
				return 'marzo';
			case 4:
				return 'abril';
			case 5:
				return 'mayo';
			case 6:
				return 'junio';
			case 7:
				return 'julio';
			case 8:
				return 'agosto';
			case 9:
				return 'septiembre';
			case 10:
				return 'octubre';
			case 11:
				return 'noviembre';
			default:
				return 'diciembre';
		}// switch

	}// get_month_name

	/**
	 * Send contact email to Sunland School.
	 * @param string $name - Name of person requesting more info
	 * @param string $email - Email of person requesting more info
	 * @param string $tel - Telephone numbre of person requesting more info
	 * @param string $section - Website section from where the form was sent
	 * @param string $to_email - Email to where the info has to be sent
	 */
	function send_email_contacto($name, $email, $tel, $msg, $section, $to_email ){

		$to = $to_email;
		$subject = 'Informes acerca de: ' . $section;
		$headers = 'From: My Name <' . $to_email . '>' . "\r\n";
		$message = '<html><body>';
		$message .= '<h3>Contacto a través de www.sunland.mx</h3>';
		$message .= '<p>Nombre: '.$name.'</p>';
		$message .= '<p>Email: '. $email . '</p>';
		if( $tel != '' ) $message .= '<p>Teléfono: '. $tel . '</p>';
		if( $msg != '' ) $message .= '<p>Mensaje: '. $msg . '</p>';
		$message .= '</body></html>';

		add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));
		wp_mail($to, $subject, $message, $headers );

	}// send_email_contacto






/*------------------------------------*\
	FORMAT FUNCTIONS
\*------------------------------------*/



	/**
	 * Separates a group of "materias" with AND (y) and commas (,).
	 * @param array $materias_arr - Materias belonging to an instructor
	 * @return string $materias - Materias separated by commas and 'y'
	 */
	function get_formatted_materias( $materias_arr ){

		$materias = '';
		foreach ($materias_arr as $key => $materia) {
			if( count( $materias_arr ) > 1 && $key + 1 == count( $materias_arr ) ){
				$materias .= ' y ' . $materia;
				continue;
			}
			$materias .= $materia;
			if( count( $materias_arr ) > 1 && $key + 1 != count( $materias_arr ) - 1 ){
				$materias .= ', ';
			}
		}
		return $materias;

	}// get_formatted_materias

	/**
	 * Converts date from YYYY-MM-DD format to readable date (with months in Spanish)
	 * @param string $date - A date in YYYY-MM-DD format
	 * @return string $formatted_date - Date in Spanish
	 */
	function get_formatted_event_datetime( $date ){

		$date_time_arr = explode(' ', $date);
		$date_arr = explode('-', $date_time_arr[0]);
		$day = $date_arr[2];
		$month = get_month_name( $date_arr[1] );
		$year = $date_arr[0];

		return $day . ' de ' . $month . ', ' . $year . ' a las ' . $date_time_arr[1];

	}// get_formatted_event_datetime

	/**
	 * Create a HTML event for a calendar.
	 * @param string $date - Date of the event
	 * @param string $time - Time of the event
	 * @param string $title - Title of the event
	 * @param string $content - Content of the event
	 * @param string $permalink - Permalink of the event
	 * @return string $html_event - HTML event to display in calendar
	 */
	function get_event_html_format( $date, $time, $title, $content, $permalink ){

		$html_event =
			'<div class="[ evento ] [ clearfix ]">
				<p class="titulo">- ' . $title . '</p>
				<p class="hora"><i class="fa fa-clock-o"></i> ' . $time . '</p>
				<a href="#" class="[ boton button--highlight ] [ abrir-info ]">más info</a>
				<div class="[ evento-full ]">
					<span class="custom-content-close"></span>
					<h4 class="titulo">' . $title . '</h4>
					<p class="hora"><i class="fa fa-clock-o"></i> ' . $time . '</p>
					<p class="contenido"><i class="fa fa-newspaper-o"></i> ' . $content . '</p>
				</div>
			</div>';

		return $html_event;

	}// get_event_html_format

	function sga_gallery_images( $size = 'large', $ids ) {
		global $post;

		$galleryimages = array();

		if ($ids) {
			$arrids = explode(',',$ids);
			if (is_array($arrids)) {
				foreach ($arrids as $id) {
					//$attimg   = wp_get_attachment_url($id,$size); // Anche _image va
					$attimg   = wp_get_attachment_image_src($id,$size,FALSE); // Anche _image va
					$attimg[] = $id; // slot 4 holds ID
					$attimg[] = get_post_field('post_excerpt', $id); // slot 5 holds caption
					$galleryimages[] = $attimg;
					// echo "<li>$id -  $attimg</li>\n";
				}
			}
		}

		return $galleryimages;
	}

	function sga_get_options($check_post_fields=FALSE) {
		global $sga_options,$sga_gallery_types,$post;

		if (!is_array($sga_options)) {
			$sga_options = get_option('sga_options');
		}

		if ($check_post_fields && $post) {
			// If custom field 'gallery_type' is used, pick it to select gallery type
			if (($forced_type = get_post_meta($post->ID, 'gallery_type', true)) && $sga_gallery_types[$forced_type]) {
				$sga_options['sga_gallery_type'] = $forced_type;
			}
		}
	}

	function get_galleries_from_content($content = '') {
		global $post, $galleries;
		$post_id = $post->ID;
		$gallid = $post->ID;

		$galleries = array();

		$howmany = preg_match_all('/\[gallery(\s+columns="[^"]*")?(\s+link="[^"]*")?\s+ids="([^"]*)"\]/',$content,$arrmatches);
		for ($gallid=0; $gallid<$howmany; $gallid++) {

			$gall = '';	// Reset gallery buffer

			$res = preg_match('/\s*columns="([0-9]+)"/',$arrmatches[1][$gallid],$arrcolmatch);

			$ids = $arrmatches[3][$gallid]; // gallery images IDs are here now
			$images = sga_gallery_images('full',$ids);

			$galleries[] = $ids;

		} // Foreach loop on galleries

		return $galleries;
	}


	add_filter('the_content', 'sga_contentfilter', 10);
	function sga_contentfilter($content = '') {
		global $sga_gallery_types,$post,$sga_options,$sga_gallery_params;
		$post_id = $post->ID;
		$gallid = $post->ID;

		if (!(strpos($content,'[gallery')===FALSE)) {
			$howmany = preg_match_all('/\[gallery(\s+columns="[^"]*")?(\s+link="[^"]*")?\s+ids="([^"]*)"\]/',$content,$arrmatches);
			//echo "Post ID: $post_id - res: $res - Matches:".print_r($arrmatches,true);exit;

			if (!($gallery_type=get_post_meta($post_id, 'gallery_type', true))) { // Post/page's specific setting may override site-wide
				sga_get_options();
				$gallery_type = isset($sga_options['sga_gallery_type'])?$sga_options['sga_gallery_type']:NULL;
			}

			for ($gallid=0; $gallid<$howmany; $gallid++) {

				$gall = '';	// Reset gallery buffer
				//$gall = "gallery type: $gallery_type<br/>\n";

				$res = preg_match('/\s*columns="([0-9]+)"/',$arrmatches[1][$gallid],$arrcolmatch);
				$columns = 3;
				if (isset($arrcolmatch[1]) && intval($arrcolmatch[1])) $columns = intval($arrcolmatch[1]);

				$ids=$arrmatches[3][$gallid]; // gallery images IDs are here now

				$images = sga_gallery_images('full',$ids);
				$thumbs = sga_gallery_images('medium',$ids);

				// Safety check: if there are not settings for selected gallery type, just switch back to lightbox
				if (!in_array($gallery_type,array('lightbox','lightbox_labeled')) && !is_array($sga_gallery_params[$gallery_type])) $gallery_type='lightbox';

				if (count($images)) {

					switch ($gallery_type) {
					case 'lightbox':
					case 'lightbox_labeled':
					case '':

					$gall .= '';
					break;
					default:
						if (isset($sga_gallery_params[$gallery_type]) && ($hfunct = $sga_gallery_params[$gallery_type]['render_function'])) {
							if (function_exists($hfunct)) {
								if ($res = call_user_func($hfunct,$images,$thumbs,$post_id,$gallid)) { // If WP triggers an error here, you have an outdated addon plugin. A new param has been added in Simplest Gallery 2.5
									$gall .= "<!-- Rendered by {$sga_gallery_types[$gallery_type]} BEGIN -->\n";
									$gall .= $res;
									$gall .= "<!-- Rendered by {$sga_gallery_types[$gallery_type]} END -->\n";
								}
							}
						}
					} // Closes SWITCH

					$content = str_replace($arrmatches[0][$gallid],$gall,$content);
				} else {
					$gall .= 'Gallery is empty!';
					$content = str_replace($arrmatches[0][$gallid],$gall,$content);
				}
			} // Foreach loop on galleries
		}

		return $content;
	}





/*------------------------------------*\
	SET/GET FUNCTIONS
\*------------------------------------*/



	/**
	 * Extract latitude and longitude from page 'Información general contacto'
	 * @return array $coordinates {
	 * 		@type string lat - Latitude
	 *  	@type string lon - Longitude
	 * }
	*/
	function get_map_coordinates(){
		global $post;
		$contact_info_query = new WP_Query( 'pagename=info-general' );
		if ( $contact_info_query->have_posts() ) {
			$contact_info_query->the_post();
			$lat = get_post_meta( $post->ID, '_lat_meta', TRUE );
			$lon = get_post_meta( $post->ID, '_lon_meta', TRUE );
		}
		wp_reset_query();

		$coordinates = array(
			'lat' => $lat,
			'lon' => $lon,
			);
		return $coordinates;
	}// get_map_coordinates

	/**
	 * Extract a specified metabox from page 'Información general contacto'
	 * @param string $field - The metabox field to be retrieved
	 * @return string $metafield - The metabox value
	*/
	function get_info_general( $field ){
		global $post;
		$contact_info_query = new WP_Query( 'pagename=info-general' );
		if ( $contact_info_query->have_posts() ) {
			$contact_info_query->the_post();

			switch ($field) {
				case 'direccion':
					return get_post_meta( $post->ID, '_direccion_meta', TRUE );
					break;
				default:
					break;
			}
		}
	}// get_info_general

	/**
	 * Get events for Foro Sunland
	 * @return JSON $events - The events in JSON format
	*/
	function get_events(){
		global $post;
		$json_events = array();

		$args = array(
			'post_type' 		=> 'eventos',
			'posts_per_page' 	=> -1
		);
		$query_eventos = new WP_Query( $args );
		if ( $query_eventos->have_posts() ) : while ( $query_eventos->have_posts() ) : $query_eventos->the_post();

			$meta_date = rwmb_meta( '_fecha', '', $post->ID );

			if( ! $meta_date ) continue;

			foreach ( $meta_date as $key => $datetime ) {

				$date_time_arr = explode(' ', $datetime );
				$date_arr = explode('-', $date_time_arr[0]);
				$day = $date_arr[2];
				$month = $date_arr[1];
				$year = $date_arr[0];
				$new_date_format = $month . '-' . $day . '-' . $year;

				$html_evento = get_event_html_format( $new_date_format, $date_time_arr[1], get_the_title(), get_the_content(), get_permalink( ) );

				if ( array_key_exists( $new_date_format , $json_events) ){
					$json_events[$new_date_format] = $json_events[$new_date_format] . $html_evento;
					continue;
				}
				
				$json_events[$new_date_format] = $html_evento;
			}

		endwhile; endif;
		wp_reset_query();

		return wp_json_encode( $json_events );

	}// get_events

	/**
	 * Get total number of dates an event has.
	 * @return int $num_dates 
	*/
	function get_num_event_dates( $post_id ){
		global $wpdb;

		$query = "
			SELECT COUNT(*) AS num_dates FROM wp_posts P
			INNER JOIN wp_postmeta PM ON P.ID = PM.post_id
			WHERE meta_key LIKE '_dia_%'
			AND post_type = 'eventos'
			AND post_status = 'publish'
			AND post_id = " . $post_id;
		$num_events_results = $wpdb->get_results( $query, OBJECT );

		return $num_events_results[0]->num_dates;

	}// get_num_event_dates
	




/*------------------------------------*\
	AJAX FUNCTIONS
\*------------------------------------*/


	/**
	 * Save the data from the contact form as a post.
	 * @return JSON $message - A success/error message about the status of the post.
	*/
	function save_contact_post(){

		$name = $_POST['nombre'];
		$email = $_POST['email'];
		$to_email = 'contactos@sunland.mx';
		$tel = $_POST['tel'];
		$msg = $_POST['mensaje'];

		$contact_post = array(
		  'post_title' 		=> $name,
		  'post_content' 	=> 'Nombre: '.$name."\r\n".'Email: '.$email."\r\n".'Teléfono: '.$tel."\r\n".'Mensaje: '.$msg,
		  'post_status'   	=> 'draft',
		  'post_type'   	=> 'contacto-recibido',
		);

		send_email_contacto($name, $email, $tel, $msg, 'Contacto', $to_email );

		// Insert the post into the database
		if ( wp_insert_post( $contact_post ) ){
			$message = array(
				'error'		=> 0,
				'message'	=> 'Gracias por tu mensaje ' . $name . ', muy pronto nos pondremos en contacto contigo.',
				);
			echo json_encode($message , JSON_FORCE_OBJECT);
			exit();
		}

		$message = array(
			'error'		=> 1,
			'message'	=> 'Ha ocurrido un error al enviar el mensaje.',
			);
		echo json_encode($message , JSON_FORCE_OBJECT);
		exit();
	}// save_contact_post
	add_action("wp_ajax_save_contact_post", "save_contact_post");
	add_action("wp_ajax_nopriv_save_contact_post", "save_contact_post");

	/**
	 * Send email for "more information"
	 * @return JSON $message - A success/error message about the status of the post.
	*/
	function send_email_more_information(){

		$name = $_POST['nombre'];
		$email = $_POST['email'];
		$to_email = $_POST['to_email'];
		$section = $_POST['section'];
		$tel = isset( $_POST['tel'] ) ? $_POST['tel'] : '-';

		send_email_contacto($name, $email, $tel, '', $section, $to_email );

		$message = array(
			'error'		=> 0,
			'message'	=> '¡Gracias por contactarnos ' . $name .'!',
			);
		echo json_encode($message , JSON_FORCE_OBJECT);
		exit();

	}// send_email_more_information
	add_action("wp_ajax_send_email_more_information", "send_email_more_information");
	add_action("wp_ajax_nopriv_send_email_more_information", "send_email_more_information");




// POST THUMBNAILS SUPPORT ///////////////////////////////////////////////////////////
	if ( function_exists('add_theme_support') ){
		add_theme_support('post-thumbnails');
	}
	if ( function_exists('add_image_size') ){

		update_option( 'medium_size_h', 350 );
		update_option( 'medium_size_w', 350 );
		update_option( 'medium_crop', true );

	}


