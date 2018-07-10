<?php 
	
	/*
	***FUNCTION TO GET METADATA OF POST'S AND PAGE'S
	*/

	//Data upload function
	if(!function_exists('imp_data')){
	    function imp_data($n) {

	    	global $post;
	        $v = get_post_custom($post->ID);

	        if(!isset($v[$n][0])) {
	        	$field = '';
	        } else {
	        	$field = esc_attr($v[$n][0]);
	        }

	        return $field;

	    }
	}

	//checked if input is selected
	if(!function_exists('imp_checked_input')) {
		function imp_checked_input($name, $value) {

			$field = imp_data($name);

			if(!isset($field)) {
				
				echo '';

				
			} else {
				if($field == $value) {
					echo 'checked="checked"';
				}
			}
		}
	}

	if(!function_exists('imp_selected_option')) {
		function imp_selected_option($name, $value) {

			$field = imp_data($name);

			if(!isset($field)) {
				
				echo '';

				
			} else {
				if($field == $value) {
					echo 'selected="selected"';
				}
			}
		}
	}

 ?>