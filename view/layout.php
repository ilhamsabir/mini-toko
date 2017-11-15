<?php 

// sset header
include "header.php"; 
	
// set content by redirect
if ($redirect == "true") { 

	include 'content/redirect.php';

} else { 

	include 'content/click.php';

} 

// set footer
include "footer.php"; 

?>