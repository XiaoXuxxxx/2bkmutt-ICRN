<div class="f-color">
	<!-- Header -->
	<section name="header">
		<h1><i class="fa fa-building"></i> ยืนยันการเข้าพักหอพัก</h1>
	</section>
	<hr>
	<div class="progress">
		<div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="40"
			aria-valuemin="0" aria-valuemax="100" style="width:1%">
			<div class="f-color">0%Complete (success)</div>
		</div>
	</div>
	<form action="" method="post" class="form-check">
		<h3>ยืนยันการเขาพักที่หอพัก มจธ.บางขุนเทียน</h3>
		<font color="red"><h3>#สำหรับผู้ที่มีสิทธิ์พักหอพักตามประกาศเท่านั้น</h3></font>
		<div class="row">
			
			<div class="col-md-12">
				<div class="form-group">
					<label>โปรดเลือก</label>
					<div class="radio">
						<label><input type="radio" name="dorm"><b>ต้องการ </b>เข้าพักที่หอพัก มจธ.บางขุนเทียน</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="dorm"><b>ไม่ต้องการ</b> เข้าพักที่หอพัก มจธ.บางขุนเทียน</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="dorm"><b>ไม่มีสิทธิ์</b> เข้าพักที่หอพัก มจธ.บางขุนเทียน</label>
					</div>
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