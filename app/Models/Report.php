<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
       'id',
       'title',
       'latitude',              
       'longitude',
       'description',
       'category',
       'date',
       'userId',
       'status',
       'image',
       'image_mime'
    ];

    protected function casts(): array
    {
        return [
            'id' => 'int',
            'title' => 'string',
            'latitude' => 'float',              
            'longitude' => 'float',
            'description' => 'string',
            'category' => 'string',
            'date' => 'datetime',
            'userId' => 'int',
            'status' => 'string',
            'image' => 'string',
            'image_mime' => 'string'
        ];
    }
}
