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
        // user is_locked udah 0
        
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
            // $notification = array(
            //     'message' => 'Post created successfully!',
            //     'alert-type' => 'warning',
            //     'positionClass' => 'toast-top-center',
            // );
            return redirect("/")->with('not_authorized', "Sorry you don't have access");
        }
        else {
            // get one random record
            // User::inRandomOrder()->first();
            // $terms = Terms::inRandomOrder()->first(); ini random
            $terms = Terms::inRandomOrder()->first(); // coba doang
            // dd($terms);
            return view('layouts.contribute', compact('terms'));
        }
    }

    public function saveAudio(Request $request)
    {
        // Untuk input
        // $request->fileupload->getClientOriginalName();
        // dd($request->id);
        $files = $request->file('audio');
        $fileName = Auth::user()->username . "_" . $request->rws . "_" . date('Ymd_his') . ".mp3";
        Donations::create([
            'user_id' => Auth::user()->id,
            'terms_id' => $request->id,
            'donation_file_url' => $fileName,
        ]);
        $files->storeAs('sound', $fileName , 'public');
        // $files->storeAs('sound', 'test.mp3', 'public');
        return view('auth.login');
        // dd($request);
        // $user->save();
    }

}
