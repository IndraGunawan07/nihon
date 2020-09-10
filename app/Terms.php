<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Terms extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['in_jws', 'in_rws', 'bahasa_translation','sound_file_url'];

    protected $dates = ['deleted_at'];

    protected $hidden = ['in_jws'];


}
