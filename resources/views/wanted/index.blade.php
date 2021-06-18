@extends('layouts.app', ['activeMenu'=>'wanted'])

@section('title', 'ข้อมูลรายงานหมายจับ')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/simple-datatables/style.css">
@endpush

@section('content')

@if (Session::has('success'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
    </div>
@elseif(Session::has('delete'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger">
                {{ Session::get('delete') }}
            </div>
        </div>
    </div>
@endif

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>ข้อมูลรายงานหมายจับ</h3>
                <p class="text-subtitle text-muted">รายงานหมายจับ</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">
                            <a href="{{ route('home.index') }}">Dashboard (ข้อมูลภาพรวม)</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">ข้อมูลรายงานหมายจับ</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-end">
                        <a href="{{ route('wanted.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> บันทึกข้อมูลรายงาน</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="report_table">
                            <thead>
                                <tr>
                                    <th>เลขคดี</th>
                                    <th>วันออกหมาย</th>
                                    <th>ชื่อผู้ถูกกล่าวหา</th>
                                    <th>เรื่องที่ถูกกล่าวหา</th>
                                    <th>ผู้รับผิดชอบ</th>
                                    <th>หน่วยงานที่รับผิดชอบ</th>
                                    <th>ไฟล์แนบ</th>
                                    <th>การจัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $report)
                                    <tr>
                                        <td>{{ $report->case_id }}</td>
                                        <td>{{ formatDateThai($report->date_issue) }}</td>
                                        <td>{{ $report->accused_name }}</td>
                                        <td>{{ $report->allegate->allegates_name }}</td>
                                        <td>{{ $report->authority_name }}</td>
                                        <td>{{ $report->division->divisions_name }}</td>
                                        <td>
                                            @if ($report->attachment_file <> "ยังไม่ได้อัพโหลดไฟล์")
                                                <a href="{{ asset('storage/'.$report->attachment_file) }}" target="_blank">คลิกเพื่อดูไฟล์</a>
                                            @else
                                                {{ $report->attachment_file }}
                                            @endif
                                        </td>
                                        <td>

                                            <a href="{{ route('wanted.edit', $report->id) }}" class="btn btn-warning">อัพเดทข้อมูล</a>

                                            <button type="button" class="btn btn-outline-danger block"
                                                data-bs-toggle="modal" data-bs-target="#border-less_{{ $report->id }}">
                                                ลบข้อมูล
                                            </button>

                                            <div class="modal fade text-left modal-borderless" id="border-less_{{ $report->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">ลบข้อมูลหมายเลขคดี {{ $report->case_id }}</h5>
                                                        <button type="button" class="close rounded-pill"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body"> คุณต้องการลบข้อมูลนี้ใช่หรือไม่ ?</div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-primary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">ยกเลิก</span>
                                                        </button>
                                                        {{-- <button type="button" class="btn btn-danger ml-1"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">ยืนยัน</span>
                                                        </button> --}}
                                                        <form action="{{ route('wanted.destroy', $report->id) }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</div>
@endsection

@push('js')
    <script src="{{ asset('assets') }}/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let report_table = document.querySelector('#report_table');
        let dataTable = new simpleDatatables.DataTable(report_table);
    </script>
@endpush