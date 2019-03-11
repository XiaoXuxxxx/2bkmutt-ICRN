@extends('layouts.app')

@section('title', 'Create User')

@section('content')
    @include('components.title', [
        "title" => "Create User"
    ])
    @if(isset($withError))
        <div class="alert alert-danger">มี Username หรือ E-mail ในระบบแล้ว</div>
    @endif
    @if(isset($withSuccess))
        <div class="alert alert-success">สร้าง User เสร็จเรียบร้อย</div>
    @endif
    <form action="" method="post" class="form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="username" class="col-sm-2 col-sm-offset-1 control-label">Username</label>
            <div class="col-sm-6"><input type="text" class="form-control" name="username" required placeholder="Username"></div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 col-sm-offset-1 control-label">Email</label>
            <div class="col-sm-6"><input type="text" class="form-control" name="email" required placeholder="E-mail"></div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 col-sm-offset-1 control-label">Password</label>
            <div class="col-sm-6">
                <div class="input-group">
                    <input type="password" class="form-control" id="password" pattern=".{6,}" required name="password" placeholder="Password">
		    <div class="input-group-btn" style="padding:0; padding-left: 6px;"><button class="btn btn-sm" id="passwordViewer" title="Show password"><i class="fa fa-eye"></i></button></div>
                </div>
                <p class="help-block">At least 6 characters. Safe password recommended.</p>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 col-sm-offset-1 control-label">Role</label>
            <div class="col-sm-6">
                <div class="input-group">
                    <label class="radio-inline">
                      <input type="radio" name="role" required value="usertest"> User(for testsystem)
                    </label>
		    <label class="radio-inline">
                      <input type="radio" name="role" required value="staff"> Staff(for Freeday checking)
                    </label>

                    @role(['junior', 'senior', 'admin'])
                    <label class="radio-inline">
                      <input type="radio" name="role" required value="junior"> Junior
                    </label>
                    @endrole
                    @role(['senior', 'admin'])
                    <label class="radio-inline">
                      <input type="radio" name="role" required value="senior"> Senior
                    </label>
                    @endrole
                    @role(['admin'])
                    <label class="radio-inline">
                      <input type="radio" name="role" required value="admin"> Admin/Advisor
                    </label>
                    @endrole
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-sm-offset-1 control-label"></label>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" id="submit-btn">Create</button>
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
