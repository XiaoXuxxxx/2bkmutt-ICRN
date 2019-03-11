@extends('layouts.app')

@section('title', 'Staff Registration')

@section('content')
    @include('components.title', [
        "title" => "Staff Registration",
        "desc" => "ลงทะเบียน Staff"
    ])
    <h5>Step 3: FINISH</h5>
    <a href="{{ url('magic/staff-registration') }}" class="btn btn-primary btn-lg">กลับหน้าแรก</a>

@endsection