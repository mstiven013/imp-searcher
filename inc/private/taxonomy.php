<?php 

	add_action( 'init', 'imp_services_taxonomy', 0 );
	 
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

		register_taxonomy('servicios','post',array(
			'hierarchical' => false,
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var' => true,
			'rewrite' => array( 'slug' => 'servicio' ),
		));
	}

 ?>