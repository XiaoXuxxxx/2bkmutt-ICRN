@extends('layouts.app')

@section('title', 'Magic Checklist')

@section('content')
    @include('components.title', [
        "title" => "Check List Menu"
    ])

เช็คการลงทะเบียนครั้งแรก : <a class="btn btn-primary" href="{{ url('tools/userdata-viewer') }}">User Data Viewer</a><hr>
เช็ครายชื่อเสร็จสิ้นการลงทะเบียน : <a class="btn btn-info" href="{{ url('/Protocol/checkFinishRegis') }}">tools/staffdata-viewer</a><hr>



@endsection
