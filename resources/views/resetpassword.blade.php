@extends('layouts.app')

@section('title', 'Password Reset')

@section('content')
    @include('components.title', [
        "title" => "Password Reset"
    ])
    @if(isset($withSuccess))
        <div class="alert alert-success">อัพเดตข้อมูลเรียบร้อยแล้ว / Your information has been updated.</div>
    @endif

    <form action="" method="post" class="form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="password" class="col-sm-1 col-sm-offset-1 control-label">New password</label>
            <div class="col-sm-9">
                <div class="input-group">
		<input type="password" class="form-control" id="password" pattern=".{6,}" required name="password" placeholder="New Password">
                    <div class="input-group-btn" style="padding:0; padding-left: 6px;"><button class="btn btn-sm" id="passwordViewer" title="Show password"><i class="fa fa-eye"></i></button></div>

                </div>
                <p class="help-block">Minimum 6 characters - This password will be used throughout the camp.</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-sm-offset-1 control-label"></label>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary" id="submit-btn">Submit</button>
            </div>
        </div>
    </form>

@endsection

@section('footer')
<script type="text/javascript">
        $("#passwordViewer")
            .click(function(e){
                e.preventDefault();
            })
            .mousedown(function(e){
                e.preventDefault();
                $('#password').clone().attr('type','text').insertAfter('#password').prev().remove();
            })
            .mouseup(function(e){
                e.preventDefault();
                $('#password').clone().attr('type','password').insertAfter('#password').prev().remove();
            })
            .mouseleave(function(e){
                e.preventDefault();
                $('#password').clone().attr('type','password').insertAfter('#password').prev().remove();
            });
    </script>
@endsection
