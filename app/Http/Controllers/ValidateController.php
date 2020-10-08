<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terms;

class ValidateController extends Controller
{
    //
    public function __construct(){
        // make sure user udah sign in
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $terms = Terms::inRandomOrder()->first(); // coba doang
        // dd($donations);

        return view('layouts.validate', compact('terms'));
    }
}
