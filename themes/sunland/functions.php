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

	



// FORMAT FUNCTIONS //////////////////////////////////////////////////////



	/**
	 * Print the title tag based on what is being viewed.
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








