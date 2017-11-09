<?php

require '../config.php';

require '../controllers/LinkController.php';

require '../init.php';

include 'partial/header.php';


if ($redirect == "true") { 

	include './content/redirect.php';

} else { 

	include './content/click.php';

} 

include 'partial/footer.php'; 

?>
