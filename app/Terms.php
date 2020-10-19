<?php

namespace App;

use App\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Terms extends Model
{
    //
    use SoftDeletes;
    use Blameable; 

    protected $fillable = ['in_jws', 'in_rws', 'bahasa_translation','sound_file_url', 'bahasa'];

    protected $dates = ['deleted_at', 'created_at'];

    protected $hidden = ['in_jws'];

    // define relationship method 
    public function donations(){
        return $this->hasMany(Donations::class);
    }


}
