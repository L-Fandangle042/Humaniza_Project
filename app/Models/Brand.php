<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'id',
        'brand',
        'variety',
    ];

    protected $rules = [
        'brand' => 'required|string',
        'variety' => 'required|string',
    ];
}
