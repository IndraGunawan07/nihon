<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct(){
        // make sure user udah sign in
        $this->middleware('auth');
    }
    
    //untuk direct ke page edit profile
    public function edit(Request $request){
        return view('edit',[
            'user' => $request->user()
        ]);
    }

    // untuk proses update profile
    public function update(UpdateProfileRequest $request){
        $user = User::where('id', $request->id)->first();
        if($request->hasFile('avatar'))
        {
           $fileName = date('Ymd') . "." . $request->avatar->getClientOriginalName();
            $request->avatar->storeAs('images',$fileName,'public');
            $user->update([
                'imageUrl' => $fileName
            ]);
        }
        $user->update($request->all());
        return redirect()->route('homepage')->with('success_update', "Your profile has been updated");
    }

    public function editpass(Request $request){
        // dd($request->user);
        return view('editpas',[
            'user' => $request->user()
        ]);
    }

    public function updatepass(Request $request)
    {
        if($request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]))
        {
            $user = User::where('username', $request->username)->first();
            $user->password = Hash::make($request->password);
            $user->save();
        }
        return redirect('/')->with('success_update', "Your password has been changed");
    }
    
}
