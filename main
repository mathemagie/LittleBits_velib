<?php
	function blink_led() {
		$data = array("percent" => "100", "duration_ms" => "10000");                                                                    
		$data_string = json_encode($data);                                                                                   
		 
		$ch = curl_init('https://api-http.littlebitscloud.cc/devices/DEVICEID/output');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");   
		curl_setopt($ch, CURLOPT_VERBOSE, false);                                                                
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json',                                                                                
		    'Authorization: Bearer XXXXXXXX',
		    'Accept: application/vnd.littlebits.v2+json')                                                                       
		);                                                                                                                   
		 
		$result = curl_exec($ch);
	}

	function get_velib_count() {
		$ch_velib= curl_init('http://mathemagie.net/projects/velib/index.php');                                                                      
		curl_setopt($ch_velib, CURLOPT_RETURNTRANSFER, true); 
		$return = curl_exec($ch_velib);
		return $return;
	}

	$nb = get_velib_count();
	echo "nombre de vélib => " . $nb . "\n";
	if (intval($nb) >= 1) {
		echo "BLINK LED ON\n";
		blink_led();
	}
?>
