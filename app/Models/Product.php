<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;

    protected $fillable  	= ['name_en', 'name_ar', 'description_en', 'description_ar', 'price'];
    protected $hidden 	 	= ['created_at', 'updated_at'];

    public function images()
    {
    	return $this->hasMany(ProductImage::class);
    }

    public function vendor()
    {
    	return $this->belongsTo(Vendor::class);
    }
}
