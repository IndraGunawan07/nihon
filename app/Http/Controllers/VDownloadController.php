<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donations;
use Illuminate\Support\Facades\Auth;

class VDownloadController extends Controller
{
    //
     public function __construct(){
        // make sure user udah sign in
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // silahkan di code
        return view('administator.vdownload');
    }

    public function downloadLink(Request $request)
    {
        // dd($request);
        // dd($request->enddate);
        $downloadDate = date('Y-m-d h:i:s');
        $enddate = date('Y-m-d', strtotime($request->enddate . '+1 days'));
        // echo $enddate;
        $donations = Donations::all()->where('downladed_at', null)->where('created_at', '>=', $request->startdate)->where('created_at', '<=', $enddate);
        $arrayLength = $donations->count();
        // dd($donations);


        for($i=0;$i<$arrayLength;$i++)
        {
            // $donations[$i]->update([
            //     'downloaded_at' => $downloadDate,
            //     'downloaded_by' => Auth::user()->id
            // ]);
            
            $donate = Donations::where('id', $donations[$i]->id)->first();
            // dd($donate);
            $donate->downloaded_at = $downloadDate;
            $donate->downloaded_by = Auth::user()->id;
            $donate->save();
            // dd($donate);
        }
        
        $zip = new \ZipArchive;
        if($zip->open('download.zip', \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === TRUE)
        {
            for($i=0;$i<$arrayLength;$i++)
            {
                $zip->addFile('storage/sound/'.$donations[$i]->donation_file_url);
            }
            $zip->close();
            return response()->download('download.zip');
        }

        // for($i=0;$i<=$arrayLength;$i++)
        // {
        //     echo $donations[$i]->donation_file_url;
        // }
    }
}
