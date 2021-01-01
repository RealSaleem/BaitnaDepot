<?php

namespace App\Helpers;

Class Helper {

	public static function getFormatedDate($datetime){
		$date = date("d-m-Y", strtotime($datetime));
        return $date;
	}

	public static function getFormatedDateTime($datetime){
		$dateTime = date("d-m-Y h:i A", strtotime($datetime));
        return $dateTime;
	}

	public static function getAllServices(){
		return [
			'1' => 'Ecommerce',
			'2' => 'Contractor',
			'3' => 'Heavy Trucks'
		];	
	}
	
	/*
		@param = Service ID
		@return Service Name 
	*/
	public static function getServiceName($service){
        $serviceName = null;

        switch ($service) {
		  case 1:
		    $serviceName = trans('site.ecommerce');
		    break;
		  case 2:
		    $serviceName = trans('site.contractor');
		    break;
		  case 3:
		    $serviceName = trans('site.heavy_trucks');
		    break;
		  default:
		    $serviceName;
		}

		return $serviceName;
	}
} 