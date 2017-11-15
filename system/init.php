<?php

	$error = $object->error;

	// inititalize data
	$data = $object->data;

	// check error
	if ($error == 0 ) {

		include "app.php";	

	} else {

		include __DIR__ . "/../view/error.php";

	}
?>