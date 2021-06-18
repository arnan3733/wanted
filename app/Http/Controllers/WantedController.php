<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Allegate;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;


class WantedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Table with Related
        $reports = Report::with('allegate')->with('division')->get();

        //Table
        // $reports = Report::all();
        return view('wanted.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  
        $divisions = Division::all();
        $allegates = Allegate::all();
        return view('wanted.add', compact('divisions','allegates'));
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
        // dd($request->all());
        if($request->hasFile('filename')){
            $rawfilename = $request->file('filename');
            foreach($rawfilename as $value){
                $filename = $value->store('upload/wanteds/', 'public');
            }
        } else{
            $filename = 'ยังไม่ได้อัพโหลดไฟล์';
        }

        $report = new Report([
            'divisions_id' => $request->get('divisions_id'),
            'wanted_number' => $request->get('wanted_number'),
            'accused_name' => $request->get('accused_name'),
            'accused_id_card' => $request->get('accused_id_card'),
            'allegates_id' => $request->get('allegates_id'),
            'court_office' => $request->get('court_office'),
            'prosecutor_office' => $request->get('prosecutor_office'),
            'date_issue' => $request->get('date_issue'),
            'expiration_date' => $request->get('expiration_date'),
            'expiration_type' => $request->get('expiration_type'),
            // 'detect_date' => $request->get('detect_date'),
            // 'detect_status' => $request->get('detect_status'),
            // 'withdraw_case_date' => $request->get('withdraw_case_date'),
            // 'withdraw_case_status' => $request->get('withdraw_case_status'),
            // 'arrest_date' => $request->get('arrest_date'),
            // 'arrest_status' => $request->get('arrest_status'),
            'case_id' => $request->get('case_id'),
            'assignment_number' => $request->get('assignment_number'),
            'authority_name' => $request->get('authority_name'),
            'authority_contact' => $request->get('authority_contact'),
            'attachment_file' => $filename,
        ]);
        
        // dd($report);
        $report->save();
        return redirect()->route('wanted.index')->with('success', 'บันทึกข้อมูลรายงานผลสำเร็จแล้ว');

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
        $report = Report::findOrFail($id);
        $allegates = Allegate::all();
        $divisions = Division::all();
        return view('wanted.edit', compact('report', 'allegates', 'divisions'));
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
        $report = Report::findOrFail($id);
        // $report = Report::where('news_type', $news_type)->where('status', 'enable')->count();

        // $sql = "Select * from content_table where `news_type` = {$news_type} and `status` = 'enable' ";
        // $query = mysqli_query($sql);
        // $row = mysqli_rows($query);
        if($request->hasFile('filename')){
            $rawfilename = $request->file('filename');
            foreach($rawfilename as $value){
                $filename = $value->store('upload/wanteds/', 'public');
            }
            if($report->attachment_file <> 'ยังไม่ได้อัพโหลดไฟล์'){
                Storage::disk('public')->delete($report->attachment_file);
            }
        } else {
            $filename = 'ยังไม่ได้อัพโหลดไฟล์';
        }
        
        $report->divisions_id = $request->get('divisions_id');
        $report->wanted_number = $request->get('wanted_number');
        $report->accused_name = $request->get('accused_name');
        $report->accused_id_card = $request->get('accused_id_card');
        $report->allegates_id = $request->get('allegates_id');
        $report->court_office = $request->get('court_office');
        $report->prosecutor_office = $request->get('prosecutor_office');
        $report->date_issue = $request->get('date_issue');
        $report->expiration_date = $request->get('expiration_date');
        $report->expiration_type = $request->get('expiration_type');
        $report->case_id = $request->get('case_id');
        $report->assignment_number = $request->get('assignment_number');
        $report->authority_name = $request->get('authority_name');
        $report->authority_contact = $request->get('authority_contact');
        $report->attachment_file = $filename;

        $report->save();
        return redirect()->route('wanted.index')->with('success', 'ทำการอัพเดทข้อมูลเรียบร้อยแล้ว');
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
        $report = Report::findOrFail($id);

        if($report->attachment_file <> 'ยังไม่ได้อัพโหลดไฟล์'){
            Storage::disk('public')->delete($report->attachment_file);
        }

        $report->delete();
        
        return redirect()->route('wanted.index')->with('delete', 'ทำการลบข้อมูลเรียบร้อยแล้ว');
    }
}
