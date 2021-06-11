@extends('layouts.app', ['activeMenu'=>'wanted'])

@section('title', 'บันทึกรายงานหมายจับ')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>ฟอร์มบันทึกรายงานหมายจับ</h3>
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
                        <li class="breadcrumb-item active" aria-current="page">ฟอร์มบันทึกรายงานหมายจับ</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ฟอร์มบันทึกรายงานหมายจับ</h4>
                    </div>
                    <div class="card-content"></div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
