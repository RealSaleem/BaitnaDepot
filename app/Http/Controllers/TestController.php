<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
	public function getColors()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL 				=>	"https://raw.githubusercontent.com/cheprasov/json-colors/master/colors.json",
			CURLOPT_RETURNTRANSFER 		=> 	true,
			CURLOPT_ENCODING 			=> 	"",
			CURLOPT_MAXREDIRS 			=> 	10,
			CURLOPT_TIMEOUT 			=> 	30,
			CURLOPT_HTTP_VERSION 		=> 	CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST 		=> 	"GET",
			CURLOPT_SSL_VERIFYHOST		=>  0,
			CURLOPT_SSL_VERIFYPEER		=>  0,
			CURLOPT_HTTPHEADER 			=> 	array(
										    "cache-control: no-cache",
										    "postman-token: b8bed61e-24be-1d80-35a2-14d6c3ae8709"
									  	),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		$data = [];
		if ($err) {
			$data['success'] 	= false;
			$data['response']	= "cURL Error #:" . $err;
		  // echo "cURL Error #:" . $err;
		} else {
			$data['success'] 	= true;
			$data['colors']	= json_decode($response);

		  // echo $response;
		}
		// dd(json_decode($data['response'])->colors);
		
		return $data;
	}
}
