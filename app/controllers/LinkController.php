<?php 

require '../libraries/Link.php';


class Data {

	public static function getData($type, $slug) {
		
		$link = new Link();		
		
		$data = $type ."/". $slug;

		$response = $link::get($data);
		
		return $response;

	}

}

?>