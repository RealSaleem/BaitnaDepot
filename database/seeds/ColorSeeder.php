<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$all_colors = $this->getColors();
    	
    	if($all_colors['success']){
	    	$all_colors = json_decode($all_colors['response']);
	    	DB::table('colors')->truncate();
	    	foreach ($all_colors as $color) {
		        DB::table('colors')->insert([
		            'name'				=> $color->name,
		            'hex_code'          => $color->hex,
		            'created_at'        => \Carbon\Carbon::now(),
		            'updated_at'        => \Carbon\Carbon::now()
		        ]);
	    	}
    	}
    }

    private function getColors()
    {

    	$curl = curl_init();

		curl_setopt_array($curl, array(
			// CURLOPT_URL 				=>	"https://api.color.pizza/v1/",
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
			$data['response']	= $response;

		  // echo $response;
		}

		return $data;
    }
}
