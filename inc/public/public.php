<?php 

	define('IMPS_TEMP', IMPS_DIR . 'inc/public/templates');
	
	//Add shortcode for imp_searcher
	add_shortcode('imp_searcher', 'imp_searcher');
	if(!function_exists('imp_searcher')) {
		function imp_searcher() {

			//Get and return searcher form - from "form-searcher.php" archive
			$form = file_get_contents(IMPS_DIR . 'inc/public/templates/search-page.php');
			return $form;

		}
	}
	add_filter( 'body_class','imp_body_class_name' );
	function imp_body_class_name( $classes ) {
	 	
	 	global $post;

	 	if(has_shortcode($post->post_content, 'imp_searcher')) {
	    	$classes[] = 'imp_searcher';
	    }
	     
	    return $classes;
	     
	}

	//Add template page to custom taxonomy "Talleres"
	add_filter('archive_template', 'servicios_template');
	function servicios_template( $template ){

	    //Add option for plugin to turn this off? If so just return $template

	    //Check if the taxonomy is being viewed 
	    //Suggested: check also if the current template is 'suitable'

	    
	    $template = plugin_dir_url(__FILE__ ) . 'templates/archive.php';

	    return $template;
	}

	//Register JS scripts
	add_action('wp_enqueue_scripts','imp_register_scripts');
	if(!function_exists('imp_register_scripts')) {
		function imp_register_scripts() {

			global $post;

	 		if(has_shortcode($post->post_content, 'imp_searcher')) {
			    //jQuery
			    wp_register_script('jquery.min.js', IMPS_TEMP . '/js/jquery.min.js', '', '', false);
			    wp_enqueue_script('jquery.min.js');

			    //popper scripts
			    wp_register_script('popper.min.js', IMPS_TEMP . '/libs/bootstrap/js/popper.min.js', '', '', false);
			    wp_enqueue_script('popper.min.js');

			    //Bootstrap scripts
			    wp_register_script('bootstrap.min.js', IMPS_TEMP . '/libs/bootstrap/js/bootstrap.min.js', '', '', false);
			    wp_enqueue_script('bootstrap.min.js');
			    
			    //Select2 scripts
			    wp_register_script('select2.min.js', IMPS_TEMP . '/libs/bootstrap/js/select2.min.js', '', '', false);
			    wp_enqueue_script('select2.min.js');

			    //Searcher
			    wp_register_script('search.js', IMPS_TEMP . '/js/search.js', '', '', false);
			    wp_enqueue_script('search.js');
			}
		    
		}
	}

	//Register CSS styles
	add_action('wp_enqueue_scripts','imp_register_styles');
	if(!function_exists('imp_register_styles')) {
		function imp_register_styles() {

			global $post;

	 		if(has_shortcode($post->post_content, 'imp_searcher')) {
				//Plugin styles
			    wp_register_style('styles.css', IMPS_TEMP . '/css/style.css', array(), false, 'all');
			    wp_enqueue_style('styles.css');

				//Bootstrap styles
			    wp_register_style('bootstrap.min.css', IMPS_TEMP . '/libs/bootstrap/css/bootstrap.min.css', array(), false, 'all');
			    wp_enqueue_style('bootstrap.min.css');
			    
			    //Select2 styles
			    wp_register_style('select2.min.css', IMPS_TEMP . '/libs/bootstrap/css/select2.min.css', array(), false, 'all');
			    wp_enqueue_style('select2.min.css');
			}
		    
		}
	}

 ?>