<?php 

// require __DIR__ . '/../vendor/autoload.php';

class library {

	public $endpoint;

	public $key;
	
	// init construct helper
	function __construct(){			
		
		// set endpoint
		// $this->endpoint = 'https://api-dev.managix.id/links/get';	

		// set this key token 	
		// $this->key = 'token=501a5212-c2c6-11e7-9cca-6045cbb5f75d';
	}


	function request($data) 

		// $slug = "toko.link/". $data;

		// $url = $this->endpoint .'?'. $this->key .'&url='. $slug;
			
		// $client = new \GuzzleHttp\Client();

		// $response = $client->get( $url );

		// $data = $response->getBody();

		$data = 'sadsa';

		var_dump($data);

		return $data;

	}

}

?>