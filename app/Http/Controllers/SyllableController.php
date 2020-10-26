<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terms;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class SyllableController extends Controller
{
    public function __construct(){
        // make sure user udah sign in
        $this->middleware('auth');
        // $this->middleware('checkadmin');
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
        }else {
            // $terms = Terms::all()
            $terms = Terms::paginate(10);
            return view('administator.syllable', compact('terms'));
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       

    }

    private function validator(array $data)
    {
        return Validator::make($data,[
            'jws' => ['required', 'string', 'max:255','unique:terms,in_jws'],
            'rws' => ['required', 'string', 'max:255'],
            'bahasa_translation' => ['required', 'string', 'max:255'],
            'sound_file_url' => ['string', 'file|image|mimes:mp3|max:2048'],
            'bahasa' => ['string', 'max:255'],
        ]);
    }

    private function validatedit(array $data)
    {
        return Validator::make($data,[
            'jws' => ['required', 'string', 'max:255'],
            'rws' => ['required', 'string', 'max:255'],
            'bahasa_translation' => ['required', 'string', 'max:255'],
            'sound_file_url' => ['string', 'file|image|mimes:mp3|max:2048'],
            'bahasa' => ['string', 'max:255'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->bahasa);

        // Untuk validasi input
        $this->validator($request->all())->validate();
        // dd($request->all());
        $fileName = "sound_" . $request->fileupload->getClientOriginalName();
        Terms::create([
            'in_jws' => $request->jws,
            'in_rws' => $request->rws,
            'bahasa_translation' => $request->bahasa_translation,
            'bahasa' => $request->bahasa,
            'sound_file_url' => $fileName,
        ]);
        // Disimpan di file storage
        $request->fileupload->storeAs('sound', $fileName, 'public');
        $terms = Terms::where('in_jws', $request->jws)->first();
        // $user->is_locked = 0;
        $terms->save();
        $terms = Terms::paginate(10);

        return view('administator.syllable', compact('terms'))->with('success_crud', "Your Terms Has Been Created");
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
        dd($request->in_jws);
    }

    public function softdeleteterms(Request $request){
        // dd($request->in_jws);
        $deleted = Terms::where('in_jws', $request->in_jws)->first();
        // dd($deleted);
        $deleted->delete(); // untuk delete datanya
        $deleted->save(); // untuk deleted_by
        return back()->with("success_crud", "Your Terms Has Been Deleted");
    }

    public function updatesyllable(Request $request){
        // dd($request->all());
        $this->validatedit($request->all())->validate();

        $editterms = Terms::where('id', $request->id)->first();
        $editterms->update([
            'in_jws' => $request->jws,
            'in_rws' => $request->rws,
            'bahasa_translation' => $request->bahasa_translation,
            'bahasa' => $request->bahasa,
            // 'sound_file_url' => $fileName,
        ]);

        // Untuk cek apakah ada file yg di ubah
        if($request->hasFile('fileupload'))
        {
            $fileName = "sound_" . $request->fileupload->getClientOriginalName();
            $request->fileupload->storeAs('sound', $fileName, 'public');
            $editterms->update([
                'sound_file_url' => $fileName
            ]);
        }
        $editterms->save();
        return back()->with('success_crud', 'Your Terms Successfully Updated!');
    }
}
