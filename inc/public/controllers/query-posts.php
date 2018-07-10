<?php 

	//require "wp-load.php"
	require_once '../../../../../../wp-load.php';

	//WP Query
	$args = array(
		'post_type' => 'talleres',
		'posts_per_page' => 100
	);	

	$query = new WP_Query($args);

 ?>