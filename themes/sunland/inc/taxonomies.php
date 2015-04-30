<?php


// TAXONOMIES ////////////////////////////////////////////////////////////////////////


	add_action( 'init', 'custom_taxonomies_callback', 0 );

	function custom_taxonomies_callback(){

		// TIPO DE ARTE
		if( ! taxonomy_exists('arte')){

			$labels = array(
				'name'              => 'Tipo de arte',
				'singular_name'     => 'Tipo de arte',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar tipo de arte',
				'update_item'       => 'Actualizar tipo de arte',
				'add_new_item'      => 'Nuevo tipo de arte',
				'new_item_name'     => 'Nombre Nuevo tipo de arte',
				'menu_name'         => 'Tipo de arte'
			);
			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'arte' ),
			);

			register_taxonomy( 'arte', 'talleres', $args );
		}

		// TIPO DE CONTENIDO
		if( ! taxonomy_exists('tipo-de-contenido')){

			$labels = array(
				'name'              => 'Tipo de contenido',
				'singular_name'     => 'Tipo de contenido',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar tipo de contenido',
				'update_item'       => 'Actualizar tipo de contenido',
				'add_new_item'      => 'Nuevo tipo de contenido',
				'new_item_name'     => 'Nombre nuevo tipo de contenido',
				'menu_name'         => 'Tipo de contenido'
			);
			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'tipo-de-contenido' ),
			);

			register_taxonomy( 'tipo-de-contenido', 'talleres', $args );
		}

		// INSTRUCTORES TALLER
		if( ! taxonomy_exists('instructores')){

			$labels = array(
				'name'              => 'Instructores',
				'singular_name'     => 'Instructor',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar Instructor',
				'update_item'       => 'Actualizar Instructor',
				'add_new_item'      => 'Nuevo Instructor',
				'new_item_name'     => 'Nombre nuevo instructores',
				'menu_name'         => 'Instructores'
			);
			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'instructores' ),
			);

			register_taxonomy( 'instructores', 'talleres', $args );
		}

		// TIPO DE STAFF
		if( ! taxonomy_exists('tipo-de-staff')){

			$labels = array(
				'name'              => 'Tipo de staff',
				'singular_name'     => 'Tipo de staff',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar tipo de staff',
				'update_item'       => 'Actualizar tipo de staff',
				'add_new_item'      => 'Nuevo tipo de staff',
				'new_item_name'     => 'Nombre nuevo tipo de staff',
				'menu_name'         => 'Tipo de staff'
			);
			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'tipo-de-staff' ),
			);

			register_taxonomy( 'tipo-de-staff', 'instructores', $args );
		}

		// EQUIPOTAXONOMY
		if( ! taxonomy_exists('tipo-de-equipo')){

			$labels = array(
				'name'              => 'Tipo de equipo',
				'singular_name'     => 'Tipo de equipo',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar tipo de equipo',
				'update_item'       => 'Actualizar tipo de equipo',
				'add_new_item'      => 'Nuevo tipo de equipo',
				'new_item_name'     => 'Nombre nuevo tipo de equipo',
				'menu_name'         => 'Tipo de equipo'
			);
			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'tipo-de-equipo' ),
			);

			register_taxonomy( 'tipo-de-equipo', 'equipos', $args );
		}


		// MATERIA
		if( ! taxonomy_exists('materia')){

			$labels = array(
				'name'              => 'Materia',
				'singular_name'     => 'Materia',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar materia',
				'update_item'       => 'Actualizar materia',
				'add_new_item'      => 'Nueva materia',
				'new_item_name'     => 'Nombre nueva materia',
				'menu_name'         => 'Materia'
			);
			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'materia' ),
			);

			register_taxonomy( 'materia', 'instructores', $args );

		}
		
		/**
		* Insert initial terms for some of the new taxonomies
		**/
		insert_term_tipo_de_arte();
		insert_term_tipo_de_contenido();
		insert_term_tipo_de_staff();
		insert_term_equipo_taxonomy();

	}// custom_taxonomies_callback

	/*
	 * Insert dynamic taxonomy terms after a post has been created/saved.
	 */
	function update_taxonomies(){

		insert_instructor_taxonomy_term();
		
	}// update_taxonomies
	add_action('save_post', 'update_taxonomies');

	/*
	 * Insert instructor as taxonomy term.
	 */
	function insert_instructor_taxonomy_term(){
		global $wpdb;

		$results = $wpdb->get_results( 'SELECT trim(post_title) as post_title from wp_posts where post_type = "instructores" AND post_title not in ( SELECT name FROM wp_terms T INNER JOIN wp_term_taxonomy TT ON T.term_id = TT.term_id WHERE TT.taxonomy = "instructores") AND post_status = "publish"', OBJECT );

		foreach ($results as $photographer) {
			$term = term_exists($photographer->post_title, 'instructores');
			if ($term !== 0 && $term !== null) continue;

			wp_insert_term($photographer->post_title, 'instructores');
		}// foreach
	}// insert_instructor_taxonomy_term

	/**
	* Insert terms for "Tipo de arte"
	**/
	function insert_term_tipo_de_arte(){
		if ( ! term_exists( 'Danza', 'arte' ) ){
			wp_insert_term( 'Danza', 'arte' );
		}
		if ( ! term_exists( 'Música', 'arte' ) ){
			wp_insert_term( 'Música', 'arte' );
		}
		if ( ! term_exists( 'Teatro', 'arte' ) ){
			wp_insert_term( 'Teatro', 'arte' );
		}
	}// insert_term_tipo_de_arte

	/**
	* Insert terms for "Tipo de contenido"
	**/
	function insert_term_tipo_de_contenido(){
		if ( ! term_exists( 'Galería', 'tipo-de-contenido' ) ){
			wp_insert_term( 'Galería', 'tipo-de-contenido' );
		}
		if ( ! term_exists( 'Texto', 'tipo-de-contenido' ) ){
			wp_insert_term( 'Texto', 'tipo-de-contenido' );
		}
	}// insert_term_tipo_de_contenido

	/**
	* Insert terms for "Tipo de staff"
	**/
	function insert_term_tipo_de_staff(){
		if ( ! term_exists( 'Studios', 'tipo-de-staff' ) ){
			wp_insert_term( 'Studios', 'tipo-de-staff' );
		}
		if ( ! term_exists( 'Talleres', 'tipo-de-staff' ) ){
			wp_insert_term( 'Talleres', 'tipo-de-staff' );
		}
		if ( ! term_exists( 'Diplomados', 'tipo-de-staff' ) ){
			wp_insert_term( 'Diplomados', 'tipo-de-staff' );
		}
	}// insert_term_tipo_de_staff

	/**
	* Insert terms for "Equipo Taxonomy"
	**/
	function insert_term_equipo_taxonomy(){
		if ( ! term_exists( 'General', 'tipo-de-equipo' ) ){
			wp_insert_term( 'General', 'tipo-de-equipo' );
		}
		if ( ! term_exists( 'DAW', 'tipo-de-equipo' ) ){
			wp_insert_term( 'DAW', 'tipo-de-equipo' );
		}
		if ( ! term_exists( 'Microfonía', 'tipo-de-equipo' ) ){
			wp_insert_term( 'Microfonía', 'tipo-de-equipo' );
		}
	}// insert_term_tipo_de_staff
