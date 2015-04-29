<?php



// GENERAL ACTIONS //////////////////////////////////////////////////////////



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


// GENERAL FILTERS ///////////////////////////////////////////////////


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


// THE EXECRPT FORMAT AND LENGTH /////////////////////////////////////////////////////
	add_filter('excerpt_length', function($length){
		return 11;
	});
	add_filter('excerpt_more', function(){
		return '…';
	});