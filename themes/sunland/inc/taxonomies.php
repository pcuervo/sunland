<?php


// TAXONOMIES ////////////////////////////////////////////////////////////////////////


	add_action( 'init', 'custom_taxonomies_callback', 0 );

	function custom_taxonomies_callback(){

		// TIPO DE ARTE
		if( ! taxonomy_exists('tipo-de-arte')){

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
				'rewrite'           => array( 'slug' => 'tipo-de-arte' ),
			);

			register_taxonomy( 'tipo-de-arte', 'talleres', $args );
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



	/**
	* Insert terms for "Tipo de arte"
	**/
	function insert_term_tipo_de_arte(){
		if ( ! term_exists( 'Danza', 'tipo-de-arte' ) ){
			wp_insert_term( 'Danza', 'tipo-de-arte' );
		}
		if ( ! term_exists( 'Música', 'tipo-de-arte' ) ){
			wp_insert_term( 'Música', 'tipo-de-arte' );
		}
		if ( ! term_exists( 'Teatro', 'tipo-de-arte' ) ){
			wp_insert_term( 'Teatro', 'tipo-de-arte' );
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
		if ( ! term_exists( 'General', 'equipo_taxonomy' ) ){
			wp_insert_term( 'General', 'equipo_taxonomy' );
		}
		if ( ! term_exists( 'DAW', 'equipo_taxonomy' ) ){
			wp_insert_term( 'DAW', 'equipo_taxonomy' );
		}
		if ( ! term_exists( 'Microfonía', 'equipo_taxonomy' ) ){
			wp_insert_term( 'Microfonía', 'equipo_taxonomy' );
		}
	}// insert_term_tipo_de_staff
