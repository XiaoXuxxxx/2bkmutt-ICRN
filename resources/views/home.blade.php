@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            You are logged in!
                @role(['usertest'])
                    <br>Welcome usertest
                @endrole

                @role(['admin'])
                    <br>Welcome admin
                @endrole
        </div>
       
    </div>
</div>
@endsection
