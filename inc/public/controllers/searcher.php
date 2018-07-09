<?php 
	//Get "wp-load.php"
	require_once '../../../../../../wp-load.php';

	//Args to get taxonomy "Servicios"
	$argsServices=array(
	  'name' => 'servicios',
	  'public'   => true,
	  '_builtin' => false
	);
	$outputServices = 'names'; // or objects
	$operatorServices = 'and';
	$services = get_taxonomies($argsServices,$outputServices,$operatorServices); 

	//Args to get taxonomy "Ciudad"
	$argsCities=array(
	  'name' => 'ciudades',
	  'public'   => true,
	  '_builtin' => false
	);
	$outputCities = 'names'; // or objects
	$operatorCities = 'and';
	$cities = get_taxonomies($argsCities,$outputCities,$operatorCities);
?>