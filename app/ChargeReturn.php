<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chargeReturn extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'sanborns_id',
        'date',
        'import',
        'answer',
        'reference',
        'source',
        'type'
    ];

    protected $table = 'charges_returns';
}
