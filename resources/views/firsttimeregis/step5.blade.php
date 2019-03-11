@extends('layouts.app')

@section('title', 'First Time Registration')

@section('content')
    @include('components.title', [
        "title" => "First Time Registration",
        "desc" => "ลงทะเบียนครั้งแรก"
    ])
    <?php $user = App\UserProfile::where("camp_id", "=", $camp_id)->get()->first(); ?>
    <h5>ลงทะเบียนเสร็จสิ้น!</h5>
    <h6>{{ $user->camp_id }} - {{ $user["first_name-en"] }} {{ $user["last_name-en"] }} ลงทะเบียนเสร็จสมบูรณ์!</h6><br>
    <a href="{{ url('magic/first-time-registration') }}" class="btn btn-primary btn-lg">กลับหน้าแรก</a>
@endsection
