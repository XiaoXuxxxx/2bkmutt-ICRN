@extends('layouts.app')

@section('title', 'All-Registration System')

@section('content')
    @include('components.title', [
        "title" => "All-Registration System"
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
 /* text-shadow: 0px 0px 10px rgba(0,0,0,0.2);*/
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
		<a class="btn-b btn-1 btn-block" href="{{ url('/magic/first-time-registration') }}"><i class="fa fa-registered"></i> 1st Time Registration<br>ลงทะเบียนครั้งแรก</a>
	</div>
	<div class="col-md-4">
		<a class="btn-b btn-2 btn-block" href="{{ url('/magic/staff-registration') }}"><i class="fa fa-registered"></i> Staff Registration<br>ลงทะเบียน Junior</a>
	</div>
	<div class="col-md-4">
		<a class="btn-b btn-3 btn-block" href="{{ url('tools/create-user') }}"><i class="fa fa-user-plus"></i> Create User<br>สร้างผู้ใช้</a>
	</div>
	

</div>
<div class="row">
	<div class="col-md-4">
		<a class="btn-b btn-4 btn-block" href="{{ url('tools/freeday') }}"><i class="fa fa-registered"></i> Freeday Registration<br>ลงทะเบียนฟรีเดย์</a>
	</div>
	
</div>


</center>

@endsection

