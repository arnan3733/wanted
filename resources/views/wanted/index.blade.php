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
                                            <a href="{{ route('wanted.edit', $report->id) }}" class="btn btn-warning">อัพเดทข้อมูล</a>
                                            <a href="#" class="btn btn-danger">ลบข้อมูล</a>
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