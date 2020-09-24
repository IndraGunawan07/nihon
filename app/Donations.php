<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{
    //

    //define inverse relationship method 
    public function users(){
        return $this->belongsTo(User::class);
    }

    //define inverse relationship method 
    public function terms(){
        return $this->belongsTo(Terms::class);
    }
    
}
