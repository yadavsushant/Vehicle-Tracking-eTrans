<?php
function get_etrans_tracking()
{
	$url="https://etranssolutions.com/eTransRestApi/reports/location";
	$username=XXXXX;
	$password=XXXXX;
	$content_type='application/json';

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_HTTPHEADER => array(
			"Content-Type: ".$content_type,
			"password: ".$password,
			"username: ".$username
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		$response = json_decode($response);
		for($i=0;$i<count($response->result);$i++){
			$vehicleNo = $response->result[$i]->vehicleNo;
			$entityName = $response->result[$i]->entityName;
			$timestamp = $response->result[$i]->timestamp;
			$latitude = $response->result[$i]->latitude;
			$longitude = $response->result[$i]->longitude;
			$speed = $response->result[$i]->speed;
			$distance = $response->result[$i]->distance;
			$angle = $response->result[$i]->angle;
			$message = $response->result[$i]->message;
			$battery = $response->result[$i]->battery;
		}	
	}
}
