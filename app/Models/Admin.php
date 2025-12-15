<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    //
    protected $fillable = [
        'id',
        'email',
        'password',
        'profile_image',
        'profile_image_mime',
        'specimen_signature',
        'card_id'
    ];

    protected $hidden = [
    ];

    protected function casts(): array
    {
        return [
            'id' => 'int',
            'email' => 'string',
            'card_id' => 'string',
            'password' => 'hashed',
            'profile_image' => 'string',
            'profile_image_mime' => 'string',
            'specimen_signature' => 'string'
        ];
    }
}
