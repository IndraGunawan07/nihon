<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Contents extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['reference_key', 'value', 'created_by', 'updated_by'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

}
