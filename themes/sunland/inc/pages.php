<?php


// CUSTOM PAGES //////////////////////////////////////////////////////////////////////


	add_action('init', function(){

		// INFO TALLERES
		if( ! get_page_by_path('info-talleres') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Info talleres',
				'post_name'   => 'info-talleres',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// FORO SUNLAND
		if( ! get_page_by_path('foro-sunland') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Foro Sunland',
				'post_name'   => 'foro-sunland',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// SUNLAND EXPRESS
		if( ! get_page_by_path('sunland-express') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Sunland Express',
				'post_name'   => 'sunland-express',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// SUNLAND STUDIOS
		if( ! get_page_by_path('sunland-studios') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Sunland Studios',
				'post_name'   => 'sunland-studios',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// CONTACTO
		if( ! get_page_by_path('contacto') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Contacto',
				'post_name'   => 'contacto',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// INFO GENERAL
		if( ! get_page_by_path('info-general') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Información general contacto',
				'post_name'   => 'info-general',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

	    //  INFO HOME
		if( ! get_page_by_path('info-home') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => '¿Por qué estudiar en Sunland?',
				'post_name'   => 'info-home',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		//  INTENSIVO
		if( ! get_page_by_path('intensivo') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Programa Intensivo',
				'post_name'   => 'intensivo',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		//  DANZA
		if( ! get_page_by_path('danza') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Danza',
				'post_name'   => 'danza',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		//  MÚSICA
		if( ! get_page_by_path('musica') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Música',
				'post_name'   => 'musica',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		//  TEATRO
		if( ! get_page_by_path('teatro') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Teatro',
				'post_name'   => 'teatro',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}
		
	});
