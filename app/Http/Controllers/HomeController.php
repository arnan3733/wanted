<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Allegate;
use App\Models\Report;

class HomeController extends Controller
{
    //
    public function index(){

        $allegates = Allegate::all('allegates_id', 'allegates_name');

        foreach($allegates as $key => $allegate){
            $report[] = Report::where('allegates_id', $allegate->allegates_id)->count();
            $allegate_name[] = $allegate->allegates_name;
        }
        $allegate_name;

        return view('home.index')->with('allegate_name', json_encode($allegate_name))->with('report', json_encode($report));
    }
}
