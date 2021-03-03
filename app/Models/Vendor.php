<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Lang;

class Vendor extends Model
{
	use SoftDeletes;

	// public $translatable = ['name'];
	protected $fillable = ['name_en', 'name_ar', 'services', 'logo', 'ecommerce_store_details', 'contractor_details', 'heavy_truck_details'];
	protected $hidden 	= ['user_id', 'created_at', 'updated_at', 'deleted_at'];
	protected $casts 	= ['services'];

	const YES 				= 1;
	const NO 				= 0;
	const NOT_AVAILABLE     = 'Not-Available';
	const AVAILABLE         = 'Available';

	public function user()
	{
		return $this->hasOne(User::class);
	}

	public function getLocaleName()
	{
		$lang = Lang::getLocale();
		if ($lang == 'ar') {
			return $this->name_ar;
		}
		return $this->name_en;
	}
}
