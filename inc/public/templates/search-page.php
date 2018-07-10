<?php

	if(isset($_GET['ciudad'])) {
		echo $_GET['ciudad'];
	} else {
		echo 'No existe';
	}

	//Require form
	require_once 'form.php';

	//Require results
	require_once 'results.php';

 ?>