@extends('layouts.app')

@section('title', 'First Time Registration')

@section('content')
    @include('components.title', [
        "title" => "First Time Registration",
        "desc" => "ลงทะเบียนครั้งแรก"
    ])
    <?php $user = App\UserProfile::where("camp_id", "=", $camp_id)->get()->first(); ?>
    <h5>Step 4: ลงทะเบียนใช้งานระบบค่าย (ICRN)</h5>
    <h6>{{ $user->camp_id }} - {{ $user["first_name-en"] }} {{ $user["last_name-en"] }}</h6><br>
    @if(isset($withError))
        <div class="alert alert-danger">มี Username หรือ E-mail ในระบบแล้ว</div>
    @endif
    @if(isset($passwordError))
        <div class="alert alert-danger">รหัสผ่านไม่ตรงกัน / Password mismatch</div>
    @endif
    <form action="{{ url('/magic/first-time-registration/finish') }}" method="post" class="form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="camp_id" id="camp_id" value='{{$user->camp_id}}'>
        <div class="form-group">
            <label for="username" class="col-sm-2 col-sm-offset-1 control-label">Username</label>
            <div class="col-sm-6"><input type="text" class="form-control" name="username" required placeholder="Username" value='{{$user->camp_id}}'></div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 col-sm-offset-1 control-label">อีเมล</label>
            <div class="col-sm-6"><input type="text" class="form-control" name="email" required placeholder="E-mail" value="{{ $user->email }}"></div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 col-sm-offset-1 control-label">รหัสผ่าน</label>
            <div class="col-sm-6">
                <div class="input-group">
                    <input type="password" class="form-control" id="password" pattern=".{6,}" required name="password" placeholder="Password">
                </div>
                <p class="help-block">ขั้นต่ำ 6 ตัวอักษร - รหัสผ่านนี้จะใช้ตลอดการเข้าค่าย</p>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 col-sm-offset-1 control-label">ยืนยันรหัสผ่าน</label>
            <div class="col-sm-6">
                <div class="input-group">
                    <input type="password" class="form-control" id="password_confirmation" pattern=".{6,}" required name="password_confirmation" placeholder="Password Confirmation">
                </div>
                <p class="help-block">ขั้นต่ำ 6 ตัวอักษร - รหัสผ่านนี้จะใช้ตลอดการเข้าค่าย</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-sm-offset-1 control-label"></label>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" id="submit-btn">ลงทะเบียน</button>
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
