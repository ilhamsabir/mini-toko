<?php

	require_once __DIR__ . '/../vendor/autoload.php';

	class controller{

		public $main_domain;

		public $endpoint;

		public $key;

		// init construct helper
		function __construct(){

			// main domain
			$this->main_domain = "toko.link/";

			// set endpoint
			$this->endpoint = 'https://api-dev.managix.id/links/get';

			// set this key token
			$this->key = 'token=501a5212-c2c6-11e7-9cca-6045cbb5f75d';
		}

		function get($type, $slug){

			// set param
			$param = $this->main_domain . $type ."/". $slug;

			// set url to request using guzzle
			$url = $this->endpoint .'?'. $this->key .'&url='. $param;

			// set clien guzzle
			$client = new \GuzzleHttp\Client();

			// request using guzzle
			$request = $client->get( $url );

			// response requesy guzle
			$response = $request->getBody();

			// encode response
			$object = json_decode($response);

			include __DIR__ . "/../system/init.php";
		}

		function __destruct(){
		}
	}
?>