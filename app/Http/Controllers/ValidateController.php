<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terms;

class ValidateController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $terms = Terms::inRandomOrder()->first(); // coba doang
        // dd($terms);
        return view('layouts.validate', compact('terms'));
    }
}
