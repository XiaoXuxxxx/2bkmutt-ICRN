<div class="f-color">
	 <!-- Header -->
	 <section name="header">
	 	<h1><i class="fa fa-address-card"></i> ข้อมูลกลุ่มวิจัย</h1>
	 </section>
	 <hr>
	 <div class="progress">
  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" style="width:50%">
   <div class="f-color">50%Complete (success)</div>
  </div>
</div>
	 <form action="" method="post" class="form-check">
	 	
	 	<div class="row">
	 		
	 		<div class="col-md-3">
	 			<div class="form-group">
   					 <label for="exampleInputEmail1">ชื่อ(TH)</label>
   					   <input type="text" name="firstname_th" class="form-control"  placeholder="นายปกครอง">
  				</div>
	 		</div>
	 		<div class="col-md-3">
	 			<div class="form-group">
   					 <label for="exampleInputEmail1">นามสกุล(TH)</label>
   					   <input type="text" name="lastname_th" class="form-control" placeholder="เคเอ็มยูทีที">
  				</div>
	 		</div>
	 		<div class="col-md-2">
	 			<div class="form-group">
   					 <label for="exampleInputEmail1">ความสัมพันธ์</label>
   					   <input type="text" name="nickname_th" class="form-control" placeholder="บิดา">
  				</div>
	 		</div>
	 		<div class="col-md-3">
	 			<div class="form-group">
   					 <label for="exampleInputEmail1">หมายเลขโทรศัพท์ที่ติดต่อได้</label>
   					   <input type="name" name="telephone_self" class="form-control"  placeholder="0987654321">
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