@extends('layouts.app')
@section('content')
@if (session('status'))
<div class="alert alert-success">
	{{ session('status') }}
</div>
@endif
<style>
.fa-star{
	animation: spin 2s linear infinite;
}
@-webkit-keyframes spin {
0% { -webkit-transform: rotate(0deg); }
100% { -webkit-transform: rotate(360deg); }
}
@keyframes spin {
0% { transform: rotate(0deg); }
100% { transform: rotate(360deg); }
}
#title{
font-size: 20px;
font-family: cloud;
background-color: #c58ec3;
color: #fff;
}
#header{
font-size: 17px;
font-family: cloud;
color : #fff;
/*    background-color: #a8eeff;*/
background-color : #78951d;
}
#count{
font-size: 17px;
font-family: cloud;
}
.btn-pink{
background-color: #c58ec3;
color: #fff;
font-size: 18px;
font-family: cloud;
transition: 0.2s;
}
.btn-pink:hover{
background-color: #f4c6f4;
color: #000;
font-size: 18px;
font-family: cloud;
}
.desc{
font-family: cloud;
font-size: 16px;
}
</style>
<div class="row">
	<!--	<iframe width="100%" height="560" src="https://www.youtube.com/embed/vqtZ6njnuR4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>-->
	<center>
	<!--
	<div class="">
		<h2 style="color: #444;"> <img src="https://www.2bkmutt.com/img/logo_web.png" width="300"> &nbsp;</h2>
		<div class="panel panel-default">
			<h1><i class="fa fa-star"></i></h1>
			<h1> STARVOTE FINAL</h1>
			
			<a href="{{ url('starvotefinal')}}">
				<center><button class="btn btn-lg btn-success"><i class="fa fa-check-circle"></i> VOTE NOW!!!</button></center>
			</a>
			<br>
		</div>
		</center>
		<hr>
		<div class="panel panel-default">
			<div class="panel-heading" id="header"><i class="fa fa-fw fa-volume-up"></i>&nbsp;แบบฟอร์ม Abstract</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12"><center>
						<h2><i class="fa fa-download"></i> Download Example Document</h2>
						<table class="table table-hover table-bordered">
							<tr>
								<th>ที่</th>
								<th>ชื่อเอกสาร</th>
								<th>Download</th>
							</tr>
							<tr>
								<td>1</td>
								<td>ตัวอย่างบทคัดย่อภาษาไทย (สำหรับ นร.ไทย)</td>
								<td><a href="{{ url('download/doc/abstract_thai.docx')}}"><button class="btn btn-success">ดาวน์โหลด</button></a></td>
							</tr>
							<tr>
								<td>2</td>
								<td>Abstarct <u><b>For International Student</b></u> </td>
								<td><a href="{{ url('download/doc/abstract_for_inter.docx')}}"><button class="btn btn-success">Download</button></a></td>
							</tr>
						</table><hr>
						<a href="{{url ('profile/labreport')}}">
							<button class="btn btn-lg btn-primary"><i class="fa fa-upload"></i> Upload</button>
						</a>
						<p>&#x1F407; โปรดติดตามกำหนดการส่งงานบนเว็บไซต์เร็วๆนี้ By WhiteRabbit &#x1F407; <br>
						&#x1F407; Please keep track of submission document schedule on this website. Coming Soon!!! Brought to you by WhiteRabbit &#x1F407; </p>
					</div></div></div></div></div>
					<br>
					<div class="panel panel-default">
						<div class="panel-heading" id="header"><i class="fa fa-fw fa-volume-up"></i>&nbsp;กลุ่มแชท</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-6">
									<div class="well" style="padding: 60px;">
										<center>
										<h3 style="font-size: 64px;">
										<i class="fa fa-fw fa-comment"></i>
										</h3>
										<h2 style="color: #555;">
										Line Group
										</h2>
										<hr style="width: 30%">
										<a href="http://line.me/ti/g/4P7afk2aD-" style="width: 40%" role="button" class="btn btn-success"><i class="fa fa-fw fa-sign-in"></i>&nbsp;Join Here</a>
										</center>
										<br>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="well" style="padding: 60px;">
										<center>
										<h3 style="font-size: 64px;">
										<i class="fa fa-fw fa-facebook-square"></i>
										</h3>
										<h2 style="color: #555;">
										Facebook Group
										</h2>
										<hr style="width: 30%">
										<a href="https://www.facebook.com/groups/2bkmutt15/" style="width: 40%"  role="button" class="btn btn-primary"><i class="fa fa-fw fa-sign-in"></i>&nbsp;Join Here</a>
										</center>
										<br>
									</div>
								</div>
							</div>
							<br>
						</div>
					</div>
				</div>-->
				<br><br><br><br>
				@endsection