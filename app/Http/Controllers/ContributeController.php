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
        // $terms = Terms::inRandomOrder()->first(); ini random
        $terms = Terms::inRandomOrder()->first(); // coba doang
        // dd($terms);
        return view('layouts.contribute', compact('terms'));
    }

    public function saveAudio(Request $request)
    {
        dd($request);
        $files = $request->file('audio');
        dd($files);
        // $request->user()->donations()->create($request);
        // $files->storeAs('sound', 'test.mp3', 'public');
    }

}
