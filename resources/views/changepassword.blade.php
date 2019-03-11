@extends('layouts.app')

@section('title', 'Create User')

@section('content')
    @include('components.title', [
        "title" => "Change Password"
    ])
    <form action="" method="post" class="form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="username" class="col-sm-2 col-sm-offset-1 control-label">รหัสผ่านเดิม</label>
            <div class="col-sm-6"><input type="password" class="form-control" name="old-password" required placeholder="Old Password"></div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 col-sm-offset-1 control-label">รหัสผ่านใหม่</label>
            <div class="col-sm-6">
                <div class="input-group">
                    <input type="password" class="form-control" id="password" pattern=".{6,}" required name="password" placeholder="New Password">
                    <div class="input-group-addon" style="padding:0; padding-left: 6px;"><button class="btn btn-sm" id="passwordViewer" title="Show password"><i class="fa fa-eye"></i></button></div>
                </div>
                <p class="help-block">At least 6 characters. Safe password recommended.</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-sm-offset-1 control-label"></label>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" id="submit-btn">เปลี่ยนรหัสผ่าน</button>
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
            .mouseout(function(e){
                e.preventDefault();
                $('#password').clone().attr('type','password').insertAfter('#password').prev().remove();
            });
    </script>
@endsection
