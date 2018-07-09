<?php 
	
	//Add custom taxonomy to "Servicios"
	add_action( 'init', 'imp_services_taxonomy', 0 );
	if(!function_exists('imp_services_taxonomy')) {
		function imp_services_taxonomy() {
	 
			// Labels part for the GUI

			$labels = array(
				'name' => _x( 'Servicios', IMPS_NS ),
				'singular_name' => _x( 'Servicio', IMPS_NS ),
				'search_items' =>  __( 'Buscar servicios', IMPS_NS ),
				'popular_items' => __( 'Servicios populares', IMPS_NS ),
				'all_items' => __( 'Todos los Servicios', IMPS_NS ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Editar servicio', IMPS_NS ), 
				'update_item' => __( 'Actualizar servicio', IMPS_NS ),
				'add_new_item' => __( 'Añadir nuevo servicio', IMPS_NS ),
				'new_item_name' => __( 'Nombre de nuevo servicio', IMPS_NS ),
				'separate_items_with_commas' => __( 'Separar servicios con commas', IMPS_NS ),
				'add_or_remove_items' => __( 'Añadir o eliminar servicios', IMPS_NS ),
				'choose_from_most_used' => __( 'Elija entre los servicios más utilizados', IMPS_NS ),
				'menu_name' => __( 'Servicios', IMPS_NS ),
			); 

			// Now register the non-hierarchical taxonomy like tag

			register_taxonomy('servicios', 'talleres' ,array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_ui' => true,
				'show_admin_column' => true,
				'update_count_callback' => '_update_post_term_count',
				'query_var' => true,
				'rewrite' => array( 'slug' => 'servicio' ),
			));
		}
	}

	//Add custom taxonomy to "Ciudades"
	add_action( 'init', 'imp_ciudades_taxonomy', 0 );
	if(!function_exists('imp_ciudades_taxonomy')) {
		function imp_ciudades_taxonomy() {
	 
			// Labels part for the GUI

			$labels = array(
				'name' => _x( 'Ciudades', IMPS_NS ),
				'singular_name' => _x( 'Ciudad', IMPS_NS ),
				'search_items' =>  __( 'Buscar ciudades', IMPS_NS ),
				'popular_items' => __( 'Ciudades populares', IMPS_NS ),
				'all_items' => __( 'Todas los ciudades', IMPS_NS ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Editar ciudad', IMPS_NS ), 
				'update_item' => __( 'Actualizar ciudad', IMPS_NS ),
				'add_new_item' => __( 'Añadir nueva ciudad', IMPS_NS ),
				'new_item_name' => __( 'Nombre de nueva ciudad', IMPS_NS ),
				'separate_items_with_commas' => __( 'Separar ciudades con commas', IMPS_NS ),
				'add_or_remove_items' => __( 'Añadir o eliminar ciudades', IMPS_NS ),
				'choose_from_most_used' => __( 'Elija entre las ciudades más utilizadas', IMPS_NS ),
				'menu_name' => __( 'Ciudades', IMPS_NS ),
			); 

			// Now register the non-hierarchical taxonomy like tag

			register_taxonomy('ciudades', 'talleres' ,array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_ui' => true,
				'show_admin_column' => true,
				'update_count_callback' => '_update_post_term_count',
				'query_var' => true,
				'rewrite' => array( 'slug' => 'servicio' ),
			));
		}
	}

 ?>