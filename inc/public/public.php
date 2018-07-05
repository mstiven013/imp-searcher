<?php 
	
	//Add shortcode for imp_searcher
	add_shortcode('imp_searcher', 'imp_searcher');
	if(!function_exists('imp_searcher')) {
		function imp_searcher() {

			//Get and return searcher form - from "form-searcher.php" archive
			$form = file_get_contents(IMPS_DIR . 'inc/public/form-searcher.php');
			return $form;

		}
	}

 ?>