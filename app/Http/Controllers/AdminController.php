<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // Log::info();
        // $users = User::where('role', '!=', auth()->id())->get(); untuk user curr gk ikut
        $users = User::where('role', '!=', 'Admin')->get();
        return view ('administator.index',compact('users'));
    }

    public function approve(Request $request)
    {
        $user = User::where('username', $request->user)->first();
        $user->is_locked = 0;
        $user->save();
        return back();
    }

    protected function validator(array $data)
    {
        return Validator::make($data,[
            'username' => ['required', 'string', 'max:255','unique:users,username'],
            'role' => ['string', 'max:15'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'secret_answer' => ['required', 'string', 'max:255'],
            'secret_question' => ['required', 'string', 'max:2024'],
        ]);
    }

    protected function editValidator(array $data)
    {
        return Validator::make($data,[
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'secret_answer' => ['required', 'string', 'max:255'],
            'secret_question' => ['required', 'string', 'max:2024'],
        ]);
    }

    public function addUser(Request $request)
    {
        //dd($request->fileupload->getClientOriginalName());
        $this->validator($request->all())->validate();
        User::create([
            'username' => $request->username,
            'role' => "Contributor",
            'remember_token' => Str::random(60),
            'password' => Hash::make($request->password),
            'secret_answer' => $request->secret_answer,
            'secret_question' => $request->secret_question
        ]);
        $user = User::where('username', $request->username)->first();
        $user->is_locked = 0;
        if($request->hasFile('fileupload'))
        {
            $fileName = $request->fileupload->getClientOriginalName();
            $request->fileupload->storeAs('images', $fileName, 'public');
            $user->update([
                'imageUrl' => $fileName
            ]);
        }
        $user->save();
        return back()->with('success', 'User Successfully Added');
    }

    public function deleteUser(Request $request)
    {
        $user = User::where('username', $request->user)->first();
        $user->delete();
        return back();
    }

    public function editUser(Request $request)
    {
        $this->editValidator($request->all())->validate();
        //dd($request);
        $editedUser = User::where('username', $request->username);
        $editedUser->update([
            'password' => Hash::make($request->password),
            'secret_question' => $request->secret_question,
            'secret_answer' => $request->secret_answer
        ]);
        
        return back()->with('success', 'User Successfully Updated!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
