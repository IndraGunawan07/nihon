<?php

namespace App\Http\Controllers;

use App\User;
use App\Terms;
use App\Donations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function __construct(){
        // make sure user sudah sign in dan dia admin
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // untuk cek apakah role user adalah admin
        if(Auth::user()->role !== 'Admin'){
            abort(404);
        } else {
            $users = User::where('role', '!=', 'Admin')->get()->count();
            $terms = Terms::all()->count();
            $valdonation = Donations::where('is_valid', '!=', false)->get()->count();
            $donation = Donations::where('is_valid', '==', false)->get()->count();
            return view ('administator.home',compact(['users', 'terms', 'valdonation', 'donation']));
        }
    }

    public function showuser()
    {
        //
        $users = User::where('id', '!=', auth()->id())->get(); //untuk user curr gk ikut
        return view ('administator.index',compact('users'));
    }

    public function approveContributor(Request $request)
    {   
        // dd($request->user);
        $user = User::where('username', $request->user)->first();
        $user->is_locked = 0;
        $user->save();
        return back()->with("success_crud", $request->user . ' Has Been Approved as Contributor');
    }

    public function approveValidator(Request $request)
    {   
        // dd($request->user);
        $user = User::where('username', $request->user)->first();
        $user->role = "Validator";
        $user->save();
        return back()->with("success_crud", $request->user . ' Has Been Approved as Validator');
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
        $user->created_by = Auth::user()->id;
        if($request->hasFile('fileupload'))
        {
            $fileName = $request->fileupload->getClientOriginalName();
            $request->fileupload->storeAs('images', $fileName, 'public');
            $user->update([
                'imageUrl' => $fileName
            ]);
        }
        $user->save();
        return back()->with('success_crud', $request->username . ' Successfully Added');
    }

    public function deleteUser(Request $request)
    {
        $user = User::where('username', $request->user)->first();
        $user->deleted_by = Auth::user()->id;
        $user->delete();
        return back()->with("success_crud", $request->user . ' Has Been Deleted');
    }

    public function editUser(Request $request)
    {
        $this->editValidator($request->all())->validate();
        //dd($request);
        $editedUser = User::where('username', $request->username)->first();
        $editedUser->update([
            'password' => Hash::make($request->password),
            'secret_question' => $request->secret_question,
            'secret_answer' => $request->secret_answer
        ]);
        $editedUser->updated_by = Auth::user()->id;
        if($request->hasFile('fileupload'))
        {
            $fileName = $request->fileupload->getClientOriginalName();
            $request->fileupload->storeAs('images', $fileName, 'public');
            $editedUser->update([
                'imageUrl' => $fileName
            ]);
        }
        $editedUser->save();
        
        return back()->with('success_crud',  $request->username . ' Successfully Updated!');
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
