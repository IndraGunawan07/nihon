<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donations;
use Illuminate\Support\Facades\Auth;
use App\User;


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
       // $donation = Donations::with('users')->with('terms')->get(); udah oke
       $donation = Donations::with('users')->with('terms')->paginate(5);
       return view('administator.donation', compact('donation'));
   }

   public function destroy(Request $request, $id){
        // dd($id);
        $donation = Donations::where('id', $request->id)->first();
        $donation->deleted_by = Auth::user()->id;
        $donation->delete();
        $donation->save();
        return back()->with("success_crud", "This Donations Has Been Deleted");
   }
}
