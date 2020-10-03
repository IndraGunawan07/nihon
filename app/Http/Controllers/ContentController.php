<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    //
    public function __construct(){
        // make sure user udah sign in
        $this->middleware('checkadmin');
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
        // $terms = Terms::inRandomOrder()->first(); // coba doang
        // dd($terms);
        return view('administator.content');
    }
}

