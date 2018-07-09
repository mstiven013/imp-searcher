<?php 

	if(defined('IMPS_TEMP')) {
		define('IMPS_TEMP', IMPS_DIR . 'inc/public/templates');
	}

	add_action('admin_enqueue_scripts', 'imp_admin_styles');
	function imp_admin_styles($hook_suffix) {
		global $pagenow;

	    if($pagenow === 'post.php' && 'talleres' === get_post_type( $_GET['post'])) {
		    //styles
		    wp_register_style('style.css', IMPS_DIR . 'inc/private/templates/css/style.css', array(), false, 'all');
		    wp_enqueue_style('style.css');

		    //scripts
		    wp_register_script('script.js', IMPS_DIR . 'inc/private/templates/js/script.js', array(), false, 'all');
		    wp_enqueue_script('script.js');
	    }
	}

 ?>