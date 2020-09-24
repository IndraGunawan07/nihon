<?php

namespace App\Observers;

// use App\Terms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BlameableObserver
{
    public function updating(Model $model)
    {
        $model->updated_by = Auth::user()->id;
    }
    
    public function creating(Model $model)
    {   
        $model->created_by = Auth::user()->id;
        $model->updated_by = Auth::user()->id;
    }

    public function deleting(Model $model){
        $model->deleted_by = Auth::user()->id;
    }
}