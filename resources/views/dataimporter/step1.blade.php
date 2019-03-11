@extends('layouts.app')

@section('title', 'Data Importer')

@section('content')
    @include('components.title', [
        "title" => "CSV File Data Importer",
        "desc" => "For importing .csv file into MySQL table"
    ])
    @foreach ($errors->all() as $message)
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
    @endforeach
    <div class="panel panel-danger">
    <div class="panel-heading">
    <h5>Step 1: Upload .csv and specified table name</h5></div>
	<form action="{{ url('tools/data-importer/validation') }}" method="post" enctype="multipart/form-data" files=true>
        <br><div class="col-sm-6">
	<div class="form-group">
            <label for="file">.csv File:</label>
            <input type="file" name="file" id="file" accept=".csv">
            <p class="help-block">First row of .csv file must be header of the file.</p>
        </div>
	</div>
        <div class="form-group">
            <label for="table_name">Insert to:</label>
            <input type="text" name="table_name" id="table_name" placeholder="table_name">
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input class="btn btn-primary" type="submit" value="Upload" name="submit">
	<br><br></div>
    </form>
@endsection
