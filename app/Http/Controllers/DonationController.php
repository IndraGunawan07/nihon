<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donations;
use Illuminate\Support\Facades\Auth;


class DonationController extends Controller
{
    
    //
    public function __construct(){
        // make sure user udah sign in
        $this->middleware('auth');
        $this->middleware('checkadmin');
    }

    /* Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $donation = Donations::all(); // coba doang
       // dd($terms);
       return view('administator.donation', compact('donation'));
   }

   public function destroy(Request $request, $id){
        // dd($id);
        $donation = Donations::where('id', $request->id)->first();
        $donation->deleted_by = Auth::user()->id;
        $donation->delete();
        $donation->save();
        return back();
   }
}
