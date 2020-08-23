<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    //untuk direct ke page edit profile
    public function edit(Request $request){
        return view('edit',[
            'user' => $request->user()
        ]);
    }


    // untuk proses update profile
    public function update(UpdateProfileRequest $request){
        $request->user()->update(
            $request->all()
        );

        return redirect()->route('home')->with('success', "Your profile has been updated");
    }

    
}
