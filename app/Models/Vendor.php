<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Vendor extends Model
{
    use HasTranslations;
	use SoftDeletes;

	protected $fillable  	= ['name', 'services', 'logo', 'ecommerce_store_details', 'contractor_details', 'heavy_truck_details'];
    protected $hidden 	 	= ['user_id', 'created_at', 'modified_at', 'deleted_at'];
    public    $translatable = ['name'];


    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
