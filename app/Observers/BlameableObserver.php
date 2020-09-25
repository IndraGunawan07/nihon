<?php

namespace App\Observers;

use App\Terms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BlameableObserver
{
    public function updating(Terms $model)
    {
        $model->updated_by = Auth::user()->id;
    }
    
    public function creating(Terms $model)
    {   
        $model->created_by = Auth::user()->id;
        $model->updated_by = Auth::user()->id;
    }

    public function deleting(Terms $model){
        $model->deleted_by = Auth::user()->id;
    }
}