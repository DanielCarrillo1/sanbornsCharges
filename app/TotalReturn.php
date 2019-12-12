<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class totalReturn extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'sanborns_id',
        'total',
        'import'
    ];

    protected $table = 'total_returns';
}
