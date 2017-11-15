<?php
	
	include ("controller/controller.php");
	
	// type
	$type   = $_GET['type'];

	// slug
	$slug   = $_GET['slug'];
	
	$main = new controller();
	
	$main->get($type, $slug);
?>