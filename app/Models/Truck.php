<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Truck extends Model
{
    use SoftDeletes;

    protected $fillable  	= ['name_en', 'name_ar', 'sort'];
    protected $hidden 	 	= ['created_at', 'modified_at', 'deleted_at'];

}
