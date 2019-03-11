@extends('layouts.app')

@section('title', 'First Time Registration')

@section('content')
    @include('components.title', [
        "title" => "First Time Registration",
        "desc" => "ลงทะเบียนครั้งแรก"
    ])
    <h5>Step 1: เลือกชนิดของการลงทะเบียน</h5>
    <div class="col-sm-9 col-registration">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">มีข้อมูลในระบบยืนยันสิทธิ์แล้ว</h3>
            </div>
            <div class="panel-body">
                ค้นหาจาก ชื่อ (ไม่ต้องใส่คำนำหน้าชื่อ) หรือ ID
                <form id="first-time-search-form" class="form-horizontal">
                    <div class="form-group" style="margin-bottom:0;">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control" id="search-box" placeholder="Search...">
                                <span class="input-group-btn"><button type="submit" class="btn btn-primary btn">ค้นหา</button></span>
                            </div>
                        </div>
                    </div>
                </form>
                <span id="first-time-search-error" class="text-danger"></span>
                @include('components.progress-bar', ["id" => "first-time-progress-bar", "at" => "0"])
                <p id="first-time-search-success" class="text-success"></p>
                <form action="{{ url('/magic/first-time-registration/photo') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="camp_id" name="camp_id" value="">
                    <input type="submit" id="first-time-next-step-btn" class="btn btn-primary" style="display: none;" value="Continue">
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-3 col-registration">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">ลงทะเบียนครั้งแรก</h3>
            </div>
            <div class="panel-body">
                <input type="button" class="btn btn-info btn-block" value="ลงทะเบียน">
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="{{ asset('js/firsttimesearcher.js') }}" type="text/javascript"></script>
@endsection
