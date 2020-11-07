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
        // code here
        return view('administator.vdownload');
    }

    public function downloadLink(Request $request)
    {
        $downloadDate = date('Y-m-d h:i:s');
        $enddate = date('Y-m-d', strtotime($request->enddate . '+1 days'));
        $donations = Donations::all()->where('downladed_at', null)
                                     ->where('created_at', '>=', $request->startdate)
                                     ->where('created_at', '<=', $enddate)
                                     ->where('is_valid', 1);
        $arrayLength = $donations->count();
        if($arrayLength < 1)
        {
            return back()->with('empty', 'No downloadable data available for that date range');
        }

        foreach($donations as $donate)
        {
            $donate->downloaded_at = $downloadDate;
            $donate->downloaded_by = Auth::user()->id;
            $donate->save();
        }
        
        $zip = new \ZipArchive;
        if($zip->open('download.zip', \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === TRUE)
        {
            foreach($donations as $donate)
            {
                $zip->addFile('storage/sound/'.$donate->donation_file_url);
            }
            $zip->close();
            return response()->download('download.zip');
        }
    }
}
