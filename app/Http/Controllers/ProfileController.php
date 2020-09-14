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
        dd($request);
        // if($request->hasFile('fileupload'))
        // {
        //     $fileName = $request->fileupload->getClientOriginalName();
        //     $request->fileupload->storeAs('images',$filename,'public');
        // }
        // $request->user()->update(
        //     $request->all()
        // );

        // return redirect()->route('homepage')->with('success', "Your profile has been updated");
    }

    
}
