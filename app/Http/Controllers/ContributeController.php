<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Terms;
use App\Donations;

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
        // Cek apakah user status udah di acc
        if(Auth::user()->is_locked === 1 || Auth::user()->role !== "Contributor"){
            return redirect("/")->with('not_authorized', "Sorry you don't have access");
        }
        else {
            $terms = Terms::inRandomOrder()->first(); // random data
            return view('layouts.contribute', compact('terms'));
        }
    }

    public function saveAudio(Request $request)
    {
        // Untuk input data sound
        $files = $request->file('audio');
        $fileName = Auth::user()->username . "_" . $request->rws . "_" . date('Ymd_his') . ".mp3";
        Donations::create([
            'user_id' => Auth::user()->id,
            'terms_id' => $request->id,
            'donation_file_url' => $fileName,
        ]);
        $files->storeAs('sound', $fileName , 'public');
        return view('auth.login');
    }

}
