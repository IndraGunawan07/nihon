<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donations extends Model
{
    //
    use SoftDeletes;

    //define inverse relationship method 
    public function users(){
        return $this->belongsTo(User::class);
    }

    //define inverse relationship method 
    public function terms(){
        return $this->belongsTo(Terms::class);
    }
    
}
