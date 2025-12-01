<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status_Update extends Model
{
    protected $fillable = [
        'id',
        'reportId',
        'newStatus',
        'date',
        'notes',
        'adminId'
    ];
    
    protected function casts(): array
    {
        return [
            'id' => 'int',
            'reportId' => 'int',
            'newStatus' => 'string',
            'date' => 'string',
            'notes' => 'string',
            'adminId' => 'int'
        ];
    }
}
