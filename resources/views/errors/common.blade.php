@extends('layouts.app')

@section('breadcrumb', 'disable')
@section('title', 'Error')

@section('content')
    @include('components.error', ['code' => $e, 'text' => 'An error has occurred'])
@endsection
