<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VDownloadController extends Controller
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
        // silahkan di code
        return view('administator.vdownload');
    }
}
