<?php
	function update_number($nb=1) {
		$data = array("percent" => intval($nb), "duration_ms" => -1);                                                                    
		$data_string = json_encode($data);                                                                                   
		 
		$ch = curl_init('https://api-http.littlebitscloud.cc/devices/XXX/output');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");   
		//curl_setopt($ch, CURLOPT_VERBOSE, false);                                                                
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json',                                                                                
		    'Authorization: Bearer XXX',
		    'Accept: application/vnd.littlebits.v2+json')                                                                       
		);                                                                                                                   
		 
		$result = curl_exec($ch);
	}

	function get_velib_count() {
		$url = 'https://api.jcdecaux.com/vls/v1/stations/10025?contract=paris&apiKey=XXX';

		$json = file_get_contents($url);
		$data = json_decode($json,true);
		if (1) print_r($data);
		return $data['available_bikes'];
	}

	$nb = get_velib_count();
	echo "nombre de vélib => " . $nb . "\n";
	echo "UPDATE LITTLEBITS NUMBER\n";
	update_number($nb);
?>
