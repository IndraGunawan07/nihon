<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Terms;
use App\Donations;

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
        // Cek user valid 
        if(Auth::user()->role !== "Validator" || Auth::user()->is_locked === 1){
            // toastr()->add('Add message here');
            return redirect("/")->with("not_authorized", "Sorry you don't have access");
        }
        else {
            // $terms = Terms::inRandomOrder()->first(); // coba doang
            // $donations = Donations::inRandomOrder()->first();
            $donations = Donations::where('is_valid', 0)->where('validate_at', null)->inRandomOrder()->first();
            $terms = $donations->Terms;
            // $terms = Terms::inRandomOrder()->first();
            // $donations = $terms->Donations->where('is_valid', 0)->where('validate_at', null)->first();
            // dd($terms);

            return view('layouts.validate', compact('terms', 'donations'));
        }
        
    }

    public function validation(Request $request)
    {
        $donation_id = $request->donation_id;
        $updateValid = Donations::where('id', $donation_id);
        if($request->has('yes'))
        {
            $updateValid->update([
                'validate_at' => date('ymd'),
                'validated_by' => Auth::user()->id,
                'is_valid' => 1
            ]);
            return redirect('/')->with('success_update',"Thanks for validating our voice");
        }
        else
        {
            // $updateValid->update([
            //     'validate_at' => date('ymdhms'),
            //     'validated_by' => Auth::user()->id,
            //     'is_valid' => 0
            // ]);
            return redirect('/')->with('success_update',"Thanks for validating our voice");

        }
    }
}
