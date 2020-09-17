<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terms;

class ContributeController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get one random record
        // User::inRandomOrder()->first();
        $terms = Terms::inRandomOrder()->first();
        // $terms = Terms::whereId(22)->first();
        // dd($terms);
        return view('layouts.contribute', compact('terms'));
    }
}
