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
        $content = Contents::all(); // coba doang
        // dd($terms);
        return view('administator.content', compact('content'));
    }


    public function contentupdate(Request $request)
    {
        //
        // dd($request);
        $editcontent = Contents::where('id', $request->id)->first();
        // dd($editcontent);
        $editcontent->update([
            'reference_key' => $request->reference_key,
            'value' => $request->value,
            'updated_by' => Auth::user()->id,
        ]);
        $editcontent->save();

        // redirect jan lupa
        return back()->with('success', "Your question has been updated.");
    }

    public function destroy(Request $request, $id){
        // dd($id);
        $content = Contents::where('id', $request->id)->first();
        $content->deleted_by = Auth::user()->id;
        $content->delete();
        return back();
   }

}

