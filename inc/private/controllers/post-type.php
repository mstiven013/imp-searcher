<?php 
	
	// Function to create "Talleres" custom post type
	add_action( 'init', 'talleres_post_type' );
	if(!function_exists('talleres_post_type')) {
		function talleres_post_type() {

			$labels = array(
			    'name'                => _x( 'Talleres', 'Post Type General Name', IMPS_NS ),
			    'singular_name'       => _x( 'Taller', 'Post Type Singular Name', IMPS_NS ),
			    'menu_name'           => __( 'Talleres', IMPS_NS ),
			    'parent_item_colon'   => __( 'Taller padre', IMPS_NS ),
			    'all_items'           => __( 'Todos los talleres', IMPS_NS ),
			    'view_item'           => __( 'Ver taller', IMPS_NS ),
			    'add_new_item'        => __( 'Añadir nuevo taller', IMPS_NS ),
			    'add_new'             => __( 'Añadir nuevo', IMPS_NS ),
			    'edit_item'           => __( 'Editar taller', IMPS_NS ),
			    'update_item'         => __( 'Actualizar taller', IMPS_NS ),
			    'search_items'        => __( 'Buscar taller', IMPS_NS ),
			    'not_found'           => __( 'No se encontraron talleres', IMPS_NS ),
			    'not_found_in_trash'  => __( 'No hay talleres en la papelera', IMPS_NS ),
			);

			$args = array(
				'label'               => __( 'talleres', IMPS_NS ),
				'description'         => __( 'Talleres plan Aliados de Importadoras Asociadas', IMPS_NS ),
				'labels'              => $labels,
				// Features this CPT supports in Post Editor
				'supports'            => array( 'title', 'editor', 'thumbnail', ),
				// You can associate this CPT with a taxonomy or custom taxonomy. 
				'taxonomies'          => array( 'servicios', 'ciudades' ),
				/* A hierarchical CPT is like Pages and can have
				* Parent and child items. A non-hierarchical CPT
				* is like Posts.
				*/ 
				'hierarchical'        => true,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => true,
				'show_in_admin_bar'   => true,
				'menu_position'       => 5,
				'can_export'          => true,
				'has_archive'         => false,
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type'     => 'post',
			);

			register_post_type( 'talleres',	$args);

		}
	}



 ?>