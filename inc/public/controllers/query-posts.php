<?php 

	//require "wp-load.php"
	require_once '../../../../../../wp-load.php';

	//WP Query
	$args = array(
		'post_type' => 'talleres'
	);

	$query = new WP_Query($args);

 ?>