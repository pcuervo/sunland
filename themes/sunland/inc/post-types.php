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

	});