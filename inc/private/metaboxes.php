<?php 

	require_once 'controllers/get-metadata.php';

	//Add custom meta boxes to options of theme
	add_action('add_meta_boxes', 'imp_meta_boxes');

	//Add metaboxes function
	if(!function_exists('imp_meta_boxes')) {
		function imp_meta_boxes() {
			add_meta_box('imp_option_theme', __('Logo del taller', THEME_NS), 'imp_meta_boxes_callback', 'talleres', 'side', 'low');
			add_meta_box('imp_info_taller', __('Información del taller', THEME_NS), 'imp_meta_post_boxes_callback', 'talleres', 'normal', 'high');
		}
	}

	//Metaboxes Callback function
	if(!function_exists('imp_meta_post_boxes_callback')) {
		function imp_meta_post_boxes_callback() { 
			require_once 'templates/info-metabox.php';
		}
	}

	//Metaboxes Callback function
	if(!function_exists('imp_meta_boxes_callback')) {
		function imp_meta_boxes_callback() { 
			require_once 'templates/side-metabox.php';
		}
	}

	//Metaboxes save function
	add_action('save_post', 'imp_save_meta_boxes');
	if(!function_exists('imp_save_meta_boxes')) {
		function imp_save_meta_boxes($post_id) {
			// Validaciones para guardar los datos.
	        if ( wp_is_post_autosave( $post_id ) ) {
	            return;
	        }

	        if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) {
	            if ( ! current_user_can( 'edit_post', $post_id ) ) {
	                return;
	            }
	        } else {
	            if ( ! current_user_can( 'edit_post', $post_id ) ) {
	                return;
	            }
	        }

	        $contact_name = (isset($_POST['contact_name'])) ? $_POST['contact_name'] : '';
	        $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
	        $correo_electronico = (isset($_POST['correo_electronico'])) ? $_POST['correo_electronico'] : '';
			$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
			$pagina_web = (isset($_POST['pagina_web'])) ? $_POST['pagina_web'] : '';
			$google_maps = (isset($_POST['google_maps'])) ? $_POST['google_maps'] : '';

			$logo_id = (isset($_POST['logo_taller_id'])) ? $_POST['logo_taller_id'] : '';
			$logo = (isset($_POST['logo_taller'])) ? $_POST['logo_taller'] : '';

	    	update_post_meta($post_id,'contact_name',$contact_name);
	    	update_post_meta($post_id,'direccion',$direccion);
	    	update_post_meta($post_id,'correo_electronico',$correo_electronico);
	    	update_post_meta($post_id,'telefono',$telefono);
	    	update_post_meta($post_id,'pagina_web',$pagina_web);
	    	update_post_meta($post_id,'google_maps',$google_maps);

	    	update_post_meta($post_id,'logo_taller',$logo);
	    	update_post_meta($post_id,'logo_taller_id',$logo_id);

		}
	}

 ?>