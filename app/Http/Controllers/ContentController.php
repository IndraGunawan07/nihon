<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contents;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    //
    public function __construct(){
        // make sure user udah sign in
        // $this->middleware('checkadmin');
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
        if(Auth::user()->role !== 'Admin'){
            abort(404);
            // TESTING
        } else {
            $content = Contents::all(); // coba doang
            // dd($terms);
            return view('administator.content', compact('content'));
        }
        
    }

    
    public function contentupdate(Request $request)
    {
        $editcontent = Contents::where('id', $request->id)->first();
        $editcontent->update([
            'reference_key' => $request->rkey,
            'value' => $request->value,
            'updated_by' => Auth::user()->id,
        ]);
        $editcontent->save();

        // redirect 
        return back()->with('success_crud', "This Content Has Heen Updated.");
    }
}

