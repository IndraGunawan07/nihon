<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terms;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class SyllableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $terms = Terms::all();
        return view('administator.syllable', compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       

    }

    private function validator(array $data)
    {
        return Validator::make($data,[
            'jws' => ['required', 'string', 'max:255','unique:terms,in_jws'],
            'rws' => ['required', 'string', 'max:15'],
            'bahasa_translation' => ['required', 'string', 'max:255'],
            'sound_file_url' => ['string', 'max:255'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->translate);
        // Untuk validasi input
        $this->validator($request->all())->validate();
        Terms::create([
            'in_jws' => $request->jws,
            'in_rws' => $request->rws,
            'bahasa_translation' => $request->bahasa_translation,
            'sound_file_url' => "shdadak",
        ]);
        $terms = Terms::where('in_jws', $request->jws)->first();
        // $user->is_locked = 0;
        $terms->save();

        return back()->with('success', "Your Terms has been created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        dd($request->in_jws);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $id)
    {
        //
        
    }

    public function softdeleteterms(Request $request){
        // dd($request->in_jws);
        $deleted = Terms::where('in_jws', $request->in_jws)->first();
        // dd($deleted);
        $deleted->delete();
        return back();
    }
}
