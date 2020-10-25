<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donations extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['donation_file_url', 'user_id', 'terms_id'];

    //define inverse relationship method 
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //define inverse relationship method 
    public function terms(){
        return $this->belongsTo(Terms::class);   
    }
    
}
