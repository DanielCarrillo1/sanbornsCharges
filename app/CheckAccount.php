<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class checkAccount extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'sanborns_id'
    ];

    public function returns()
    {
        return $this->hasOne(TotalReturn::class,'sanborns_id', 'sanborns_id');
    }

    public function charges()
    {
        return $this->hasOne(TotalCharge::class,'sanborns_id', 'sanborns_id');
    }

    public function users()
    {
        return $this->hasOne(User::class, 'sanborns_id', 'sanborns_id');
    }

    protected $table = 'check_accounts';
}
