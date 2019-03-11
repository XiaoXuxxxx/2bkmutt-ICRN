@extends('layouts.app')

@section('title', 'Lab Report')

@section('content')
    @include('components.title', [
        "title" => "Lab Report"
    ])

<?php
        $dday = date('d');
        $ttime = date('H');
?>



    @if(isset($withSuccess))
        <div class="alert alert-success">ส่งข้อมูลเรียบร้อยแล้ว / Your information has been submitted.</div>
    @else


    <div class="alert alert-success">
        For foreign students: If you do not know Thai project name, please enter both field in English with similar information.
    </div>
    @endif



    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data" files=true>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="project-th" class="col-sm-3 col-sm-offset-1 control-label">Thai Project Name<br>(ชื่อโปรเจคภาษาไทย)</label>
            <div class="col-sm-6"><input type="text" class="form-control" name="project-th" placeholder="Thai Project Name"
                @if(isset($currentProjectTH)) value="{{ $currentProjectTH }}" @endif></div>
        </div>
        <div class="form-group">
            <label for="project-en" class="col-sm-3 col-sm-offset-1 control-label">English Project Name<br>(ชื่อโปรเจคภาษาอังกฤษ)</label>
            <div class="col-sm-6"><input type="text" class="form-control" name="project-en" required placeholder="English Project Name"
                @if(isset($currentProjectEN)) value="{{ $currentProjectEN }}" @endif></div>
        </div>
        <div class="form-group">
            <label for="project-en" class="col-sm-3 col-sm-offset-1 control-label">Thai Professor/TA Name<br>(ชื่ออาจารย์ภาษาไทย)</label>
            <div class="col-sm-6"><input type="text" class="form-control" name="professor-th" placeholder="Thai Professor/TA Name"
                @if(isset($currentProfessTH)) value="{{ $currentProfessTH }}" @endif></div>
        </div>
        <div class="form-group">
            <label for="project-en" class="col-sm-3 col-sm-offset-1 control-label">English Professor/TA Name<br>(ชื่ออาจารย์ภาษาอังกฤษ)</label>
            <div class="col-sm-6"><input type="text" class="form-control" name="professor-en" required placeholder="English Professor/TA Name"
                @if(isset($currentProfessEN)) value="{{ $currentProfessEN }}" @endif></div>
        </div>
        <div class="form-group">
            <label for="project-en" class="col-sm-3 col-sm-offset-1 control-label">Abstact Document<br>(Only accept PDF format)</label>
            <div class="col-sm-6 ">
                <input type="file" name="file" id="file" accept=".pdf">
                @if(isset($PDFUploaded))
                    <p class="text-success">PDF Uploaded. <a href="/download/pdf/{{ $PDFUploaded }}"><button class="btn btn-success">Click here.</button></a> to download.</p>
                @else
                   <!-- <p class="text-danger">PDF not upload.</p> -->
                @endif
            </div><br><br>
        </div>
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-1 control-label"></label>
            <div class="col-sm-6"><center>
                <button type="submit" class="btn btn-primary" id="submit-btn">Submit</button>
            </div>
        </div>
    </form>
<hr>
<h3>สถานะงานในระบบ</h3>
<b>ชื่อโปรเจคภาษาไทย :</b>  @if(isset($currentProjectTH)){{ $currentProjectTH }}@else <font color="red">ยังไม่ได้ส่ง</font> @endif<br>
<b>ชื่อโปรเจคภาษาอังกฤษ : </b> @if(isset($currentProjectEN)){{ $currentProjectEN }}@else <font color="red">ยังไม่ได้ส่ง</font> @endif<br>
<b>ชื่ออาจารย์ภาษาไทย : </b> @if(isset($currentProfessTH)){{ $currentProfessTH }}@else <font color="red">ยังไม่ได้ส่ง</font> @endif<br>
<b>ชื่ออาจารย์ภาษาอังกฤษ : </b> @if(isset($currentProfessEN)){{ $currentProfessEN }}@else <font color="red">ยังไม่ได้ส่ง</font> @endif<br>
<b>ไฟล์ Abstract :</b> 
@if(isset($PDFUploaded))
                    PDF Uploaded. <a href="http://docs.google.com/gview?url=https://2bkmutt.com/download/pdf/{{$PDFUploaded}}" target="_blank"><p class="btn btn-success">Click here.</p></a> to view your file.</i>
                @else
                    <i class="text-danger">PDF not upload.</i>
                @endif

<hr>
<h3>คำชี้แจง</h3>
- ตัวอักษรสีดำทั้งหมด<br>
- ให้น้องๆทำการแปลงไฟล์เป็น PDF ก่อนแล้วทำการอัพโหลด
<br>- หากต้องการอัพไฟล์ใหม่ ให้อัพไฟล์ทับได้เลย

@endsection
