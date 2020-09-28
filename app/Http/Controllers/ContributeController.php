<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Terms;
use App\Donations;
use Illuminate\Support\Facades\Auth;

class ContributeController extends Controller
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
        // get one random record
        // User::inRandomOrder()->first();
        // $terms = Terms::inRandomOrder()->first(); ini random
        $terms = Terms::inRandomOrder()->first(); // coba doang
        // dd($terms);
        return view('layouts.contribute', compact('terms'));
    }

    public function saveAudio(Request $request)
    {
        // Untuk input
        Donations::create([
            'user_id' => Auth::user()->id,
            'term_id' => $request->id,
            'donation_file_url' => 'test.mp3'
        ]);
        $files = $request->file('audio');
<<<<<<< HEAD
        $fileName = "test.mp3";
        $files->storeAs('sound', $fileName, 'public');
=======
        $files->storeAs('sound', 'test.mp3', 'public');
        
        // dd($request);
        // $user->save();

        
        

        
>>>>>>> 1d77d3d86fc9eb03c9872f71c7b7319b207be51f
    }

}
