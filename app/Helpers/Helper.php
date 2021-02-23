<?php

namespace App\Helpers;
use Illuminate\Support\Facades\File;

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

	/* delete/remove image or attachment from directory */
	public static function deleteAttachment($attachment)
	{
		$attachment_path = public_path().'/storage/'.$attachment;
        $attachment_path = str_replace('/', "\\", $attachment_path);
//         dd($attachment_path);
        // dd(File::exists($attachment_path));
        if(File::exists($attachment_path)) {
        	File::delete($attachment_path);

        	return true;
        } else {
        	return false;
        }
	}

	public static function getImage($image)
	{
		if($image == null){
			return null;
		}

		$image_path = Config('app.image_base_url').$image;
		return $image_path;
	}
}
