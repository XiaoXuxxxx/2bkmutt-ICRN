@extends('layouts.app')

@section('title', 'Data Importer')

@section('content')
    @include('components.title', [
        "title" => "CSV File Data Importer",
        "desc" => "For importing .csv file into MySQL table"
    ])
    <h5>Step 2: Specifed .csv column to be linked with table column</h5>
    <blockquote>
	<p>Note:If some of User_profiles column is lost.(Maybe 5 Coloums)</p>
	<p>It mean that your have correct data .csv </p>
    </blockquote>
    <form action="{{ url('/tools/data-importer/insert') }}" method="post" enctype="multipart/form-data">
    <table class="table">
        <tr><th>.csv column</th><th>=></th><th>{{ $table_name }}'s column</th></tr>
    @foreach( $keys as $key )
        <?php
            $keyLastUnderScore = preg_replace('~_(?!.*_)~', '-', $key);
            if( in_array($key, $avai_col) ){
                $val = $key;
            }elseif( in_array($keyLastUnderScore, $avai_col) ){
                $val = $keyLastUnderScore;
            }else{ $val = ""; }
        ?>
        <tr><td>{{ $key }}</td><td>=></td><td>
            <input type="text" name="csv_{{ $key }}" id="csv_{{ $key }}" value="{{ $val }}">
        </td></tr>
    @endforeach
    </table>
    <input type="hidden" name="table_name" value="{{ $table_name }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <p>Every wrong column name will be rejected.</p>
    <input class="btn btn-primary" type="submit" value="Submit" name="submit">
    </form>

@endsection
