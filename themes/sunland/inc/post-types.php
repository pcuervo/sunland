<?php


// CUSTOM POST TYPES /////////////////////////////////////////////////////////////////


	add_action('init', function(){

		// NOSOTROS
		$labels = array(
			'name'          => 'Nosotros',
			'singular_name' => 'Nosotros',
			'add_new'       => 'Nueva sección Nosotros',
			'add_new_item'  => 'Nueva sección Nosotros',
			'edit_item'     => 'Editar Nosotros',
			'new_item'      => 'Nuevo Nosotros',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver Nosotros',
			'search_items'  => 'Buscar Nosotros',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Nosotros'
		);
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'nosotros' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'nosotros', $args );

		// TALLERES
		$labels = array(
			'name'          => 'Talleres',
			'singular_name' => 'Taller',
			'add_new'       => 'Nuevo taller',
			'add_new_item'  => 'Nuevo taller',
			'edit_item'     => 'Editar taller',
			'new_item'      => 'Nuevo taller',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver taller',
			'search_items'  => 'Buscar talleres',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Talleres'
		);
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'talleres' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'talleres', $args );

		// EVENTOS
		$labels = array(
			'name'          => 'Eventos',
			'singular_name' => 'Evento',
			'add_new'       => 'Nuevo evento',
			'add_new_item'  => 'Nuevo evento',
			'edit_item'     => 'Editar evento',
			'new_item'      => 'Nuevo evento',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver evento',
			'search_items'  => 'Buscar eventos',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Eventos'
		);
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'eventos' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'eventos', $args );

		// INSTRUCTORES
		$labels = array(
			'name'          => 'Instructores',
			'singular_name' => 'Instructor',
			'add_new'       => 'Nuevo instructor',
			'add_new_item'  => 'Nuevo instructor',
			'edit_item'     => 'Editar instructor',
			'new_item'      => 'Nuevo instructor',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver instructor',
			'search_items'  => 'Buscar instructores',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Instructores'
		);
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'instructores' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'instructores', $args );

		// TESTIMONIALS
		$labels = array(
			'name'          => 'Testimonials',
			'singular_name' => 'Testimonial',
			'add_new'       => 'Nuevo testimonial',
			'add_new_item'  => 'Nuevo testimonial',
			'edit_item'     => 'Editar testimonial',
			'new_item'      => 'Nuevo testimonial',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver testimonial',
			'search_items'  => 'Buscar testimonials',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Testimonials'
		);
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'testimonials' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'testimonials', $args );

		//EQUIPOS
		$labels = array(
			'name'          => 'Equipos',
			'singular_name' => 'Equipo',
			'add_new'       => 'Nuevo equipo',
			'add_new_item'  => 'Nuevo equipo',
			'edit_item'     => 'Editar equipo',
			'new_item'      => 'Nuevo equipo',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver equipos',
			'search_items'  => 'Buscar equipos',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Equipos'
		);
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'equipos' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'equipos', $args );

	});