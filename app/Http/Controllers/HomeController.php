<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Allegate;
use App\Models\Report;
use App\Models\Division;

class HomeController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $allegates = Allegate::all('allegates_id', 'allegates_name');

        foreach($allegates as $key => $allegate){
            $report1[] = Report::where('allegates_id', $allegate->allegates_id)->count();
            $allegate_name[] = $allegate->allegates_name;
        }

        $divisions = Division::all('divisions_id', 'divisions_shortname');
        
        foreach($divisions as $key => $division){
            $report2[] = Report::where('divisions_id', $division->divisions_id)->count();
            $division_name[] = $division->divisions_shortname;
        }

        $total_report = Report::all()->count(); //Total Report
        $total_detect = Report::where('detect_status', 'ประกาศสืบจับแล้ว')->count();

        // dd($division_name);

        // return response()->json($allegate_name);
        
        return view('home.index', compact('total_report', 'total_detect'))->with('allegate_name', json_encode($allegate_name))->with('report1', json_encode($report1))->with('division_name', json_encode($division_name))->with('report2', json_encode($report2));
    }
}
