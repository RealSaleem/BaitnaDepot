<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
	use HasTranslations;
    
    protected $fillable  	= ['title', 'description', 'type'];
    protected $hidden 	 	= ['created_at', 'modified_at' ];
    public    $translatable = ['title', 'description'];
}
