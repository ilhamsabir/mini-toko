<?php 

require '../vendor/autoload.php';

class Link {

	public static $ENDPOINT = 'https://api-dev.managix.id/links/get';	

	public static $APPKEY = 'token=501a5212-c2c6-11e7-9cca-6045cbb5f75d';

	public static function get($data) {

		$endpoint = self::$ENDPOINT;

		$key = self::$APPKEY;

		$slug = "toko.link/". $data;

		$url = $endpoint .'?'. $key .'&url='. $slug;
		
		$client = new \GuzzleHttp\Client();

		$response = $client->get( $url );

		$data = $response->getBody();

		return $data;

	}

}

?>