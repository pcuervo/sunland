<?php


// CONSTANTS  ///////////////////////////


	/**
	* Define paths to javascript, styles, theme and site.
	**/
	define( 'JSPATH', get_template_directory_uri() . '/js/' );
	define( 'CSSPATH', get_template_directory_uri() . '/css/' );
	define( 'THEMEPATH', get_template_directory_uri() . '/' );
	define( 'SITEURL', site_url('/') );





// POST TYPES, METABOXES, TAXONOMIES, CUSTOM PAGES AND FUNCTIONS ////////////////////////////////



	require_once('inc/post-types.php');
	require_once('inc/metaboxes.php');
	require_once('inc/taxonomies.php');
	require_once('inc/pages.php');
	require_once('inc/users.php');
	require_once('inc/functions-admin.php');
	require_once('inc/functions-js-footer.php');





// GENERAL ACTIONS //////////////////////////////////////////////////////////



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



// HELPER FUNCTIONS //////////////////////////////////////////////////////



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
	 * Return the name of a month in Spanish
	 * @param string $month - Number of month
	 * @return string $month_name - The name of a month in Spanish
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

	



// FORMAT FUNCTIONS //////////////////////////////////////////////////////



	/**
	 * Separates a group of "subjects" with AND (y) and commas (,).
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
	function get_formatted_event_date( $date ){

		$date_arr = explode('-', $date);
		$day = $date_arr[2];
		$month = get_month_name( $date_arr[1] );
		$year = $date_arr[0];

		return $day . ' de ' . $month . ', ' . $year;

	}// get_formatted_event_date

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
				<p class="hora"><i class="fa fa-clock-o"></i> ' . $hora . '</p> 
				<a href="#" class="[ boton ] [ abrir-info ]">más info</a> 
				<div class="[ evento-full ]"> 
					<span class="custom-content-close"></span> 
					<h4 class="titulo">' . $title . '</h4> 
					<p class="hora"><i class="fa fa-clock-o"></i> ' . $time . '</p> 
					<p class="contenido"><i class="fa fa-newspaper-o"></i> ' . $content . '</p> 
					<p class="url"><i class="fa fa-link"></i> <a href="' . $permalink . '" target="_blank">"+ url +"</a></p>  
				</div> 
			</div>';

		return $html_event;

	}// get_event_html_format




// SET/GET FUNCTIONS //////////////////////////////////////////////////////



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
	 * Extract a specified meta data from 'Información general contacto'
	 * @return string $metafield - The metabox value to be retrieved
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

			$date = get_post_meta( $post->ID, '_dia_meta', TRUE );
			$time = get_post_meta( $post->ID, '_hora_meta', TRUE );
			$date_arr = explode('-', $date);
			$new_date_format = $date_arr[1] . '-' . $date_arr[2] . '-' . $date_arr[0];

			$html_evento = get_event_html_format( $new_date_format, $time, get_the_title(), get_the_content(), get_permalink( ) ); 
			$json_events[$new_date_format] = $html_evento;

		endwhile; endif;
		wp_reset_query();

		return wp_json_encode( $json_events );

	}// get_upcoming_events







