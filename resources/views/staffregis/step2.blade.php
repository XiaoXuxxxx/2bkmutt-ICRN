@extends('layouts.app')

@section('title', 'Staff Registration')

@section('content')
    @include('components.title', [
        "title" => "Staff Registration",
        "desc" => "ลงทะเบียน Staff"
    ])

    <?php $user = App\StaffProfile::where("id", "=", $id)->first(); ?>
    <h5>Step 2: ถ่ายรูป</h5>
    <h6>{{ $user->id }} - {{ $user["first_name_en"] }} {{ $user["last_name_en"] }}</h6>
    <div id="camera" style="width:640px; height:480px;"></div>
    <div id="result" style="width:320px; height:240px; display: none;"></div>
    <br>
    <button type="button" class="btn btn-primary btn-lg" id="snapshot" style="display: none;"><i class="fa fa-camera"></i> ถ่ายรูป</button>
    <div id="pic-confirmation" style="display: none;">
        <div class="btn-group">
            <button type="button" class="btn btn-success" id="confirmed"><i class="fa fa-check"></i> ใช้รูปนี้</button>
            <button type="button" class="btn btn-danger" id="reject"><i class="fa fa-times"></i> ถ่ายใหม่</button>
        </div>
    </div>
    <div id="error" class="alert alert-danger" style="display: none;">มีปัญหาเกิดขึ้น</div>
    <div id="upload" class="well" style="display: none;">
        กำลังอัพโหลด...<br>
        @include('components.progress-bar', ["id" => "upload-progress-bar", "at" => "0"])
    </div>
    <div id="finish" class="well" style="display: none;">
        <h5>อัพโหลดเสร็จสิ้น!</h5>
        <form action="{{ url('/magic/staff-registration/finish') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="number" name="number" value="{{ $user->id }}">
            <input type="submit" id="first-time-next-step-btn" class="btn btn-primary" value="ดำเนินการต่อ">
        </form>
    </div>

@endsection


@section('footer')
    <script src="{{ asset('js/webcamjs/webcam.js') }}" type="text/javascript"></script>
    <script type="text/javascript">

        var init = true;

        Webcam.set({
            width: 320,
            height: 240,
            dest_width: 640,
            dest_height: 480
        });
        Webcam.attach('#camera');

        Webcam.on( 'live', function() {
            if(init){
                $("#snapshot").css("display", "block");
                init = false;
            }
        });

        $("#snapshot").click(function(){
            Webcam.freeze();
            $("#snapshot").css("display", "none");
            $("#pic-confirmation").css("display", "block");
        });

        $("#reject").click(function(){
            Webcam.unfreeze();
            $("#snapshot").css("display", "block");
            $("#pic-confirmation").css("display", "none");
        });

        $("#confirmed").click(function(){
            $("#pic-confirmation").css("display", "none");
            Webcam.snap( function(data_uri){
                $("#camera").css("display", "none");
                $("#result").css("display", "block");
                $("#result").html('<img style="width:100%; height:100%;" src="'+data_uri+'"/>');
                $("#upload").css("display", "block");
                setProgress("upload-progress-bar", 50);
                Webcam.upload( data_uri, APP_URL + '/api/v1/staff-picture/{{ $user->id }}/upload', function(code, text){
                    setProgress("upload-progress-bar", 100);
                    if(code != 200 || code != "200"){
                        $("#error").css("display", "block");
                    }else{
                        setTimeout( function(){
                            $("#upload").css("display", "none");
                            $("#finish").css("display", "block");
                        }, 100);
                    }
                });
            });
            Webcam.freeze();
        });

    </script>
@endsection