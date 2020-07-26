<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    public $guarded = [];
    
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
