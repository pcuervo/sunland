<?php


/*------------------------------------*\
	GENERAL FUNCTIONS
\*------------------------------------*/



	/**
	* Enqueue admin scripts and styles.
	**/
	add_action( 'admin_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'admin-js', JSPATH.'admin.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'gmaps', JSPATH.'gmaps.min.js', array('jquery'), '1.0' );
		wp_enqueue_script( 'geo-autocomplete', JSPATH.'geocomplete.min.js', array('gmaps'), '1.0' );
		wp_enqueue_script( 'jquery-ui-datepicker');

		wp_localize_script( 'admin-js', 'ajax_url', admin_url('admin-ajax.php') );

		wp_enqueue_style( 'admin-css', CSSPATH.'admin.css' );
		wp_enqueue_style('jquery-ui-datepicker-css', CSSPATH.'jquery-ui.css' );

	});

	/**
	* Run when Wordpress has finished loading but before headers are sent.
	**/
	add_action( 'init', function(){

		// Allow custom post types to have featured images.
		if ( function_exists('add_theme_support') ){
			add_theme_support('post-thumbnails');
		}

	});

	/**
	* Add javascript to the footer of admin panel.
	**/
	add_action( 'admin_footer', 'footer_admin_scripts', 22 );

	/**
	* Remove admin bar for non admins.
	**/
	add_filter( 'show_admin_bar', function($content){
		return ( current_user_can('administrator') ) ? $content : false;
	});

	/**
	* Change footer comment in dashboard.
	**/
	add_filter( 'admin_footer_text', function() {
		echo 'Creado por <a href="http://pcuervo.com">Pequeño Cuervo</a>. ';
		echo 'Powered by <a href="http://www.wordpress.org">WordPress</a>';
	});





/*------------------------------------*\
	FORMAT FUNCTIONS
\*------------------------------------*/



	add_filter('excerpt_length', function($length){
		return 11;
	});
	add_filter('excerpt_more', function(){
		return '…';
	});





/*------------------------------------*\
	AJAX FUNCTIONS
\*------------------------------------*/


	/**
	 * Add date metaboxes (dia and hora) to an event.
	 * @return JSON $message - A success/error message about the status of the post.
	*/
	function add_date_event_metabox(){

		$post_id = $_POST['post_id'];
		// GET NUM OF DATE METABOXES
		$num_event_dates = get_num_event_dates( $post_id );
		$next_date = $num_event_dates + 1;

		add_meta_box( 'fecha_evento_' . $next_date, 'Otra fecha - ' . $next_date, 'metabox_fecha_evento', 'eventos', 'advanced', 'high' );

		//wp_nonce_field(__FILE__, '_dia2_meta_nonce');
		//wp_nonce_field(__FILE__, '_hora2_meta_nonce');


		// CREATE METABOX BASED ON NAME
		$message = array(
			'error'		=> 0,
			'message'	=> 'Todo bien loca',
			);
		echo json_encode($message , JSON_FORCE_OBJECT);
		exit();

	}// add_date_event_metabox
	add_action("wp_ajax_add_date_event_metabox", "add_date_event_metabox");
	add_action("wp_ajax_nopriv_add_date_event_metabox", "add_date_event_metabox");