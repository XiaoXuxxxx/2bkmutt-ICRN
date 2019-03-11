@extends('layouts.app')

@section('title', 'Checking List System')

@section('content')
    @include('components.title', [
        "title" => "ตรวจสอบค่าต่างๆของระบบ"
    ])
<center>
<style type="text/css">
	.btn-b {
  flex: 1 1 auto;
  margin: 10px;
  padding: 30px;
  text-align: center;
  text-transform: uppercase;
  transition: 0.5s;
  background-size: 200% auto;
  color: #000;
  #font-weight: bold;
  box-shadow: 0 0 20px #eee;
  border-radius: 10px;

 }

.btn-b:hover {
  background-position: right center; /* change the direction of the change here */
  font-size: 18px;
  font-weight: bold;
}

.btn-1 {
  background-image: linear-gradient(to right, #f6d365 0%, #fda085 51%, #f6d365 100%);
}

.btn-2 {
  background-image: linear-gradient(to right, #fbc2eb 0%, #a6c1ee 51%, #fbc2eb 100%);
}

.btn-3 {
  background-image: linear-gradient(to right, #84fab0 0%, #8fd3f4 51%, #84fab0 100%);
}

.btn-4 {
  background-image: linear-gradient(to right, #a1c4fd 0%, #c2e9fb 51%, #a1c4fd 100%);
}

.btn-5 {
  background-image: linear-gradient(to right, #ffecd2 0%, #fcb69f 51%, #ffecd2 100%);
}
</style>

<div class="row">
	<div class="col-md-4">
		<a class="btn-b btn-1 btn-block" href="{{ url ('tools/labreport-print')}}"><i class="fa fa-book"></i> LAB Report สำหรับพี่แล็บ</a>
	</div>
	<div class="col-md-4">
		<a class="btn-b btn-2 btn-block" href="{{ url('/Protocol/checkFirstTime') }}"><i class="fa fa-search"></i> Check 1st time registration list</a>
	</div>
	<div class="col-md-4">
		<a class="btn-b btn-3 btn-block" href="{{ url('/Protocol/checkFinishRegis') }}"><i class="fa fa-search"></i> Check done list</a>
	</div>
	

</div>
<div class="row">
	<div class="col-md-4">
		<a class="btn-b btn-4 btn-block" href="{{ url('/tools/labreport-summary') }}"><i class="fa fa-archive"></i> Project Topic Summary</a>
	</div>
	<div class="col-md-4">
		<a class="btn-b btn-5 btn-block" href="{{ url('/VoteResult/StarCount') }}"><i class="fa fa-comment"></i> Vote Result</a>
	</div>
  <div class="col-md-4">
    <a class="btn-b btn-2 btn-block" href="{{ url('/Protocol/checkAll') }}"><i class="fa fa-search"></i> AttenCheck Checking</a>
  </div>
</div>

<br><br>
<!--
รายงานการส่ง Abstract LAB  : <a class="btn-b btn-1" href="{{ url ('tools/labreport-print')}}">LAB Report for พี่แล็บ</a><hr>
เช็คการลงทะเบียนครั้งแรก : <a class="btn btn-success" href="{{ url('/Protocol/checkFirstTime') }}">CHECK Firsttime LIST</a><hr>
เช็ครายชื่อเสร็จสิ้นการลงทะเบียน : <a class="btn btn-info" href="{{ url('/Protocol/checkFinishRegis') }}">CHECK Done LIST</a><hr>
เช็ครายชื่อน้องส่ง Abstract : <a class="btn btn-danger" href="{{ url('/tools/labreport-summary') }}">Project Topic Summary</a><hr>
ผลโหวตดาวเดือน : <a class="btn btn-warning" href="{{ url('/VoteResult/StarCount') }}">Vote Result</a><hr>
รายงานยอดตามระบบเช็คชื่อ : <a class="btn btn-primary" href="{{ url ('/Report/Sum')}}">ReportSum</a><hr>
รายงานเช็คชื่อรายวัน : <a class="btn btn-default" href="{{ url ('tools/attendance-log')}}">Attendance Report</a><hr>
-->

</center>

@endsection
