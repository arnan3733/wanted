@extends('layouts.app', ['activeMenu'=>'wanted'])

@section('title', 'แก้ไขข้อมูลรายงานหมายจับ')

@push('css')
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<style>
    .gj-textbox-md{
        display: block;
        width: 100%;
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #607080;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #dce7f1;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    .gj-datepicker-md [role="right-icon"] {
        right: 5px !important;
        top: 7px !important;
    }   
</style>
@endpush

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>ฟอร์มแก้ไขข้อมูลรายงานหมายจับ</h3>
                <p class="text-subtitle text-muted">รายงานหมายจับ</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">
                            <a href="{{ route('home.index') }}">
                                Dashboard (ข้อมูลภาพรวม)
                            </a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                           <a href="{{ route('wanted.index') }}">
                                ข้อมูลรายงานหมายจับ
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">ฟอร์มแก้ไขข้อมูลรายงานหมายจับ</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ฟอร์มแก้ไขข้อมูลรายงานหมายจับ</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('wanted.update', $report->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-md-4">
                                        <label>หมายจับเลขที่</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="หมายจับเลขที่" name="wanted_number" required value="{{ $report->wanted_number }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>วันออกหมาย</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="วันออกหมาย" name="date_issue" id="date_issue" required value="{{ $report->date_issue }}">
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="col-md-4">
                                        <label>ชื่อผู้ต้องหา</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="ชื่อผู้ต้องหา" name="accused_name" required value="{{ $report->accused_name }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>เลขที่บัตรประชาชน (ผู้ต้องหา)</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="เลขที่บัตรประชาชน (ผู้ต้องหา)" name="accused_id_card" required value="{{ $report->accused_id_card }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>ข้อกล่าวหา</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="position-relative">
                                                <select name="allegates_id" class="form-control form-select" required>
                                                    <option value="">กรุณาเลือกข้อกล่าวหา</option>
                                                    @foreach ($allegates as $allegate)
                                                        <option value="{{ $allegate->allegates_id }}" 
                                                            {{ $report->allegates_id == $allegate->allegates_id ? 'selected' : '' }}>
                                                            {{ $allegate->allegates_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>สำนักงานศาล</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="สำนักงานศาล" name="court_office" required value="{{ $report->court_office }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>สำนักงานอัยการ</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="สำนักงานอัยการ" name="prosecutor_office" required value="{{ $report->prosecutor_office }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>ชื่อสำนัก/กอง ผู้รับผิดชอบหมาย</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="position-relative">
                                                <select name="divisions_id" class="form-control form-select" required>
                                                    <option value="">กรุณาเลือกหน่วยงาน</option>
                                                    @foreach ($divisions as $division)
                                                        <option value="{{ $division->divisions_id }}"
                                                            {{ $report->divisions_id == $division->divisions_id ? 'selected' : '' }}>
                                                            {{ $division->divisions_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>วันขาดอายุความ</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" id="expiration_date" placeholder="วันขาดอายุความ" name="expiration_date" required value="{{ $report->expiration_date }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>ประเภทวันขาดอายุความ</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="position-relative">
                                                <select name="expiration_type" class="form-control form-select" required>
                                                    <option value="{{ $report->expiration_type }}" selected>{{ $report->expiration_type }}</option>
                                                    <option value="นับระยะเวลา">นับระยะเวลา</option>
                                                    <option value="ไม่นับระยะเวลา">ไม่นับระยะเวลา</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>เลขที่คดี</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="เลขที่คดี" name="case_id" required value="{{ $report->case_id }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>เลขที่คำสั่ง</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="เลขที่คำสั่ง" name="assignment_number" required value="{{ $report->assignment_number }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>ชื่อผู้รับผิดชอบ</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="ชื่อผู้รับผิดชอบ" name="authority_name" required value="{{ $report->authority_name }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>ข้อมูลติดต่อผู้รับผิดชอบ</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="ข้อมูลติดต่อผู้รับผิดชอบ" name="authority_contact" required  value="{{ $report->authority_contact }}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label>ไฟล์แนบ</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="position-relative">
                                                <input class="form-control form-control-sm" name="filename[]" type="file">
                                            </div>
                                            <br>
                                            @if ($report->attachment_file <> "ยังไม่ได้อัพโหลดไฟล์")
                                                <a href="{{ asset('storage/'.$report->attachment_file) }}" target="_blank">คลิกเพื่อดูไฟล์</a>
                                            @else
                                                {{ $report->attachment_file }}
                                            @endif

                                        </div>
                                    </div>
                                    
                                    <div class="col-12 mt-4 d-flex justify-content-start">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">บันทึกข้อมูล</button>
                                        <button type="reset"
                                            class="btn btn-light-secondary me-1 mb-1">ยกเลิก</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $('#date_issue').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('#expiration_date').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
@endpush
