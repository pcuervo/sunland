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

		// styles
		wp_enqueue_style( 'styles', get_stylesheet_uri() );

	});





// HELPER METHODS AND FUNCTIONS //////////////////////////////////////////////////////



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






