<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'name_en', 'name_ar', 'area', 'block', 'street', 'building', 'floor', 'civil_id', 'other'
    ]; 

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
