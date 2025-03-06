<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'id',
        'question',
        'type',
    ];

    protected $rules = [
        'question' => 'required|string',
        'type' => 'required|string',
    ];
}
