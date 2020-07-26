<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public $guarded = [];
    
    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}
