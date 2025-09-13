<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CronData extends Model
{
    protected $fillable = ['name', 'created_at'];
    public $timestamps = false;

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
