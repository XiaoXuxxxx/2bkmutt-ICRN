<div class="f-color">
	 <!-- Header -->
	 <section name="header">
	 	<h1><i class="fa fa-user"></i> ข้อมูลส่วนตัว</h1>
	 </section>
	 <hr>
	 <div class="progress">
  <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" style="width:15%">
   <div class="f-color">15%Complete (success)</div>
  </div>
</div>
	 <form action="" method="post" class="form-check">
	 	<h3>Section 1 : ข้อมูลทั่วไป</h3>
	 	<div class="row">
	 		<div class="col-md-2">
	 			<div class="form-group">
   					 <label for="exampleInputEmail1">คำนำหน้า</label>
   						<select name="prefix" class="form-control">
   							<option value="0">โปรดเลือก</option>
   							<option value="1">เด็กชาย</option>
   							<option value="2">เด็กหญิง</option>
   							<option value="3">นาย</option>
   							<option value="4">นางสาว</option>
   						</select> 
  				</div>
	 		</div>
	 		<div class="col-md-3">
	 			<div class="form-group">
   					 <label for="exampleInputEmail1">ชื่อ(TH)</label>
   					   <input type="text" name="firstname_th" class="form-control" value="<?php echo $datauser->name_th;?>"  placeholder="ทูบี">
  				</div>
	 		</div>
	 		<div class="col-md-3">
	 			<div class="form-group">
   					 <label for="exampleInputEmail1">นามสกุล(TH)</label>
   					   <input type="text" name="lastname_th" class="form-control" value="<?php echo $datauser->surname_th;?>" placeholder="เคเอ็มยูทีที">
  				</div>
	 		</div>
	 		<div class="col-md-2">
	 			<div class="form-group">
   					 <label for="exampleInputEmail1">ชื่อเล่น(TH)</label>
   					   <input type="text" name="nickname_th" class="form-control" value="<?php echo $datauser->nickname_th;?>" placeholder="บี">
  				</div>
	 		</div>
	 		<div class="col-md-2">
	 			<div class="form-group">
   					 <label for="exampleInputEmail1">เพศ</label>
   					  <select name="gender" class="form-control">
   							<option value="1">ชาย</option>
   							<option value="2">หญิง</option>
   							
   						</select> 
  				</div>
	 		</div>
	 	</div>


	 	<div class="row">
	 		<div class="col-md-2">
	 			<div class="form-group">
   					 
  				</div>
	 		</div>
	 		<div class="col-md-3">
	 			<div class="form-group">
   					 <label for="exampleInputEmail1">Firstname(EN)</label>
   					   <input type="text" name="firstname_en" class="form-control"  placeholder="ToBe">
  				</div>
	 		</div>
	 		<div class="col-md-3">
	 			<div class="form-group">
   					 <label for="exampleInputEmail1">Lastname(EN)</label>
   					   <input type="text" name="lastname_en" class="form-control"  placeholder="KMUTT">
  				</div>
	 		</div>
	 		<div class="col-md-2">
	 			<div class="form-group">
   					 <label for="exampleInputEmail1">Nickname(en)</label>
   					   <input type="text" name="nickname_en" class="form-control"  placeholder="Be">
  				</div>
	 		</div>
	 		<div class="col-md-2">
	 			<div class="form-group f-color">
   					 <label for="exampleInputEmail1">วันเกิด</label>
   					      <input name="birth_date" value="โปรดเลือก" id="datepicker" width="100%" />
					    
  				</div>
	 		</div>
	 	</div>

	 	<div  class="row">
	 		<div class="col-md-6">
	 			<div class="form-group">
   					 <label for="exampleInputEmail1">โรคประจำตัว</label>
   					   <input type="text" name="nickname_en" class="form-control"  placeholder="ไม่มี">
  				</div>
	 		</div>
	 		<div class="col-md-6">
	 			<div class="form-group">
   					 <label for="exampleInputEmail1">สิ่งที่แพ้</label>
   					   <input type="text" name="nickname_en" class="form-control"  placeholder="อาหารทะเล">
  				</div>
	 		</div>

	 	</div>

	 	<h3>Section 2 : ข้อมูลการติดต่อ</h3>
	 	<div class="row">
	 		<div class="col-md-4">
	 			<div class="form-group">
   					 <label for="exampleInputEmail1">อีเมล</label>
   					   <input type="email" name="email" class="form-control"  placeholder="2bkmuttregis@gmail.com">
  				</div>
	 		</div>

	 		<div class="col-md-3">
	 			<div class="form-group">
   					 <label for="exampleInputEmail1">หมายเลขโทรศัพท์</label>
   					   <input type="name" name="telephone_self" class="form-control"  placeholder="0987654321">
  				</div>
	 		</div>

	 		<div class="col-md-3">
	 			<div class="form-group">
   					 <label for="exampleInputEmail1">Facebook</label>
   					   <input type="name" name="facebook" class="form-control"  placeholder="2B-KMUTT Fanpage">
  				</div>
	 		</div>
	 		<div class="col-md-2">
	 			<div class="form-group">
   					 <label for="exampleInputEmail1">Line ID</label>
   					   <input type="name" name="line" class="form-control"  placeholder="2bkmutt2018">
  				</div>
	 		</div>
	 		
	 	</div>

	 	<h3>Section 3 : ข้อมูลการศึกษา</h3>
	 	<div class="row">
	 		<div class="col-md-9">
	 			<div class="form-group">
   					 <label for="exampleInputEmail1">โรงเรียน</label>
   					   <input type="text" name="firstname_en" value="<?php echo $datauser->school;?>" class="form-control"  placeholder="บางมดวิทยาคม">
  				</div>
	 		</div>
	 		<div class="col-md-3">
	 			<div class="form-group">
   					 <label for="exampleInputEmail1">ระดับชั้น</label>
   					   <select name="grade" class="form-control">
   							<option value="0">โปรดเลือก</option>
   							<option value="1">ม.4</option>
   							<option value="2">ม.5</option>
   							<option value="3">ปวช.1</option>
   							<option value="4">ปวช.2</option>
   							
   						</select> 
  				</div>
	 		</div>
	 	</div>






	 </form>

	<!-- Back section-->
	<div class="row">
		<div class="col-md-12">
			<div class="text-right"><hr>
				<a href="?mod=home">
					<button class="btn btn-success"><i class="fa fa-save"></i> บันทึก</button>
				</a>
				
				<a href="?mod=home">
					<button class="btn btn-primary"><i class="fa fa-angle-left"></i> กลับหน้าหลัก</button>
				</a>
			</div>
		</div>
	</div>
</div>

<script>
	$('#datepicker').datepicker({
	   uiLibrary: 'bootstrap'
	});
</script>