<?php 

require '../libraries/Library.php';


class Data {

	public static function getData($type, $slug) {
		
		$lib = new Library();		
		
		$data = $type ."/". $slug;

		$response = $lib::get($data);
		
		return $response;

	}

}

?>