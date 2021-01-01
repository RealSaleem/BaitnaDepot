<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Truck extends Model
{
	use HasTranslations;
    use SoftDeletes;

    protected $fillable  	= ['name', 'sort'];
    protected $hidden 	 	= ['created_at', 'modified_at', 'deleted_at'];
    public $translatable 	= ['name'];

}
